<?php

namespace App\DataFixtures;

use App\Entity\Category\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class CategoryFixtures
 */
class CategoryFixtures extends Fixture
{
    const COUNT_CATEGORY = 22;

    /**
     * @var array
     */
    public static $names = [
        'Arts',
        'Biographies',
        'Business',
        'Kids',
        'Comics',
        'Computer',
        'Cooking',
        'Reference',
        'Sport',
        'History',
        'Horror',
        'Medical',
        'Religion',
        'Romance',
        'Fantasy',
        'Travel',
        'Law',
        'Westerns',
        'Programming',
        'Garden',
        'Education',
        'Poem'

    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < self::COUNT_CATEGORY; $i++) {

            $category = new Category();
            $category->setName(self::$names[$i]);
            $manager->persist($category);
        }

        $manager->flush();
    }
}
