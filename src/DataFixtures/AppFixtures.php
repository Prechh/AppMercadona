<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Generator;
use Faker\Factory;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
  private Generator $faker;

  public function __construct()
  {
    $this->faker = Factory::create('fr_FR');
  }

  public function load(ObjectManager $manager): void
  {
    for ($i = 0; $i < 1; $i++) {
      $user = new User();
      $user->setEmail('admin@mercadona.com')
        ->setRoles(['ROLE_ADMIN'])
        ->setPlainPassword('password');


      $manager->persist($user);
    }

    $manager->flush();
  }
}
