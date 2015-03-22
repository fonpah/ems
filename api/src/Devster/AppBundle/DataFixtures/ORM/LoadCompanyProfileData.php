<?php
/**
 * Created by PhpStorm.
 * User: fonpah
 * Date: 20.03.2015
 * Time: 15:42
 */

namespace Devster\AppBundle\DataFixtures\ORM;



use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Devster\AppBundle\Entity\CompanyProfile;
class LoadCompanyProfileData implements FixtureInterface {
    /**
     * @param ObjectManager $manager
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager){
        $profile = new CompanyProfile();
        $profile->setAbbreviation('JD');
        $profile->setName('John Doe GmbH');
        $profile->getAdress('Duisburger Str 458 Düsseldorf');
        $profile->setCreatedAt(new \DateTime());
        $profile->setUpdatedAt(new \DateTime());
        $profile->setUpdatedBy(1);
        $profile->setCreatedBy(1);
        $manager->persist($profile);
        $manager->flush();

    }
}