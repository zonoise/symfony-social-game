<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BlogBundle\Entity\PostRepository;
use BlogBundle\Entity\Post;

class DefaultController extends Controller
{
    public function indexAction($name=null)
    {
        $post = new Post();
        $post->setTitle("aaa");
        $post->setBody("aaa");
        $post->setCreatedAt(new \DateTime());
        $post->setUpdatedAt(new \DateTime());

        $em = $this->getDoctrine()->getEntityManager();
        $repo = $em->getRepository("BlogBundle:Post");
        $em->persist($post);
        $em->flush();
        #$repository->find();
        return $this->render('BlogBundle:Default:index.html.twig', array('name' => $name));
    }
}
