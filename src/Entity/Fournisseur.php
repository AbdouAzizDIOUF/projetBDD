<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FournisseurRepository::class)
 */
class Fournisseur
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
     * @ORM\Column(type="string", length=30)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $numTel;

    /**
     * @ORM\OneToMany(targetEntity=Fournir::class, mappedBy="fournisseur")
     */
    private $fournirs;

    public function __construct()
    {
        $this->fournirs = new ArrayCollection();
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNumTel(): ?string
    {
        return $this->numTel;
    }

    public function setNumTel(string $numTel): self
    {
        $this->numTel = $numTel;

        return $this;
    }

    /**
     * @return Collection|Fournir[]
     */
    public function getFournirs(): Collection
    {
        return $this->fournirs;
    }

    public function addFournir(Fournir $fournir): self
    {
        if (!$this->fournirs->contains($fournir)) {
            $this->fournirs[] = $fournir;
            $fournir->setFournisseur($this);
        }

        return $this;
    }

    public function removeFournir(Fournir $fournir): self
    {
        if ($this->fournirs->removeElement($fournir)) {
            // set the owning side to null (unless already changed)
            if ($fournir->getFournisseur() === $this) {
                $fournir->setFournisseur(null);
            }
        }

        return $this;
    }
    public function __toString(){
        return $this->nom;
    }
}
