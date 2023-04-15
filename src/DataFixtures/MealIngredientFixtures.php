<?php

namespace App\DataFixtures;

use App\Entity\MealIngredient;
use App\Entity\MealTag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MealIngredientFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [
            IngredientFixtures::class,
            MealFixtures::class,
        ];
    }
    
    public function load(ObjectManager $manager): void
    {
        $egg = $this->getReference(IngredientFixtures::EGG_REFERENCE);
        $milk = $this->getReference(IngredientFixtures::MILK_REFERENCE);
        $cheese = $this->getReference(IngredientFixtures::CHEESE_REFERENCE);
        $pasta = $this->getReference(IngredientFixtures::PASTA_REFERENCE);
        $sunflowerOil = $this->getReference(IngredientFixtures::SUNFLOWER_OIL_REFERENCE);
        $chocolate = $this->getReference(IngredientFixtures::CHOCOLATE_REFERENCE);
        $strawberry = $this->getReference(IngredientFixtures::STRAWBERRY_REFERENCE);
        $kiwi = $this->getReference(IngredientFixtures::KIWI_REFERENCE);
        
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
                'ingredient' => $egg,
            ],
            [
                'meal' => $friedEggs,
                'ingredient' => $sunflowerOil,
            ],
            [
                'meal' => $friedEggsWithCheese,
                'ingredient' => $egg,
            ],
            [
                'meal' => $friedEggsWithCheese,
                'ingredient' => $sunflowerOil,
            ],
            [
                'meal' => $friedEggsWithCheese,
                'ingredient' => $cheese,
            ],
            [
                'meal' => $pastaWithEggs,
                'ingredient' => $pasta,
            ],
            [
                'meal' => $pastaWithEggs,
                'ingredient' => $egg,
            ],
            [
                'meal' => $pastaWithEggsAndCheese,
                'ingredient' => $pasta,
            ],
            [
                'meal' => $pastaWithEggsAndCheese,
                'ingredient' => $egg,
            ],
            [
                'meal' => $pastaWithEggsAndCheese,
                'ingredient' => $cheese,
            ],
            [
                'meal' => $chocoCake,
                'ingredient' => $egg,
            ],
            [
                'meal' => $chocoCake,
                'ingredient' => $milk,
            ],
            [
                'meal' => $chocoCake,
                'ingredient' => $chocolate,
            ],
            [
                'meal' => $strawberryCake,
                'ingredient' => $egg,
            ],
            [
                'meal' => $strawberryCake,
                'ingredient' => $milk,
            ],
            [
                'meal' => $strawberryCake,
                'ingredient' => $strawberry,
            ],
            [
                'meal' => $fruitSalad,
                'ingredient' => $strawberry,
            ],
            [
                'meal' => $fruitSalad,
                'ingredient' => $kiwi,
            ],
            [
                'meal' => $chocoStrawberry,
                'ingredient' => $strawberry,
            ],
            [
                'meal' => $chocoStrawberry,
                'ingredient' => $chocolate,
            ],
        ];
        
        foreach ($data as $row) {
            $mealIngredient = new MealIngredient();
            
            $mealIngredient->setMeal($row['meal']);
            $mealIngredient->setIngredient($row['ingredient']);
            
            $manager->persist($mealIngredient);
        }
        
        $manager->flush();
    }
}
