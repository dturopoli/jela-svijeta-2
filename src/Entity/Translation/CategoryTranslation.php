<?php

namespace App\Entity\Translation;

use App\Repository\TranslationRepository\CategoryTranslationRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Entity\MappedSuperclass\AbstractTranslation;

#[ORM\Table(name: 'category_translations')]
#[ORM\Index(columns: ['locale', 'object_class', 'field', 'foreign_key'], name: 'category_translation_idx')]
#[ORM\Entity(repositoryClass: CategoryTranslationRepository::class)]
class CategoryTranslation extends AbstractTranslation
{
}
