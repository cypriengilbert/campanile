<?php

namespace CourrierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\User;

/**
 * Courrier
 *
 * @ORM\Table(name="courrier")
 * @ORM\Entity(repositoryClass="CourrierBundle\Repository\CourrierRepository")
 */
class Courrier
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initial_date", type="datetime", unique=false)
     */
    private $initialDate;


    /**
       * @ORM\OneToOne(targetEntity="CourrierBundle\Entity\Client", cascade={"persist"})
       */
      private $client;

            /**
            * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
            * @ORM\JoinColumn(nullable=true)
            */
             private $destinatairelocal;


    /**
    * @var \DateTime
    *
    * @ORM\Column(name="final_date", type="datetime", unique=false, nullable=true)
    */
    private $finalDate;


    /**
    * @var string
    *
    * @ORM\Column(name="auteur", type="string", length=255, nullable=true, unique=false)
    */
    private $auteur;




    /**
        * @var string
        *
        * @ORM\Column(name="title", type="string", length=255, nullable=true, unique=false)
        */
        private $title;




    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=255, nullable=true, unique=false)
     */
    private $genre;

    /**
     * @var int
     *
     * @ORM\Column(name="etat", type="integer", unique=false)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;


    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255, nullable=true)
     */
    private $commentaire;


        /**
         * @var string
         *
         * @ORM\Column(name="remisa", type="string", length=255, nullable=true)
         */
        private $remisa;



         /**
         * @var string
         *
         * @ORM\Column(name="remispar", type="string", length=255, nullable=true)
         */
        private $remispar;


    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=255, unique=false)
     */
    private $position;


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
     * Set initialDate
     *
     * @param \DateTime $initialDate
     * @return Courrier
     */
    public function setInitialDate($initialDate)
    {
        $this->initialDate = $initialDate;

        return $this;
    }

    /**
     * Get initialDate
     *
     * @return \DateTime
     */
    public function getInitialDate()
    {
        return $this->initialDate;
    }


    /**
         * Set finalDate
         *
         * @param \DateTime $finalDate
         * @return Courrier
         */
        public function setFinalDate($finalDate)
        {
            $this->finalDate = $finalDate;

            return $this;
        }

        /**
         * Get finalDate
         *
         * @return \DateTime
         */
        public function getFinalDate()
        {
            return $this->finalDate;
        }



    /**
     * Set genre
     *
     * @param string $genre
     * @return Courrier
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }


    /**
     * Set $remisa
     *
     * @param string $remisa
     * @return Courrier
     */

    public function setRemisa($remisa)
    {
        $this->remisa = $remisa;

        return $this;
    }

    /**
     * Get remisa
     *
     * @return string
     */
    public function getRemisa()
    {
        return $this->remisa;
    }




    /**
     * Set remispar
     *
     * @param string $remispar
     * @return Courrier
     */
    public function setRemispar($remispar)
    {
        $this->remispar = $remispar;

        return $this;
    }

    /**
     * Get remispar
     *
     * @return string
     */
    public function getRemispar()
    {
        return $this->remispar;
    }



    /**
     * Set title
     *
     * @param string $title
     * @return Courrier
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }


    /**
     * Set auteur
     *
     * @param string $auteur
     * @return Courrier
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string
     */
    public function getAuteur()
    {
        return $this->auteur;
    }


    /**
     * Set etat
     *
     * @param integer $etat
     * @return Courrier
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return integer 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Courrier
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
     * Set commentaire
     *
     * @param string $commentaire
     * @return Courrier
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set position
     *
     * @param string $position
     * @return Courrier
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition()
    {
        return $this->position;
    }



        public function setClient($client)
        {
            $this->client = $client;

            return $this;
        }


        public function getClient()
        {
            return $this->client;
        }



    public function setDestinatairelocal(User $destinatairelocal)
    {
        $this->destinatairelocal = $destinatairelocal;

        return $this;
    }


    public function getDestinatairelocal()
    {
        return $this->destinatairelocal;
    }
}
