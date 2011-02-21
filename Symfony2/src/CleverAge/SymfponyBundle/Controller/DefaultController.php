<?php

namespace CleverAge\SymfponyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($_format)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $query = $em->createQuery('select p from CleverAgeSymfponyBundle:Pony p');
        $ponies = $query->execute();

        // create serializer
        $serializer = new \Symfony\Component\Serializer\Serializer();
        $serializer->addNormalizer(new \Symfony\Component\Serializer\Normalizer\CustomNormalizer());

        if ('json' == $_format)
        {
            // add json encoder
            $serializer->setEncoder('json', new \Symfony\Component\Serializer\Encoder\JsonEncoder());
        }
        elseif ('xml' == $_format)
        {
            // add xml encoder
            $xmlEncoder = new \CleverAge\SymfponyBundle\Serializer\Encoder\XmlEncoder();
            $xmlEncoder->setRootNodeName('Ponies');
            $xmlEncoder->setItemNodeName('Pony');
            $serializer->setEncoder('xml', $xmlEncoder);
        }

        return $this->createResponse($serializer->encode($ponies, $_format), 200, array());
    }
}
