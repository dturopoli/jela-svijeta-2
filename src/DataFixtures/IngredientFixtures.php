<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class IngredientFixtures extends Fixture
{
    public const EGG_REFERENCE = 'egg';
    public const MILK_REFERENCE = 'milk';
    public const CHEESE_REFERENCE = 'cheese';
    public const PASTA_REFERENCE = 'pasta';
    public const SUNFLOWER_OIL_REFERENCE = 'sunflowerOil';
    public const CHOCOLATE_REFERENCE = 'chocolate';
    public const STRAWBERRY_REFERENCE = 'strawberry';
    public const KIWI_REFERENCE = 'kiwi';
    
    public function load(ObjectManager $manager): void
    {
        $egg = new Ingredient();
        $egg->setSlug('egg');
        $manager->persist($egg);
        
        $milk = new Ingredient();
        $milk->setSlug('milk');
        $manager->persist($milk);
        
        $cheese = new Ingredient();
        $cheese->setSlug('cheese');
        $manager->persist($cheese);
        
        $pasta = new Ingredient();
        $pasta->setSlug('pasta');
        $manager->persist($pasta);
        
        $sunflowerOil = new Ingredient();
        $sunflowerOil->setSlug('sunflower_oil');
        $manager->persist($sunflowerOil);
        
        $chocolate = new Ingredient();
        $chocolate->setSlug('chocolate');
        $manager->persist($chocolate);
        
        $strawberry = new Ingredient();
        $strawberry->setSlug('strawberry');
        $manager->persist($strawberry);
        
        $kiwi = new Ingredient();
        $kiwi->setSlug('kiwi');
        $manager->persist($kiwi);
        
        $manager->flush();
        
        $this->addReference(self::EGG_REFERENCE, $egg);
        $this->addReference(self::MILK_REFERENCE, $milk);
        $this->addReference(self::CHEESE_REFERENCE, $cheese);
        $this->addReference(self::PASTA_REFERENCE, $pasta);
        $this->addReference(self::SUNFLOWER_OIL_REFERENCE, $sunflowerOil);
        $this->addReference(self::CHOCOLATE_REFERENCE, $chocolate);
        $this->addReference(self::STRAWBERRY_REFERENCE, $strawberry);
        $this->addReference(self::KIWI_REFERENCE, $kiwi);
    }
}
