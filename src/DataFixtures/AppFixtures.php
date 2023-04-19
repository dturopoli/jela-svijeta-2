<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Ingredient;
use App\Entity\Language;
use App\Entity\Meal;
use App\Entity\Tag;
use App\Entity\Translation\CategoryTranslation;
use App\Entity\Translation\IngredientTranslation;
use App\Entity\Translation\MealTranslation;
use App\Entity\Translation\TagTranslation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $en = new Language();
        $en->setId('en');
        $en->setName('English');
        $manager->persist($en);
        
        $hr = new Language();
        $hr->setId('hr');
        $hr->setName('Croatian');
        $manager->persist($hr);
        
        $manager->flush();
        
        $list = [
            ['en' => 'Appetizer', 'hr' => 'Predjelo'],
            ['en' => 'Main course', 'hr' => 'Glavno jelo'],
            ['en' => 'Dessert', 'hr' => 'Desert'],
        ];
        
        $translationRepository = $manager->getRepository(CategoryTranslation::class);
        foreach ($list as $element) {
            $entity = new Category();
            $entity->setTitle($element['en']);
            $translationRepository
                ->translate($entity, 'title', 'en', $element['en'])
                ->translate($entity, 'title', 'hr', $element['hr']);
            $manager->persist($entity);
        }
        
        $list = [
            ['en' => 'Contains eggs', 'hr' => 'Sadrži jaja'],
            ['en' => 'Dairy free', 'hr' => 'Bez mliječnih proizvoda'],
            ['en' => 'Easy to make', 'hr' => 'Lako za napraviti'],
        ];
        
        $translationRepository = $manager->getRepository(TagTranslation::class);
        foreach ($list as $element) {
            $entity = new Tag();
            $entity->setTitle($element['en']);
            $translationRepository
                ->translate($entity, 'title', 'en', $element['en'])
                ->translate($entity, 'title', 'hr', $element['hr']);
            $manager->persist($entity);
        }
        
        $list = [
            ['en' => 'Egg', 'hr' => 'Jaje'],
            ['en' => 'Milk', 'hr' => 'Mlijeko'],
            ['en' => 'Cheese', 'hr' => 'Sir'],
            ['en' => 'Pasta', 'hr' => 'Tjestenina'],
            ['en' => 'Sunflower oil', 'hr' => 'Suncokretovo ulje'],
            ['en' => 'Chocolate', 'hr' => 'Čokolada'],
            ['en' => 'Strawberry', 'hr' => 'Jagoda'],
            ['en' => 'Kiwi', 'hr' => 'Kivi'],
        ];
        
        $translationRepository = $manager->getRepository(IngredientTranslation::class);
        foreach ($list as $element) {
            $entity = new Ingredient();
            $entity->setTitle($element['en']);
            $translationRepository
                ->translate($entity, 'title', 'en', $element['en'])
                ->translate($entity, 'title', 'hr', $element['hr']);
            $manager->persist($entity);
        }
        
        $list = [
            ['en' => 'Fried eggs', 'hr' => 'Jaje na oko'],
            ['en' => 'Fried eggs with cheese', 'hr' => 'Jaje na oko sa sirom'],
            ['en' => 'Pasta with eggs', 'hr' => 'Tjestenina s jajima'],
            ['en' => 'Pasta with eggs and cheese', 'hr' => 'Tjestenina s jajima i sirom'],
            ['en' => 'Choco cake', 'hr' => 'Čokoladna torta'],
            ['en' => 'Strawberry cake', 'hr' => 'Torta s jagodama'],
            ['en' => 'Fruit salad', 'hr' => 'Voćna salata'],
            ['en' => 'Choco strawberry', 'hr' => 'Jagode s čokoladom'],
        ];
        
        $translationRepository = $manager->getRepository(MealTranslation::class);
        foreach ($list as $element) {
            $entity = new Meal();
            $entity->setTitle($element['en']);
            $entity->setDescription('Nice food!');
            $translationRepository
                ->translate($entity, 'title', 'en', $element['en'])
                ->translate($entity, 'description', 'en', 'Nice food!')
                ->translate($entity, 'title', 'hr', $element['hr'])
                ->translate($entity, 'description', 'hr', 'Fina hrana!');
            $manager->persist($entity);
        }
        
        $manager->flush();
        
        
        $list = [
            ['en' => '', 'hr' => ''],
            ['en' => '', 'hr' => ''],
            ['en' => '', 'hr' => ''],
        ];
    }
}
