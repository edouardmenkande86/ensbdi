<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AssociationRepository")
 * @Vich\Uploadable
 */
class Association
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
     * @ORM\Column(type="string", length=100)
     */
    private $description;

   

    /**
     * @Vich\UploadableField(mapping="association_image", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

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


    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $responsable;

  
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Image")
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Attribution")
     */
    private $attributions;

    public function __construct()
    {
      
        $this->image = new ArrayCollection();
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

    

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(?string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }
    protected function getUploadDir(){
        return '/uploads/images/association';
    }
        public function getWebPath(){
            return null === $this->imageFile
            ?
            : $this->getUploadDir().'/'.$this->imageFile;
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
