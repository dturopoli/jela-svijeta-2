<?php

namespace App\DataFixtures;

use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LanguageFixtures extends Fixture
{
    public const EN_LANGUAGE_REFERENCE = 'english';
    public const HR_LANGUAGE_REFERENCE = 'croatian';
    
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
        
        $this->addReference(self::EN_LANGUAGE_REFERENCE, $en);
        $this->addReference(self::HR_LANGUAGE_REFERENCE, $hr);
    }
}
