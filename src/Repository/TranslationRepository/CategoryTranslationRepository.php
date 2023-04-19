<?php

namespace App\Repository\TranslationRepository;

use App\Entity\Category;
use App\Entity\Translation\CategoryTranslation;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Parameter;
use Gedmo\Translatable\Entity\Repository\TranslationRepository;

class CategoryTranslationRepository extends TranslationRepository
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, $em->getClassMetadata(CategoryTranslation::class));
    }
    
    public function findTranslationForCategories(array $categoriesId, string $language): array
    {
        $qb = $this->createQueryBuilder('trans');
        
        return $qb->select('trans.foreignKey, trans.field, trans.content')
            ->where($qb->expr()->in('trans.foreignKey', $categoriesId))
            ->andWhere('trans.objectClass = :entityClass')
            ->andWhere('trans.locale = :language')
            ->setParameters(new ArrayCollection([
                new Parameter('entityClass', Category::class),
                new Parameter('language', $language),
            ]))
            ->getQuery()
            ->getResult();
    }
}
