<?php

namespace App\Controller;

use App\Class\Meta;
use App\CustomResponse\JsonResponseCustom;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\MealRepository;
use App\Service\MealService;
use Doctrine\ORM\EntityManagerInterface;
use Gedmo\Translatable\Entity\Translation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MealController extends AbstractController
{
    public function __construct(
        private ArticleRepository $ar,
        private EntityManagerInterface $entityManager
    ) {
    }
    
    #[Route('/meals', name: 'app_meal')]
    public function index(Request $request, Meta $meta): JsonResponseCustom
    {
        //        $meal = $this->mealRepository->findMealWithIngredients(2);
        //
        //        $ingredients = [];
        //        foreach ($meal[0]->getMealIngredients() as $mealIngredient) {
        //            $ingredient = $mealIngredient->getIngredient();
        //            $ingredientTranslation = $ingredient->getIngredientTranslations()[0]->getTitle();
        //            $ingredients[] = [
        //                'id' => $ingredient->getId(),
        //                'name' => $ingredientTranslation,
        //            ];
        //        }
        //        $meta->setMetaData($request, 2);
        //
        //        return new JsonResponseCustom($meta->getMetaData(),
        //            [
        //                'id' => $meal[0]->getId(),
        //                'title' => $meal[0]->getMealTranslations()[0]->getTitle(),
        //                'ingredients' => $ingredients,
        //            ],
        //            []);
//        $article = new Article();
////        $article->setTranslatableLocale('en');
//        $article->setTitle('my title in en');
//        $article->setContent('my content in en');
//        $this->ar->save($article, true);
//
        
        $article = $this->ar->find(6);
        $translationRepository = $this->entityManager->getRepository(Translation::class);
        $translations = $translationRepository->findTranslations($article);
        
        return new JsonResponseCustom([], [$translations], []);
    }
}
