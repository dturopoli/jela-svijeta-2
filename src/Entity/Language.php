<?php

namespace App\Entity;

use App\Entity\Translation\IngredientTranslation;
use App\Entity\Translation\MealTranslation;
use App\Entity\Translation\TagTranslation;
use App\Repository\LanguageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'languages')]
#[ORM\Entity(repositoryClass: LanguageRepository::class)]
class Language
{
    #[ORM\Id]
    #[ORM\Column(length: 5)]
    private string $id = '';
    
    #[ORM\Column(length: 30)]
    private ?string $name = null;
    
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
}
