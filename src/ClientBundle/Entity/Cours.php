<?php

namespace ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity
 */
class Cours
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horaire_cours", type="time", nullable=false)
     */
    private $horaireCours;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_cours", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixCours;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_client", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idClient;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_agence", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idAgence;


}

