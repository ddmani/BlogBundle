<?php

namespace ddmani\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogAdminController extends Controller
{
    public function indexAction()
    {
        if ($this->get('security.context')->isGranted('ROLE_USER')){
            return $this->render('ddmaniBlogBundle:Admin:index.html.twig', array('test'=>'Identifie'));
        }
        else{
            return $this->render('ddmaniBlogBundle:Admin:index.html.twig', array('test'=>'nonidentifie'));
        }
//        $this->container->get('security.context')->getToken()->getUser()->getId()
    }
}
