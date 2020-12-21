<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\Client;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        // $product = new Product();
        // $manager->persist($product);
        $numero = 0340000001;
        for ($i = 0; $i < 10; $i++) {
            $customer = new Client();
            $customer->setNom($faker->firstName);
            $num = strval($numero+$i);
            $customer->setNumero($num);
            $manager->persist($customer);
        }

        $manager->flush();
    }
}
