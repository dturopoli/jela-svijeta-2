<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Entity\MappedSuperclass\AbstractTranslation;
use Gedmo\Translatable\Entity\Repository\TranslationRepository;

#[ORM\Table(name: 'article_translations')]
#[ORM\Index(name: 'article_translation_idx', columns: ['locale', 'object_class', 'field', 'foreign_key'])]
#[ORM\Entity(repositoryClass: TranslationRepository::class)]
class ArticleTranslation extends AbstractTranslation
{
    /*
     * All required columns are mapped through inherited superclass
     */
}
