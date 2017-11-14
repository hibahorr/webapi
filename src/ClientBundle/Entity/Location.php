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
    private $chauffeur = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="approuved", type="boolean", nullable=false)
     */
    private $approuved = false;


    /**
     * @var \ClientBundle\Entity\User
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="ClientBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_client", referencedColumnName="id")
     * })
     */
    private $client;

    /**
     * @var \ClientBundle\Entity\Agence
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="ClientBundle\Entity\Agence")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_agence", referencedColumnName="id_agence")
     * })
     */
    private $agence;
    
    /**
     * @var \ClientBundle\Entity\Voiture
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="ClientBundle\Entity\Voiture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="matricule", referencedColumnName="matricule")
     * })
     */
    private $voiture;



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

    /**
     * Set client
     *
     * @param \ClientBundle\Entity\User $client
     *
     * @return Location
     */
    public function setClient(\ClientBundle\Entity\User $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \ClientBundle\Entity\User
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set agence
     *
     * @param \ClientBundle\Entity\Agence $agence
     *
     * @return Location
     */
    public function setAgence(\ClientBundle\Entity\Agence $agence)
    {
        $this->agence = $agence;

        return $this;
    }

    /**
     * Get agence
     *
     * @return \ClientBundle\Entity\Agence
     */
    public function getAgence()
    {
        return $this->agence;
    }

    /**
     * Set voiture
     *
     * @param \ClientBundle\Entity\Voiture $voiture
     *
     * @return Location
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
