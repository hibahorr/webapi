<?php

namespace ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agence
 *
 * @ORM\Table(name="agence", indexes={@ORM\Index(name="id_manager", columns={"id_manager"})})
 * @ORM\Entity
 */
class Agence
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom_agence", type="string", length=30, nullable=false)
     */
    private $nomAgence;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone_agence", type="integer", nullable=false)
     */
    private $telephoneAgence;

    /**
     * @var string
     *
     * @ORM\Column(name="type_agence", type="string", length=20, nullable=false)
     */
    private $typeAgence;

    /**
     * @var string
     *
     * @ORM\Column(name="horaire_travail", type="string", length=20, nullable=false)
     */
    private $horaireTravail;

    /**
     * @var string
     *
     * @ORM\Column(name="photo_agence", type="text", length=65535, nullable=false)
     */
    private $photoAgence;

    /**
     * @var \ClientBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="ClientBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_manager", referencedColumnName="id")
     * })
     */
    private $manager;

    /**
     * @var string
     *
     * @ORM\Column(name="piece_justificatif", type="text", length=65535, nullable=false)
     */
    private $pieceJustificatif;

    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=200, nullable=true)
     */
    private $rue;

    /**
     * @var integer
     *
     * @ORM\Column(name="code_postal", type="integer", nullable=true)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=200, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="statu", type="string", length=200, nullable=true)
     */
    private $statu;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $longitude;

    /**
     * @var boolean
     *
     * @ORM\Column(name="approuved", type="boolean", nullable=false)
     */
    private $approuved = false;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_agence", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAgence;



    /**
     * Set nomAgence
     *
     * @param string $nomAgence
     *
     * @return Agence
     */
    public function setNomAgence($nomAgence)
    {
        $this->nomAgence = $nomAgence;

        return $this;
    }

    /**
     * Get nomAgence
     *
     * @return string
     */
    public function getNomAgence()
    {
        return $this->nomAgence;
    }

    /**
     * Set telephoneAgence
     *
     * @param integer $telephoneAgence
     *
     * @return Agence
     */
    public function setTelephoneAgence($telephoneAgence)
    {
        $this->telephoneAgence = $telephoneAgence;

        return $this;
    }

    /**
     * Get telephoneAgence
     *
     * @return integer
     */
    public function getTelephoneAgence()
    {
        return $this->telephoneAgence;
    }

    /**
     * Set typeAgence
     *
     * @param string $typeAgence
     *
     * @return Agence
     */
    public function setTypeAgence($typeAgence)
    {
        $this->typeAgence = $typeAgence;

        return $this;
    }

    /**
     * Get typeAgence
     *
     * @return string
     */
    public function getTypeAgence()
    {
        return $this->typeAgence;
    }

    /**
     * Set horaireTravail
     *
     * @param string $horaireTravail
     *
     * @return Agence
     */
    public function setHoraireTravail($horaireTravail)
    {
        $this->horaireTravail = $horaireTravail;

        return $this;
    }

    /**
     * Get horaireTravail
     *
     * @return string
     */
    public function getHoraireTravail()
    {
        return $this->horaireTravail;
    }

    /**
     * Set photoAgence
     *
     * @param string $photoAgence
     *
     * @return Agence
     */
    public function setPhotoAgence($photoAgence)
    {
        $this->photoAgence = $photoAgence;

        return $this;
    }

    /**
     * Get photoAgence
     *
     * @return string
     */
    public function getPhotoAgence()
    {
        return $this->photoAgence;
    }

    /**
     * Set pieceJustificatif
     *
     * @param string $pieceJustificatif
     *
     * @return Agence
     */
    public function setPieceJustificatif($pieceJustificatif)
    {
        $this->pieceJustificatif = $pieceJustificatif;

        return $this;
    }

    /**
     * Get pieceJustificatif
     *
     * @return string
     */
    public function getPieceJustificatif()
    {
        return $this->pieceJustificatif;
    }

    /**
     * Set rue
     *
     * @param string $rue
     *
     * @return Agence
     */
    public function setRue($rue)
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * Get rue
     *
     * @return string
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     *
     * @return Agence
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return integer
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Agence
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set statu
     *
     * @param string $statu
     *
     * @return Agence
     */
    public function setStatu($statu)
    {
        $this->statu = $statu;

        return $this;
    }

    /**
     * Get statu
     *
     * @return string
     */
    public function getStatu()
    {
        return $this->statu;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Agence
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Agence
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set approuved
     *
     * @param boolean $approuved
     *
     * @return Agence
     */
    public function setApprouved($approuved)
    {
        $this->approuved = $approuved;

        return $this;
    }

    /**
     * Get approuved
     *
     * @return boolean
     */
    public function getApprouved()
    {
        return $this->approuved;
    }

    /**
     * Get idAgence
     *
     * @return integer
     */
    public function getIdAgence()
    {
        return $this->idAgence;
    }

    /**
     * Set manager
     *
     * @param \ClientBundle\Entity\User $manager
     *
     * @return Agence
     */
    public function setManager(\ClientBundle\Entity\User $manager = null)
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * Get manager
     *
     * @return \ClientBundle\Entity\User
     */
    public function getManager()
    {
        return $this->manager;
    }
}
