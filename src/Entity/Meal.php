<?php

namespace App\Entity;

use App\Repository\MealRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MealRepository::class)]
class Meal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\ManyToOne(inversedBy: 'meals')]
    private ?Category $category = null;
    
    #[ORM\OneToMany(mappedBy: 'meal', targetEntity: MealTranslation::class, orphanRemoval: true)]
    private Collection $mealTranslations;
    
    #[ORM\OneToMany(mappedBy: 'meal', targetEntity: MealTag::class, orphanRemoval: true)]
    private Collection $mealTags;
    
    #[ORM\OneToMany(mappedBy: 'meal', targetEntity: MealIngredient::class, orphanRemoval: true)]
    private Collection $mealIngredients;
    
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;
    
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $updatedAt = null;
    
    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $deletedAt = null;
    
    public function __construct()
    {
        $this->mealTranslations = new ArrayCollection();
        $this->mealTags = new ArrayCollection();
        $this->mealIngredients = new ArrayCollection();
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
    }
    
    public function getId(): ?int
    {
        return $this->id;
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
            $mealTranslation->setMeal($this);
        }
        
        return $this;
    }
    
    public function removeMealTranslation(MealTranslation $mealTranslation): self
    {
        if ($this->mealTranslations->removeElement($mealTranslation)) {
            // set the owning side to null (unless already changed)
            if ($mealTranslation->getMeal() === $this) {
                $mealTranslation->setMeal(null);
            }
        }
        
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
    
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }
    
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        
        return $this;
    }
    
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }
    
    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        
        return $this;
    }
    
    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }
    
    public function setDeletedAt(?\DateTimeInterface $deletedAt): self
    {
        $this->deletedAt = $deletedAt;
        
        return $this;
    }
}
