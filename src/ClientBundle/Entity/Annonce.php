<?php

namespace ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce", indexes={@ORM\Index(name="identifiant_client", columns={"identifiant_client"}), @ORM\Index(name="matricule", columns={"matricule"})})
 * @ORM\Entity
 */
class Annonce
{
    /**
     * @var float
     *
     * @ORM\Column(name="prix_annonce", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixAnnonce;

    /**
     * @var integer
     *
     * @ORM\Column(name="identifiant_client", type="integer", nullable=false)
     */
    private $identifiantClient;

    /**
     * @var integer
     *
     * @ORM\Column(name="matricule", type="integer", nullable=false)
     */
    private $matricule;

    /**
     * @var string
     *
     * @ORM\Column(name="description_annonce", type="text", length=65535, nullable=false)
     */
    private $descriptionAnnonce;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_annonce", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAnnonce;


}

