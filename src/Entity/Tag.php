<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TagRepository::class)]
class Tag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $slug = null;

    #[ORM\OneToMany(mappedBy: 'tag', targetEntity: TagTranslation::class, orphanRemoval: true)]
    private Collection $tagTranslations;

    #[ORM\OneToMany(mappedBy: 'tag', targetEntity: MealTag::class, orphanRemoval: true)]
    private Collection $mealTags;

    public function __construct()
    {
        $this->tagTranslations = new ArrayCollection();
        $this->mealTags = new ArrayCollection();
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
            $tagTranslation->setTag($this);
        }

        return $this;
    }

    public function removeTagTranslation(TagTranslation $tagTranslation): self
    {
        if ($this->tagTranslations->removeElement($tagTranslation)) {
            // set the owning side to null (unless already changed)
            if ($tagTranslation->getTag() === $this) {
                $tagTranslation->setTag(null);
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
}
