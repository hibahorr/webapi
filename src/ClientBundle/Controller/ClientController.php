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

        if($request->isMethod("post")){
            $marque = $request->get('search_marque');
            $carburant = $request->get('search_carburant');
            $carrousserie = $request->get('search_carrousserie');
            $nbrPorte = $request->get('search_nbr_porte');

            $minPrix = $request->get('search_min_prix');
            $maxPrix = $request->get('search_max_prix');

            if($request->get('search_gps') != null){
                $gps = 1;
            }else{
                $gps = null;
            }
            if($request->get('search_alarme') != null){
                $alarme = 1;
            }else{
                $alarme = null;
            }
            if($request->get('search_climatisation') != null){
                $climatisation = 1;
            }else{
                $climatisation = null;
            }
            if($request->get('search_frein_abs') != null){
                $freinAbs = 1;
            }else{
                $freinAbs = null;
            }
            if($request->get('search_airbag') != null){
                $airbag = 1;
            }else{
                $airbag = null;
            }


            $repository = $this->getDoctrine()
                ->getRepository(Voiture::class);
            $query = $repository->createQueryBuilder('p')
                ->where('p.marque LIKE  :marque')
                ->andwhere('p.carburant LIKE :carburant')
                ->andwhere('p.carrousserie LIKE :carrousserie')
                ->andwhere('p.nbrPorte LIKE :nbrPorte')
                ->andwhere('p.gps LIKE :gps')
                ->andwhere('p.alarme LIKE :alarme')
                ->andwhere('p.climatisation LIKE :climatisation')
                ->andwhere('p.freinAbs LIKE :freinAbs')
                ->andwhere('p.airbag LIKE :airbag')
                ->andwhere('p.prixLocation >= :minPrix')
                ->andwhere('p.prixLocation <= :maxPrix')

                ->setParameter('marque', '%'.$marque.'%')
                ->setParameter('carburant', '%'.$carburant.'%')
                ->setParameter('carrousserie', '%'.$carrousserie.'%')
                ->setParameter('nbrPorte', '%'.$nbrPorte.'%')
                ->setParameter('gps', '%'.$gps.'%')
                ->setParameter('alarme', '%'.$alarme.'%')
                ->setParameter('climatisation', '%'.$climatisation.'%')
                ->setParameter('freinAbs', '%'.$freinAbs.'%')
                ->setParameter('airbag', '%'.$airbag.'%')
                ->setParameter('minPrix', $minPrix)
                ->setParameter('maxPrix', $maxPrix)

                ->getQuery();
            $resultVoitures = $query->getResult();
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $resultVoitures, /* query NOT result */
                $request->query->getInt('page', 1)/*page number*/,
                4/*limit per page*/
            );
            return $this->render('ClientBundle:Client:liste_voitures_location.html.twig',array('voitures'=>$resultVoitures, 'pagination' => $pagination));
        }

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $voitures, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            4/*limit per page*/
        );

        return $this->render('ClientBundle:Client:liste_voitures_location.html.twig',array('voitures'=>$voitures, 'pagination' => $pagination));
    }

    public function reserverVoituresLocationAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $voiture = $em->getRepository('ClientBundle:Voiture')->find($id);
        if($request->isMethod("post")){
            $location = new Location();
            $location->setAgence($voiture->getAgence());
            $location->setClient($this->getUser());
            $location->setVoiture($voiture);
            $location->setPrixLocation($voiture->getPrixLocation());

            $time = strtotime($request->get('date_debut'));
            $newformat = date('Y-m-d',$time);
            $location->setDateDebut(new DateTime($newformat));

            $time = strtotime($request->get('date_fin'));
            $newformat = date('Y-m-d',$time);
            $location->setDateFin(new DateTime($newformat));

            if($request->get('avec_chauffeur') != null) $location->setChauffeur(true);

            try{
                $em->persist($location);
                $em->flush();
            }catch(\Exception $e){
                $request->getSession()
                    ->getFlashBag()
                    ->add('error', 'Vous avey deja fait une reservation de cette voiture')
                ;
                return $this->redirectToRoute('client_location_liste_voiture');
            }

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
