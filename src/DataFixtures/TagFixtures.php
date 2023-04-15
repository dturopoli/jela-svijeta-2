<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TagFixtures extends Fixture
{
    public const CONTAINS_EGGS_REFERENCE = 'containsEggs';
    public const DAIRY_FREE_REFERENCE = 'dairyFree';
    public const EASY_TO_MAKE_REFERENCE = 'easyToMake';
    
    public function load(ObjectManager $manager): void
    {
        $containsEggs = new Tag();
        $containsEggs->setSlug('containsEggs');
        $manager->persist($containsEggs);
        
        $dairyFree = new Tag();
        $dairyFree->setSlug('dairyFree');
        $manager->persist($dairyFree);
        
        $easyToMake = new Tag();
        $easyToMake->setSlug('easyToMake');
        $manager->persist($easyToMake);
        
        $manager->flush();
        
        $this->addReference(self::CONTAINS_EGGS_REFERENCE, $containsEggs);
        $this->addReference(self::DAIRY_FREE_REFERENCE, $dairyFree);
        $this->addReference(self::EASY_TO_MAKE_REFERENCE, $easyToMake);
    }
}
