<?php

namespace CleverAge\SymfponyBundle\Serializer\Encoder;

use Symfony\Component\Serializer\Encoder;

/*
 * This file is part of the Symfony framework.
 *
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

/**
 * Encodes XML data
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 * @author John Wards <jwards@whiteoctober.co.uk>
 * @author Fabian Vogler <fabian@equivalence.ch>
 */
class XmlEncoder extends \Symfony\Component\Serializer\Encoder\XmlEncoder
{
    protected $itemNodeName = 'item';

    /**
     * Parse the data and convert it to DOMElements
     *
     * @param DOMNode $parentNode
     * @param array|object $data data
     * @return bool
     */
    protected function buildXml($parentNode, $data)
    {
        $append = true;

        if (is_array($data) || $data instanceof \Traversable) {
            foreach ($data as $key => $data) {
                //Ah this is the magic @ attribute types.
                if (strpos($key,"@")===0 && is_scalar($data) && $this->isElementNameValid($attributeName = substr($key,1))) {
                    $parentNode->setAttribute($attributeName, $data);
                } elseif (is_array($data) && false === is_numeric($key)) {
                    /**
                    * Is this array fully numeric keys?
                    */
                    if (ctype_digit( implode('', array_keys($data) ) )) {
                        /**
                        * Create nodes to append to $parentNode based on the $key of this array
                        * Produces <xml><item>0</item><item>1</item></xml>
                        * From array("item" => array(0,1));
                        */
                        foreach ($data as $subData) {
                            $append = $this->appendNode($parentNode, $subData, $key);
                        }
                    } else {
                        $append = $this->appendNode($parentNode, $data, $key);
                    }
                } elseif (is_numeric($key) || !$this->isElementNameValid($key)) {
                    $append = $this->appendNode($parentNode, $data, $this->itemNodeName, $key);
                } else {
                    $append = $this->appendNode($parentNode, $data, $key);
                }
            }
            return $append;
        }
        if (is_object($data)) {
            $data = $this->serializer->normalizeObject($data, $this->format);
            if (!$this->serializer->isStructuredType($data)) {
                // top level data object is normalized into a scalar
                if (!$parentNode->parentNode->parentNode) {
                    $root = $parentNode->parentNode;
                    $root->removeChild($parentNode);
                    return $this->appendNode($root, $data, $this->rootNodeName);
                }
                return $this->appendNode($parentNode, $data, 'data');
            }
            return $this->buildXml($parentNode, $data);
        }
        throw new \UnexpectedValueException('An unexpected value could not be serialized: '.var_export($data, true));
    }

    /**
     * Returns the item node name
     * @return string item node name
     */
    public function getItemNodeName()
    {
        return $this->itemNodeName;
    }

    /**
     * Sets the item node name
     * @param string $name item node name
     */
    public function setItemNodeName($itemNodeName)
    {
        $this->itemNodeName = $itemNodeName;
    }
}