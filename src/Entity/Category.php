<?php

namespace App\Entity;

use App\Entity\Translation\CategoryTranslation;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ORM\Table(name: 'categories')]
#[Gedmo\TranslationEntity(class: CategoryTranslation::class)]
class Category
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
    
    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Meal::class)]
    private Collection $meals;
    
    #[Gedmo\Locale]
    private $locale;
    
    public function __construct()
    {
        $this->meals = new ArrayCollection();
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
     * @return Collection<int, Meal>
     */
    public function getMeals(): Collection
    {
        return $this->meals;
    }
    
    public function addMeal(Meal $meal): self
    {
        if (!$this->meals->contains($meal)) {
            $this->meals->add($meal);
            $meal->setCategory($this);
        }
        
        return $this;
    }
    
    public function setTranslatableLocale($locale): void
    {
        $this->locale = $locale;
    }
}
