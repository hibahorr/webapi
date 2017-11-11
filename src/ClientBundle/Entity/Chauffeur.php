<?php

namespace ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chauffeur
 *
 * @ORM\Table(name="chauffeur", indexes={@ORM\Index(name="id_voiture", columns={"id_voiture"})})
 * @ORM\Entity
 */
class Chauffeur
{

    /**
     * @var \ClientBundle\Entity\Voiture
     *
     * @ORM\ManyToOne(targetEntity="ClientBundle\Entity\Voiture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_voiture", referencedColumnName="matricule", nullable=true)
     * })
     */
    private $voiture;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_chauffeur", type="string", length=50, nullable=false)
     */
    private $nomChauffeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="age_chauffeur", type="integer", nullable=false)
     */
    private $ageChauffeur;

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
     * @ORM\Column(name="prix_chauffeur", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixChauffeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_chauffeur", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idChauffeur;



    /**
     * Set nomChauffeur
     *
     * @param string $nomChauffeur
     *
     * @return Chauffeur
     */
    public function setNomChauffeur($nomChauffeur)
    {
        $this->nomChauffeur = $nomChauffeur;

        return $this;
    }

    /**
     * Get nomChauffeur
     *
     * @return string
     */
    public function getNomChauffeur()
    {
        return $this->nomChauffeur;
    }

    /**
     * Set ageChauffeur
     *
     * @param integer $ageChauffeur
     *
     * @return Chauffeur
     */
    public function setAgeChauffeur($ageChauffeur)
    {
        $this->ageChauffeur = $ageChauffeur;

        return $this;
    }

    /**
     * Get ageChauffeur
     *
     * @return integer
     */
    public function getAgeChauffeur()
    {
        return $this->ageChauffeur;
    }

    /**
     * Set prixChauffeur
     *
     * @param float $prixChauffeur
     *
     * @return Chauffeur
     */
    public function setPrixChauffeur($prixChauffeur)
    {
        $this->prixChauffeur = $prixChauffeur;

        return $this;
    }

    /**
     * Get prixChauffeur
     *
     * @return float
     */
    public function getPrixChauffeur()
    {
        return $this->prixChauffeur;
    }

    /**
     * Get idChauffeur
     *
     * @return integer
     */
    public function getIdChauffeur()
    {
        return $this->idChauffeur;
    }

    /**
     * Set voiture
     *
     * @param \ClientBundle\Entity\Voiture $voiture
     *
     * @return Chauffeur
     */
    public function setVoiture(\ClientBundle\Entity\Voiture $voiture = null)
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

    /**
     * Set agence
     *
     * @param \ClientBundle\Entity\Agence $agence
     *
     * @return Chauffeur
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
}
