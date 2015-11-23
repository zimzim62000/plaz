<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use ZIMZIM\ToolsBundle\Controller\MainController;

use AppBundle\Entity\AcmeTAI;
use AppBundle\Form\AcmeTAIType;

/**
 * AcmeTAI controller.
 *
 */
class AcmeTAIController extends MainController
{

    /**
     * Lists all AcmeTAI entities.
     *
     */
    public function indexAction()
    {
    $data = array(
        'entity'     => 'AppBundle:AcmeTAI',
        'show'       => 'zimzim_constructionsite_typeactionitem_show',
        'edit'       => 'zimzim_constructionsite_typeactionitem_edit'
    );

    $this->gridList($data);


   return $this->grid->getGridResponse('AppBundle:AcmeTAI:index.html.twig');
    }
    /**
     * Creates a new AcmeTAI entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new AcmeTAI();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $this->createSuccess();
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('zimzim_constructionsite_typeactionitem_show', array('id' => $entity->getId())));
        }

        return $this->render('AppBundle:AcmeTAI:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a AcmeTAI entity.
    *
    * @param AcmeTAI $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(AcmeTAI $entity)
    {
        $form = $this->createForm(new AcmeTAIType(), $entity, array(
            'action' => $this->generateUrl('zimzim_constructionsite_typeactionitem_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'button.validate', 'attr' => array('class' => 'tiny button success')));

        return $form;
    }

    /**
     * Displays a form to create a new AcmeTAI entity.
     *
     */
    public function newAction()
    {
        $entity = new AcmeTAI();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppBundle:AcmeTAI:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a AcmeTAI entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:AcmeTAI')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AcmeTAI entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:AcmeTAI:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AcmeTAI entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:AcmeTAI')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AcmeTAI entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:AcmeTAI:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a AcmeTAI entity.
    *
    * @param AcmeTAI $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AcmeTAI $entity)
    {
        $form = $this->createForm(new AcmeTAIType(), $entity, array(
            'action' => $this->generateUrl('zimzim_constructionsite_typeactionitem_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'button.validate', 'attr' => array('class' => 'tiny button success')));

        return $form;
    }
    /**
     * Edits an existing AcmeTAI entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:AcmeTAI')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AcmeTAI entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
			$this->updateSuccess();
            $em->flush();

            return $this->redirect($this->generateUrl('zimzim_constructionsite_typeactionitem_edit', array('id' => $id)));
        }

        return $this->render('AppBundle:AcmeTAI:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a AcmeTAI entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:AcmeTAI')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AcmeTAI entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->deleteSuccess();
        }

        return $this->redirect($this->generateUrl('zimzim_constructionsite_typeactionitem'));
    }

    /**
     * Creates a form to delete a AcmeTAI entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('zimzim_constructionsite_typeactionitem_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'button.delete', 'attr' => array('class' => 'tiny button alert')))
            ->getForm()
        ;
    }
}
