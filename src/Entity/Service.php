<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServiceRepository")
 */
class Service
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Division")
     */
    private $division;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Attribution")
     */
    private $attributions;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Depliant")
     */
    private $depliants;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Image")
     */
    private $images;

   

    public function __construct()
    {
      
       
        $this->attributions = new ArrayCollection();
        $this->depliants = new ArrayCollection();
        $this->images = new ArrayCollection();
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

   

    public function getDivision(): ?Division
    {
        return $this->division;
    }

    public function setDivision(?Division $division): self
    {
        $this->division = $division;

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

   
}
