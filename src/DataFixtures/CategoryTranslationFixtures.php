<?php

namespace App\DataFixtures;

use App\Entity\CategoryTranslation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CategoryTranslationFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [
            LanguageFixtures::class,
            CategoryFixtures::class,
        ];
    }
    
    public function load(ObjectManager $manager): void
    {
        $en = $this->getReference(LanguageFixtures::EN_LANGUAGE_REFERENCE);
        $hr = $this->getReference(LanguageFixtures::HR_LANGUAGE_REFERENCE);
        
        $appetizer = $this->getReference(CategoryFixtures::APPETIZER_REFERENCE);
        $mainCourse = $this->getReference(CategoryFixtures::MAIN_COURSE_REFERENCE);
        $dessert = $this->getReference(CategoryFixtures::DESSERT_REFERENCE);
        
        $enAppetizer = new CategoryTranslation();
        $enAppetizer->setCategory($appetizer);
        $enAppetizer->setLanguage($en);
        $enAppetizer->setTitle('Appetizer');
        $manager->persist($enAppetizer);
        
        $hrAppetizer = new CategoryTranslation();
        $hrAppetizer->setCategory($appetizer);
        $hrAppetizer->setLanguage($hr);
        $hrAppetizer->setTitle('Predjelo');
        $manager->persist($hrAppetizer);
        
        $enMainCourse = new CategoryTranslation();
        $enMainCourse->setCategory($mainCourse);
        $enMainCourse->setLanguage($en);
        $enMainCourse->setTitle('Main course');
        $manager->persist($enMainCourse);
        
        $hrMainCourse = new CategoryTranslation();
        $hrMainCourse->setCategory($mainCourse);
        $hrMainCourse->setLanguage($hr);
        $hrMainCourse->setTitle('Glavno jelo');
        $manager->persist($hrMainCourse);
        
        $enDessert = new CategoryTranslation();
        $enDessert->setCategory($dessert);
        $enDessert->setLanguage($en);
        $enDessert->setTitle('Dessert');
        $manager->persist($enDessert);
        
        $hrDessert = new CategoryTranslation();
        $hrDessert->setCategory($dessert);
        $hrDessert->setLanguage($hr);
        $hrDessert->setTitle('Desert');
        $manager->persist($hrDessert);
        
        $manager->flush();
    }
}
