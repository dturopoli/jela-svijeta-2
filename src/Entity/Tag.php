<?php

namespace App\Entity;

use App\Entity\Translation\TagTranslation;
use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: TagRepository::class)]
#[ORM\Table(name: 'tags')]
#[Gedmo\TranslationEntity(class: TagTranslation::class)]
class Tag
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
    
    #[ORM\OneToMany(mappedBy: 'tag', targetEntity: MealTag::class, orphanRemoval: true)]
    private Collection $mealTags;
    
    #[Gedmo\Locale]
    private $locale;
    
    public function __construct()
    {
        $this->mealTags = new ArrayCollection();
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
            $mealTag->setTag($this);
        }
        
        return $this;
    }
    
    public function removeMealTag(MealTag $mealTag): self
    {
        if ($this->mealTags->removeElement($mealTag)) {
            // set the owning side to null (unless already changed)
            if ($mealTag->getTag() === $this) {
                $mealTag->setTag(null);
            }
        }
        
        return $this;
    }
    
    public function setTranslatableLocale($locale): void
    {
        $this->locale = $locale;
    }
}
