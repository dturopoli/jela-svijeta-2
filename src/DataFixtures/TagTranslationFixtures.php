<?php

namespace App\DataFixtures;

use App\Entity\TagTranslation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TagTranslationFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [
            LanguageFixtures::class,
            TagFixtures::class,
        ];
    }
    
    public function load(ObjectManager $manager): void
    {
        $en = $this->getReference(LanguageFixtures::EN_LANGUAGE_REFERENCE);
        $hr = $this->getReference(LanguageFixtures::HR_LANGUAGE_REFERENCE);
        
        $containsEggs = $this->getReference(TagFixtures::CONTAINS_EGGS_REFERENCE);
        $dairyFree = $this->getReference(TagFixtures::DAIRY_FREE_REFERENCE);
        $easyToMake = $this->getReference(TagFixtures::EASY_TO_MAKE_REFERENCE);
        
        $enContainsEggs = new TagTranslation();
        $enContainsEggs->setTag($containsEggs);
        $enContainsEggs->setLanguage($en);
        $enContainsEggs->setTitle('Contains eggs');
        $manager->persist($enContainsEggs);
        
        $hrContainsEggs = new TagTranslation();
        $hrContainsEggs->setTag($containsEggs);
        $hrContainsEggs->setLanguage($hr);
        $hrContainsEggs->setTitle('Sadrži jaja');
        $manager->persist($hrContainsEggs);
        
        $enDairyFree = new TagTranslation();
        $enDairyFree->setTag($dairyFree);
        $enDairyFree->setLanguage($en);
        $enDairyFree->setTitle('Dairy free');
        $manager->persist($enDairyFree);
        
        $hrDairyFree = new TagTranslation();
        $hrDairyFree->setTag($dairyFree);
        $hrDairyFree->setLanguage($hr);
        $hrDairyFree->setTitle('Bez mliječnih proizvoda');
        $manager->persist($hrDairyFree);
        
        $enEasyToMake = new TagTranslation();
        $enEasyToMake->setTag($easyToMake);
        $enEasyToMake->setLanguage($en);
        $enEasyToMake->setTitle('Easy to make');
        $manager->persist($enEasyToMake);
        
        $hrEasyToMake = new TagTranslation();
        $hrEasyToMake->setTag($easyToMake);
        $hrEasyToMake->setLanguage($hr);
        $hrEasyToMake->setTitle('Lako za napraviti');
        $manager->persist($hrEasyToMake);
        
        $manager->flush();
    }
}
