<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use ZIMZIM\ToolsBundle\Controller\MainController;

use AppBundle\Entity\AcmeAI;
use AppBundle\Form\AcmeAIType;

/**
 * AcmeAI controller.
 *
 */
class AcmeAIController extends MainController
{

    /**
     * Lists all AcmeAI entities.
     *
     */
    public function indexAction()
    {
    $data = array(
        'entity'     => 'AppBundle:AcmeAI',
        'show'       => 'zimzim_constructionsitebundle_actionitem_show',
        'edit'       => 'zimzim_constructionsitebundle_actionitem_edit'
    );

    $this->gridList($data);


   return $this->grid->getGridResponse('AppBundle:AcmeAI:index.html.twig');
    }
    /**
     * Creates a new AcmeAI entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new AcmeAI();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $this->createSuccess();
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('zimzim_constructionsitebundle_actionitem_show', array('id' => $entity->getId())));
        }

        return $this->render('AppBundle:AcmeAI:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a AcmeAI entity.
    *
    * @param AcmeAI $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(AcmeAI $entity)
    {
        $form = $this->createForm(new AcmeAIType(), $entity, array(
            'action' => $this->generateUrl('zimzim_constructionsitebundle_actionitem_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'button.validate', 'attr' => array('class' => 'tiny button success')));

        return $form;
    }

    /**
     * Displays a form to create a new AcmeAI entity.
     *
     */
    public function newAction()
    {
        $entity = new AcmeAI();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppBundle:AcmeAI:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a AcmeAI entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:AcmeAI')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AcmeAI entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:AcmeAI:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AcmeAI entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:AcmeAI')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AcmeAI entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:AcmeAI:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a AcmeAI entity.
    *
    * @param AcmeAI $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AcmeAI $entity)
    {
        $form = $this->createForm(new AcmeAIType(), $entity, array(
            'action' => $this->generateUrl('zimzim_constructionsitebundle_actionitem_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'button.validate', 'attr' => array('class' => 'tiny button success')));

        return $form;
    }
    /**
     * Edits an existing AcmeAI entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:AcmeAI')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AcmeAI entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
			$this->updateSuccess();
            $em->flush();

            return $this->redirect($this->generateUrl('zimzim_constructionsitebundle_actionitem_edit', array('id' => $id)));
        }

        return $this->render('AppBundle:AcmeAI:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a AcmeAI entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:AcmeAI')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AcmeAI entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->deleteSuccess();
        }

        return $this->redirect($this->generateUrl('zimzim_constructionsitebundle_actionitem'));
    }

    /**
     * Creates a form to delete a AcmeAI entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('zimzim_constructionsitebundle_actionitem_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'button.delete', 'attr' => array('class' => 'tiny button alert')))
            ->getForm()
        ;
    }
}
