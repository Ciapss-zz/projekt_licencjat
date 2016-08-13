<?php



namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entity\DataPersonal
 *
 * @ORM\Entity(repositoryClass="DataPersonalRepository")
 * @ORM\Table(name="data_personal", indexes={@ORM\Index(name="fk_pesonal_data_user_idx", columns={"user_id"})}, uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 */
class DataPersonal
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

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
    protected $pesel;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $birth_date;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $street;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $post_code;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $city;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $sex;

    /**
     * @ORM\Column(type="integer")
     */
    protected $user_id;

    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="dataPersonal")
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
     * @return \Entity\DataPersonal
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
     * Set the value of name.
     *
     * @param string $name
     * @return \Entity\DataPersonal
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
     * @return \Entity\DataPersonal
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
     * Set the value of pesel.
     *
     * @param string $pesel
     * @return \Entity\DataPersonal
     */
    public function setPesel($pesel)
    {
        $this->pesel = $pesel;

        return $this;
    }

    /**
     * Get the value of pesel.
     *
     * @return string
     */
    public function getPesel()
    {
        return $this->pesel;
    }

    /**
     * Set the value of birth_date.
     *
     * @param \DateTime $birth_date
     * @return \Entity\DataPersonal
     */
    public function setBirthDate($birth_date)
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    /**
     * Get the value of birth_date.
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * Set the value of street.
     *
     * @param string $street
     * @return \Entity\DataPersonal
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get the value of street.
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set the value of post_code.
     *
     * @param string $post_code
     * @return \Entity\DataPersonal
     */
    public function setPostCode($post_code)
    {
        $this->post_code = $post_code;

        return $this;
    }

    /**
     * Get the value of post_code.
     *
     * @return string
     */
    public function getPostCode()
    {
        return $this->post_code;
    }

    /**
     * Set the value of city.
     *
     * @param string $city
     * @return \Entity\DataPersonal
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of city.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of sex.
     *
     * @param string $sex
     * @return \Entity\DataPersonal
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get the value of sex.
     *
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set the value of user_id.
     *
     * @param integer $user_id
     * @return \Entity\DataPersonal
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
     * Set User entity (one to one).
     *
     * @param \Entity\User $user
     * @return \Entity\DataPersonal
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get User entity (one to one).
     *
     * @return \Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function __sleep()
    {
        return array('id', 'name', 'surname', 'pesel', 'birth_date', 'street', 'post_code', 'city', 'sex', 'user_id');
    }
}
