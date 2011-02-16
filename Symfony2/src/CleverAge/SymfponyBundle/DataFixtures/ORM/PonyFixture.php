<?php
namespace CleverAge\SymfponyBundle\DataFixtures\ORM;

use CleverAge\SymfponyBundle\Entity\Pony;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\Yaml\Yaml;

class PonyData implements FixtureInterface
{
    public function load($manager)
    {
        $ponys = Yaml::load(__DIR__.'/../../Resources/fixtures/pony.yml');

        foreach ($ponys as $ponyData)
        {
            $pony = new Pony();
            $pony->setName($ponyData['name']);
            $pony->setDescription($ponyData['description']);
            $pony->setPictureUrl($ponyData['picture_url']);
            $manager->persist($pony);
        }

        $manager->flush();
    }
}