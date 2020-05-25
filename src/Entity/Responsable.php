<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResponsableRepository")
 * @Vich\Uploadable
 */
class Responsable 
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $titre;

    /**
     * @ORM\Column(type="date")
     */
    private $dateservice;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Grade",cascade ={"persist","remove"})
     */
    private $grade;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie",cascade ={"persist","remove"})
     */
    private $categorie;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Publication",cascade ={"persist","remove"})
     */
    private $publications;

    /**
     * @ORM\Column(type="string", length=90)
     */
    private $nom;

    /**
     * @ORM\Column(type="date")
     */
    private $datenaissance;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $matricule;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $contact;

 

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Attribution",cascade ={"persist","remove"})
     */
    private $attributions;



    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Image", cascade={"persist", "remove"})
     */
    private $image;



    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Fichier", cascade={"persist", "remove"})
     */
    private $fichier;


    

    public function __construct()
    {
        $this->publications = new ArrayCollection();
        $this->attributions = new ArrayCollection();
    }

   

   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDateservice(): ?\DateTimeInterface
    {
        return $this->dateservice;
    }

    public function setDateservice(\DateTimeInterface $dateservice): self
    {
        $this->dateservice = $dateservice;

        return $this;
    }
            //afficher
    public function __toString()

      {
          return  $this->nom;
      }

    public function getGrade(): ?Grade
    {
        return $this->grade;
    }

    public function setGrade(?Grade $grade): self
    {
        $this->grade = $grade;

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
     * @return Collection|Publication[]
     */
    public function getPublications(): Collection
    {
        return $this->publications;
    }

    public function addPublication(Publication $publication): self
    {
        if (!$this->publications->contains($publication)) {
            $this->publications[] = $publication;
        }

        return $this;
    }

    public function removePublication(Publication $publication): self
    {
        if ($this->publications->contains($publication)) {
            $this->publications->removeElement($publication);
        }

        return $this;
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

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    


    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    protected function getUploadDir(){
        return '/uploads/images/responsable';
    }
        public function getWebPathResp(){
            return null === $this->image
            ?
            : $this->getUploadDir().'/'.$this->image;
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

       

        protected function getUploadDir1(){
            return '/uploads/pdfs/cv';
        }
            public function getWebPath1(){
                return null === $this->fichier
                ?
                : $this->getUploadDir1().'/'.$this->fichier;
            }

            public function getImage(): ?Image
            {
                return $this->image;
            }

            public function setImage(?Image $image): self
            {
                $this->image = $image;

                return $this;
            }

            public function getFichier(): ?Fichier
            {
                return $this->fichier;
            }

            public function setFichier(?Fichier $fichier): self
            {
                $this->fichier = $fichier;

                return $this;
            }


   
}
