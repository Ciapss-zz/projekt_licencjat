<?php


namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entity\Doctor
 *
 * @ORM\Entity(repositoryClass="DoctorRepository")
  * @ORM\Table(name="doctor")
  */
 class Doctor
 {
     /**
      * @ORM\Id
      * @ORM\Column(type="integer")
      * @ORM\GeneratedValue(strategy="AUTO")
      */
     protected $id;

     /**
      * @ORM\Column(type="string", length=45, nullable=true)
      */
     protected $title;

     /**
      * @ORM\Column(name="`name`", type="string", length=45, nullable=true)
      */
     protected $name;

     /**
      * @ORM\Column(type="string", length=45, nullable=true)
      */
     protected $surname;

     /**
      * @ORM\Column(type="string", length=45, nullable=true)
      */
     protected $specification;

     /**
      * @ORM\Column(type="string", length=45, nullable=true)
      */
     protected $image;

     /**
      * @ORM\Column(type="string", length=45, nullable=true)
      */
     protected $doctorcol;

     /**
      * @ORM\OneToMany(targetEntity="Visit", mappedBy="doctor")
      * @ORM\JoinColumn(name="id", referencedColumnName="doctor_id", nullable=false)
      */
     protected $visits;

     public function __construct()
     {
         $this->visits = new ArrayCollection();
     }

     /**
      * Set the value of id.
      *
      * @param integer $id
      * @return \Entity\Doctor
      */
     public function setId($id)
     {
         $this->id = $id;

         return $this;
     }

     /**
      * Get the value of id.
      *
      * @return integer
      */
     public function getId()
     {
         return $this->id;
     }

     /**
      * Set the value of title.
      *
      * @param string $title
      * @return \Entity\Doctor
      */
     public function setTitle($title)
     {
         $this->title = $title;

         return $this;
     }

     /**
      * Get the value of title.
      *
      * @return string
      */
     public function getTitle()
     {
         return $this->title;
     }

     /**
      * Set the value of name.
      *
      * @param string $name
      * @return \Entity\Doctor
      */
     public function setName($name)
     {
         $this->name = $name;

         return $this;
     }

     /**
      * Get the value of name.
      *
      * @return string
      */
     public function getName()
     {
         return $this->name;
     }

     /**
      * Set the value of surname.
      *
      * @param string $surname
      * @return \Entity\Doctor
      */
     public function setSurname($surname)
     {
         $this->surname = $surname;

         return $this;
     }

     /**
      * Get the value of surname.
      *
      * @return string
      */
     public function getSurname()
     {
         return $this->surname;
     }

     /**
      * Set the value of specification.
      *
      * @param string $specification
      * @return \Entity\Doctor
      */
     public function setSpecification($specification)
     {
         $this->specification = $specification;

         return $this;
     }

     /**
      * Get the value of specification.
      *
      * @return string
      */
     public function getSpecification()
     {
         return $this->specification;
     }

     /**
      * Set the value of image.
      *
      * @param string $image
      * @return \Entity\Doctor
      */
     public function setImage($image)
     {
         $this->image = $image;

         return $this;
     }

     /**
      * Get the value of image.
      *
      * @return string
      */
     public function getImage()
     {
         return $this->image;
     }

     /**
      * Set the value of doctorcol.
      *
      * @param string $doctorcol
      * @return \Entity\Doctor
      */
     public function setDoctorcol($doctorcol)
     {
         $this->doctorcol = $doctorcol;

         return $this;
     }

     /**
      * Get the value of doctorcol.
      *
      * @return string
      */
     public function getDoctorcol()
     {
         return $this->doctorcol;
     }

     /**
      * Add Visit entity to collection (one to many).
      *
      * @param \Entity\Visit $visit
      * @return \Entity\Doctor
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
      * @return \Entity\Doctor
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

     public function __sleep()
     {
         return array('id', 'title', 'name', 'surname', 'specification', 'image', 'doctorcol');
     }
 }
