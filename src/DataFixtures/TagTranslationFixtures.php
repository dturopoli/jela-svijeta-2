<?php

namespace App\DataFixtures;

use App\Entity\TagTranslation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TagTranslationFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [
            LanguageFixtures::class,
            TagFixtures::class,
        ];
    }
    
    public function load(ObjectManager $manager): void
    {
        $en = $this->getReference(LanguageFixtures::EN_LANGUAGE_REFERENCE);
        $hr = $this->getReference(LanguageFixtures::HR_LANGUAGE_REFERENCE);
        
        $containsEggs = $this->getReference(TagFixtures::CONTAINS_EGGS_REFERENCE);
        $dairyFree = $this->getReference(TagFixtures::DAIRY_FREE_REFERENCE);
        $easyToMake = $this->getReference(TagFixtures::EASY_TO_MAKE_REFERENCE);
        
        $data = [
            [
                'tag' => $containsEggs,
                'titleEn' => 'Contains eggs',
                'titleHr' => 'Sadrži jaja',
            ],
            [
                'tag' => $dairyFree,
                'titleEn' => 'Dairy free',
                'titleHr' => 'Bez mliječnih proizvoda',
            ],
            [
                'tag' => $easyToMake,
                'titleEn' => 'Easy to make',
                'titleHr' => 'Lako za napraviti',
            ],
        ];
        
        foreach ($data as $row) {
            $enTag = new TagTranslation();
            $hrTag = new TagTranslation();
            
            $enTag->setLanguage($en);
            $hrTag->setLanguage($hr);
            
            $enTag->setTag($row['tag']);
            $hrTag->setTag($row['tag']);
            
            $enTag->setTitle($row['titleEn']);
            $hrTag->setTitle($row['titleHr']);
            
            $manager->persist($enTag);
            $manager->persist($hrTag);
        }
        
        $manager->flush();
    }
}
