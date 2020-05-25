<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FichierRepository")
 * @Vich\Uploadable
 */
class Fichier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable= true)
     */
    private $url;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url=null)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @Vich\UploadableField(mapping="fichier_image", fileNameProperty="url")
     * @var File
     */
    private $fichierFile;

      
    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $updatedAt;

    // ...

    public function setFichierFile(File $url = null)
    {
        $this->fichierFile = $url;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($url) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getFichierFile()
    {
        return $this->fichierFile;
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

    public function __toString()

    {
        return(string)  $this->url;
    }
    

    protected function getUploadDir(){
        return '/uploads/pdfs/fichier';

    }
       public function getWebPath(){
           return null === $this->fichierFile
           ?
           : $this->getUploadDir().'/'.$this->fichierFile;
       }
}
