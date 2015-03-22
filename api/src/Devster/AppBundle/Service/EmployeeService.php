<?php
/**
 * Created by PhpStorm.
 * User: fonpah
 * Date: 21.03.2015
 * Time: 00:30
 */

namespace Devster\AppBundle\Service;

use Devster\AppBundle\Entity\Employee;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;

/**
 * Class EmployeeService
 * @package Devster\AppBundle\Service
 */
class EmployeeService implements IEmployeeService
{
    /**
     * @var ObjectManager
     */
    private $om;
    /**
     * @var string
     */
    private $entityClassName;

    /**
     * @var ObjectRepository
     */
    private $repository;


    public function __construct(ObjectManager $om, $entityClassName)
    {
        $this->om = $om;
        $this->entityClassName = $entityClassName;
        $this->repository = $this->om->getRepository($this->entityClassName);
    }

    /**
     * Get a list of Employees
     * @API
     * @param int $page the page
     * @param int $limit the number of item per page
     * @return array
     */
    public function all($page = 1, $limit = 10)
    {
        //TODO: Implement all() Method
    }

    /**
     * Get a Given Employee by Id
     * @param int $id
     * @return Employees
     */
    public function get($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Post a new EMployee, Create a new Employee
     * @API
     * @param array $data
     * @return Employee
     */
    public function post(array $data)
    {
        $employee = $this->createEmployee();
        return $this->processForm($employee, $data, 'POST');
    }

    /**
     * Edit an Employee
     * @API
     * @param Employee $employee
     * @param array $data
     * @return Employee
     */
    public function put(Employee $employee, array $data)
    {
        $this->processForm($employee, $data, 'PUT');
    }


    /**
     * Partially Update Employee
     * @api
     * @param Employee $employee
     * @param array $data
     * @return Employee
     */
    public function patch(Employee $employee, array $data)
    {
        return $this->processForm($employee,$data, 'PATCH' );
    }

    /**
     * @param Employee $employee
     * @param array $data
     * @param string $method
     * @return Employee
     */
    private function processForm(Employee $employee, array $data, $method = 'PUT')
    {

    }

    /**
     * @return Employee
     */
    private function createEmployee()
    {
        return (new \ReflectionClass($this->entityClassName))->newInstance();
    }
}