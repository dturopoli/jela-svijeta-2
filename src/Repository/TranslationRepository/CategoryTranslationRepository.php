<?php

namespace App\Repository\TranslationRepository;

use App\Entity\Translation\CategoryTranslation;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class CategoryTranslationRepository
{
    private EntityRepository $translationRepository;
    
    public function __construct(private EntityManagerInterface $entityManager)
    {
        $this->translationRepository = $this->entityManager->getRepository(CategoryTranslation::class);
    }
    
    public function findTranslationInLanguage(object $category, string $language): array
    {
        $translations = $this->translationRepository->findTranslations($category);
        
        return $translations[$language];
    }
}
