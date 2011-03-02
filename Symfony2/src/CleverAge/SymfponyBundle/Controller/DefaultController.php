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
     * Creates a new Pony
     *
     * @param string $_format
     */
    public function createAction($_format)
    {
        // create the serializer
        $serializer = $this->getSerializer($_format);

        // build the Pony from a decoded array
        $pony = $serializer->denormalizeObject(
            $serializer->decode($this->get('request')->getContent(), $_format),
            'CleverAge\SymfponyBundle\Entity\Pony',
            $_format
        );

        if ($pony)
        {
            // validate the pony
            $validator = $this->get('validator');

            if (0 === count($validator->validate($pony)))
            {
                // this is a valid Pony instance, persist it
                $em = $this->getEntityManager();
                $em->persist($pony);
                $em->flush();

                // redirect to this Pony
                $router = $this->get('router');
                $response = new \Symfony\Component\HttpFoundation\RedirectResponse(
                    $router->generate('pony_show', array(
                        'slug' => $pony->getSlug(),
                        '_format' => $_format
                    ))
                );
                return $response;
            }
        }

        // something went wrong, cry
        $response = new Response('invalid pony!', 406);
        return $response;
    }

    /**
     * Kills a pony
     *
     * @param string $slug
     * @param string $_format
     */
    public function deleteAction($slug, $_format)
    {
        // fetch a Pony with a Request param, here it's the slug too
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
        $request = $this->get("request");

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
            $response->setContent(
                $this->getSerializer($_format)->encode($pony, $_format)
            );
            return $response;
        }
    }

    private function getSerializer($format)
    {
        if (!isset($this->serializer))
        {
            // create serializer
            $this->serializer = new Serializer\Serializer();
            $this->serializer->addNormalizer(new Serializer\Normalizer\CustomNormalizer());

            if ('json' == $format)
            {
                // add json encoder
                $this->serializer->setEncoder('json', new Serializer\Encoder\JsonEncoder());
            }
            elseif ('xml' == $format)
            {
                // add xml encoder
                $this->serializer->setEncoder('xml', new Serializer\Encoder\XmlEncoder());
            }
        }

        return $this->serializer;
    }
}