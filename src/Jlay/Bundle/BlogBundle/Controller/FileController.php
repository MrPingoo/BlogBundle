<?php

namespace Jlay\Bundle\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * File controller.
 *
 */
class FileController extends Controller
{

    /**
     * Lists all File entities.
     *
     * @Route("/admin/file", name="file")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        // Get All files

        $entities = '';

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new File.
     *
     * @Route("/admin/file/new", name="file_upload")
     */
    public function uploadsAction(Request $request)
    {

        return $this->redirect($this->generateUrl('file'));
    }
}
