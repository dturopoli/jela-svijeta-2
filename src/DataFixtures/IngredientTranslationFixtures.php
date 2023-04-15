<?php

namespace App\DataFixtures;

use App\Entity\CategoryTranslation;
use App\Entity\IngredientTranslation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class IngredientTranslationFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [
            LanguageFixtures::class,
            IngredientFixtures::class,
        ];
    }
    
    public function load(ObjectManager $manager): void
    {
        $en = $this->getReference(LanguageFixtures::EN_LANGUAGE_REFERENCE);
        $hr = $this->getReference(LanguageFixtures::HR_LANGUAGE_REFERENCE);
        
        $egg = $this->getReference(IngredientFixtures::EGG_REFERENCE);
        $milk = $this->getReference(IngredientFixtures::MILK_REFERENCE);
        $cheese = $this->getReference(IngredientFixtures::CHEESE_REFERENCE);
        $pasta = $this->getReference(IngredientFixtures::PASTA_REFERENCE);
        $sunflowerOil = $this->getReference(IngredientFixtures::SUNFLOWER_OIL_REFERENCE);
        $chocolate = $this->getReference(IngredientFixtures::CHOCOLATE_REFERENCE);
        $strawberry = $this->getReference(IngredientFixtures::STRAWBERRY_REFERENCE);
        $kiwi = $this->getReference(IngredientFixtures::KIWI_REFERENCE);
        
        $data = [
            [
                'ingredient' => $egg,
                'titleEn' => 'Egg',
                'titleHr' => 'Jaje',
            ],
            [
                'ingredient' => $milk,
                'titleEn' => 'Milk',
                'titleHr' => 'Mlijeko',
            ],
            [
                'ingredient' => $cheese,
                'titleEn' => 'Cheese',
                'titleHr' => 'Sir',
            ],
            [
                'ingredient' => $pasta,
                'titleEn' => 'Pasta',
                'titleHr' => 'Tjestenina',
            ],
            [
                'ingredient' => $sunflowerOil,
                'titleEn' => 'Sunflower oil',
                'titleHr' => 'Suncokretovo ulje',
            ],
            [
                'ingredient' => $chocolate,
                'titleEn' => 'Chocolate',
                'titleHr' => 'Čokolada',
            ],
            [
                'ingredient' => $strawberry,
                'titleEn' => 'Strawberry',
                'titleHr' => 'Jagoda',
            ],
            [
                'ingredient' => $kiwi,
                'titleEn' => 'Kiwi',
                'titleHr' => 'Kivi',
            ],
        ];
        
        foreach ($data as $row) {
            $enIngredient = new IngredientTranslation();
            $hrIngredient = new IngredientTranslation();
            
            $enIngredient->setLanguage($en);
            $hrIngredient->setLanguage($hr);
            
            $enIngredient->setIngredient($row['ingredient']);
            $hrIngredient->setIngredient($row['ingredient']);
            
            $enIngredient->setTitle($row['titleEn']);
            $hrIngredient->setTitle($row['titleHr']);
            
            $manager->persist($enIngredient);
            $manager->persist($hrIngredient);
        }
        
        $manager->flush();
    }
}
