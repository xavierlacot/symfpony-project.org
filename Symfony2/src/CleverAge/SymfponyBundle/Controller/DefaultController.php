<?php

namespace CleverAge\SymfponyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($_format)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $query = $em->createQuery('select p from CleverAgeSymfponyBundle:Pony p');
        $ponys = $query->execute();

        $serializer = new \Symfony\Component\Serializer\Serializer();
        $serializer->addNormalizer(new \Symfony\Component\Serializer\Normalizer\CustomNormalizer());
        $serializer->setEncoder('json', new \Symfony\Component\Serializer\Encoder\JsonEncoder());
        $serializer->setEncoder('xml', new \Symfony\Component\Serializer\Encoder\XmlEncoder());

        return $this->createResponse($serializer->encode($ponys, $_format), 200, array());
    }
}
