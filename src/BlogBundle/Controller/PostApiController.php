<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Post;
use FOS\RestBundle\Controller\Annotations\Prefix,
    FOS\RestBundle\Controller\Annotations\NamePrefix,
    FOS\RestBundle\Controller\Annotations\RouteResource,
    FOS\RestBundle\Controller\Annotations\View,
    FOS\RestBundle\Controller\Annotations\QueryParam,
    FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Route;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class PostApiController
 * @package BlogBundle\Controller
 */
class PostApiController extends FOSRestController
{


    /**
     * @Route("/posts")
     */
    public function indexAction()
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
     * @Route("/post/{id}")
     */
    public function getPostAction($id){
        $post = new Post();
        $post->setTitle("aaa");
        $post->setBody("aaa");
        $post->setCreatedAt(new \DateTime());
        $post->setUpdatedAt(new \DateTime());
        return new JsonResponse(['aaa'=>'bbb']);

    }
}
