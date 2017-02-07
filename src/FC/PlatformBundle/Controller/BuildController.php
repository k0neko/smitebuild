<?php

namespace FC\PlatformBundle\Controller;

use FC\PlatformBundle\Entity\Item;
use FC\PlatformBundle\Form\ItemType;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FC\PlatformBundle\Entity\Build;
use FC\PlatformBundle\Entity\God;
use FC\UserBundle\Entity\User;
use FC\PlatformBundle\Entity\Vote;
use FC\PlatformBundle\Form\BuildType;
use FC\PlatformBundle\Form\GodType;
use FC\UserBundle\Form\UserType;
use FC\UserBundle\Form\UserEditType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BuildController extends Controller
{
    public function indexAction()
    {
        return $this->render('FCPlatformBundle:build:index.html.twig');
    }

    public function buildAction($page)
    {

        if ($page < 1) {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
        }
        $nbPerPage = 5;


        $em = $this->getDoctrine()->getManager();

        $builds = $em->getRepository('FCPlatformBundle:Build')->getPageBuilds($page, $nbPerPage);

        $nbPages = ceil(count($builds) / $nbPerPage);


        // Si la page n'existe pas, on retourne une 404

        if ($page > $nbPages) {

            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");

        }


        return $this->render('FCPlatformBundle:build:build.html.twig', array(
            'builds' => $builds,
            'nbPages' => $nbPages,
            'page' => $page,
        ));


    }

    public function addbuildAction(Request $request)
    {
        if ($this->getUser() == null) {
            throw new AccessDeniedException('Limited acces');
        }
// On crée un objet build
        $build = new Build();

        $form = $this->get('form.factory')->create(BuildType::class, $build);


        // Si la requête est en POST

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            // On fait le lien Requête <-> Formulaire
            // À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur


            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            // On enregistre notre objet $advert dans la base de données, par exemple
            $em = $this->getDoctrine()->getManager();
            $build->setUser($this->getUser());
            $em->persist($build);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'build bien enregistrée.');

            // On redirige vers la page de visualisation de l'annonce nouvellement créée
            return $this->redirectToRoute('fc_platform_buildpage', array('id' => $build->getId()));
            //return $this->redirectToRoute('fc_platform_build');
        }

        // À ce stade, le formulaire n'est pas valide car :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau
        return $this->render('FCPlatformBundle:build:addbuild.html.twig', array(
            'form' => $form->createView(),
        ));


    }


    public function searchAction()
    {
        $builds = null;
        $keyword = null;
        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            $god = $_GET['god'];
            $em = $this->getDoctrine()->getManager();
            $builds = $em->getRepository('FCPlatformBundle:Build')->getBuildSearch($keyword,$god);


        }


        return $this->render('FCPlatformBundle:build:search.html.twig', array(
            'builds' => $builds,

        ));
    }


    public function adminAction($page)
    {


        if ($this->getUser() == null) {
            throw new AccessDeniedException('Limited acces');
        }

        if ($page < 1) {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
        }
        $nbPerPage = 5;


        $em = $this->getDoctrine()->getManager();


        $users = $em->getRepository('FCUserBundle:User')->getPageUsers($page, $nbPerPage);

        $nbPages = ceil(count($users) / $nbPerPage);


        // Si la page n'existe pas, on retourne une 404

        if ($page > $nbPages) {

            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");

        }


        return $this->render('FCPlatformBundle:build:admin.html.twig', array(
            'users' => $users,
            'nbPages' => $nbPages,
            'page' => $page,
        ));

    }

    public function buildpageAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $build = $em->getRepository('FCPlatformBundle:Build')->find($id);

        $votes = $em->getRepository('FCPlatformBundle:Vote')->findByBuild($build);
        return $this->render('FCPlatformBundle:build:buildpage.html.twig', array(
            'build' => $build,
            'votes' => $votes
        ));
    }


    public function editprofilAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('FCUserBundle:User')->find($id);
        $users = $this->getUser();

        if (null === $users) {
            throw new NotFoundHttpException("L'utilisateur d'id " . $id . " n'existe pas.");
        }

        $form = $this->get('form.factory')->create(UserType::class, $users);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            // Inutile de persister ici, Doctrine connait déjà notre annonce
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'profil bien modifiée.');

            return $this->redirectToRoute('fc_platform_user', array('id' => $users->getId()));
        }

        return $this->render('FCPlatformBundle:build:editprofil.html.twig', array(
            'user' => $users,
            'form' => $form->createView(),
        ));
    }

    public function edituserAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('FCUserBundle:User')->find($id);

        if (null === $users) {
            throw new NotFoundHttpException("L'utilisateur d'id " . $id . " n'existe pas.");
        }

        $form = $this->get('form.factory')->create();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $users->setEnabled(0);
            $em->persist($users);
            $em->flush();

            $request->getSession()->getFlashBag()->add('info', "L'utilisateur a bien été supprimée.");

            return $this->redirectToRoute('fc_platform_admin');
        }

        return $this->render('FCPlatformBundle:build:edituser.html.twig', array(
            'user' => $users,
            'form' => $form->createView(),
        ));


    }


    public function editgodAction(Request $request)
    {

        $god = new God();
        $form = $this->get('form.factory')->create(GodType::class, $god);


        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($god);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'dieu bien enregistrée.');


            return $this->redirectToRoute('fc_platform_admin');
        }


        // À ce stade, le formulaire n'est pas valide car :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau
        return $this->render('FCPlatformBundle:build:editgod.html.twig', array(
            'form' => $form->createView(),
        ));

    }


    public function voteAction($id)
    {



        $em = $this->getDoctrine()->getManager();

        $build = $em->getRepository('FCPlatformBundle:Build')->find($id);
        $vote = $em->getRepository('FCPlatformBundle:Vote')->findBy(['user'=>$this->getUser(),'build'=>$build]);
        if($vote == null && $build->getUser() != $this->getUser()) {
            $vote = new Vote();
            $vote->setUser($this->getUser());
            $vote->setBuild($build);
            $em->persist($vote);
            $em->flush();
        }



        return $this->redirectToRoute('fc_platform_buildpage', ['id' => $id]);


    }

    public function successigninAction()
    {

        return $this->render('FCPlatformBundle:build:successignin.html.twig');
    }


    public function listbuildAction()
    {


        $em = $this->getDoctrine()->getManager();

        $builds = $em->getRepository('FCPlatformBundle:Build')->findAll();


        return $this->render('FCPlatformBundle:build:listbuild.html.twig', array(
            'builds' => $builds

        ));


    }


    public function deletebuildAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $builds = $em->getRepository('FCPlatformBundle:Build')->find($id);

        $votes = $em->getRepository('FCPlatformBundle:Vote')->findByBuild($builds);

        if (null === $builds) {
            throw new NotFoundHttpException("Le build d'id " . $id . " n'existe pas.");
        }

        $form = $this->get('form.factory')->create();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            foreach($votes as $vote) {
                $em->remove($vote);
            }
            $em->remove($builds);
            $em->flush();

            $request->getSession()->getFlashBag()->add('info', "Le build a bien été supprimée.");

            return $this->redirectToRoute('fc_platform_admin');
        }

        return $this->render('FCPlatformBundle:build:deletebuild.html.twig', array(
            'build' => $builds,
            'form' => $form->createView(),
        ));


    }


    public function editbuildAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $build = $em->getRepository('FCPlatformBundle:Build')->find($id);

        if (null === $build) {
            throw new NotFoundHttpException("Le build d'id " . $id . " n'existe pas.");
        }

        $form = $this->get('form.factory')->create(BuildType::class, $build);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            // Inutile de persister ici, Doctrine connait déjà notre annonce
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'profil bien modifiée.');

            return $this->redirectToRoute('fc_platform_buildpage', array('id' => $id));
        }

        return $this->render('FCPlatformBundle:build:editbuild.html.twig', array(
            'form' => $form->createView(),
        ));
  }
    
    
    public function publicprofilAction($id){

        $em=$this->getDoctrine()->getManager();

        $user = $em->getRepository('FCUserBundle:User')->find($id);
        $builds=$em->getRepository('FCPlatformBundle:Build')->findBy(

            array('user'=>$id));
            return $this->render('FCPlatformBundle:build:publicprofil.html.twig',array(
            'user' => $user,
            'builds'=>$builds
));

}


    public function additemAction(Request $request)
    {

        $item = new Item();
        $form = $this->get('form.factory')->create(ItemType::class, $item);


        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'item bien enregistrée.');


            return $this->redirectToRoute('fc_platform_admin');
        }


        // À ce stade, le formulaire n'est pas valide car :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau
        return $this->render('FCPlatformBundle:build:additem.html.twig', array(
            'form' => $form->createView(),
        ));


    }

}