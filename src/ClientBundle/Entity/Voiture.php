<?php

namespace ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Voiture
 *
 * @ORM\Table(name="voiture", indexes={@ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_agence", columns={"id_agence"})})
 * @ORM\Entity
 */
class Voiture
{
    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=50, nullable=false)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=50, nullable=false)
     */
    private $couleur;

    /**
     * @var string
     *
     * @ORM\Column(name="carburant", type="string", length=20, nullable=false)
     */
    private $carburant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="age", type="date", nullable=false)
     */
    private $age;

    /**
     * @var float
     *
     * @ORM\Column(name="kilometrage", type="float", precision=10, scale=0, nullable=false)
     */
    private $kilometrage;

    /**
     * @var integer
     *
     * @ORM\Column(name="puissance", type="integer", nullable=false)
     */
    private $puissance;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_moniteur", type="string", length=50, nullable=true)
     */
    private $nomMoniteur;

    /**
     * @var boolean
     *
     * @ORM\Column(name="disponible", type="boolean", nullable=true)
     */
    private $disponible = true;

    /**
     * @var \ClientBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="ClientBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="carrousserie", type="string", length=20, nullable=false)
     */
    private $carrousserie;

    /**
     * @var string
     *
     * @ORM\Column(name="boite", type="string", length=20, nullable=false)
     */
    private $boite;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gps", type="boolean", nullable=true)
     */
    private $gps = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="climatisation", type="boolean", nullable=true)
     */
    private $climatisation = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="airbag", type="boolean", nullable=true)
     */
    private $airbag = false;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_porte", type="integer", nullable=false)
     */
    private $nbrPorte;

    /**
     * @var boolean
     *
     * @ORM\Column(name="frein_abs", type="boolean", nullable=true)
     */
    private $freinAbs = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="alarme", type="boolean", nullable=true)
     */
    private $alarme = false;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;


    /**
     * @var \ClientBundle\Entity\Agence
     *
     * @ORM\ManyToOne(targetEntity="ClientBundle\Entity\Agence")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_agence", referencedColumnName="id_agence")
     * })
     */
    private $agence;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_location", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixLocation;

    /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=50)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $matricule;

    /**
     * @ORM\OneToMany(targetEntity="PhotoVoiture", mappedBy="Voiture")
     */
    private $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    



    /**
     * Set marque
     *
     * @param string $marque
     *
     * @return Voiture
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     *
     * @return Voiture
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set carburant
     *
     * @param string $carburant
     *
     * @return Voiture
     */
    public function setCarburant($carburant)
    {
        $this->carburant = $carburant;

        return $this;
    }

    /**
     * Get carburant
     *
     * @return string
     */
    public function getCarburant()
    {
        return $this->carburant;
    }

    /**
     * Set age
     *
     * @param \DateTime $age
     *
     * @return Voiture
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return \DateTime
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set kilometrage
     *
     * @param float $kilometrage
     *
     * @return Voiture
     */
    public function setKilometrage($kilometrage)
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    /**
     * Get kilometrage
     *
     * @return float
     */
    public function getKilometrage()
    {
        return $this->kilometrage;
    }

    /**
     * Set puissance
     *
     * @param integer $puissance
     *
     * @return Voiture
     */
    public function setPuissance($puissance)
    {
        $this->puissance = $puissance;

        return $this;
    }

    /**
     * Get puissance
     *
     * @return integer
     */
    public function getPuissance()
    {
        return $this->puissance;
    }

    /**
     * Set nomMoniteur
     *
     * @param string $nomMoniteur
     *
     * @return Voiture
     */
    public function setNomMoniteur($nomMoniteur)
    {
        $this->nomMoniteur = $nomMoniteur;

        return $this;
    }

    /**
     * Get nomMoniteur
     *
     * @return string
     */
    public function getNomMoniteur()
    {
        return $this->nomMoniteur;
    }

    /**
     * Set disponible
     *
     * @param boolean $disponible
     *
     * @return Voiture
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;

        return $this;
    }

    /**
     * Get disponible
     *
     * @return boolean
     */
    public function getDisponible()
    {
        return $this->disponible;
    }

    /**
     * Set carrousserie
     *
     * @param string $carrousserie
     *
     * @return Voiture
     */
    public function setCarrousserie($carrousserie)
    {
        $this->carrousserie = $carrousserie;

        return $this;
    }

    /**
     * Get carrousserie
     *
     * @return string
     */
    public function getCarrousserie()
    {
        return $this->carrousserie;
    }

    /**
     * Set boite
     *
     * @param string $boite
     *
     * @return Voiture
     */
    public function setBoite($boite)
    {
        $this->boite = $boite;

        return $this;
    }

    /**
     * Get boite
     *
     * @return string
     */
    public function getBoite()
    {
        return $this->boite;
    }

    /**
     * Set gps
     *
     * @param boolean $gps
     *
     * @return Voiture
     */
    public function setGps($gps)
    {
        $this->gps = $gps;

        return $this;
    }

    /**
     * Get gps
     *
     * @return boolean
     */
    public function getGps()
    {
        return $this->gps;
    }

    /**
     * Set climatisation
     *
     * @param boolean $climatisation
     *
     * @return Voiture
     */
    public function setClimatisation($climatisation)
    {
        $this->climatisation = $climatisation;

        return $this;
    }

    /**
     * Get climatisation
     *
     * @return boolean
     */
    public function getClimatisation()
    {
        return $this->climatisation;
    }

    /**
     * Set airbag
     *
     * @param boolean $airbag
     *
     * @return Voiture
     */
    public function setAirbag($airbag)
    {
        $this->airbag = $airbag;

        return $this;
    }

    /**
     * Get airbag
     *
     * @return boolean
     */
    public function getAirbag()
    {
        return $this->airbag;
    }

    /**
     * Set nbrPorte
     *
     * @param integer $nbrPorte
     *
     * @return Voiture
     */
    public function setNbrPorte($nbrPorte)
    {
        $this->nbrPorte = $nbrPorte;

        return $this;
    }

    /**
     * Get nbrPorte
     *
     * @return integer
     */
    public function getNbrPorte()
    {
        return $this->nbrPorte;
    }

    /**
     * Set freinAbs
     *
     * @param boolean $freinAbs
     *
     * @return Voiture
     */
    public function setFreinAbs($freinAbs)
    {
        $this->freinAbs = $freinAbs;

        return $this;
    }

    /**
     * Get freinAbs
     *
     * @return boolean
     */
    public function getFreinAbs()
    {
        return $this->freinAbs;
    }

    /**
     * Set alarme
     *
     * @param boolean $alarme
     *
     * @return Voiture
     */
    public function setAlarme($alarme)
    {
        $this->alarme = $alarme;

        return $this;
    }

    /**
     * Get alarme
     *
     * @return boolean
     */
    public function getAlarme()
    {
        return $this->alarme;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Voiture
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set idAgence
     *
     * @param integer $idAgence
     *
     * @return Voiture
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
     * Set prixLocation
     *
     * @param float $prixLocation
     *
     * @return Voiture
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
     * Get matricule
     *
     * @return string
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set matricule
     *
     * @param string $matricule
     *
     * @return Voiture
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param \ClientBundle\Entity\User $user
     *
     * @return Voiture
     */
    public function setUser(\ClientBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \ClientBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set agence
     *
     * @param \ClientBundle\Entity\Agence $agence
     *
     * @return Voiture
     */
    public function setAgence(\ClientBundle\Entity\Agence $agence = null)
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
     * Add image
     *
     * @param \ClientBundle\Entity\PhotoVoiture $image
     *
     * @return Voiture
     */
    public function addImage(\ClientBundle\Entity\PhotoVoiture $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \ClientBundle\Entity\PhotoVoiture $image
     */
    public function removeImage(\ClientBundle\Entity\PhotoVoiture $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }
}
