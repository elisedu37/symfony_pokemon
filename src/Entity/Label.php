<?php

namespace App\Entity;

use App\Repository\LabelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: LabelRepository::class)]
class Label
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
        /**
         * @Groups("category:read")
         * */
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    /**
         * @Groups("category:read")
         * */
    private $type;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Pokemon::class)]

    private $categoryPokemon;

    public function __construct()
    {
        $this->categoryPokemon = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Pokemon>
     */
    public function getCategoryPokemon(): Collection
    {
        return $this->categoryPokemon;
    }

    public function addCategoryPokemon(Pokemon $categoryPokemon): self
    {
        if (!$this->categoryPokemon->contains($categoryPokemon)) {
            $this->categoryPokemon[] = $categoryPokemon;
            $categoryPokemon->setCategory($this);
        }

        return $this;
    }

    public function removeCategoryPokemon(Pokemon $categoryPokemon): self
    {
        if ($this->categoryPokemon->removeElement($categoryPokemon)) {
            // set the owning side to null (unless already changed)
            if ($categoryPokemon->getCategory() === $this) {
                $categoryPokemon->setCategory(null);
            }
        }

        return $this;
    }
}
