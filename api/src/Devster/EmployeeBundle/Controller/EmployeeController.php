<?php

namespace Devster\EmployeeBundle\Controller;

use Devster\EmployeeBundle\Service\EmployeeService;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\Controller\Annotations;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class EmployeeController
 * @package Devster\EmployeeBundle\Controller
 */
class EmployeeController extends FOSRestController
{
    /**
     * List all Employees.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request               $request      the request object
     * @param ParamFetcherInterface $paramFetcher param fetcher service
     *
     * @return array
     */
    public function indexAction(Request $request, ParamFetcherInterface $paramFetcherInterface)
    {

    }
    /**
     * Get a single Employee.
     *
     * @ApiDoc(
     *   output = "Devster\EmployeeBundle\Entity\Employee",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the note is not found"
     *   }
     * )
     *
     * @Annotations\View(templateVar="employee")
     *
     * @param Request $request the request object
     * @param int     $id      the employee id
     *
     * @return array
     *
     * @throws NotFoundHttpException when note not exist
     */
    public function viewAction(Request $request, $id)
    {

    }
    /**
     * Creates a new employee from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *   template = "",
     *   statusCode = Codes::HTTP_BAD_REQUEST
     * )
     *
     * @param Request $request the request object
     *
     * @return null
     */
    public function postAction(Request $request)
    {

    }
    /**
     * Update existing employee from the submitted data or create a new note at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "",
     *   statusCodes = {
     *     201 = "Returned when a new resource is created",
     *     204 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *   template="",
     *   templateVar="form"
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the employee id
     *
     * @return null
     *
     * @throws NotFoundHttpException when note not exist
     */
    public function putAction(Request $request, $id)
    {

    }
    /**
     * Presents the form to use to update an existing employee.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes={
     *     200 = "Returned when successful",
     *     404 = "Returned when the note is not found"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request $request the request object
     * @param int     $id      the employee id
     *
     * @return FormTypeInterface
     *
     * @throws NotFoundHttpException when note not exist
     */
    public function editAction()
    {

    }
    /**
     * Removes a Employee.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes={
     *     204="Returned when successful"
     *   }
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the employee id
     *
     * @return null
     */
    public function deleteAction(Request $request, $id)
    {

    }

    /**
     * Presents the form to use to create a new Employee.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @return null
     */
    public function createAction()
    {

    }

    /**
     * @return EmployeeService
     */
    private function getService()
    {
        return $this->container->get('devster_employee.employee.service');
    }
}
