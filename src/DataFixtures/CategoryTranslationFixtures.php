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
        
        $data = [
            [
                'category' => $appetizer,
                'titleEn' => 'Appetizer',
                'titleHr' => 'Predjelo',
            ],
            [
                'category' => $mainCourse,
                'titleEn' => 'Main course',
                'titleHr' => 'Glavno jelo',
            ],
            [
                'category' => $dessert,
                'titleEn' => 'Dessert',
                'titleHr' => 'Desert',
            ],
        ];
        
        foreach ($data as $row) {
            $enCategory = new CategoryTranslation();
            $hrCategory = new CategoryTranslation();
            
            $enCategory->setLanguage($en);
            $hrCategory->setLanguage($hr);
            
            $enCategory->setCategory($row['category']);
            $hrCategory->setCategory($row['category']);
            
            $enCategory->setTitle($row['titleEn']);
            $hrCategory->setTitle($row['titleHr']);
            
            $manager->persist($enCategory);
            $manager->persist($hrCategory);
        }
        
        $manager->flush();
    }
}