<?php

namespace ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historiques
 *
 * @ORM\Table(name="historiques", indexes={@ORM\Index(name="matricule", columns={"matricule"})})
 * @ORM\Entity
 */
class Historiques
{
    /**
     * @var integer
     *
     * @ORM\Column(name="matricule", type="integer", nullable=false)
     */
    private $matricule;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_service", type="string", length=50, nullable=false)
     */
    private $nomService;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_service", type="date", nullable=false)
     */
    private $dateService;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_historique", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idHistorique;


}

