<?php

namespace ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PhotoVoiture
 *
 * @ORM\Table(name="photo_voiture", indexes={@ORM\Index(name="id_voiture", columns={"id_voiture"})})
 * @ORM\Entity
 */
class PhotoVoiture
{
    /**
     * @var string
     *
     * @ORM\Column(name="id_voiture", type="string", length=11, nullable=false)
     */
    private $idVoiture;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="text", length=65535, nullable=false)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_photo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPhoto;


}

