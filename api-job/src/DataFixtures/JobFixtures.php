<?php

namespace App\DataFixtures;

use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class JobFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for($compteur=0;$compteur<100;$compteur++){
            $compagny=$this->getReference('compagny_'.$faker->numberBetween(0,99));
            $divisionn=$this->getReference('division_'.$faker->numberBetween(1,7));
            $profession=$this->getReference('profession_'.$faker->numberBetween(0,99));
            $role=$this->getReference('role_'.$faker->numberBetween(0,99));
            $job = new Job();
            $job->setJob($faker->jobTitle())
                ->setJobRef($faker->regexify('[A-Z]{20}').$faker->regexify('[0-9]{20}'))
                ->setLink($faker->url())
                ->setRefkey($faker->regexify('[A-Za-z0-9]{20}'))
                ->setDatePublished($faker->dateTimeBetween('-6 months'))
                ->setCompagny($compagny)
                ->setDivision($divisionn)
                ->setProfession($profession)
                ->setRole($role);
            $manager->persist($job);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            CompagnyFixtures::class,
            DivisionFixtures::class,
            ProfessionFixtures::class,
            RoleFixtures::class,
        ];
    }
}
