<?php

namespace ClientBundle\Controller;

use ClientBundle\Entity\Chauffeur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ChauffeurController extends Controller
{
    public function ajouterAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $agences = $em->getRepository('ClientBundle:Agence')->findByManager($this->getUser());
        if($request->isMethod("post")){
            $chauffeur = new Chauffeur();
            $chauffeur->setNomChauffeur($request->get('nom'));
            $chauffeur->setAgeChauffeur($request->get('age'));
            $chauffeur->setPrixChauffeur($request->get('prix'));
            $ag = $em->getRepository('ClientBundle:Agence')->find($request->get('agence'));
            $chauffeur->setAgence($ag);
            $chauffeur->setVoiture(null);

            $filePh = $request->files->get('image');
            $imgExtension = $request->files->get('image')->guessExtension();
            $imgNameWithoutSpace = str_replace(' ', '', $request->request->get('nom'));
            $imgName = $imgNameWithoutSpace . "." . $imgExtension;
            $filePh->move($this->getParameter('chauffeurs_directory'), $imgName);
            $chauffeur->setImage("client/images/chauffeurs/".$imgName);

            $em->persist($chauffeur);
            $em->flush();
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Chauffeur ajouté avec succée')
            ;
            return $this->redirectToRoute('manager_location_ajouter_chauffeur');
        }
        return $this->render('ClientBundle:Chauffeur:ajouter.html.twig',array('agences'=>$agences));
    }

    public function afficherAction(Request $request)
    {
        $allChauffeurs = array();
        $em = $this->getDoctrine()->getManager();
        $agences = $em->getRepository('ClientBundle:Agence')->findByManager($this->getUser());
        foreach ($agences as $oneAg){
            $chauffeurs = $em->getRepository('ClientBundle:Chauffeur')->findByAgence($oneAg->getIdAgence());
            foreach ($chauffeurs as $oneCh){
                array_push($allChauffeurs,$oneCh);
            }
        }

        return $this->render('ClientBundle:Chauffeur:afficher.html.twig',array('chauffeurs'=>$allChauffeurs));
    }

    public function supprimerAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $chauffeur = $em->getRepository('ClientBundle:Chauffeur')->find($id);
        $em->remove($chauffeur);
        $em->flush();
        $request->getSession()
            ->getFlashBag()
            ->add('success', 'Chauffeur supprimer avec succée')
        ;
        return $this->redirectToRoute('manager_location_afficher_chauffeur');
    }

    public function modifierAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $agences = $em->getRepository('ClientBundle:Agence')->findByManager($this->getUser());
        $chauffeur = $em->getRepository('ClientBundle:Chauffeur')->find($id);
        if($request->isMethod("post")){
            $chauffeur->setNomChauffeur($request->get('nom'));
            $chauffeur->setAgeChauffeur($request->get('age'));
            $chauffeur->setPrixChauffeur($request->get('prix'));
            $ag = $em->getRepository('ClientBundle:Agence')->find($request->get('agence'));
            $chauffeur->setAgence($ag);
            $chauffeur->setVoiture(null);

            if($request->files->get('image') != null){
                $filePh = $request->files->get('image');
                $imgExtension = $request->files->get('image')->guessExtension();
                $imgNameWithoutSpace = str_replace(' ', '', $request->request->get('nom'));
                $imgName = $imgNameWithoutSpace . "." . $imgExtension;
                $filePh->move($this->getParameter('chauffeurs_directory'), $imgName);
                $chauffeur->setImage("client/images/chauffeurs/".$imgName);
            }


            $em->merge($chauffeur);
            $em->flush();
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Chauffeur modifié avec succée')
            ;
            return $this->redirectToRoute('manager_location_afficher_chauffeur');
        }
        return $this->render('ClientBundle:Chauffeur:modifier.html.twig',array('agences'=>$agences, 'chauf'=>$chauffeur));
    }
}
