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
    
    /**
     * @param Category[] $categories
     * @return Category[]
     */
    public function translateCategories(array $categories, string $language): array
    {
        $categoriesId = $this->extractIds($categories);
        $qb = $this->createQueryBuilder('trans');
        
        $result = $qb->select('trans.foreignKey, trans.field, trans.content')
            ->where($qb->expr()->in('trans.foreignKey', $categoriesId))
            ->andWhere('trans.objectClass = :entityClass')
            ->andWhere('trans.locale = :language')
            ->setParameters(new ArrayCollection([
                new Parameter('entityClass', Category::class),
                new Parameter('language', $language),
            ]))
            ->getQuery()
            ->getResult();
        
        $fieldsTranslations = $this->extractFieldsTranslations($result);
        
        return $this->changeCategoriesTranslations($categories, $fieldsTranslations);
    }
    
    private function extractIds(array $categories): array
    {
        return array_map(function ($category) {
            return $category->getId();
        }, $categories);
    }
    
    public function extractFieldsTranslations(mixed $result): array
    {
        $translatedFields = [];
        foreach ($result as $row) {
            $translatedFields[$row['foreignKey']] = [$row['field'] => $row['content']];
        }
        
        return $translatedFields;
    }
    
    /**
     * @param Category[] $categories
     */
    public function changeCategoriesTranslations(array $categories, array $fieldsTranslations): array
    {
        $translatedCategories = [];
        foreach ($categories as $category) {
            if (isset($fieldsTranslations[$category->getId()])) {
                $fields = $fieldsTranslations[$category->getId()];
                $translatedCategories[] = $category->setTitle($fields['title']);
            }
        }
        
        return $translatedCategories;
    }
}
