<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Post;
use BlogBundle\Form\PostType;
use FOS\RestBundle\Controller\Annotations\Prefix,
    FOS\RestBundle\Controller\Annotations\NamePrefix,
    FOS\RestBundle\Controller\Annotations\RouteResource,
    FOS\RestBundle\Controller\Annotations\View,
    FOS\RestBundle\Controller\Annotations\QueryParam,
    FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Route;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PostApiController
 * @package BlogBundle\Controller
 */
class PostApiController extends FOSRestController
{
    /**
     * @Route("/posts")
     */
    public function getPostsAction()
    {
        $post = new Post();
        $post->setTitle("aaa");
        $post->setBody("aaa");
        $post->setCreatedAt(new \DateTime());
        $post->setUpdatedAt(new \DateTime());

        return $this->handleView($this->view([$post,$post,$post]));
    }

    /**
     *
     * @param $id
     * @return JsonResponse
     */
    public function getPostAction($id){
        $post = new Post();
        $post->setTitle("aaa");
        $post->setBody("aaa");
        $post->setCreatedAt(new \DateTime());
        $post->setUpdatedAt(new \DateTime());
        return new JsonResponse(['aaa'=>'bbb']);
    }


    public function postPostAction(Request $request)
    {
        $form = $this->get('form.factory')->createNamed('', new PostType(), $post = new Post(), [
            //'method' => 'GET',
            'csrf_protection' => false,
        ]);

        $form->handleRequest($request);

        $this->get("logger")->debug(var_export($post,true));

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            return $this->handleView($this->view($post));
        }
        $this->get("logger")->debug("invalid");

        return $this->handleView($this->view($form));
    }
}