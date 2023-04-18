<?php

namespace App\Entity\Translation;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Entity\MappedSuperclass\AbstractTranslation;
use Gedmo\Translatable\Entity\Repository\TranslationRepository;

#[ORM\Table(name: 'meal_translations')]
#[ORM\Index(columns: ['locale', 'object_class', 'field', 'foreign_key'], name: 'meal_translation_idx')]
#[ORM\Entity(repositoryClass: TranslationRepository::class)]
class MealTranslation extends AbstractTranslation
{
}
