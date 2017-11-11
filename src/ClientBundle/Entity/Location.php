<?php

namespace ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table(name="location", indexes={@ORM\Index(name="id_agence", columns={"id_agence"}), @ORM\Index(name="matricule", columns={"matricule"})})
 * @ORM\Entity
 */
class Location
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date", nullable=false)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date", nullable=false)
     */
    private $dateFin;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_location", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixLocation;

    /**
     * @var boolean
     *
     * @ORM\Column(name="chauffeur", type="boolean", nullable=true)
     */
    private $chauffeur;

    /**
     * @var boolean
     *
     * @ORM\Column(name="approuved", type="boolean", nullable=false)
     */
    private $approuved = false;

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

    /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=30)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $matricule;



    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Location
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Location
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set prixLocation
     *
     * @param float $prixLocation
     *
     * @return Location
     */
    public function setPrixLocation($prixLocation)
    {
        $this->prixLocation = $prixLocation;

        return $this;
    }

    /**
     * Get prixLocation
     *
     * @return float
     */
    public function getPrixLocation()
    {
        return $this->prixLocation;
    }

    /**
     * Set chauffeur
     *
     * @param boolean $chauffeur
     *
     * @return Location
     */
    public function setChauffeur($chauffeur)
    {
        $this->chauffeur = $chauffeur;

        return $this;
    }

    /**
     * Get chauffeur
     *
     * @return boolean
     */
    public function getChauffeur()
    {
        return $this->chauffeur;
    }

    /**
     * Set approuved
     *
     * @param boolean $approuved
     *
     * @return Location
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
     * Set idClient
     *
     * @param integer $idClient
     *
     * @return Location
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * Get idClient
     *
     * @return integer
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * Set idAgence
     *
     * @param integer $idAgence
     *
     * @return Location
     */
    public function setIdAgence($idAgence)
    {
        $this->idAgence = $idAgence;

        return $this;
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
     * Set matricule
     *
     * @param string $matricule
     *
     * @return Location
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string
     */
    public function getMatricule()
    {
        return $this->matricule;
    }
}
