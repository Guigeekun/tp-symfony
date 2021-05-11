<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Comment;
use Faker;
use \DateTime;


class CommentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $com = new Comment();
            $com->setName($faker->name());
            $com->setEmail($faker->email());
            $com->setComment($faker->words(35, true));
            $com->setCreatedAt(new DateTime());
            $com->setArticle($this->getReference(AppFixtures::ARTICLE_REFERENCE));
            $manager->persist($com);
        }

        $manager->flush();
    }
}
