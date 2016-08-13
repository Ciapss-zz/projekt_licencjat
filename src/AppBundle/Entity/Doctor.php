<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entity\Doctor
 *
 * @ORM\Entity(repositoryClass="DoctorRepository")
 * @ORM\Table(name="doctor", indexes={@ORM\Index(name="fk_doctor_visit1_idx", columns={"visit_idvisit"})})
 */
class Doctor
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
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
     * @ORM\Column(type="integer")
     */
    protected $visit_idvisit;

    /**
     * @ORM\ManyToOne(targetEntity="Visit", inversedBy="doctors")
     * @ORM\JoinColumn(name="visit_idvisit", referencedColumnName="id", nullable=false)
     */
    protected $visit;

    public function __construct()
    {
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
     * Set the value of visit_idvisit.
     *
     * @param integer $visit_idvisit
     * @return \Entity\Doctor
     */
    public function setVisitIdvisit($visit_idvisit)
    {
        $this->visit_idvisit = $visit_idvisit;

        return $this;
    }

    /**
     * Get the value of visit_idvisit.
     *
     * @return integer
     */
    public function getVisitIdvisit()
    {
        return $this->visit_idvisit;
    }

    /**
     * Set Visit entity (many to one).
     *
     * @param \Entity\Visit $visit
     * @return \Entity\Doctor
     */
    public function setVisit(Visit $visit = null)
    {
        $this->visit = $visit;

        return $this;
    }

    /**
     * Get Visit entity (many to one).
     *
     * @return \Entity\Visit
     */
    public function getVisit()
    {
        return $this->visit;
    }

    public function __sleep()
    {
        return array('id', 'title', 'name', 'surname', 'specification', 'image', 'doctorcol', 'visit_idvisit');
    }
}
