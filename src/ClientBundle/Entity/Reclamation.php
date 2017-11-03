<?php

namespace ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation", indexes={@ORM\Index(name="id_client", columns={"id_client"})})
 * @ORM\Entity
 */
class Reclamation
{
    /**
     * @var string
     *
     * @ORM\Column(name="sujet_reclamation", type="string", length=20, nullable=false)
     */
    private $sujetReclamation;

    /**
     * @var string
     *
     * @ORM\Column(name="description_reclamation", type="text", length=65535, nullable=false)
     */
    private $descriptionReclamation;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_client", type="integer", nullable=false)
     */
    private $idClient;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_reclamation", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReclamation;


}

