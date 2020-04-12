<?php

namespace App\DataFixtures;

use App\Entity\Color;
use App\Entity\User;
use App\Entity\VitesseMax;
use App\Entity\Voiture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encodePassword;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoderInterface)
    {
        $this->encodePassword = $userPasswordEncoderInterface;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        $colorArray = [];

        for ($j = 0; $j < 4; $j++) {
            $color = new Color();
            $color->setName($faker->word())
                ->setHexadecimal($faker->word());

            $manager->persist($color);

            $colorArray[] = $color;
        }

        for ($i = 0; $i < 20; $i++) {
            $voiture = new Voiture();
            $voiture->setName($faker->word())
                ->setVitesseMax($faker->numberBetween(VitesseMax::low, VitesseMax::fast))
                ->setMarque($faker->word())
                ->setModele($faker->word())
                ->setColor($colorArray[$faker->numberBetween('0', count($colorArray) - 1)]);

            $manager->persist($voiture);
        }

        $user = new User();
        $user->setEmail('admin@gmail.com')
            ->setPassword($this->encodePassword->encodePassword($user, "admin"));

        $manager->persist($user);
        $manager->flush();
    }
}
