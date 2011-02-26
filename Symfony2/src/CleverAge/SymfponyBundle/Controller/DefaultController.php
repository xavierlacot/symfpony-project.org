<?php

namespace CleverAge\SymfponyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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

    public function indexAction($_format)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('select p from CleverAgeSymfponyBundle:Pony p');
        $ponies = $query->execute();

        $response = new Response($this->getSerializer($_format)->encode($ponies, $_format));
        $response->setPublic();
        $response->setSharedMaxAge(120);

        return $response;
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
        $response = new Response();
        $request  = $this->get("request");
        
        $response->setPublic();
        $response->setSharedMaxAge(120);
        $response->setETag(\md5(\serialize($pony))); // Should be a method in Pony

        if ($response->isNotModified($request))
        {
            // return the 304 Response immediately
            return $response;
        } 
        else
        {
            $response->setContent( $this->getSerializer($_format)->encode($pony, $_format) );
            return $response;
        }
    }

    /**
     * The other way is to manualy fetch a Pony with a Request param, here it's the slug too.
     * 
     * @param string $slug
     * @param string $_format
     */
    public function deleteAction($slug, $_format)
    {
        $pony = $this->getEntityManager()->getRepository('CleverAgeSymfponyBundle:Pony')->findOneBySlug($slug);

        if ($pony)
        {
          $this->getEntityManager()->remove($pony);
          $this->getEntityManager()->flush();
          return new Response(null); // Send only 200 response.
        }
        else
        {
          throw new NotFoundHttpException(); // Return a nice 404 response
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