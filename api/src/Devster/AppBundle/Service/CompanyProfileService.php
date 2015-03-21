<?php
/**
 * Created by PhpStorm.
 * User: fonpah
 * Date: 20.03.2015
 * Time: 17:53
 */

namespace Devster\AppBundle\Service;


use Devster\AppBundle\Entity\CompanyProfile;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;

/**
 * Class CompanyProfileService
 * @package Devster\AppBundle\Service
 */
class CompanyProfileService implements  ICompanyProfileService
{
    /**
     * @var ObjectManager
     */
    private $om;
    /**
     * @var string
     */
    private $entityClass;
    /**
     * @var ObjectRepository
     */
    private $respository;

    /**
     * @param ObjectManager     $om
     * @param string            $entityClass
     */
    public function __construct(ObjectManager $om, $entityClass){
        $this->om = $om;
        $this->entityClass = $entityClass;
        $this->respository = $this->om->getRepository($this->entityClass);
    }

    /**
     * Get company profile by id
     *
     * @API
     * @param $id
     * @return CompanyProfile
     */
    public function getCompanyProfileById($id){

        return $this->respository->find($id);
    }

    /**
     * Edit Company's Profile
     * @API
     * @param CompanyProfile    $companyProfile
     * @param array             $data
     * @return CompanyProfile
     */
    public function put(CompanyProfile $companyProfile,array $data){
        return $this->processForm($companyProfile, $data, 'PUT');
    }


    /**
     * Partially Updating Company's Profiles
     *
     * @API
     *
     * @param CompanyProfile    $companyProfile
     * @param array             $data
     * @return CompanyProfile
     */
    public function patch(CompanyProfile $companyProfile, array $data){
        return $this->processForm($companyProfile, $data, 'PATCH');
    }

    /**
     * @return CompanyProfile
     */
    private function createCompanyProfile(){
        return (new \ReflectionClass($this->entityClass))->newInstance();
    }

    private function processForm(CompanyProfile $companyProfile, array $data, $method='PUT'){

    }

}