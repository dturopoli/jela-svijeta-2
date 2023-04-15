<?php

namespace App\DataFixtures;

use App\Entity\MealTag;
use App\Entity\MealTranslation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MealTagFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [
            TagFixtures::class,
            MealFixtures::class,
        ];
    }
    
    public function load(ObjectManager $manager): void
    {
        $containsEggs = $this->getReference(TagFixtures::CONTAINS_EGGS_REFERENCE);
        $dairyFree = $this->getReference(TagFixtures::DAIRY_FREE_REFERENCE);
        $easyToMake = $this->getReference(TagFixtures::EASY_TO_MAKE_REFERENCE);
        
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
                'tag' => $containsEggs,
            ],
            [
                'meal' => $friedEggs,
                'tag' => $dairyFree,
            ],
            [
                'meal' => $friedEggs,
                'tag' => $easyToMake,
            ],
            [
                'meal' => $friedEggsWithCheese,
                'tag' => $containsEggs,
            ],
            [
                'meal' => $friedEggsWithCheese,
                'tag' => $dairyFree,
            ],
            [
                'meal' => $friedEggsWithCheese,
                'tag' => $easyToMake,
            ],
            [
                'meal' => $pastaWithEggs,
                'tag' => $containsEggs,
            ],
            [
                'meal' => $pastaWithEggs,
                'tag' => $easyToMake,
            ],
            [
                'meal' => $pastaWithEggsAndCheese,
                'tag' => $containsEggs,
            ],
            [
                'meal' => $pastaWithEggsAndCheese,
                'tag' => $easyToMake,
            ],
            [
                'meal' => $chocoCake,
                'tag' => $containsEggs,
            ],
            [
                'meal' => $strawberryCake,
                'tag' => $containsEggs,
            ],
            [
                'meal' => $fruitSalad,
                'tag' => $easyToMake,
            ],
            [
                'meal' => $fruitSalad,
                'tag' => $dairyFree,
            ],
            [
                'meal' => $chocoStrawberry,
                'tag' => $easyToMake,
            ],
        ];
        
        foreach ($data as $row) {
            $mealTag = new MealTag();
            
            $mealTag->setMeal($row['meal']);
            $mealTag->setTag($row['tag']);
            
            $manager->persist($mealTag);
        }
        
        $manager->flush();
    }
}
