<?php

namespace App\DataFixtures;

use App\Entity\Meal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MealFixtures extends Fixture implements DependentFixtureInterface
{
    public const FRIED_EGG_REFERENCE = 'friedEggs';
    public const FRIED_EGG_WITH_CHEESE_REFERENCE = 'friedEggsWithCheese';
    public const PASTA_WITH_EGGS_REFERENCE = 'pastaWithEggs';
    public const PASTA_WITH_EGGS_AND_CHEESE_REFERENCE = 'pastaWithEggsAndCheese';
    public const CHOCO_CAKE_REFERENCE = 'chocoCake';
    public const STRAWBERRY_CAKE_REFERENCE = 'strawberryCake';
    public const FRUIT_SALAD_REFERENCE = 'fruitSalad';
    public const CHOCO_STRAWBERRY_REFERENCE = 'chocoStrawberry';
    
    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
    
    public function load(ObjectManager $manager): void
    {
        $mainCourse = $this->getReference(CategoryFixtures::MAIN_COURSE_REFERENCE);
        $dessert = $this->getReference(CategoryFixtures::DESSERT_REFERENCE);
        
        $friedEggs = new Meal();
        $manager->persist($friedEggs);
        
        $friedEggsWithCheese = new Meal();
        $manager->persist($friedEggsWithCheese);
        
        $pastaWithEggsAndCheese = new Meal();
        $pastaWithEggsAndCheese->setCategory($mainCourse);
        $manager->persist($pastaWithEggsAndCheese);
        
        $pastaWithEggs = new Meal();
        $pastaWithEggs->setCategory($mainCourse);
        $manager->persist($pastaWithEggs);
        
        $chocoCake = new Meal();
        $chocoCake->setCategory($dessert);
        $manager->persist($chocoCake);
        
        $strawberryCake = new Meal();
        $strawberryCake->setCategory($dessert);
        $manager->persist($strawberryCake);
        
        $fruitSalad = new Meal();
        $fruitSalad->setCategory($dessert);
        $manager->persist($fruitSalad);
        
        $chocoStrawberry = new Meal();
        $chocoStrawberry->setCategory($dessert);
        $manager->persist($chocoStrawberry);
        
        $manager->flush();
        
        $this->addReference(self::FRIED_EGG_REFERENCE, $friedEggs);
        $this->addReference(self::FRIED_EGG_WITH_CHEESE_REFERENCE, $friedEggsWithCheese);
        $this->addReference(self::PASTA_WITH_EGGS_REFERENCE, $pastaWithEggs);
        $this->addReference(self::PASTA_WITH_EGGS_AND_CHEESE_REFERENCE, $pastaWithEggsAndCheese);
        $this->addReference(self::CHOCO_CAKE_REFERENCE, $chocoCake);
        $this->addReference(self::STRAWBERRY_CAKE_REFERENCE, $strawberryCake);
        $this->addReference(self::FRUIT_SALAD_REFERENCE, $fruitSalad);
        $this->addReference(self::CHOCO_STRAWBERRY_REFERENCE, $chocoStrawberry);
    }
}