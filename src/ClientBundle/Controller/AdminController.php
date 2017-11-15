<?php

namespace ClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{

    public function indexAction(Request $request)
    {
        return $this->render('ClientBundle:Admin:index.html.twig');
    }

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
        $manager = $em->getRepository('ClientBundle:User')->find($agence->getManager()->getId());
        $em->remove($agence);
        if(!$manager->isEnabled()) $em->remove($manager);
        $this->sendMailDesapprouve($manager->getEmail(), $manager->getNom());
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
        $this->sendMailApprouve($manager->getEmail(), $manager->getNom());
        $em->flush();
        $request->getSession()
            ->getFlashBag()
            ->add('success', 'Demande agence approuvé avec succée')
        ;
        return $this->redirectToRoute('admin_afficher_demandes_agences');


    }

    public function afficherToutesAgencesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $agences = $em->getRepository('ClientBundle:Agence')->findByApprouved(true);
        //var_dump($agences);
        return $this->render('ClientBundle:Admin:liste_agences.html.twig', array('agences'=>$agences));
    }

    public function SupprimerAgenceAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $agence = $em->getRepository('ClientBundle:Agence')->find($id);
        $em->remove($agence);
        $em->flush();
        $request->getSession()
            ->getFlashBag()
            ->add('success', 'Agence supprimé avec succée')
        ;
        return $this->redirectToRoute('admin_agences_afficher');
    }


















    public function sendMailApprouve($email, $name)
    {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('karhabty.info@gmail.com')
            ->setTo($email)
            ->setBody(
                $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                    'Emails/approuver_agence.html.twig',
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

        return $this->render('Emails/approuver_agence.html.twig',array('name'=>$name));
    }

    public function sendMailDesapprouve($email, $name)
    {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('karhabty.info@gmail.com')
            ->setTo($email)
            ->setBody(
                $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                    'Emails/desapprouver_agence.html.twig',
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

        return $this->render('Emails/approuver_agence.html.twig',array('name'=>$name));
    }
}
