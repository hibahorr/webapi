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
}
