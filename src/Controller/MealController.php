<?php

namespace App\Controller;

use App\Repository\MealRepository;
use App\Service\MealService;
use App\Service\Meta;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MealController extends AbstractController
{
    public function __construct(
        private MealRepository $mealRepository,
        private MealService $mealService
    ) {
    }
    
    #[Route('/meals', name: 'app_meal')]
    public function index(Request $request, Meta $meta): JsonResponse
    {
        $meal = $this->mealRepository->findMealWithIngredients(2);
        $ingredients = [];
        foreach ($meal[0]->getMealIngredients() as $mealIngredient) {
            $ingredient = $mealIngredient->getIngredient();
            $ingredientTranslation = $ingredient->getIngredientTranslations()[0]->getTitle();
            $ingredients[] = [
                'id' => $ingredient->getId(),
                'name' => $ingredientTranslation,
            ];
        }
        return new JsonResponse([
            'id' => $meal[0]->getId(),
            'title' => $meal[0]->getMealTranslations()[0]->getTitle(),
            'ingredients' => $ingredients,
        ]);
    }
}
