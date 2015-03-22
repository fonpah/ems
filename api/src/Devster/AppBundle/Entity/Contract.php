<?php

namespace Devster\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contract
 *
 * @ORM\Table(name="contract", indexes={@ORM\Index(name="fk_contract_employee1_idx", columns={"employee_id"})})
 * @ORM\Entity
 */
class Contract
{
    /**
     * @var string
     *
     * @ORM\Column(name="yearly_pre_tax_salary", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $yearlyPreTaxSalary;

    /**
     * @var integer
     *
     * @ORM\Column(name="yearly_holidays", type="integer", nullable=false)
     */
    private $yearlyHolidays;

    /**
     * @var integer
     *
     * @ORM\Column(name="daily_work_hours", type="integer", nullable=false)
     */
    private $dailyWorkHours;

    /**
     * @var string
     *
     * @ORM\Column(name="other_detail", type="text", nullable=true)
     */
    private $otherDetail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Devster\AppBundle\Entity\Employee
     *
     * @ORM\ManyToOne(targetEntity="Devster\AppBundle\Entity\Employee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="employee_id", referencedColumnName="id")
     * })
     */
    private $employee;



    /**
     * Set yearlyPreTaxSalary
     *
     * @param string $yearlyPreTaxSalary
     * @return Contract
     */
    public function setYearlyPreTaxSalary($yearlyPreTaxSalary)
    {
        $this->yearlyPreTaxSalary = $yearlyPreTaxSalary;

        return $this;
    }

    /**
     * Get yearlyPreTaxSalary
     *
     * @return string 
     */
    public function getYearlyPreTaxSalary()
    {
        return $this->yearlyPreTaxSalary;
    }

    /**
     * Set yearlyHolidays
     *
     * @param integer $yearlyHolidays
     * @return Contract
     */
    public function setYearlyHolidays($yearlyHolidays)
    {
        $this->yearlyHolidays = $yearlyHolidays;

        return $this;
    }

    /**
     * Get yearlyHolidays
     *
     * @return integer 
     */
    public function getYearlyHolidays()
    {
        return $this->yearlyHolidays;
    }

    /**
     * Set dailyWorkHours
     *
     * @param integer $dailyWorkHours
     * @return Contract
     */
    public function setDailyWorkHours($dailyWorkHours)
    {
        $this->dailyWorkHours = $dailyWorkHours;

        return $this;
    }

    /**
     * Get dailyWorkHours
     *
     * @return integer 
     */
    public function getDailyWorkHours()
    {
        return $this->dailyWorkHours;
    }

    /**
     * Set otherDetail
     *
     * @param string $otherDetail
     * @return Contract
     */
    public function setOtherDetail($otherDetail)
    {
        $this->otherDetail = $otherDetail;

        return $this;
    }

    /**
     * Get otherDetail
     *
     * @return string 
     */
    public function getOtherDetail()
    {
        return $this->otherDetail;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Contract
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
     * @return Contract
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set employee
     *
     * @param \Devster\AppBundle\Entity\Employee $employee
     * @return Contract
     */
    public function setEmployee(\Devster\AppBundle\Entity\Employee $employee = null)
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * Get employee
     *
     * @return \Devster\AppBundle\Entity\Employee 
     */
    public function getEmployee()
    {
        return $this->employee;
    }
}
