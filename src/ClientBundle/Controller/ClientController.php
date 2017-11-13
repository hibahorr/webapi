<?php

namespace ClientBundle\Controller;

use ClientBundle\Entity\Location;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ClientBundle\Entity\Voiture;
use DateTime;

class ClientController extends Controller
{
    public function listeVoituresLocationAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $voitures = $em->getRepository('ClientBundle:Voiture')->findAll();
        return $this->render('ClientBundle:Client:liste_voitures_location.html.twig',array('voitures'=>$voitures));
    }

    public function reserverVoituresLocationAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $voiture = $em->getRepository('ClientBundle:Voiture')->find($id);
        if($request->isMethod("post")){
            $location = new Location();
            $location->setIdAgence($voiture->getAgence()->getIdAgence());
            $location->setIdClient($this->getUser()->getId());
            $location->setMatricule($voiture->getMatricule());
            $location->setPrixLocation($voiture->getPrixLocation());

            $time = strtotime($request->get('date_debut'));
            $newformat = date('Y-m-d',$time);
            $location->setDateDebut(new DateTime($newformat));

            $time = strtotime($request->get('date_fin'));
            $newformat = date('Y-m-d',$time);
            $location->setDateFin(new DateTime($newformat));

            $em->persist($location);
            $em->flush();

            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Demande de reservation envoyé')
            ;

            return $this->redirectToRoute('client_location_liste_voiture');
        }
        return $this->render('ClientBundle:Client:reserver_voiture_location.html.twig',array('voiture'=>$voiture));
    }

    public function profileAction(Request $request)
    {
        return $this->render('ClientBundle:Client:profile.html.twig');
    }

    public function changerPhotoProfileAction(Request $request)
    {
        if($request->isMethod("post")){

            $filePh = $request->files->get('photo_profile');
            $imgExtension = $request->files->get('photo_profile')->guessExtension();
            $imgNameWithoutSpace = str_replace(' ', '', $this->getUser()->getId());
            $imgName = $imgNameWithoutSpace . "." . $imgExtension;
            $filePh->move($this->getParameter('profiles_directory'), $imgName);

            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('ClientBundle:User')->find($this->getUser()->getId());
            $user->setImage("client/images/profiles/".$imgName);
            $em->merge($user);
            $em->flush();

            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Photo modifié avec succée')
            ;
            return $this->redirectToRoute('client_profile');
        }
        $request->getSession()
            ->getFlashBag()
            ->add('error', 'Erreur')
        ;
        return $this->redirectToRoute('client_profile');
    }

    public function changerInfosProfileAction(Request $request)
    {
        if($request->isMethod("post")){
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('ClientBundle:User')->find($this->getUser()->getId());
            $user->setNom($request->get('nom'));
            $user->setPrenom($request->get('prenom'));

            $time = strtotime($request->get('date_naissance'));
            $newformat = date('Y-m-d',$time);
            $user->setDateNaissance(new DateTime($newformat));

            $user->setTelephone($request->get('tel'));
            $user->setEmail($request->get('email'));
            $user->setMail($request->get('email'));
            $user->setAdresse($request->get('adr'));
            $em->persist($user);
            $em->flush();

            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Informations modifié avec succée')
            ;
            return $this->redirectToRoute('client_profile');
        }
        $request->getSession()
            ->getFlashBag()
            ->add('error', 'Erreur')
        ;
        return $this->redirectToRoute('client_profile');
    }

    public function detailsVoituresLocationAction($id,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $voiture = $em->getRepository('ClientBundle:Voiture')->find($id);
        return $this->render('ClientBundle:Client:details_voiture_location.html.twig',array('voiture'=>$voiture));
    }
}
