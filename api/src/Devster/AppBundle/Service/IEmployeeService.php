<?php
/**
 * Created by PhpStorm.
 * User: fonpah
 * Date: 21.03.2015
 * Time: 00:30
 */

namespace Devster\AppBundle\Service;


use Devster\AppBundle\Entity\Employee;

/**
 * Interface IEmployeeService
 * @package Devster\AppBundle\Service
 */
interface IEmployeeService {
    /**
     * Get a list of Employees
     * @API
     * @param int $page the page
     * @param int $limit the number of item per page
     * @return array
     */
    public function all($page=1, $limit=10);

    /**
     * Get a Given Employee by Id
     * @param int $id
     * @return Employees
     */
    public function get($id);

    /**
     * Post a new EMployee, Create a new Employee
     * @API
     * @param array $data
     * @return Employee
     */
    public function post(array $data);

    /**
     * Edit an Employee
     * @API
     * @param Employee $employee
     * @param array $data
     * @return Employee
     */
    public function put(Employee $employee, array $data);


    /**
     * Partially Update Employee
     * @api
     * @param Employee $employee
     * @param array $data
     * @return Employee
     */
    public function patch(Employee $employee, array $data);
}