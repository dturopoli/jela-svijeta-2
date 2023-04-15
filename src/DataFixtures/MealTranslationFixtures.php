<?php

namespace App\DataFixtures;

use App\Entity\MealTranslation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MealTranslationFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [
            LanguageFixtures::class,
            MealFixtures::class,
        ];
    }
    
    public function load(ObjectManager $manager): void
    {
        $en = $this->getReference(LanguageFixtures::EN_LANGUAGE_REFERENCE);
        $hr = $this->getReference(LanguageFixtures::HR_LANGUAGE_REFERENCE);
        
        $friedEggs = $this->getReference(MealFixtures::FRIED_EGG_REFERENCE);
        $friedEggsWithCheese = $this->getReference(MealFixtures::FRIED_EGG_WITH_CHEESE_REFERENCE);
        $pastaWithEggs = $this->getReference(MealFixtures::PASTA_WITH_EGGS_REFERENCE);
        $pastaWithEggsAndCheese = $this->getReference(MealFixtures::PASTA_WITH_EGGS_AND_CHEESE_REFERENCE);
        $chocoCake = $this->getReference(MealFixtures::CHOCO_CAKE_REFERENCE);
        $strawberryCake = $this->getReference(MealFixtures::STRAWBERRY_CAKE_REFERENCE);
        $fruitSalad = $this->getReference(MealFixtures::FRUIT_SALAD_REFERENCE);
        $chocoStrawberry = $this->getReference(MealFixtures::CHOCO_STRAWBERRY_REFERENCE);
        
        $data = [
            [
                'meal' => $friedEggs,
                'titleEn' => 'Fried eggs',
                'titleHr' => 'Jaje na oko',
            ],
            [
                'meal' => $friedEggsWithCheese,
                'titleEn' => 'Fried eggs with cheese',
                'titleHr' => 'Jaje na oko sa sirom',
            ],
            [
                'meal' => $pastaWithEggs,
                'titleEn' => 'Pasta with eggs',
                'titleHr' => 'Tjestenina s jajima',
            ],
            [
                'meal' => $pastaWithEggsAndCheese,
                'titleEn' => 'Pasta with eggs and cheese',
                'titleHr' => 'Tjestenina s jajima i sirom',
            ],
            [
                'meal' => $chocoCake,
                'titleEn' => 'Choco cake',
                'titleHr' => 'Čokoladna torta',
            ],
            [
                'meal' => $strawberryCake,
                'titleEn' => 'Strawberry cake',
                'titleHr' => 'Torta s jagodama',
            ],
            [
                'meal' => $fruitSalad,
                'titleEn' => 'Fruit salad',
                'titleHr' => 'Voćna salata',
            ],
            [
                'meal' => $chocoStrawberry,
                'titleEn' => 'Choco strawberry',
                'titleHr' => 'Jagode s čokoladom',
            ],
        ];
        
        foreach ($data as $row) {
            $enMeal = new MealTranslation();
            $hrMeal = new MealTranslation();
            
            $enMeal->setLanguage($en);
            $hrMeal->setLanguage($hr);
            
            $enMeal->setMeal($row['meal']);
            $hrMeal->setMeal($row['meal']);
            
            $enMeal->setTitle($row['titleEn']);
            $hrMeal->setTitle($row['titleHr']);
            
            $enMeal->setDescription('Nice food!');
            $hrMeal->setDescription('Fina hrana!');
            
            $manager->persist($enMeal);
            $manager->persist($hrMeal);
        }
        
        $manager->flush();
    }
}
