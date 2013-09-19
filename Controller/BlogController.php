<?php

namespace ddmani\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function indexAction()
    {
        if ($this->get('security.context')->isGranted('ROLE_USER')){
            $em = $this->getDoctrine()->getManager();

            $entities = $em->getRepository('ddmaniBlogBundle:Posts')->findAll();

            return $this->render('ddmaniBlogBundle:Default:index.html.twig', array(
                'entities' => $entities,
            ));
        }
        else{
            return $this->render('ddmaniBlogBundle:Default:index.html.twig', array('test'=>'nonidentifie'));
        }
//        $this->container->get('security.context')->getToken()->getUser()->getId()
    }
    
    public function postshowAction($id)
    {
        return $this->render('ddmaniBlogBundle:Default:post.html.twig', array('id'=>$id));
    }
}
