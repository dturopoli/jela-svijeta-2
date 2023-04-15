<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const APPETIZER_REFERENCE = 'appetizer';
    public const MAIN_COURSE_REFERENCE = 'mainCourse';
    public const DESSERT_REFERENCE = 'dessert';
    
    public function load(ObjectManager $manager): void
    {
        $appetizer = new Category();
        $appetizer->setSlug('appetizer');
        $manager->persist($appetizer);
        
        $mainCourse = new Category();
        $mainCourse->setSlug('main course');
        $manager->persist($mainCourse);
        
        $dessert = new Category();
        $dessert->setSlug('dessert');
        $manager->persist($dessert);
        
        $manager->flush();
        
        $this->addReference(self::APPETIZER_REFERENCE, $appetizer);
        $this->addReference(self::MAIN_COURSE_REFERENCE, $mainCourse);
        $this->addReference(self::DESSERT_REFERENCE, $dessert);
    }
}
