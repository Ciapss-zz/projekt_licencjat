<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Entity\Blood
 *
 * @ORM\Entity(repositoryClass="BloodRepository")
 * @ORM\Table(name="blood", indexes={@ORM\Index(name="fk_blood_user1_idx", columns={"user_id"})})
 */
class Blood
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
    protected $rbc;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $hgb;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $hct;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $mcv;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $mch;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $mchc;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $wbc;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $plt;

    /**
     * @ORM\Column(type="integer")
     */
    protected $user_id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="bloods")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    protected $user;

    /**
     * @var \DateTime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var \DateTime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * @var \DateTime $contentChanged
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="change", field={"title", "body"})
     */
    private $contentChanged;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Entity\Blood
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
     * Set the value of rbc.
     *
     * @param string $rbc
     * @return \Entity\Blood
     */
    public function setRbc($rbc)
    {
        $this->rbc = $rbc;

        return $this;
    }

    /**
     * Get the value of rbc.
     *
     * @return string
     */
    public function getRbc()
    {
        return $this->rbc;
    }

    /**
     * Set the value of hgb.
     *
     * @param string $hgb
     * @return \Entity\Blood
     */
    public function setHgb($hgb)
    {
        $this->hgb = $hgb;

        return $this;
    }

    /**
     * Get the value of hgb.
     *
     * @return string
     */
    public function getHgb()
    {
        return $this->hgb;
    }

    /**
     * Set the value of hct.
     *
     * @param string $hct
     * @return \Entity\Blood
     */
    public function setHct($hct)
    {
        $this->hct = $hct;

        return $this;
    }

    /**
     * Get the value of hct.
     *
     * @return string
     */
    public function getHct()
    {
        return $this->hct;
    }

    /**
     * Set the value of mcv.
     *
     * @param string $mcv
     * @return \Entity\Blood
     */
    public function setMcv($mcv)
    {
        $this->mcv = $mcv;

        return $this;
    }

    /**
     * Get the value of mcv.
     *
     * @return string
     */
    public function getMcv()
    {
        return $this->mcv;
    }

    /**
     * Set the value of mch.
     *
     * @param string $mch
     * @return \Entity\Blood
     */
    public function setMch($mch)
    {
        $this->mch = $mch;

        return $this;
    }

    /**
     * Get the value of mch.
     *
     * @return string
     */
    public function getMch()
    {
        return $this->mch;
    }

    /**
     * Set the value of mchc.
     *
     * @param string $mchc
     * @return \Entity\Blood
     */
    public function setMchc($mchc)
    {
        $this->mchc = $mchc;

        return $this;
    }

    /**
     * Get the value of mchc.
     *
     * @return string
     */
    public function getMchc()
    {
        return $this->mchc;
    }

    /**
     * Set the value of wbc.
     *
     * @param string $wbc
     * @return \Entity\Blood
     */
    public function setWbc($wbc)
    {
        $this->wbc = $wbc;

        return $this;
    }

    /**
     * Get the value of wbc.
     *
     * @return string
     */
    public function getWbc()
    {
        return $this->wbc;
    }

    /**
     * Set the value of plt.
     *
     * @param string $plt
     * @return \Entity\Blood
     */
    public function setPlt($plt)
    {
        $this->plt = $plt;

        return $this;
    }

    /**
     * Get the value of plt.
     *
     * @return string
     */
    public function getPlt()
    {
        return $this->plt;
    }

    /**
     * Set the value of user_id.
     *
     * @param integer $user_id
     * @return \Entity\Blood
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
     * Set User entity (many to one).
     *
     * @param \Entity\User $user
     * @return \Entity\Blood
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

    public function getCreated()
    {
        return $this->created;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function getContentChanged()
    {
        return $this->contentChanged;
    }

    public function __sleep()
    {
        return array('id', 'rbc', 'hgb', 'hct', 'mcv', 'mch', 'mchc', 'wbc', 'plt', 'user_id');
    }
}
