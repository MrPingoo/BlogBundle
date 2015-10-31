<?php

namespace Jlay\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FrontendController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JlayBlogBundle:Post')->findAll(array('crdate' => 'DESC'), null, 4, null);

        return array(
            'entities' => $entities,
        );
    }

    /**
     * @Route("/snippets")
     * @Template()
     */
    public function snippetsAction()
    {
        return array('siteName' => 'Blog');
    }

    /**
     * @Route("/posts")
     * @Template()
     */
    public function postsAction()
    {
        return array('siteName' => 'Blog');
    }

    /**
     * @Route("/post/{name}")
     * @Template()
     */
    public function postAction($name)
    {
        return array('siteName' => 'Blog');
    }

    /**
     * @Route("/way")
     * @Template()
     */
    public function wayAction()
    {
        return array('siteName' => 'Blog');
    }

    /**
     * @Route("/contact")
     * @Template()
     */
    public function contactAction()
    {
        return array('siteName' => 'Blog');
    }
}
