<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entity\Visit
 *
 * @ORM\Entity(repositoryClass="VisitRepository")
 * @ORM\Table(name="visit")
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
     * @ORM\Column(name="`date`", type="string", length=45, nullable=true)
     */
    protected $date;

    /**
     * @ORM\OneToMany(targetEntity="Doctor", mappedBy="visit")
     * @ORM\JoinColumn(name="id", referencedColumnName="visit_idvisit", nullable=false)
     */
    protected $doctors;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="visits")
     * @ORM\JoinTable(name="visit_has_user",
     *     joinColumns={@ORM\JoinColumn(name="visit_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)}
     * )
     */
    protected $users;

    public function __construct()
    {
        $this->doctors = new ArrayCollection();
        $this->users = new ArrayCollection();
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
     * @param string $date
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
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Add Doctor entity to collection (one to many).
     *
     * @param \Entity\Doctor $doctor
     * @return \Entity\Visit
     */
    public function addDoctor(Doctor $doctor)
    {
        $this->doctors[] = $doctor;

        return $this;
    }

    /**
     * Remove Doctor entity from collection (one to many).
     *
     * @param \Entity\Doctor $doctor
     * @return \Entity\Visit
     */
    public function removeDoctor(Doctor $doctor)
    {
        $this->doctors->removeElement($doctor);

        return $this;
    }

    /**
     * Get Doctor entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDoctors()
    {
        return $this->doctors;
    }

    /**
     * Add User entity to collection.
     *
     * @param \Entity\User $user
     * @return \Entity\Visit
     */
    public function addUser(User $user)
    {
        $user->addVisit($this);
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove User entity from collection.
     *
     * @param \Entity\User $user
     * @return \Entity\Visit
     */
    public function removeUser(User $user)
    {
        $user->removeVisit($this);
        $this->users->removeElement($user);

        return $this;
    }

    /**
     * Get User entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    public function __sleep()
    {
        return array('id', 'date');
    }
}
