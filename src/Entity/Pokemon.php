<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PokemonRepository::class)]
class Pokemon
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
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
      /**
         * @Groups("category:read")
         * */
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
      /**
         * @Groups("category:read")
         * */
    private $type;

    #[ORM\ManyToOne(targetEntity: Label::class, inversedBy: 'categoryPokemon')]
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCategory(): ?Label
    {
        return $this->category;
    }

    public function setCategory(?Label $category): self
    {
        $this->category = $category;

        return $this;
    }
}
