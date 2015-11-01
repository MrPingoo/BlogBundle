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

        $entities = $em->getRepository('JlayBlogBundle:Post')->findBy(array('hidden' => 0), array('crdate' => 'DESC'), 4, null);

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
        return array('paths' => array('Php', 'TYPO3', 'Symfony', 'CSS', 'Solr', 'AdminSys', 'Veille', 'Autre'));
    }

    /**
     * @Route("/snippet/{id}")
     * @Template()
     */
    public function snippetAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JlayBlogBundle:Snippet')->findBy(array('hidden' => 0, 'deleted' => 0, 'path' => $id), array('crdate' => 'DESC'), null, null);

        return array(
            'entities' => $entities,
            'paths' => array(1 => 'Php', 2 => 'TYPO3', 3 => 'Symfony', 4 => 'CSS', 5 => 'Solr', 6 => 'AdminSys', 7 => 'Veille', 8 => 'Autre')
        );
    }

    /**
     * @Route("/posts")
     * @Template()
     */
    public function postsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JlayBlogBundle:Post')->findBy(array('hidden' => 0), array('crdate' => 'DESC'), null, null);

        return array(
            'entities' => $entities,
        );
    }

    /**
     * @Route("/post/{name}")
     * @Template()
     */
    public function postAction($name)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JlayBlogBundle:Post')->find($name);

        return array(
            'entity' => $entity,
        );
    }

    /**
     * @Route("/way")
     * @Template()
     */
    public function wayAction()
    {
        return $this->redirect('http://www.doyoubuzz.com/julian-layen');
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
