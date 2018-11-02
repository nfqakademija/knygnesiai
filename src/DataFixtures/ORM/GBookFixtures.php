<?php

namespace App\DataFixtures\ORM;

use App\DataFixtures\ORM\Traits\WithFileManagementTrait;
use App\DataFixtures\ORM\Traits\WithRandomsTrait;
use App\Entity\Book\Book;
use App\Entity\Category\Category;
use App\Entity\Media\Media;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class BookFixtures
 */
class GBookFixtures extends Fixture
{
    use WithFileManagementTrait,
        WithRandomsTrait;

    const COUNT_BOOKS = 20;

    /**
     * @var array
     */
    public static $names = [
        'Arts',
        'Start',
        'Wars',
        'Kids',
        'Snow',
        'Good',
        'Fantasy',
        'Rock',
        'Sport',
        'History',
        'Horror',
        'Medical',
        'Lion',
        'Info',
        'Fantasy',
        'Travel',
        'Law',
        'Westerns',
        'C++',
        'Garden',

    ];

    /**
     * @var array
     */
    public static $descriptions = [
        'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
        'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.'
    ];

    /**
     * @var array
     */
    public static $authors = [
        'Jon Snow',
        'Mike Roof',
        'Berlin Vaton',
        'Like Name',
        'Boom Boom',
    ];


    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $categories = $manager->getRepository(Category::class)->findAll();

        for ($i = 0; $i < self::COUNT_BOOKS; $i++) {
            $media = (new Media())
                ->setFile($this->randomImage('book', '.jpg'));

            $category = $categories[(rand(0, sizeof($categories) - 1))];
            $name = self::$names[(rand(0, sizeof(self::$names) - 1))];
            $description = self::$descriptions[(rand(0, sizeof(self::$descriptions) - 1))];
            $author = self::$authors[(rand(0, sizeof(self::$authors) - 1))];


            $book = (new Book())
                ->setName($name)
                ->setDescription($description)
                ->setAuthor($author)
                ->setYearPublication(rand(1965, 2017))
                ->setPageCount(rand(50, 350))
                ->setStatus(rand(0, 1))
                ->setCountLike(rand(0, 25))
                ->setMedia($media)
                ->setCategory($category);

            $manager->persist($media);
            $manager->persist($book);
            $manager->persist($category);

        }

        $manager->flush();
    }
}
