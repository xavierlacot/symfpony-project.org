<?php

namespace CleverAge\SymfponyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @return \Doctrine\ORM\EntityManager
     */
    private function getEntityManager()
    {
      return $this->get('doctrine.orm.entity_manager');
    }

    private function getRessource($slug)
    {
      return $this->getEntityManager()->getRepository('CleverAgeSymfponyBundle:Pony')->findOneBySlug($slug);
    }

    public function indexAction($_format)
    {
        $em = $this->getEntityManager();
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

    public function showAction($slug, $_format)
    {
        $pony = $this->getRessource($slug);

        if ($pony)
        {
          $serializer = new \Symfony\Component\Serializer\Serializer();
          $serializer->addNormalizer(new \Symfony\Component\Serializer\Normalizer\CustomNormalizer());
          $serializer->setEncoder('json', new \Symfony\Component\Serializer\Encoder\JsonEncoder());
          $serializer->setEncoder('xml', new \Symfony\Component\Serializer\Encoder\XmlEncoder());

          return $this->createResponse($serializer->encode($pony, $_format), 200, array());
        }
        else
        {
          die('todo');
        }
    }

    public function deleteAction($slug, $_format)
    {
        $pony = $this->getRessource($slug);

        if ($pony)
        {
          die('todo');
        }
        else
        {
          die('todo');
        }
    }
}