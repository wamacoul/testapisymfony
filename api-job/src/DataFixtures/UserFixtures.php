<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
   /**
     * l'encoder de mot de passe
     *
     * @param UserPasswordEncoderInterface $encoder
     */
    private $encoder;
   
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder=$encoder;
    }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        
        $faker = Factory::create('fr_FR');
        for($compteur=0;$compteur<25;$compteur++){

            $user=new User();
            $hash=$this->encoder->encodePassword($user,'password');

            $user->setName($faker->firstName()." ".$faker->lastName())
                                ->setEmail($faker->email())
                                ->setPassword($hash)
                                ->setRoles($faker->randomElement([['ROLE_USER'],['ROLE_ADMIN']]))
                                ->setCreatedAt($faker->dateTimeBetween('-6 months'));
            $manager->persist($user); 
            }
        $manager->flush();
    }
}
