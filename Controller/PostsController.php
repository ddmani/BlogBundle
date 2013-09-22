<?php

namespace ddmani\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ddmani\BlogBundle\Entity\Posts;
use ddmani\BlogBundle\Form\PostsType;

/**
 * Posts controller.
 *
 */
class PostsController extends Controller
{

    /**
     * Lists all Posts entities.
     *
     */
    public function indexAction($adminpage=null)
    {
        $request = Request::createFromGlobals();
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('ddmaniBlogBundle:Posts')->findAll();

        if(($adminpage == 'admin' || $request->isXmlHttpRequest()==true) && $this->get('security.context')->isGranted('ROLE_ADMIN')){
            return $this->render('ddmaniBlogBundle:Posts:indexbo.html.twig', array(
                'entities' => $entities,
            ));
        }
        else{
            return $this->render('ddmaniBlogBundle:Posts:index.html.twig', array(
                'entities' => $entities,
            ));
        }
    }
    /**
     * Creates a new Posts entity.
     *
     */
    public function createAction(Request $request)
    {
        if ($this->get('security.context')->isGranted('ROLE_ADMIN')){
            if($request->isXmlHttpRequest())
            {
                $entity = new Posts();
                $entity->setPostDateCreate(new \Datetime())
                       ->setPostDateModify(new \Datetime())
                       ->setPostAuthor($this->container->get('security.context')->getToken()->getUser()->getId());
                $form = $this->createCreateForm($entity);
                $form->handleRequest($request);

                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($entity);
                    $em->flush();
                    $response = new Response;
                    $response->setStatusCode(200);
                    return $response;                   
                }
            }
            else{
                return $this->render('ddmaniBlogBundle:Posts:new.html.twig', array(
                    'entity' => $entity,
                    'form'   => $form->createView(),
                ));
            }
        }
    }

    /**
    * Creates a form to create a Posts entity.
    *
    * @param Posts $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Posts $entity)
    {
        $form = $this->createForm(new PostsType(), $entity, array(
            'action' => $this->generateUrl('post_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create','attr' => array(
            'class'=>'btn btn-success'
        )));

        return $form;
    }

    /**
     * Displays a form to create a new Posts entity.
     *
     */
    public function newAction()
    {
        if ($this->get('security.context')->isGranted('ROLE_ADMIN')){
            $entity = new Posts();
            $form   = $this->createCreateForm($entity);

            return $this->render('ddmaniBlogBundle:Posts:new.html.twig', array(
                'entity' => $entity,
                'form'   => $form->createView(),
            ));
        }
    }

    /**
     * Finds and displays a Posts entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ddmaniBlogBundle:Posts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Posts entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ddmaniBlogBundle:Posts:show.html.twig', array(
            'entity'      => $entity ));
    }

    /**
     * Displays a form to edit an existing Posts entity.
     *
     */
    public function editAction($id)
    {
        if ($this->get('security.context')->isGranted('ROLE_ADMIN')){
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('ddmaniBlogBundle:Posts')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Posts entity.');
            }

            $editForm = $this->createEditForm($entity);
            $deleteForm = $this->createDeleteForm($id);

            return $this->render('ddmaniBlogBundle:Posts:edit.html.twig', array(
                'entity'      => $entity,
                'edit_form'   => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ));
        }
    }

    /**
    * Creates a form to edit a Posts entity.
    *
    * @param Posts $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Posts $entity)
    {
        $form = $this->createForm(new PostsType(), $entity, array(
            'action' => $this->generateUrl('post_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update','attr' => array(
            'class'=>'btn btn-success'
        )));

        return $form;
    }
    /**
     * Edits an existing Posts entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        if ($this->get('security.context')->isGranted('ROLE_ADMIN')){
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('ddmaniBlogBundle:Posts')->find($id);
            $entity->setPostDateModify(new \Datetime());

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Posts entity.');
            }

            $deleteForm = $this->createDeleteForm($id);
            $editForm = $this->createEditForm($entity);
            $editForm->handleRequest($request);

            if ($editForm->isValid()) {
                $em->flush();

                return $this->redirect($this->generateUrl('post_edit', array('id' => $id)));
            }

            return $this->render('ddmaniBlogBundle:Posts:edit.html.twig', array(
                'entity'      => $entity,
                'edit_form'   => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ));
        }
    }
    /**
     * Deletes a Posts entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        if ($this->get('security.context')->isGranted('ROLE_ADMIN')){
            $form = $this->createDeleteForm($id);
            $form->handleRequest($request);

            if ($form->isValid() || $request->isXmlHttpRequest()) {
                $em = $this->getDoctrine()->getManager();
                $entity = $em->getRepository('ddmaniBlogBundle:Posts')->find($id);

                if (!$entity) {
                    throw $this->createNotFoundException('Unable to find Posts entity.');
                }

                $em->remove($entity);
                $em->flush();
            }

            return $this->redirect($this->generateUrl('post'));
        }
    }

    /**
     * Creates a form to delete a Posts entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('post_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete','attr' => array(
            'class'=>'btn btn-danger'
            )))
            ->getForm()
        ;
    }
}
