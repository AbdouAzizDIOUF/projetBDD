<?php

namespace App\Entity;

use App\Repository\CategoryMedRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryMedRepository::class)
 */
class CategoryMed
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nom;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Medicament::class, mappedBy="categoryMed")
     */
    private $medicament;

    public function __construct()
    {
        $this->medicament = new ArrayCollection();
    }

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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Medicament[]
     */
    public function getMedicament(): Collection
    {
        return $this->medicament;
    }

    public function addMedicament(Medicament $medicament): self
    {
        if (!$this->medicament->contains($medicament)) {
            $this->medicament[] = $medicament;
            $medicament->setCategoryMed($this);
        }

        return $this;
    }

    public function removeMedicament(Medicament $medicament): self
    {
        if ($this->medicament->removeElement($medicament)) {
            // set the owning side to null (unless already changed)
            if ($medicament->getCategoryMed() === $this) {
                $medicament->setCategoryMed(null);
            }
        }

        return $this;
    }
}
