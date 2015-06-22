<?php

namespace BlogBundle\Tests\Controller;

use BlogBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testIndex()
    {
        $post = new Post();
        $post->setTitle("title1");
        $post->setBody("body1");
        $post->setCreatedAt(new \Datetime());
        $post->setUpdatedAt(new \DateTime());
        $this->em->persist($post);
        $this->em->flush();

        $client = static::createClient();

        $crawler = $client->request('GET', '/blog/api/posts.json');
        $content = $client->getResponse()->getContent();
        var_dump($content);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertTrue(true);
    }
}
