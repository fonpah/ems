<?php

namespace Devster\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LeaveTaken
 *
 * @ORM\Table(name="leave_taken", indexes={@ORM\Index(name="fk_leave_taken_employee1_idx", columns={"employee_id"}), @ORM\Index(name="fk_leave_taken_leave_type1_idx", columns={"leave_type_id"}), @ORM\Index(name="fk_leave_taken_employee2_idx", columns={"approved_by"})})
 * @ORM\Entity
 */
class LeaveTaken
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="date", nullable=false)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="date", nullable=false)
     */
    private $endDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="days", type="integer", nullable=false)
     */
    private $days;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=1, nullable=true)
     */
    private $status;

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
     *   @ORM\JoinColumn(name="approved_by", referencedColumnName="id")
     * })
     */
    private $approvedBy;

    /**
     * @var \Devster\AppBundle\Entity\LeaveType
     *
     * @ORM\ManyToOne(targetEntity="Devster\AppBundle\Entity\LeaveType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="leave_type_id", referencedColumnName="id")
     * })
     */
    private $leaveType;

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
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return LeaveTaken
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return LeaveTaken
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set days
     *
     * @param integer $days
     * @return LeaveTaken
     */
    public function setDays($days)
    {
        $this->days = $days;

        return $this;
    }

    /**
     * Get days
     *
     * @return integer 
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return LeaveTaken
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return LeaveTaken
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
     * @return LeaveTaken
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
     * Set approvedBy
     *
     * @param \Devster\AppBundle\Entity\Employee $approvedBy
     * @return LeaveTaken
     */
    public function setApprovedBy(\Devster\AppBundle\Entity\Employee $approvedBy = null)
    {
        $this->approvedBy = $approvedBy;

        return $this;
    }

    /**
     * Get approvedBy
     *
     * @return \Devster\AppBundle\Entity\Employee 
     */
    public function getApprovedBy()
    {
        return $this->approvedBy;
    }

    /**
     * Set leaveType
     *
     * @param \Devster\AppBundle\Entity\LeaveType $leaveType
     * @return LeaveTaken
     */
    public function setLeaveType(\Devster\AppBundle\Entity\LeaveType $leaveType = null)
    {
        $this->leaveType = $leaveType;

        return $this;
    }

    /**
     * Get leaveType
     *
     * @return \Devster\AppBundle\Entity\LeaveType 
     */
    public function getLeaveType()
    {
        return $this->leaveType;
    }

    /**
     * Set employee
     *
     * @param \Devster\AppBundle\Entity\Employee $employee
     * @return LeaveTaken
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
