<?php

namespace ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OffreLocation
 *
 * @ORM\Table(name="offre_location", indexes={@ORM\Index(name="id_voiture", columns={"id_voiture"}), @ORM\Index(name="id_chauffeur", columns={"id_chauffeur"})})
 * @ORM\Entity
 */
class OffreLocation
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom_offre", type="string", length=255, nullable=false)
     */
    private $nomOffre;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_offre", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="description_offre", type="text", length=65535, nullable=false)
     */
    private $descriptionOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="id_voiture", type="string", length=255, nullable=false)
     */
    private $idVoiture;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_chauffeur", type="integer", nullable=false)
     */
    private $idChauffeur;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="text", length=65535, nullable=false)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_offre", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOffre;


}

