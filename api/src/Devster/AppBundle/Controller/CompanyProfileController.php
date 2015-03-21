<?php

namespace Devster\AppBundle\Controller;

use Devster\AppBundle\Entity\CompanyProfile;
use Devster\AppBundle\Service\CompanyProfileService;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class CompanyProfileController extends FOSRestController
{
    /**
     * @param null
     * @return CompanyProfile
     * @ApiDoc(
     * resource=true,
     * description =" Returns the company's profile",
     * output = "\Devster\AppBundle\Entity\CompanyProfile",
     * statusCodes = {

     *      200 ="Returned when successful",
     *      404 = "Returned when the company's profile could not be found"
     *
     * }

     * )
     */
    public function viewAction()
    {
        $companyProfile = $this->getOr404(1);
        return $this->view(['companyProfile'=>$companyProfile, 'success'=>true],Codes::HTTP_OK);
    }

    /**
     * Fetch the Company profile or throw a 404 exception
     * @param $id
     * @return CompanyProfile
     * @throws ResourceNotFoundException
     */
    public function getOr404($id){
        $service = $this->getService();
        if(!($companyProfile = $service->getCompanyProfileById($id))){
            throw new ResourceNotFoundException(sprintf('The resource \'%s\' qas not found.', $id));
        }
        return $companyProfile;
    }

    /**
     * @return CompanyProfileService
     */
    private function getService(){
        return  $this->container->get('devster_app.company_profile.service');
    }
}
