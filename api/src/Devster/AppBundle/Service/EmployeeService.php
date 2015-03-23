<?php
/**
 * Created by PhpStorm.
 * User: fonpah
 * Date: 21.03.2015
 * Time: 00:30
 */

namespace Devster\AppBundle\Service;

use Devster\AppBundle\Entity\Employee;
use Devster\AppBundle\Exception\InvalidFormException;
use Devster\AppBundle\Form\Type\EmployeeType;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormFactoryInterface;

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

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    public function __construct(ObjectManager $om, $entityClassName, FormFactoryInterface $formFactory)
    {
        $this->om = $om;
        $this->entityClassName = $entityClassName;
        $this->repository = $this->om->getRepository($this->entityClassName);
        $this->formFactory = $formFactory;
    }

    /**
     * Get a list of Employees
     * @API
     * @param int $page the page
     * @param int $limit the number of item per page
     * @param array $orderBy
     * @return array
     */
    public function all($page = 1, $limit = 10, $orderBy= array('createdAt'=>'DESC'))
    {
        return $this->repository->findBy(array('isDeleted'=>false),$orderBy, $limit,$page);
    }

    /**
     * Get a Given Employee by Id
     * @param int $id
     * @return Employee
     */
    public function get($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Post a new Employee, Create a new Employee
     * @API
     * @param array $data
     * @return Employee
     */
    public function post(array $data)
    {
        // the factory method to create a empty employee instance
        $employee = $this->createEmployee();
        //process form does all the magic, validate and hydrate the employee  object
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
     * Delete an employee
     * @param Employee $employee
     * @return bool
     */
    public function delete(Employee $employee){
        $employee->setIsDeleted(true);
        $this->om->persist($employee);
        $this->om->flush($employee);
        return true;
    }
    /**
     * @param Employee $employee
     * @param array $data
     * @param string $method
     * @return Employee
     */
    private function processForm(Employee $employee, array $data, $method = 'PUT')
    {
        $form = $this->formFactory->create(new EmployeeType(), $employee, array('method'=> $method));
        $form->submit($data, 'PATCH'!== $method);
        if($form->isValid()){
            $employee = $form->getData();
            $this->om->persist($employee);
            $this->om->flush($employee);
            return $employee;
        }
        throw new InvalidFormException('Invalid submitted data!', $form);
    }

    /**
     * @return Employee
     */
    private function createEmployee()
    {
        return (new \ReflectionClass($this->entityClassName))->newInstance();
    }
}