<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LaureatRepository")
 *  @Vich\Uploadable
 */
class Laureat
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=75)
     */
    private $matricule;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=4)
     */
    private $moyenne;

    /**
     * @ORM\Column(type="integer")
     */
    private $rang;

    /**
     * @ORM\Column(type="string", length=50)  
     */
    private $annee;

     /**
     * @ORM\Column(type="string", length=50)
     */
    private $image;

     /**
     * @Vich\UploadableField(mapping="laureat_image", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Filiere")
     */
    private $filiere;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $sexe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cycle")
     */
    private $cycle;

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    
    public function getUpdateAt():?DateTimeInterface
    {
        $this->updatedAt = $updatedAt;
   #     return $this;
    }
    public function setUpdateAt(\DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
   #     return $this;
    }

    protected function getUploadDir(){
        return '/uploads/images/laureat';
    }
        public function getWebPath(){
            return null === $this->imageFile
            ?
            : $this->getUploadDir().'/'.$this->imageFile;
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

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getMoyenne()
    {
        return $this->moyenne;
    }

    public function setMoyenne($moyenne): self
    {
        $this->moyenne = $moyenne;

        return $this;
    }

    public function getRang(): ?int
    {
        return $this->rang;
    }

    public function setRang(int $rang): self
    {
        $this->rang = $rang;

        return $this;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(string $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getFiliere(): ?Filiere
    {
        return $this->filiere;
    }

    public function setFiliere(?Filiere $filiere): self
    {
        $this->filiere = $filiere;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

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

    public function getCycle(): ?Cycle
    {
        return $this->cycle;
    }

    public function setCycle(?Cycle $cycle): self
    {
        $this->cycle = $cycle;

        return $this;
    }
        

    
}
