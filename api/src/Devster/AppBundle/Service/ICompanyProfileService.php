<?php
/**
 * Created by PhpStorm.
 * User: fonpah
 * Date: 20.03.2015
 * Time: 17:54
 */

namespace Devster\AppBundle\Service;


use Devster\AppBundle\Entity\CompanyProfile;

/**
 * Interface ICompanyProfileService
 * @package Devster\AppBundle\Service
 */
interface ICompanyProfileService
{
    /**
     * @API
     * @param $id
     * @return \Devster\AppBundle\Entity\CompanyProfile
     */
    public function getCompanyProfileById($id);

    /**
     * @API
     * @param CompanyProfile $companyProfile
     * @param array $parameters
     * @return \Devster\AppBundle\Entity\CompanyProfile
     */
    public function put(CompanyProfile $companyProfile, array $parameters);

    /**
     * @API
     * @param CompanyProfile $companyProfile
     * @param array $parameters
     * @return \Devster\AppBundle\Entity\CompanyProfile
     */
    public function patch(CompanyProfile $companyProfile, array $parameters);
}