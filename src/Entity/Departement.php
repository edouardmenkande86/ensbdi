<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepartementRepository")
 * @Vich\Uploadable
 */
class Departement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=75)
     */
    private $libelle;



    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $url;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Responsable", cascade={"persist", "remove"})
     */
    private $responsable;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Image",cascade ={"persist","remove"})
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Attribution",cascade ={"persist","remove"})
     */
    private $attributions;

   

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Depliant",cascade ={"persist","remove"})
     */
    private $depliants;

   

   
   

    public function __construct()
    {
        $this->image = new ArrayCollection();
        $this->attributions = new ArrayCollection();
        $this->depliants = new ArrayCollection();

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

   

   

    public function getUrl(): ?string
    {
        return $this->url;
    }
          //lien du site web du departement
    public function setUrl(?string $url=null)
    {
        $this->url = $url;

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

        /**
         * @return Collection|Image[]
         */
        public function getImage(): Collection
        {
            return $this->image;
        }

        public function addImage(Image $image): self
        {
            if (!$this->image->contains($image)) {
                $this->image[] = $image;
            }

            return $this;
        }

        public function removeImage(Image $image): self
        {
            if ($this->image->contains($image)) {
                $this->image->removeElement($image);
            }

            return $this;
        }
        
     //afficher a l'exterieur
    public function __toString()
    {
        return (string) $this->libelle;
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

        

         public function getDescription(): ?string
         {
             return $this->description;
         }

         public function setDescription(string $description): self
         {
             $this->description = $description;

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

        
       

}
