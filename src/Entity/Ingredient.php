<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
class Ingredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $slug = null;

    #[ORM\OneToMany(mappedBy: 'ingredient', targetEntity: IngredientTranslation::class, orphanRemoval: true)]
    private Collection $ingredientTranslations;

    #[ORM\OneToMany(mappedBy: 'ingredient', targetEntity: MealIngredient::class, orphanRemoval: true)]
    private Collection $mealIngredients;

    public function __construct()
    {
        $this->ingredientTranslations = new ArrayCollection();
        $this->mealIngredients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, IngredientTranslation>
     */
    public function getIngredientTranslations(): Collection
    {
        return $this->ingredientTranslations;
    }

    public function addIngredientTranslation(IngredientTranslation $ingredientTranslation): self
    {
        if (!$this->ingredientTranslations->contains($ingredientTranslation)) {
            $this->ingredientTranslations->add($ingredientTranslation);
            $ingredientTranslation->setIngredient($this);
        }

        return $this;
    }

    public function removeIngredientTranslation(IngredientTranslation $ingredientTranslation): self
    {
        if ($this->ingredientTranslations->removeElement($ingredientTranslation)) {
            // set the owning side to null (unless already changed)
            if ($ingredientTranslation->getIngredient() === $this) {
                $ingredientTranslation->setIngredient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MealIngredient>
     */
    public function getMealIngredients(): Collection
    {
        return $this->mealIngredients;
    }

    public function addMealIngredient(MealIngredient $mealIngredient): self
    {
        if (!$this->mealIngredients->contains($mealIngredient)) {
            $this->mealIngredients->add($mealIngredient);
            $mealIngredient->setIngredient($this);
        }

        return $this;
    }

    public function removeMealIngredient(MealIngredient $mealIngredient): self
    {
        if ($this->mealIngredients->removeElement($mealIngredient)) {
            // set the owning side to null (unless already changed)
            if ($mealIngredient->getIngredient() === $this) {
                $mealIngredient->setIngredient(null);
            }
        }

        return $this;
    }
}
