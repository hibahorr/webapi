<?php

namespace ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chauffeur
 *
 * @ORM\Table(name="chauffeur", indexes={@ORM\Index(name="id_voiture", columns={"id_voiture"})})
 * @ORM\Entity
 */
class Chauffeur
{
    /**
     * @var string
     *
     * @ORM\Column(name="id_voiture", type="string", length=11, nullable=true)
     */
    private $idVoiture;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_chauffeur", type="string", length=50, nullable=false)
     */
    private $nomChauffeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="age_chauffeur", type="integer", nullable=false)
     */
    private $ageChauffeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_agence", type="integer", nullable=false)
     */
    private $idAgence;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_chauffeur", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixChauffeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_chauffeur", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idChauffeur;


}

