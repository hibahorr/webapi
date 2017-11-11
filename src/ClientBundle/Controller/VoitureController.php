<?php

namespace ClientBundle\Controller;

use ClientBundle\Entity\Voiture;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use \DateTime;

class VoitureController extends Controller
{

    public function ajouterAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $agences = $em->getRepository('ClientBundle:Agence')->findByManager($this->getUser());
        if($request->isMethod("post")){
            $voiture = new Voiture();
            $voiture->setMatricule($request->get('matricule'));
            $voiture->setMarque($request->get('marque'));
            $voiture->setCouleur($request->get('couleur'));
            $voiture->setCarburant($request->get('carburant'));

            $time = strtotime($request->get('age'));
            $newformat = date('Y-m-d',$time);
            $voiture->setAge(new DateTime($newformat));

            $voiture->setKilometrage($request->get('kilometrage'));
            $voiture->setPuissance($request->get('puissance'));
            $voiture->setUser($this->getUser());
            $voiture->setCarrousserie($request->get('carrousserie'));
            $voiture->setBoite($request->get('boite'));

            if($request->get('gps') != null) $voiture->setGps(true);
            if($request->get('climatisation') != null) $voiture->setClimatisation(true);
            if($request->get('airbag') != null) $voiture->setAirbag(true);
            if($request->get('frein_abs') != null) $voiture->setFreinAbs(true);
            if($request->get('alarme') != null) $voiture->setAlarme(true);

            $voiture->setNbrPorte($request->get('nbr_porte'));
            $voiture->setDescription($request->get('description'));
            $ag = $em->getRepository('ClientBundle:Agence')->find($request->get('agence'));
            $voiture->setAgence($ag);
            $voiture->setPrixLocation($request->get('prix'));

            $em->persist($voiture);
            $em->flush();

            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Voiture ajouté avec succée')
            ;

            return $this->redirectToRoute('manager_location_ajouter_voiture');
        }
        return $this->render('ClientBundle:Voiture:ajouter.html.twig',array('agences' => $agences));
    }

    public function afficherAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $voitures = $em->getRepository('ClientBundle:Voiture')->findByUser($this->getUser());
        return $this->render('ClientBundle:Voiture:afficher.html.twig',array('voitures'=>$voitures));
    }

    public function supprimerAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $voiture = $em->getRepository('ClientBundle:Voiture')->find($id);
        $em->remove($voiture);
        $em->flush();
        $request->getSession()
            ->getFlashBag()
            ->add('success', 'Voiture supprimer avec succée')
        ;
        return $this->redirectToRoute('manager_location_list_voiture');
    }

    public function modifierAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $agences = $em->getRepository('ClientBundle:Agence')->findByManager($this->getUser());
        $voiture = $em->getRepository('ClientBundle:Voiture')->find($id);
        if($request->isMethod("post")){
            $voiture->setMatricule($request->get('matricule'));
            $voiture->setMarque($request->get('marque'));
            $voiture->setCouleur($request->get('couleur'));
            $voiture->setCarburant($request->get('carburant'));

            $time = strtotime($request->get('age'));
            $newformat = date('Y-m-d',$time);
            $voiture->setAge(new DateTime($newformat));

            $voiture->setKilometrage($request->get('kilometrage'));
            $voiture->setPuissance($request->get('puissance'));
            $voiture->setUser($this->getUser());
            $voiture->setCarrousserie($request->get('carrousserie'));
            $voiture->setBoite($request->get('boite'));

            if($request->get('gps') != null) $voiture->setGps(true);
            if($request->get('climatisation') != null) $voiture->setClimatisation(true);
            if($request->get('airbag') != null) $voiture->setAirbag(true);
            if($request->get('frein_abs') != null) $voiture->setFreinAbs(true);
            if($request->get('alarme') != null) $voiture->setAlarme(true);

            $voiture->setNbrPorte($request->get('nbr_porte'));
            $voiture->setDescription($request->get('description'));
            $ag = $em->getRepository('ClientBundle:Agence')->find($request->get('agence'));
            $voiture->setAgence($ag);
            $voiture->setPrixLocation($request->get('prix'));

            $em->merge($voiture);
            $em->flush();

            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Voiture modifier avec succée')
            ;

            return $this->redirectToRoute('manager_location_list_voiture');
        }
        return $this->render('ClientBundle:Voiture:modifier.html.twig',array('agences' => $agences, 'voiture'=>$voiture));
    }
}
