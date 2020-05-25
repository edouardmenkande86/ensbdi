<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CentreRepository")
 */
class Centre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=90)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Responsable", cascade={"persist", "remove"})
     */
    private $responsable;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $jourvisite;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Image",cascade={"persist", "remove"})
     */
    private $images;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Depliant",cascade={"persist", "remove"})
     */
    private $depliants;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Attribution",cascade={"persist", "remove"})
     */
    private $attributions;

   
 

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->depliants = new ArrayCollection();
        $this->attributions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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

    public function getResponsable(): ?Responsable
    {
        return $this->responsable;
    }

    public function setResponsable(?Responsable $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getJourvisite(): ?string
    {
        return $this->jourvisite;
    }

    public function setJourvisite(string $jourvisite): self
    {
        $this->jourvisite = $jourvisite;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
        }

        return $this;
    }

    /**
     * @return Collection|Depliant[]
     */
    public function getDepliants(): Collection
    {
        return $this->depliants;
    }

    public function addDepliant(Depliant $depliant): self
    {
        if (!$this->depliants->contains($depliant)) {
            $this->depliants[] = $depliant;
        }

        return $this;
    }

    public function removeDepliant(Depliant $depliant): self
    {
        if ($this->depliants->contains($depliant)) {
            $this->depliants->removeElement($depliant);
        }

        return $this;
    }

    /**
     * @return Collection|Attribution[]
     */
    public function getAttributions(): Collection
    {
        return $this->attributions;
    }

    public function addAttribution(Attribution $attribution): self
    {
        if (!$this->attributions->contains($attribution)) {
            $this->attributions[] = $attribution;
        }

        return $this;
    }

    public function removeAttribution(Attribution $attribution): self
    {
        if ($this->attributions->contains($attribution)) {
            $this->attributions->removeElement($attribution);
        }

        return $this;
    }

  
    
}
