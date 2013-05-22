<?php

namespace Pasi\bibliotecaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pasi\bibliotecaBundle\Entity\Cancion;
use Pasi\bibliotecaBundle\Form\CancionType;

/**
 * Cancion controller.
 *
 */
class CancionController extends Controller
{
    /**
     * Lists all Cancion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BibliotecaBundle:Cancion')->findAll();

        return $this->render('BibliotecaBundle:Cancion:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Cancion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BibliotecaBundle:Cancion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cancion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BibliotecaBundle:Cancion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Cancion entity.
     *
     */
    public function newAction()
    {
        $entity = new Cancion();
        $form   = $this->createForm(new CancionType(), $entity);

        return $this->render('BibliotecaBundle:Cancion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Cancion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Cancion();
        $form = $this->createForm(new CancionType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setCreacion(new \DateTime());
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cancion_show', array('id' => $entity->getId())));
        }

        return $this->render('BibliotecaBundle:Cancion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cancion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BibliotecaBundle:Cancion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cancion entity.');
        }

        $editForm = $this->createForm(new CancionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BibliotecaBundle:Cancion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Cancion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BibliotecaBundle:Cancion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cancion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CancionType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
        	
        	$entity->setModificacion(new \DateTime());
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cancion_edit', array('id' => $id)));
        }

        return $this->render('BibliotecaBundle:Cancion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Cancion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BibliotecaBundle:Cancion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cancion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cancion'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
