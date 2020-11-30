<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn("TYPE_PRODUIT", type="string")
 * @ORM\DiscriminatorMap ({"medicament" = "Medicament", "parapharmacie"="Parapharmacie", "accessoireMed"="AccessoirMed"})
 */
abstract class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $codeProd;

    /**
     * @ORM\Column(type="float")
     */
    private $prixProd;

    /**
     * @ORM\Column(type="text")
     */
    private $noticeProd;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $fabriquant;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estDisponible;

    /**
     * @ORM\OneToMany(targetEntity=Fournir::class, mappedBy="produit")
     */
    private $fournirs;

    /**
     * @ORM\ManyToOne(targetEntity=Rayon::class, inversedBy="produit")
     */
    private $rayon;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stock;

    /**
     * @ORM\OneToOne(targetEntity=Achat::class, mappedBy="produit", cascade={"persist", "remove"})
     */
    private $achat;


    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


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

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCodeProd(): ?string
    {
        return $this->codeProd;
    }

    public function setCodeProd(string $codeProd): self
    {
        $this->codeProd = $codeProd;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPrixProd(): ?float
    {
        return $this->prixProd;
    }

    public function setPrixProd(float $prixProd): self
    {
        $this->prixProd = $prixProd;

        return $this;
    }

    public function getNotice(): ?string
    {
        return $this->notice;
    }

    public function setNotice(string $notice): self
    {
        $this->notice = $notice;

        return $this;
    }

    public function getNoticeProd(): ?string
    {
        return $this->noticeProd;
    }

    public function setNoticeProd(string $noticeProd): self
    {
        $this->noticeProd = $noticeProd;

        return $this;
    }

    public function getFabriquant(): ?string
    {
        return $this->fabriquant;
    }

    public function setFabriquant(string $fabriquant): self
    {
        $this->fabriquant = $fabriquant;

        return $this;
    }

    public function getEstDisponible(): ?bool
    {
        return $this->estDisponible;
    }

    public function setEstDisponible(bool $estDisponible): self
    {
        $this->estDisponible = $estDisponible;

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
            $fournir->setProduit($this);
        }

        return $this;
    }

    public function removeFournir(Fournir $fournir): self
    {
        if ($this->fournirs->removeElement($fournir)) {
            // set the owning side to null (unless already changed)
            if ($fournir->getProduit() === $this) {
                $fournir->setProduit(null);
            }
        }

        return $this;
    }

    public function getRayon(): ?Rayon
    {
        return $this->rayon;
    }

    public function setRayon(?Rayon $rayon): self
    {
        $this->rayon = $rayon;

        return $this;
    }


    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getAchat(): ?Achat
    {
        return $this->achat;
    }

    public function setAchat(?Achat $achat): self
    {
        $this->achat = $achat;

        // set (or unset) the owning side of the relation if necessary
        $newProduit = null === $achat ? null : $this;
        if ($achat->getProduit() !== $newProduit) {
            $achat->setProduit($newProduit);
        }

        return $this;
    }
    public function __toString(){
        return $this->nom;
    }
}
