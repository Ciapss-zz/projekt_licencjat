<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entity\Visit
 *
 * @ORM\Entity(repositoryClass="VisitRepository")
 * @ORM\Table(name="visit", indexes={@ORM\Index(name="fk_visit_doctor1_idx", columns={"doctor_id"}), @ORM\Index(name="fk_visit_user1_idx", columns={"user_id"})})
 */
class Visit
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="`date`", type="datetime", nullable=true)
     */
    protected $date;

    /**
     * @ORM\Column(type="integer")
     */
    protected $doctor_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $user_id;

    /**
     * @ORM\ManyToOne(targetEntity="Doctor", inversedBy="visits")
     * @ORM\JoinColumn(name="doctor_id", referencedColumnName="id", nullable=false)
     */
    protected $doctor;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="visits")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    protected $user;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Entity\Visit
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
     * Set the value of date.
     *
     * @param \DateTime $date
     * @return \Entity\Visit
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of doctor_id.
     *
     * @param integer $doctor_id
     * @return \Entity\Visit
     */
    public function setDoctorId($doctor_id)
    {
        $this->doctor_id = $doctor_id;

        return $this;
    }

    /**
     * Get the value of doctor_id.
     *
     * @return integer
     */
    public function getDoctorId()
    {
        return $this->doctor_id;
    }

    /**
     * Set the value of user_id.
     *
     * @param integer $user_id
     * @return \Entity\Visit
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of user_id.
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set Doctor entity (many to one).
     *
     * @param \Entity\Doctor $doctor
     * @return \Entity\Visit
     */
    public function setDoctor(Doctor $doctor = null)
    {
        $this->doctor = $doctor;

        return $this;
    }

    /**
     * Get Doctor entity (many to one).
     *
     * @return \Entity\Doctor
     */
    public function getDoctor()
    {
        return $this->doctor;
    }

    /**
     * Set User entity (many to one).
     *
     * @param \Entity\User $user
     * @return \Entity\Visit
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get User entity (many to one).
     *
     * @return \Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function __sleep()
    {
        return array('id', 'date', 'doctor_id', 'user_id');
    }
}
