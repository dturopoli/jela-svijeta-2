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
        
        $enEgg = new IngredientTranslation();
        $enEgg->setIngredient($egg);
        $enEgg->setLanguage($en);
        $enEgg->setTitle('Egg');
        $manager->persist($enEgg);
        
        $hrEgg = new IngredientTranslation();
        $hrEgg->setIngredient($egg);
        $hrEgg->setLanguage($hr);
        $hrEgg->setTitle('Jaje');
        $manager->persist($hrEgg);
        
        $enMilk = new IngredientTranslation();
        $enMilk->setIngredient($milk);
        $enMilk->setLanguage($en);
        $enMilk->setTitle('Milk');
        $manager->persist($enMilk);
        
        $hrMilk = new IngredientTranslation();
        $hrMilk->setIngredient($milk);
        $hrMilk->setLanguage($hr);
        $hrMilk->setTitle('Mlijeko');
        $manager->persist($hrMilk);
        
        $enCheese = new IngredientTranslation();
        $enCheese->setIngredient($cheese);
        $enCheese->setLanguage($en);
        $enCheese->setTitle('Cheese');
        $manager->persist($enCheese);
        
        $hrCheese = new IngredientTranslation();
        $hrCheese->setIngredient($cheese);
        $hrCheese->setLanguage($hr);
        $hrCheese->setTitle('Sir');
        $manager->persist($hrCheese);
        
        $enPasta = new IngredientTranslation();
        $enPasta->setIngredient($pasta);
        $enPasta->setLanguage($en);
        $enPasta->setTitle('Pasta');
        $manager->persist($enPasta);
        
        $hrPasta = new IngredientTranslation();
        $hrPasta->setIngredient($pasta);
        $hrPasta->setLanguage($hr);
        $hrPasta->setTitle('Tjestenina');
        $manager->persist($hrPasta);
        
        $enSunflowerOil = new IngredientTranslation();
        $enSunflowerOil->setIngredient($sunflowerOil);
        $enSunflowerOil->setLanguage($en);
        $enSunflowerOil->setTitle('Sunflower oil');
        $manager->persist($enSunflowerOil);
        
        $hrSunflowerOil = new IngredientTranslation();
        $hrSunflowerOil->setIngredient($sunflowerOil);
        $hrSunflowerOil->setLanguage($hr);
        $hrSunflowerOil->setTitle('Suncokretovo ulje');
        $manager->persist($hrSunflowerOil);
        
        $enChocolate = new IngredientTranslation();
        $enChocolate->setIngredient($chocolate);
        $enChocolate->setLanguage($en);
        $enChocolate->setTitle('Chocolate');
        $manager->persist($enChocolate);
        
        $hrChocolate = new IngredientTranslation();
        $hrChocolate->setIngredient($chocolate);
        $hrChocolate->setLanguage($hr);
        $hrChocolate->setTitle('Čokolada');
        $manager->persist($hrChocolate);
        
        $enStrawberry = new IngredientTranslation();
        $enStrawberry->setIngredient($strawberry);
        $enStrawberry->setLanguage($en);
        $enStrawberry->setTitle('Strawberry');
        $manager->persist($enStrawberry);
        
        $hrStrawberry = new IngredientTranslation();
        $hrStrawberry->setIngredient($strawberry);
        $hrStrawberry->setLanguage($hr);
        $hrStrawberry->setTitle('Jagoda');
        $manager->persist($hrStrawberry);
        
        $enKiwi = new IngredientTranslation();
        $enKiwi->setIngredient($kiwi);
        $enKiwi->setLanguage($en);
        $enKiwi->setTitle('Kiwi');
        $manager->persist($enKiwi);
        
        $hrKiwi = new IngredientTranslation();
        $hrKiwi->setIngredient($kiwi);
        $hrKiwi->setLanguage($hr);
        $hrKiwi->setTitle('Kivi');
        $manager->persist($hrKiwi);
        
        $manager->flush();
    }
}
