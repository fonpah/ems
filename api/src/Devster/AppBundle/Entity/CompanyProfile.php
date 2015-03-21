<?php
/**
 * Created by PhpStorm.
 * User: fonpah
 * Date: 20.03.2015
 * Time: 15:07
 */

namespace Devster\AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;

/**
 * Class CompanyProfile
 * @package Devster\AppBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="company_profiles")
 *
 * @ExclusionPolicy("all")
 */
class CompanyProfile {
    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Expose
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(type="string", length=60, nullable=false)
     * @Expose
     */
    private $name;
    /**
     * @var string
     * @ORM\Column(type="string", length=10, name="abbreviation")
     * @Expose
     */
    private $abbreviation;
    /**
     * @var string
     * @ORM\Column(type="text", length=65535, nullable=true)
     * @Expose
     */
    private $text;
    /**
     * @var string
     * @ORM\Column(type="text", length=65535, nullable=true)
     * @Expose
     */
    private $adress;
    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", name="created_at")
     */
    private $createdAt;
    /**
     * @var \Datetime
     * @ORM\Column(type="datetime", name="updated_at")
     */
    private $updatedAt;
    /**
     * @var integer
     * @ORM\Column(type="integer", name="updated_by")
     */
    private $updatedBy;
    /**
     * @var integer
     * @ORM\Column(type="integer", name="created_by")
     */
    private $createdBy;

    /**
     * Set id
     *
     * @param integer $id
     * @return CompanyProfile
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set abbreviation
     *
     * @param string $abbreviation
     * @return CompanyProfile
     */
    public function setAbbreviation($abbreviation)
    {
        $this->abbreviation = $abbreviation;

        return $this;
    }

    /**
     * Get abbreviation
     *
     * @return string 
     */
    public function getAbbreviation()
    {
        return $this->abbreviation;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return CompanyProfile
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set adress
     *
     * @param string $adress
     * @return CompanyProfile
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string 
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return CompanyProfile
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return CompanyProfile
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set updatedBy
     *
     * @param integer $updatedBy
     * @return CompanyProfile
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return integer 
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     * @return CompanyProfile
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return integer 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return CompanyProfile
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
