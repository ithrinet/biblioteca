<?php

namespace Pasi\bibliotecaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pasi\bibliotecaBundle\Entity\Artista;
use Pasi\bibliotecaBundle\Form\ArtistaType;

/**
 * Artista controller.
 *
 */
class ArtistaController extends Controller
{
    /**
     * Lists all Artista entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BibliotecaBundle:Artista')->findAll();

        return $this->render('BibliotecaBundle:Artista:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Artista entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BibliotecaBundle:Artista')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Artista entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BibliotecaBundle:Artista:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Artista entity.
     *
     */
    public function newAction()
    {
        $entity = new Artista();
        $form   = $this->createForm(new ArtistaType(), $entity);

        return $this->render('BibliotecaBundle:Artista:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Artista entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Artista();
        $form = $this->createForm(new ArtistaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('artista_show', array('id' => $entity->getId())));
        }

        return $this->render('BibliotecaBundle:Artista:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Artista entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BibliotecaBundle:Artista')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Artista entity.');
        }

        $editForm = $this->createForm(new ArtistaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BibliotecaBundle:Artista:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Artista entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BibliotecaBundle:Artista')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Artista entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ArtistaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
        	$entity->setModificacion(new \DateTime());
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('artista_edit', array('id' => $id)));
        }

        return $this->render('BibliotecaBundle:Artista:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Artista entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BibliotecaBundle:Artista')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Artista entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('artista'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
