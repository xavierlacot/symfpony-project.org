<?php

namespace CleverAge\SymfponyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer;

use CleverAge\SymfponyBundle\Entity\Pony;

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

        return new Response($this->getSerializer($_format)->encode($ponies, $_format));
    }

    /**
     * Thx to FrameworkExtraBundle,
     * the Pony is automaticaly fetched by the ParamConverter.
     * @param Pony $pony
     * @param string $_format
     * @return Response
     */
    public function showAction(Pony $pony, $_format)
    {
        return new Response($this->getSerializer($_format)->encode($pony, $_format));
    }

    /**
     * The other way is to manualy fetch a Pony with a Request param, here it's the slug too.
     * 
     * @param string $slug
     * @param string $_format
     */
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

    private function getSerializer($format)
    {
        // create serializer
        $serializer = new Serializer\Serializer();
        $serializer->addNormalizer(new Serializer\Normalizer\CustomNormalizer());

        if ('json' == $format)
        {
            // add json encoder
            $serializer->setEncoder('json', new Serializer\Encoder\JsonEncoder());
        }
        elseif ('xml' == $format)
        {
            // add xml encoder
            $serializer->setEncoder('xml', new Serializer\Encoder\XmlEncoder());
        }

        return $serializer;
    }
}