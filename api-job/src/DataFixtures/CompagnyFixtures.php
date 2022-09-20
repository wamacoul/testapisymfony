<?php

namespace App\DataFixtures;

use App\Entity\Compagny;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CompagnyFixtures extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for($compteur=0;$compteur<100;$compteur++){
            $compagny = new Compagny();
            $compagny->setCompagny($faker->company());
            $manager->persist($compagny);
            //enregistre la compagny dans une reference
            $this->addReference('compagny_'.$compteur,$compagny);            
        }
        $manager->flush();
    }
}
