<?php

namespace ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Services
 *
 * @ORM\Table(name="services", indexes={@ORM\Index(name="id_client", columns={"id_client"}), @ORM\Index(name="matricule_voiture", columns={"matricule_voiture"})})
 * @ORM\Entity
 */
class Services
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom_service", type="string", length=20, nullable=false)
     */
    private $nomService;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_service", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixService;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_client", type="integer", nullable=false)
     */
    private $idClient;

    /**
     * @var integer
     *
     * @ORM\Column(name="matricule_voiture", type="integer", nullable=false)
     */
    private $matriculeVoiture;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_service", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idService;


}

