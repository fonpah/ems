<?php

namespace Devster\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmployeeOnProject
 *
 * @ORM\Table(name="employee_on_project", indexes={@ORM\Index(name="fk_project_has_employee_employee1_idx", columns={"employee_id"}), @ORM\Index(name="fk_project_has_employee_project1_idx", columns={"project_id"}), @ORM\Index(name="fk_employee_on_project_employee1_idx", columns={"assigned_by"})})
 * @ORM\Entity
 */
class EmployeeOnProject
{
    /**
     * @var \Devster\AppBundle\Entity\Project
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Devster\AppBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     * })
     */
    private $project;

    /**
     * @var \Devster\AppBundle\Entity\Employee
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Devster\AppBundle\Entity\Employee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="employee_id", referencedColumnName="id")
     * })
     */
    private $employee;

    /**
     * @var \Devster\AppBundle\Entity\Employee
     *
     * @ORM\ManyToOne(targetEntity="Devster\AppBundle\Entity\Employee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="assigned_by", referencedColumnName="id")
     * })
     */
    private $assignedBy;



    /**
     * Set project
     *
     * @param \Devster\AppBundle\Entity\Project $project
     * @return EmployeeOnProject
     */
    public function setProject(\Devster\AppBundle\Entity\Project $project)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \Devster\AppBundle\Entity\Project 
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set employee
     *
     * @param \Devster\AppBundle\Entity\Employee $employee
     * @return EmployeeOnProject
     */
    public function setEmployee(\Devster\AppBundle\Entity\Employee $employee)
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

    /**
     * Set assignedBy
     *
     * @param \Devster\AppBundle\Entity\Employee $assignedBy
     * @return EmployeeOnProject
     */
    public function setAssignedBy(\Devster\AppBundle\Entity\Employee $assignedBy = null)
    {
        $this->assignedBy = $assignedBy;

        return $this;
    }

    /**
     * Get assignedBy
     *
     * @return \Devster\AppBundle\Entity\Employee 
     */
    public function getAssignedBy()
    {
        return $this->assignedBy;
    }
}
