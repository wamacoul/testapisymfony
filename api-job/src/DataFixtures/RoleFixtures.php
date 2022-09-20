<?php

namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for($compteur=0;$compteur<100;$compteur++){
            $role = new Role();
            $role->setRole($faker->jobTitle());
            $manager->persist($role);
            //enregistre le role dans une reference
            $this->addReference('role_'.$compteur,$role);            
        }
        $manager->flush();
    }
}
