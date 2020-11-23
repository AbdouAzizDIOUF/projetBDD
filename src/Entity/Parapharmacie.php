<?php

namespace App\Entity;

use App\Repository\ParapharmacieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParapharmacieRepository::class)
 */
class Parapharmacie extends Produit
{

    /**
     * @ORM\Column(type="datetime")
     */
    private $expire_at;

    public function getExpireAt(): ?\DateTimeInterface
    {
        return $this->expire_at;
    }

    public function setExpireAt(\DateTimeInterface $expire_at): self
    {
        $this->expire_at = $expire_at;

        return $this;
    }
}
