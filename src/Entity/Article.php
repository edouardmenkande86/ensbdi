<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 * @Vich\Uploadable
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=300)
     */
    private $libelle;

 

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_debut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_fin;

    /**
     * @ORM\Column(type="boolean")
     */
    private $visible;

   

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie")
     */
    private $categorie;

    /**
     * 
     * @ORM\ManyToMany(targetEntity="App\Entity\Image",cascade ={"persist","remove"})
     */
    private $images;

  

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Fichier",cascade={"persist","remove"})
     * 
     */
    private $fichiers;

    /**
     * @ORM\ManyToOne(targetEntity="App\Application\Sonata\UserBundle\Entity\User")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=5000, nullable=true)
     * 
     */
    private $contenu;

    /**
     * @ORM\Column(type="string", length=1500, nullable=true)
     * 
     */
    private $resume;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->fichiers = new ArrayCollection();
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

   

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getVisible(): ?bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): self
    {
        $this->visible = $visible;

        return $this;
    }

   
    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

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
     * @return Collection|Fichier[]
     */
    public function getFichiers(): Collection
    {
        return $this->fichiers;
    }

    public function addFichier(Fichier $fichier): self
    {
        if (!$this->fichiers->contains($fichier)) {
            $this->fichiers[] = $fichier;
        }

        return $this;
    }

    public function removeFichier(Fichier $fichier): self
    {
        if ($this->fichiers->contains($fichier)) {
            $this->fichiers->removeElement($fichier);
        }

        return $this;
    }

    public function getUser(): ?\App\Application\Sonata\UserBundle\Entity\User
    {
        return $this->user;
    }

  

       public function setUser(\App\Application\Sonata\UserBundle\Entity\User $user=null)
    {
        $this->user = $user;

        return $this;
    }

       public function getContenu(): ?string
       {
           return $this->contenu;
       }

       public function setContenu(?string $contenu): self
       {
           $this->contenu = $contenu;

           return $this;
       }

       public function getResume(): ?string
       {
           return $this->resume;
       }

       public function setResume(?string $resume): self
       {
           $this->resume = $resume;

           return $this;
       }

    

}
