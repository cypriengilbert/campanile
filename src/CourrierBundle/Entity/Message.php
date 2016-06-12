<?php

namespace CourrierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\User;


/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="CourrierBundle\Repository\MessageRepository")
 */
class Message
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
        * @var int
        *
        * @ORM\Column(name="isarchived", type="integer", unique=false)
        */
       private $isarchived;

                /**
               * @var int
               *
               * @ORM\Column(name="phone", type="integer", unique=false, nullable=true)
               */
              private $phone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_reception", type="datetime")
     */
    private $dateReception;

  /**
     * @var string
     *
     * @ORM\Column(name="sujet", type="string", length=255, nullable=false)
     */
    private $sujet;

        /**
         * @var societe
         *
         * @ORM\Column(name="societe", type="string", length=255, nullable=true)
         */
        private $societe;


    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;


      /**
         * @var string
         *
         * @ORM\Column(name="contact", type="string", length=255, nullable=true)
         */
        private $contact;


    /**
     * @var string
     *
     * @ORM\Column(name="expediteur", type="string", length=255)
     */
    private $expediteur;

    /**
     * @var string
     *
     * @ORM\Column(name="messager", type="string", length=255)
     */
    private $messager;


     /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
      private $destinataire;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateReception
     *
     * @param \DateTime $dateReception
     *
     * @return Message
     */
    public function setDateReception($dateReception)
    {
        $this->dateReception = $dateReception;

        return $this;
    }

    /**
     * Get dateReception
     *
     * @return \DateTime
     */
    public function getDateReception()
    {
        return $this->dateReception;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Message
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
         * Set contact
         *
         * @param string $contact
         *
         * @return Message
         */
        public function setContact($contact)
        {
            $this->contact = $contact;

            return $this;
        }

        /**
         * Get contact
         *
         * @return string
         */
        public function getContact()
        {
            return $this->contact;
        }



    public function setDestinataire(User $destinataire)
    {
        $this->destinataire = $destinataire;

        return $this;
    }


    public function getDestinataire()
    {
        return $this->destinataire;
    }

    /**
     * Set expediteur
     *
     * @param string $expediteur
     *
     * @return Message
     */
    public function setExpediteur($expediteur)
    {
        $this->expediteur = $expediteur;

        return $this;
    }

    /**
     * Get expediteur
     *
     * @return string
     */
    public function getExpediteur()
    {
        return $this->expediteur;
    }

    /**
     * Set messager
     *
     * @param string $messager
     *
     * @return Message
     */
    public function setMessager($messager)
    {
        $this->messager = $messager;

        return $this;
    }

    /**
     * Get messager
     *
     * @return string
     */
    public function getMessager()
    {
        return $this->messager;
    }


        /**
         * Set societe
         *
         * @param string $societe
         *
         * @return Message
         */
        public function setSociete($societe)
        {
            $this->societe = $societe;

            return $this;
        }

        /**
         * Get messager
         *
         * @return string
         */
        public function getSociete()
        {
            return $this->societe;
        }


  /**
     * Set sujet
     *
     * @param string $sujet
     *
     * @return Message
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return string
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set isarchived
     *
     * @param integer $isarchived
     *
     * @return Message
     */
    public function setIsarchived($isarchived)
    {
        $this->isarchived = $isarchived;

        return $this;
    }

    /**
     * Get isarchived
     *
     * @return integer
     */
    public function getIsarchived()
    {
        return $this->isarchived;
    }


      /**
         * Set phone
         *
         * @param integer $phone
         *
         * @return Message
         */
        public function setPhone($phone)
        {
            $this->phone = $phone;

            return $this;
        }

        /**
         * Get phone
         *
         * @return integer
         */
        public function getPhone()
        {
            return $this->phone;
        }
}

