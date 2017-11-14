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
     * @var \ClientBundle\Entity\Voiture
     *
     * @ORM\ManyToOne(targetEntity="ClientBundle\Entity\Voiture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_voiture", referencedColumnName="matricule", nullable=false)
     * })
     */
    private $voiture;

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



    /**
     * Set image
     *
     * @param string $image
     *
     * @return PhotoVoiture
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get idPhoto
     *
     * @return integer
     */
    public function getIdPhoto()
    {
        return $this->idPhoto;
    }

    /**
     * Set voiture
     *
     * @param \ClientBundle\Entity\Voiture $voiture
     *
     * @return PhotoVoiture
     */
    public function setVoiture(\ClientBundle\Entity\Voiture $voiture)
    {
        $this->voiture = $voiture;

        return $this;
    }

    /**
     * Get voiture
     *
     * @return \ClientBundle\Entity\Voiture
     */
    public function getVoiture()
    {
        return $this->voiture;
    }
}
