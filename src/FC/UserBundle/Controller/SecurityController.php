<?php

namespace FC\UserBundle\Controller;

use FC\UserBundle\Entity\User;
use FC\UserBundle\Form\UserType;
use FOS\UserBundle\Controller\SecurityController as Controller;
use Symfony\Component\HttpFoundation\Request;


class SecurityController extends Controller
{
    public function signinAction(Request $request)
    {
        $user = new User();
        $form = $this->get('form.factory')->create(UserType::class, $user);


        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $user->setEnabled(1);
            $em->persist($user);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'user bien enregistrée.');


            return $this->redirectToRoute('fc_platform_successignin');
        }


        return $this->render('FCUserBundle:Security:signin.html.twig', array(
            'form' => $form->createView(),
        ));


    }

    public function profilAction($id)
    {

        $em=$this->getDoctrine()->getManager();

        $user = $em->getRepository('FCUserBundle:User')->find($id);
        $builds=$em->getRepository('FCPlatformBundle:Build')->findBy(

            array('user'=>$id));
        return $this->render('FCUserBundle:Security:profil.html.twig',array(
            'user' => $user,
            'builds'=>$builds
        ));

    }

    public function loginAction(Request $request)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('fc_platform_user');
        }

        $authenticationUtils = $this->get('security.authentication_utils');


        return $this->render('FCUserBundle:Security:login.html.twig', array(
            'last_username' => $authenticationUtils->getLastUsername(),
            'error' => $authenticationUtils->getLastAuthenticationError(),
        ));
    }


}