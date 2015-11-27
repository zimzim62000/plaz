<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use ZIMZIM\ToolsBundle\Controller\MainController;

use AppBundle\Entity\AcmeCS;
use AppBundle\Form\AcmeCSType;

/**
 * AcmeCS controller.
 *
 */
class ConstructionSiteController extends MainController
{

    const DIR = 'ZIMZIMConstructionSiteBundle:ConstructionSite';

    /**
     * Lists all AcmeCS entities.
     *
     */
    public function indexAction()
    {
        $manager = $this->container->get('zimzim_categoryproduct_categorymanager');

        $data = array(
            'manager' => $manager,
            'dir' => self::DIR,
            'show' => 'zimzim_categoryproduct_category_show',
            'edit' => 'zimzim_categoryproduct_category_edit'
        );

        return $this->gridList($data);
    }

    /**
     * Creates a new AcmeCS entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new AcmeCS();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $this->createSuccess();
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('zimzim_constructionsite_constructionsite_show', array('id' => $entity->getId())));
        }

        return $this->render(
            'AppBundle:AcmeCS:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Creates a form to create a AcmeCS entity.
     *
     * @param AcmeCS $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(AcmeCS $entity)
    {
        $form = $this->createForm(
            new AcmeCSType(),
            $entity,
            array(
                'action' => $this->generateUrl('zimzim_constructionsite_constructionsite_create'),
                'method' => 'POST',
            )
        );

        $form->add(
            'submit',
            'submit',
            array('label' => 'button.validate', 'attr' => array('class' => 'tiny button success'))
        );

        return $form;
    }

    /**
     * Displays a form to create a new AcmeCS entity.
     *
     */
    public function newAction()
    {
        $entity = new AcmeCS();
        $form = $this->createCreateForm($entity);

        return $this->render(
            'AppBundle:AcmeCS:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Finds and displays a AcmeCS entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:AcmeCS')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AcmeCS entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'AppBundle:AcmeCS:show.html.twig',
            array(
                'entity' => $entity,
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Displays a form to edit an existing AcmeCS entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:AcmeCS')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AcmeCS entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'AppBundle:AcmeCS:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Creates a form to edit a AcmeCS entity.
     *
     * @param AcmeCS $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(AcmeCS $entity)
    {
        $form = $this->createForm(
            new AcmeCSType(),
            $entity,
            array(
                'action' => $this->generateUrl('zimzim_constructionsite_constructionsite_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            )
        );

        $form->add(
            'submit',
            'submit',
            array('label' => 'button.validate', 'attr' => array('class' => 'tiny button success'))
        );

        return $form;
    }

    /**
     * Edits an existing AcmeCS entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:AcmeCS')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AcmeCS entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $this->updateSuccess();
            $em->flush();

            return $this->redirect($this->generateUrl('zimzim_constructionsite_constructionsite_edit', array('id' => $id)));
        }

        return $this->render(
            'AppBundle:AcmeCS:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a AcmeCS entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:AcmeCS')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AcmeCS entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->deleteSuccess();
        }

        return $this->redirect($this->generateUrl('zimzim_constructionsite_constructionsite'));
    }

    /**
     * Creates a form to delete a AcmeCS entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('zimzim_constructionsite_constructionsite_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add(
                'submit',
                'submit',
                array('label' => 'button.delete', 'attr' => array('class' => 'tiny button alert'))
            )
            ->getForm();
    }
}
