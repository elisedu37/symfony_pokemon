<?php

namespace App\DataFixtures;

use App\Entity\Label;
use App\Entity\Pokemon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $pokemon = new Pokemon();
            $pokemon->setNom('nom' . $i);
            $pokemon->setDescription('description' . $i);
            $pokemon->setType('type' . $i);
            $manager->persist($pokemon);

            $label = new Label();
            $label->setType('type'. $i);
            $manager->persist($label);
        }
        $manager->flush();
    }
}
