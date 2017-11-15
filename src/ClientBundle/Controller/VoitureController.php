<?php

namespace ClientBundle\Controller;

use ClientBundle\Entity\Voiture;
use ClientBundle\Entity\PhotoVoiture;
use ClientBundle\Entity\Location;
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

            for ($i=1; $i <= $request->get('count_images'); $i++){
                if($request->files->get('photo_'.$i) != null){
                    $photoVoiture = new PhotoVoiture();
                    $filePh = $request->files->get('photo_'.$i);
                    $imgExtension = $request->files->get('photo_'.$i)->guessExtension();
                    $imgNameWithoutSpace = str_replace(' ', '', $voiture->getMatricule());
                    $imgName = $imgNameWithoutSpace . "_" . $i . "." . $imgExtension;
                    $filePh->move($this->getParameter('voitures_directory'), $imgName);
                    $photoVoiture->setImage("client/images/voitures/".$imgName);
                    $photoVoiture->setVoiture($voiture);
                    $em->persist($photoVoiture);
                    $em->flush();
                }
            }

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

            if($request->get('gps') != null){
                $voiture->setGps(true);
            }else{
                $voiture->setGps(false);
            }
            if($request->get('climatisation') != null){
                $voiture->setClimatisation(true);
            }else{
                $voiture->setClimatisation(false);
            }
            if($request->get('airbag') != null){
                $voiture->setAirbag(true);
            }else{
                $voiture->setAirbag(false);
            }
            if($request->get('frein_abs') != null){
                $voiture->setFreinAbs(true);
            }else{
                $voiture->setFreinAbs(false);
            }
            if($request->get('alarme') != null){
                $voiture->setAlarme(true);
            }else{
                $voiture->setAlarme(false);
            }

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


    public function listeDemandesLocationAction(Request $request)
    {
        if($request->isMethod("post")){
            $em = $this->getDoctrine()->getManager();
            $chauffeur =  $em->getRepository('ClientBundle:Chauffeur')->find($request->get('chauffeur'));
            $voiture =  $em->getRepository('ClientBundle:Voiture')->find($request->get('voiture'));
            $location = $em->getRepository('ClientBundle:Location')->findOneBy(
                array('client' => $request->get('client'),'agence' => $request->get('agence'),'voiture' => $request->get('voiture'))
            );
            $chauffeur->setVoiture($voiture);
            $location->setApprouved(true);
            $em->merge($chauffeur);
            $em->merge($location);
            $em->flush();
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Location approuvé avec succée')
            ;

            return $this->redirectToRoute('manager_location_demandes_location');
        }
        $allLocations = array();
        $allChauffeurs = array();
        $em = $this->getDoctrine()->getManager();
        $agencesManager = $em->getRepository('ClientBundle:Agence')->findByManager($this->getUser());
        foreach ($agencesManager as $one){
            $locations = $em->getRepository('ClientBundle:Location')->findByAgence($one);
            foreach ($locations as $oneLoc){
                array_push($allLocations, $oneLoc);
            }
            $chauffeurs = $em->getRepository('ClientBundle:Chauffeur')->findByAgence($one);
            foreach ($chauffeurs as $oneCh){
                array_push($allChauffeurs, $oneCh);
            }
        }


        return $this->render('ClientBundle:Voiture:liste_demandes_location.html.twig', array('locations'=>$allLocations,'chauffeurs'=>$allChauffeurs));
    }

    public function demandesLocationRefuserAction($idClient,$idAgence,$idVoiture, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('ClientBundle:User')->find($idClient);
        $agence = $em->getRepository('ClientBundle:Agence')->find($idAgence);
        $voiture = $em->getRepository('ClientBundle:Voiture')->find($idVoiture);
        $location = $em->getRepository('ClientBundle:Location')->findOneBy(
            array('client' => $idClient,'agence' => $idAgence,'voiture' => $idVoiture)
        );

        $em->remove($location);
        $em->flush();
        $this->sendMailRefuserLocation($location->getClient()->getEmail(), $location->getClient()->getNom());
        $request->getSession()
            ->getFlashBag()
            ->add('success', 'Location supprimé avec succée')
        ;
        return $this->redirectToRoute('manager_location_demandes_location');
    }

    public function demandesLocationAccepterAction($idClient,$idAgence,$idVoiture, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $location = $em->getRepository('ClientBundle:Location')->findOneBy(
            array('client' => $idClient,'agence' => $idAgence,'voiture' => $idVoiture)
        );
        if($location->getChauffeur()){
            return var_dump("withh");
        }else{
            $location->setApprouved(true);
            $em->merge($location);
            $em->flush();
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Location approuvé avec succée')
            ;
            return $this->redirectToRoute('manager_location_demandes_location');
        }
    }





    public function sendMailRefuserLocation($email, $name)
    {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('karhabty.info@gmail.com')
            ->setTo($email)
            ->setBody(
                $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                    'Emails/refuser_location.html.twig',
                    array('name' => $name)
                ),
                'text/html'
            )
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'Emails/registration.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;

        $this->get('mailer')->send($message);

        // or, you can also fetch the mailer service this way
        // $this->get('mailer')->send($message);

        return $this->render('Emails/refuser_location.html.twig',array('name'=>$name));
    }
}
