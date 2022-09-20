<?php

namespace App\DataFixtures;

use App\Entity\Division;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class DivisionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $division1 = new Division();
            $division1->setDivision('Actuarial',);
            $manager->persist($division1);
            //enregistre la division dans une reference
            $this->addReference('division_1',$division1);
        $division2 = new Division();
            $division2->setDivision('Administration',);
            $manager->persist($division2);
            //enregistre la division dans une reference
            $this->addReference('division_2',$division2);
        $division3 = new Division();
            $division3->setDivision('Audit',);
            $manager->persist($division3);
            //enregistre la division dans une reference
            $this->addReference('division_3',$division3);
        $division4 = new Division();
            $division4->setDivision('Specialist Fields',);
            $manager->persist($division4);
            //enregistre la division dans une reference
            $this->addReference('division_4',$division4);
        $division5 = new Division();
            $division5->setDivision('Banking & Finance',);
            $manager->persist($division5);
            //enregistre la division dans une reference
            $this->addReference('division_5',$division5);
        $division6 = new Division();
            $division6->setDivision('Banking Operations',);
            $manager->persist($division6);
            //enregistre la division dans une reference
            $this->addReference('division_6',$division6);
        $division7 = new Division();
            $division7->setDivision('Bids & Proposals',);
            $manager->persist($division7);
            //enregistre la division dans une reference
            $this->addReference('division_7',$division7);
        $manager->flush();
    }
}
