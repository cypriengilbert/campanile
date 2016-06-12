<?php

namespace CourrierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="CourrierBundle\Repository\ClientRepository")
 */
class Client
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
     * @var string
     *
     * @ORM\Column(name="nomclient", type="string", length=255, nullable=true)
     */
    private $nomclient;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomclient", type="string", length=255, nullable=true)
     */
    private $prenomclient;

    /**
     * @var string
     *
     * @ORM\Column(name="societeclient", type="string", length=255, nullable=true)
     */
    private $societeclient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="arrivee", type="datetime", nullable=true)
     */
    private $arrivee;


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
     * Set nomclient
     *
     * @param string $nomclient
     *
     * @return Client
     */
    public function setNomclient($nomclient)
    {
        $this->nomclient = $nomclient;

        return $this;
    }

    /**
     * Get nomclient
     *
     * @return string
     */
    public function getNomclient()
    {
        return $this->nomclient;
    }

    /**
     * Set prenomclient
     *
     * @param string $prenomclient
     *
     * @return Client
     */
    public function setPrenomclient($prenomclient)
    {
        $this->prenomclient = $prenomclient;

        return $this;
    }

    /**
     * Get prenomclient
     *
     * @return string
     */
    public function getPrenomclient()
    {
        return $this->prenomclient;
    }

    /**
     * Set societeclient
     *
     * @param string $societeclient
     *
     * @return Client
     */
    public function setSocieteclient($societeclient)
    {
        $this->societeclient = $societeclient;

        return $this;
    }

    /**
     * Get societeclient
     *
     * @return string
     */
    public function getSocieteclient()
    {
        return $this->societeclient;
    }

    /**
     * Set arrivee
     *
     * @param \DateTime $arrivee
     *
     * @return Client
     */
    public function setArrivee($arrivee)
    {
        $this->arrivee = $arrivee;

        return $this;
    }

    /**
     * Get arrivee
     *
     * @return \DateTime
     */
    public function getArrivee()
    {
        return $this->arrivee;
    }
}

