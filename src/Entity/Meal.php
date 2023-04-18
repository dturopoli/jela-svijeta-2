<?php

namespace App\Entity;

use App\Entity\Translation\MealTranslation;
use App\Repository\MealRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Mapping\Annotation as Gedmo;

#[Gedmo\SoftDeleteable(fieldName: 'deletedAt', timeAware: false, hardDelete: true)]
#[ORM\Entity(repositoryClass: MealRepository::class)]
#[ORM\Table(name: 'meals')]
#[Gedmo\TranslationEntity(class: MealTranslation::class)]
class Meal
{
    use TimestampableEntity;
    use SoftDeleteableEntity;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[Gedmo\Translatable]
    #[ORM\Column(length: 50)]
    private ?string $title = null;
    
    #[Gedmo\Translatable]
    #[ORM\Column(length: 255)]
    private ?string $description = null;
    
    #[ORM\ManyToOne(inversedBy: 'meals')]
    private ?Category $category = null;
    
    #[ORM\OneToMany(mappedBy: 'meal', targetEntity: MealTag::class, orphanRemoval: true)]
    private Collection $mealTags;
    
    #[ORM\OneToMany(mappedBy: 'meal', targetEntity: MealIngredient::class, orphanRemoval: true)]
    private Collection $mealIngredients;
    
    #[Gedmo\Locale]
    private $locale;
    
    public function __construct()
    {
        $this->mealTags = new ArrayCollection();
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
    
    public function getDescription(): ?string
    {
        return $this->description;
    }
    
    public function setDescription(string $description): self
    {
        $this->description = $description;
        
        return $this;
    }
    
    public function getCategory(): ?Category
    {
        return $this->category;
    }
    
    public function setCategory(?Category $category): self
    {
        $this->category = $category;
        
        return $this;
    }
    
    /**
     * @return Collection<int, MealTag>
     */
    public function getMealTags(): Collection
    {
        return $this->mealTags;
    }
    
    public function addMealTag(MealTag $mealTag): self
    {
        if (!$this->mealTags->contains($mealTag)) {
            $this->mealTags->add($mealTag);
            $mealTag->setMeal($this);
        }
        
        return $this;
    }
    
    public function removeMealTag(MealTag $mealTag): self
    {
        if ($this->mealTags->removeElement($mealTag)) {
            // set the owning side to null (unless already changed)
            if ($mealTag->getMeal() === $this) {
                $mealTag->setMeal(null);
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
            $mealIngredient->setMeal($this);
        }
        
        return $this;
    }
    
    public function removeMealIngredient(MealIngredient $mealIngredient): self
    {
        if ($this->mealIngredients->removeElement($mealIngredient)) {
            // set the owning side to null (unless already changed)
            if ($mealIngredient->getMeal() === $this) {
                $mealIngredient->setMeal(null);
            }
        }
        
        return $this;
    }
    
    public function setTranslatableLocale($locale): void
    {
        $this->locale = $locale;
    }
}
