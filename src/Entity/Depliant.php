<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepliantRepository")
 * @Vich\Uploadable
 */
class Depliant
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
     * @Vich\UploadableField(mapping="depliant_pdf", fileNameProperty="url")
     * @var File
     */
    private $imageFile;

      
    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=70, nullable=true)
     */
    private $url;

    // ...

    public function setImageFile(File $url = null)
    {
        $this->imageFile = $url;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($url) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;

 #       return $this;
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

   

         //afficher a l'exterieur
         public function __toString()
         {
             return (string) $this->libelle;
         }

         protected function getUploadDir(){
            return '/uploads/pdfs/depliant';
    
        }
           public function getWebPath(){
               return null === $this->imageFile
               ?
               : $this->getUploadDir().'/'.$this->imageFile;
           }

           public function getUrl(): ?string
           {
               return $this->url;
           }

           public function setUrl(?string $url): self
           {
               $this->url = $url;

               return $this;
           }
}
