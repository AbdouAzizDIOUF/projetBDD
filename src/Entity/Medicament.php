<?php

namespace App\Entity;

use App\Repository\MedicamentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicamentRepository::class)
 */
class Medicament extends Produit
{

    /**
     * @ORM\Column(type="datetime")
     */
    private $expire_at;

    /**
     * @ORM\ManyToOne(targetEntity=CategoryMed::class, inversedBy="medicament")
     */
    private $categoryMed;

    public function getExpireAt(): ?\DateTimeInterface
    {
        return $this->expire_at;
    }

    public function setExpireAt(\DateTimeInterface $expire_at): self
    {
        $this->expire_at = $expire_at;

        return $this;
    }

    public function getCategoryMed(): ?CategoryMed
    {
        return $this->categoryMed;
    }

    public function setCategoryMed(?CategoryMed $categoryMed): self
    {
        $this->categoryMed = $categoryMed;

        return $this;
    }
}
