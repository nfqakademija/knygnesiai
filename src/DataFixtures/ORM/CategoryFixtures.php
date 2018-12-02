<?php

namespace App\DataFixtures\ORM;

use App\Entity\Category\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class CategoryFixtures
 */
class CategoryFixtures extends Fixture
{
    const COUNT_CATEGORY = 12;

    /**
     * @var array
     */
    public static $names = [
        'Arts',
        'Biographies',
        'Business',
        'Comics',
        'Computer',
        'Cooking',
        'Fiction',
        'Sport',
        'History',
        'Religion',
        'Travel',
        'Programming',
        'Education'

    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < self::COUNT_CATEGORY; $i++) {

            $category = new Category();
            $category->setTitle(self::$names[$i]);
            $manager->persist($category);
        }

        $manager->flush();
    }
}
