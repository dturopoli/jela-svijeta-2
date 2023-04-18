<?php

namespace App\Entity;

use App\Entity\Translation\IngredientTranslation;
use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
#[ORM\Table(name: 'ingredients')]
#[Gedmo\TranslationEntity(class: IngredientTranslation::class)]
class Ingredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[Gedmo\Translatable]
    #[ORM\Column(length: 50)]
    private ?string $title = null;
    
    #[Gedmo\Slug(fields: ['title'])]
    #[ORM\Column(length: 50, unique: true)]
    private ?string $slug = null;
    
    #[ORM\OneToMany(mappedBy: 'ingredient', targetEntity: MealIngredient::class, orphanRemoval: true)]
    private Collection $mealIngredients;
    
    #[Gedmo\Locale]
    private $locale;
    
    public function __construct()
    {
        $this->mealIngredients = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getTitle(): ?string
    {
        return $this->title;
    }
    
    public function setTitle(string $title): self
    {
        $this->title = $title;
        
        return $this;
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
    
    public function setTranslatableLocale($locale): void
    {
        $this->locale = $locale;
    }
}
