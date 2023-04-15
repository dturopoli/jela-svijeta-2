<?php

namespace App\Service;

use App\Entity\MealIngredient;
use App\Repository\MealRepository;
use Symfony\Component\HttpFoundation\Request;

class MealService
{
    public function countMeals(): array
    {
        
        //            ->join(MealIngredient::class, 'mi')
        //            ->join('m.mealTags', 'mt')
        //            ->join('m.translations', 't')
        //            ->join('mi.mealIngredients.translations', 'it')
        //            ->join('mt.tag.translations', 'tt')
        //            ->where('t.language = :language')
        //            ->andWhere('it.language = :language')
        //            ->andWhere('tt.language = :language')
        //            ->setParameter('language', 'hr')
        //            ->getQuery();
        return [];
    }
}
