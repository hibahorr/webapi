<?php

namespace ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Voiture
 *
 * @ORM\Table(name="voiture", indexes={@ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_agence", columns={"id_agence"})})
 * @ORM\Entity
 */
class Voiture
{
    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=50, nullable=false)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=50, nullable=false)
     */
    private $couleur;

    /**
     * @var string
     *
     * @ORM\Column(name="carburant", type="string", length=20, nullable=false)
     */
    private $carburant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="age", type="date", nullable=false)
     */
    private $age;

    /**
     * @var float
     *
     * @ORM\Column(name="kilometrage", type="float", precision=10, scale=0, nullable=false)
     */
    private $kilometrage;

    /**
     * @var integer
     *
     * @ORM\Column(name="puissance", type="integer", nullable=false)
     */
    private $puissance;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_moniteur", type="string", length=50, nullable=true)
     */
    private $nomMoniteur;

    /**
     * @var boolean
     *
     * @ORM\Column(name="disponible", type="boolean", nullable=true)
     */
    private $disponible;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="carrousserie", type="string", length=20, nullable=false)
     */
    private $carrousserie;

    /**
     * @var string
     *
     * @ORM\Column(name="boite", type="string", length=20, nullable=false)
     */
    private $boite;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gps", type="boolean", nullable=true)
     */
    private $gps;

    /**
     * @var boolean
     *
     * @ORM\Column(name="climatisation", type="boolean", nullable=true)
     */
    private $climatisation;

    /**
     * @var boolean
     *
     * @ORM\Column(name="airbag", type="boolean", nullable=true)
     */
    private $airbag;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_porte", type="integer", nullable=false)
     */
    private $nbrPorte;

    /**
     * @var boolean
     *
     * @ORM\Column(name="frein_abs", type="boolean", nullable=true)
     */
    private $freinAbs;

    /**
     * @var boolean
     *
     * @ORM\Column(name="alarme", type="boolean", nullable=true)
     */
    private $alarme;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_agence", type="integer", nullable=true)
     */
    private $idAgence;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_location", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixLocation;

    /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=50)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $matricule;


}

