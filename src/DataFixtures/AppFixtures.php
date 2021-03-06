<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;
use Faker;
use \DateTime;

class AppFixtures extends Fixture
{

    public const ARTICLE_REFERENCE = 'article';

    public function load(ObjectManager $manager)
    {

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 3; $i++) {
            $art = new Article();
            $art->setTitle($faker->catchPhrase());
            $art->setSubtitle($faker->catchPhrase());
            $art->setCreatedAt(new DateTime());
            $art->setAuthor($faker->name());
            $art->setBody($faker->realText());
            $art->setImage($faker->imageUrl(640, 480, 'animals', true));
            $manager->persist($art);
            
        }
        $this->addReference(self::ARTICLE_REFERENCE, $art);

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
