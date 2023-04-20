<?php

namespace App\Controller;

use App\Class\Meta;
use App\CustomResponse\JsonResponseCustom;
use App\Entity\Category;
use App\Entity\Ingredient;
use App\Entity\Translation\IngredientTranslation;
use App\Repository\CategoryRepository;
use App\Repository\MealRepository;
use App\Repository\TranslationRepository\CategoryTranslationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MealController extends AbstractController
{
    public function __construct(
        private CategoryRepository $categoryRepository,
        private CategoryTranslationRepository $categoryTranslationRepository,
    ) {
    }
    
    #[Route('/meals', name: 'app_meal')]
    public function index(Request $request, Meta $meta): JsonResponse
    {
        $categories = $this->categoryRepository->findAll();
        $translatedCategories = $this->categoryTranslationRepository->translateCategories($categories, 'hr');
        return $this->json(['translation' => $translatedCategories]);
    }
}
//        $object = new Ingredient();
//        $object->setTitle('Egg');
//        $this->mealRepository->save($object, true);
//        $entity = new Category();
//        $entity->setTitle('Deutsch');
//        $this->categoryTranslationRepository
//            ->translate($entity, 'title', 'deu', 'Deutsch')
//            ->translate($entity, 'title', 'hr', 'Hrvatski');
//        $this->categoryRepository->save($entity, true);
// $object = $this->categoryRepository->find(5);
// $translations = $this->categoryTranslationRepository->findTranslations($object);
// $object->setTranslatableLocale('fr');
// $object->setTitle('Lala');
// $this->mealRepository->save($object, true);

// $translationRepository = $this->entityManager->getRepository(IngredientTranslation::class);
//        $translationRepository->tr
// $translations = $translationRepository->findTranslations($object);
// $translations = $this->ar2->findTranslationInLanguage($object, 'hr');

//        $object->setTranslatableLocale('hr');
//        $object->setTitle('Naslov na hr');
//        $this->ar->save($object, true);
//        $language = 'hr';
//        $translationRepository = $this->entityManager->getRepository(CategoryTranslation::class);
//        $translations = $translationRepository->findTranslations($object);

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
//        $article = new Category();
//        $article->setTranslatableLocale('hr');
//        $article->setTitle('Naslov na hr');
//        $article->setSlug('b');
//        $this->ar->save($article, true);
//
//        $article = $this->ar->find(1);
//
//        $article->setTranslatableLocale('en');
//        $article->setTitle('Title in en');
//        $this->ar->save($article, true);
