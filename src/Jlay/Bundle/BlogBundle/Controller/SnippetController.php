<?php

namespace Jlay\Bundle\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Jlay\Bundle\BlogBundle\Entity\Snippet;
use Jlay\Bundle\BlogBundle\Form\SnippetType;

/**
 * Snippet controller.
 *
 */
class SnippetController extends Controller
{

    /**
     * Lists all Snippet entities.
     *
     * @Route("/admin/snippet", name="snippet")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JlayBlogBundle:Snippet')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Snippet entity.
     *
     * @Route("/admin/snippet/new", name="snippet_create")
     * @Method("POST")
     * @Template("JlayBlogBundle:Snippet:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Snippet();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('snippet_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Snippet entity.
     *
     * @param Snippet $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Snippet $entity)
    {
        $form = $this->createForm(new SnippetType(), $entity, array(
            'action' => $this->generateUrl('snippet_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Snippet entity.
     *
     * @Route("/admin/snippet/new", name="snippet_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Snippet();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Snippet entity.
     *
     * @Route("/admin/snippet/{id}", name="snippet_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JlayBlogBundle:Snippet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Snippet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Snippet entity.
     *
     * @Route("/admin/snippet/{id}/edit", name="snippet_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JlayBlogBundle:Snippet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Snippet entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Snippet entity.
    *
    * @param Snippet $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Snippet $entity)
    {
        $form = $this->createForm(new SnippetType(), $entity, array(
            'action' => $this->generateUrl('snippet_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Snippet entity.
     *
     * @Route("/admin/snippet/{id}/edit", name="snippet_update")
     * @Method("PUT")
     * @Template("JlayBlogBundle:Snippet:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JlayBlogBundle:Snippet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Snippet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('snippet_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Snippet entity.
     *
     * @Route("/admin/snippet/{id}/delete", name="snippet_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JlayBlogBundle:Snippet')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Snippet entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('snippet'));
    }

    /**
     * Creates a form to delete a Snippet entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('snippet_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
