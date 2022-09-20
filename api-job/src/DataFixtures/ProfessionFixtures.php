<?php

namespace App\DataFixtures;

use App\Entity\Profession;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProfessionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for($compteur=0;$compteur<100;$compteur++){
            $profession = new Profession();
            $profession->setProfession($faker->jobTitle());
            $manager->persist($profession);
            //enregistre la profession dans une reference
            $this->addReference('profession_'.$compteur,$profession);            
        }
        $manager->flush();
    }
}
