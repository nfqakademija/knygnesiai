<?php

namespace App\DataFixtures\ORM;

use App\Entity\User\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class UserFixtures
 */
class UserFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = (new User())
            ->setName('Jon')
            ->setEmail('jon@jon.eu')
            ->setPhone('+37012345678');
        $manager->persist($user);
        $user = (new User())
            ->setName('Jonas')
            ->setEmail('jonas@jon.eu')
            ->setPhone('+37012345678');
        $manager->persist($user);
        $user = (new User())
            ->setName('Rob')
            ->setEmail('rob@rob.eu')
            ->setPhone('+37012345678');
        $manager->persist($user);

        $manager->flush();
    }
}
