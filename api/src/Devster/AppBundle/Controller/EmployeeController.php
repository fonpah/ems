<?php

namespace Devster\AppBundle\Controller;

use Devster\AppBundle\Entity\Employee;
use Devster\AppBundle\Exception\InvalidFormException;
use Devster\AppBundle\Form\Type\EmployeeType;
use Devster\AppBundle\Service\EmployeeService;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\Controller\Annotations;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * Class EmployeeController
 * @package Devster\AppBundle\Controller
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
     * @Annotations\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing pages.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="5", description="How many pages to return.")
     *
     * @Annotations\View
     *    templateVar = "employees"
     * )
     *
     * @param Request               $request      the request object
     * @param ParamFetcherInterface $paramFetcher param fetcher service
     *
     * @return array
     */
    public function getEmployeesAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $offset = $paramFetcher->get('offset');
        $offset = null == $offset ? 0 : $offset;
        $limit = $paramFetcher->get('limit');
        return $this->getService()->all($offset, $limit);
    }
    /**
     * Get a single Employee.
     *
     * @ApiDoc(
     *   output = "Devster\AppBundle\Entity\Employee",
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
     * @return Employee
     *
     * @throws NotFoundHttpException when note not exist
     */
    public function getEmployeeAction(Request $request, $id)
    {
        return $this->getOr404($id);
    }
    /**
     * Creates a new employee from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "Devster\AppBundle\Form\Type\EmployeeType",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *   template = "DevsterAppBundle:Employee:newEmployee.html.twig",
     *   templateVar= "form",
     *   statusCode = Codes::HTTP_BAD_REQUEST
     * )
     *
     * @param Request $request the request object
     *
     * @return FormTypeInterface|View
     */
    public function postEmployeeAction(Request $request)
    {
        try{
            $newEmployee = $this->getService()->post($request->request->all());
            $routeOpts = [
              'id' => $newEmployee->getId(),
                '_format'=> $request->get('_format')
            ];
            return $this->routeRedirectView('api_v1_get_employee', $routeOpts, Codes::HTTP_CREATED);
        }catch (InvalidFormException $e){
            return $e->getForm();
        }
    }
    /**
     * Update existing employee from the submitted data .
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "Devster\AppBundle\Form\Type\EmployeeType",
     *   statusCodes = {
     *     201 = "Returned when a new resource is created",
     *     204 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *   template="DevsterAppBundle:Employee:editEmployee.html.twig",
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
    public function putEmployeeAction(Request $request, $id)
    {
        try{
            $employee = $this->getService()->put($this->getOr404($id), $request->request->all());

            $routeOpts = [
                'id' => $employee->getId(),
                '_format' => $request->get('_format')
            ];
            return $this->routeRedirectView('api_1_get_employee', $routeOpts, Codes::HTTP_NO_CONTENT);
        }
        catch(InvalidFormException $e){
            return $e->getForm();
        }
    }
    /**
     * Presents the form to use to update an existing employee.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "",
     *   statusCodes={
     *     200 = "Returned when successful",
     *     404 = "Returned when the employee is not found"
     *   }
     * )
     *
     * @Annotations\View(
     *    template="DevsterAppBundle:Employee:editEmployee.html.twig",
     *    templateVar = "form"
     *
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the employee id
     *
     * @return FormTypeInterface | View
     *
     * @throws NotFoundHttpException when note not exist
     */
    public function patchEmployeeAction(Request $request, $id)
    {
        try{
            $employee = $this->getService()->patch($this->getOr404($id), $request->request->all());

            $routeOpts = [
                'id' => $employee->getId(),
                '_format' => $request->get('_format')
            ];

            return $this->routeRedirectView('api_1_get_employee', $routeOpts, Codes::HTTP_NO_CONTENT);
        }catch (InvalidFormException $e){
            return $e->getForm();
        }

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
     * @Annotations\View(
     * statusCode = 204
     *
     * )
     * @param Request $request the request object
     * @param int     $id      the employee id
     * @throws NotFoundHttpException when note not exist
     * @return bool
     */
    public function deleteEmployeeAction(Request $request, $id)
    {
       return $this->getService()->delete($this->getOr404($id));

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
     * @Annotations\View(
     *  template="DevsterAppBundle:Employee:createEmployee.html.twig",
     *  templateVar = "form"
     * )
     *
     * @return FormTypeInterface
     */
    public function newEmployeeAction()
    {
        return $this->createForm(new EmployeeType());
    }

    /**
     * @return EmployeeService
     */
    protected function getService()
    {
        return $this->container->get('devster_employee.employee.service');
    }

    protected function getOr404($id){
        $service = $this->getService();
        if(!($employee = $service->get($id))){
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.',$id));
        }
        return $employee;
    }
}
