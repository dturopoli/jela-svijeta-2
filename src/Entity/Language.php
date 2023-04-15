<?php

namespace App\Entity;

use App\Repository\LanguageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LanguageRepository::class)]
class Language
{
    #[ORM\Id]
    #[ORM\Column(length: 5)]
    private string $id = '';
    
    #[ORM\Column(length: 30)]
    private ?string $name = null;
    
    #[ORM\OneToMany(mappedBy: 'language', targetEntity: CategoryTranslation::class, orphanRemoval: true)]
    private Collection $categoryTranslations;
    
    #[ORM\OneToMany(mappedBy: 'language', targetEntity: MealTranslation::class, orphanRemoval: true)]
    private Collection $mealTranslations;
    
    #[ORM\OneToMany(mappedBy: 'language', targetEntity: TagTranslation::class, orphanRemoval: true)]
    private Collection $tagTranslations;
    
    #[ORM\OneToMany(mappedBy: 'language', targetEntity: IngredientTranslation::class, orphanRemoval: true)]
    private Collection $ingredientTranslations;
    
    public function __construct()
    {
        $this->categoryTranslations = new ArrayCollection();
        $this->mealTranslations = new ArrayCollection();
        $this->tagTranslations = new ArrayCollection();
        $this->ingredientTranslations = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function setId(string $id): self
    {
        $this->id = $id;
        
        return $this;
    }
    
    public function getName(): ?string
    {
        return $this->name;
    }
    
    public function setName(string $name): self
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return Collection<int, CategoryTranslation>
     */
    public function getCategoryTranslations(): Collection
    {
        return $this->categoryTranslations;
    }
    
    public function addCategoryTranslation(CategoryTranslation $categoryTranslation): self
    {
        if (!$this->categoryTranslations->contains($categoryTranslation)) {
            $this->categoryTranslations->add($categoryTranslation);
            $categoryTranslation->setLanguage($this);
        }
        
        return $this;
    }
    
    public function removeCategoryTranslation(CategoryTranslation $categoryTranslation): self
    {
        if ($this->categoryTranslations->removeElement($categoryTranslation)) {
            // set the owning side to null (unless already changed)
            if ($categoryTranslation->getLanguage() === $this) {
                $categoryTranslation->setLanguage(null);
            }
        }
        
        return $this;
    }
    
    /**
     * @return Collection<int, MealTranslation>
     */
    public function getMealTranslations(): Collection
    {
        return $this->mealTranslations;
    }
    
    public function addMealTranslation(MealTranslation $mealTranslation): self
    {
        if (!$this->mealTranslations->contains($mealTranslation)) {
            $this->mealTranslations->add($mealTranslation);
            $mealTranslation->setLanguage($this);
        }
        
        return $this;
    }
    
    public function removeMealTranslation(MealTranslation $mealTranslation): self
    {
        if ($this->mealTranslations->removeElement($mealTranslation)) {
            // set the owning side to null (unless already changed)
            if ($mealTranslation->getLanguage() === $this) {
                $mealTranslation->setLanguage(null);
            }
        }
        
        return $this;
    }
    
    /**
     * @return Collection<int, TagTranslation>
     */
    public function getTagTranslations(): Collection
    {
        return $this->tagTranslations;
    }
    
    public function addTagTranslation(TagTranslation $tagTranslation): self
    {
        if (!$this->tagTranslations->contains($tagTranslation)) {
            $this->tagTranslations->add($tagTranslation);
            $tagTranslation->setLanguage($this);
        }
        
        return $this;
    }
    
    public function removeTagTranslation(TagTranslation $tagTranslation): self
    {
        if ($this->tagTranslations->removeElement($tagTranslation)) {
            // set the owning side to null (unless already changed)
            if ($tagTranslation->getLanguage() === $this) {
                $tagTranslation->setLanguage(null);
            }
        }
        
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
            $ingredientTranslation->setLanguage($this);
        }
        
        return $this;
    }
    
    public function removeIngredientTranslation(IngredientTranslation $ingredientTranslation): self
    {
        if ($this->ingredientTranslations->removeElement($ingredientTranslation)) {
            // set the owning side to null (unless already changed)
            if ($ingredientTranslation->getLanguage() === $this) {
                $ingredientTranslation->setLanguage(null);
            }
        }
        
        return $this;
    }
}
