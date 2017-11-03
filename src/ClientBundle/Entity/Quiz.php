<?php

namespace ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quiz
 *
 * @ORM\Table(name="quiz", indexes={@ORM\Index(name="id_agence", columns={"id_agence"})})
 * @ORM\Entity
 */
class Quiz
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_question", type="integer", nullable=false)
     */
    private $nbrQuestion;

    /**
     * @var integer
     *
     * @ORM\Column(name="duree_quiz", type="integer", nullable=false)
     */
    private $dureeQuiz;

    /**
     * @var float
     *
     * @ORM\Column(name="score", type="float", precision=10, scale=0, nullable=false)
     */
    private $score;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_agence", type="integer", nullable=false)
     */
    private $idAgence;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_quiz", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idQuiz;


}

