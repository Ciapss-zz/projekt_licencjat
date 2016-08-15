<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\OneToMany(targetEntity="Blood", mappedBy="user")
     * @ORM\JoinColumn(name="id", referencedColumnName="user_id", nullable=false , onDelete="CASCADE")
     */
    protected $bloods;

    /**
     * @ORM\OneToOne(targetEntity="DataPersonal", mappedBy="user")
     */
    protected $dataPersonal;

    /**
     * @ORM\OneToMany(targetEntity="Visit", mappedBy="user")
     * @ORM\JoinColumn(name="id", referencedColumnName="user_id", nullable=false, onDelete="CASCADE")
     */
    protected $visits;

    /**
     * @ORM\OneToMany(targetEntity="History", mappedBy="user")
     * @ORM\JoinColumn(name="id", referencedColumnName="user_id", nullable=false)
     */
    protected $histories;

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->bloods = new ArrayCollection();
        $this->dataPersonals = new ArrayCollection();
        $this->visits = new ArrayCollection();

        $this->roles = array('ROLE_USER');
    }

    /**
     * Add Blood entity to collection (one to many).
     *
     * @param \Entity\Blood $blood
     * @return \Entity\User
     */
    public function addBlood(Blood $blood)
    {
        $this->bloods[] = $blood;

        return $this;
    }

    /**
     * Remove Blood entity from collection (one to many).
     *
     * @param \Entity\Blood $blood
     * @return \Entity\User
     */
    public function removeBlood(Blood $blood)
    {
        $this->bloods->removeElement($blood);

        return $this;
    }

    /**
     * Get Blood entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBloods()
    {
        return $this->bloods;
    }

    /**
     * Set DataPersonal entity (one to one).
     *
     * @param \Entity\DataPersonal $dataPersonal
     * @return \Entity\User
     */
    public function setDataPersonal(DataPersonal $dataPersonal = null)
    {
        $dataPersonal->setUser($this);
        $this->dataPersonal = $dataPersonal;

        return $this;
    }

    /**
     * Get DataPersonal entity (one to one).
     *
     * @return \Entity\DataPersonal
     */
    public function getDataPersonal()
    {
        return $this->dataPersonal;
    }

    /**
      * Add Visit entity to collection (one to many).
      *
      * @param \Entity\Visit $visit
      * @return \Entity\User
      */
     public function addVisit(Visit $visit)
     {
         $this->visits[] = $visit;

         return $this;
     }

     /**
      * Remove Visit entity from collection (one to many).
      *
      * @param \Entity\Visit $visit
      * @return \Entity\User
      */
     public function removeVisit(Visit $visit)
     {
         $this->visits->removeElement($visit);

         return $this;
     }

     /**
      * Get Visit entity collection (one to many).
      *
      * @return \Doctrine\Common\Collections\Collection
      */
     public function getVisits()
     {
         return $this->visits;
     }


     /**
     * Add History entity to collection (one to many).
     *
     * @param \Entity\History $history
     * @return \Entity\User
     */
    public function addHistory(History $history)
    {
        $this->histories[] = $history;

        return $this;
    }

    /**
     * Remove History entity from collection (one to many).
     *
     * @param \Entity\History $history
     * @return \Entity\User
     */
    public function removeHistory(History $history)
    {
        $this->histories->removeElement($history);

        return $this;
    }

    /**
     * Get History entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHistories()
    {
        return $this->histories;
    }

}
