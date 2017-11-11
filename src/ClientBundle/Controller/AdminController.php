<?php

namespace ClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    public function afficherDemandesAgencesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $agences = $em->getRepository('ClientBundle:Agence')->findByApprouved(false);
        return $this->render('ClientBundle:Admin:liste_demandes_agences.html.twig',array('agences'=>$agences));
    }

    public function SupprimerDemandesAgencesAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $agence = $em->getRepository('ClientBundle:Agence')->find($id);
        $em->remove($agence);
        $em->flush();
        $request->getSession()
            ->getFlashBag()
            ->add('success', 'Demande agence supprimé avec succée')
        ;
        return $this->redirectToRoute('admin_afficher_demandes_agences');
    }

    public function approuverDemandesAgencesAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $agence = $em->getRepository('ClientBundle:Agence')->find($id);
        $manager = $em->getRepository('ClientBundle:User')->find($agence->getManager()->getId());
        $agence->setApprouved(true);
        $manager->setEnabled(true);
        $manager->setApprouved(true);
        $em->merge($agence);
        $em->merge($manager);
        $em->flush();
        $request->getSession()
            ->getFlashBag()
            ->add('success', 'Demande agence approuvé avec succée')
        ;
        return $this->redirectToRoute('admin_afficher_demandes_agences');


    }
}
