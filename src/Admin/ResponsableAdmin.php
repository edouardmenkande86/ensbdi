<?php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\Form\Type\DatePickerType;
use App\Entity\Categorie;
use App\Entity\Grade;
use App\Entity\Attribution;
use App\Entity\Publication;

use Sonata\AdminBundle\Form\Type\ModelType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use App\Form\UploadedImageType;
use App\Form\UploadFichierType;

final class ResponsableAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {   
        $formMapper->add('nom', TextType::class);
        $formMapper->add('matricule', TextType::class);
        $formMapper->add('titre', TextType::class);

        $formMapper->add('sexe', ChoiceFieldMaskType::class, [
            'choices' => [
           'Feminin' => 'F',
               'Masculin' => 'M'
                    ]
       ]);
        $formMapper->add('datenaissance', DatePickerType::class);

        $formMapper->add('categorie', ModelType::class, [
            'class' => Categorie::class,
             'property' => 'libelle',
                  ]);

        
        
        $formMapper->add('dateservice', DatePickerType::class);

        $formMapper->add('grade', ModelType::class, [
            'class' => Grade::class,
             'property' => 'libelle',
                  ]);

                  $image = $this->getSubject();
                  $fileFileOptions = array('required' => false);
                  if($image && ($webPath = $image->getWebPathResp())){
                      //get the container so the full path to the image 
                      $container = $this->getConfigurationPool()->getContainer();
                      $fullPath = $container->get('request_stack')->getCurrentRequest()->getBasePath().'/'.$webPath;
                    #  $fullPath = '/uploads/images/etudiant/'.$webPath;
          
                      //add a help
                      $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="admin-preview" />';
          
                  }
                   else {
                       $fileFieldOptions['help'] = 'Ajouter une Image (4Mo max)(1100x700)';
                   }
          
                  $formMapper->add('image', UploadedImageType::class,[
                    'label'=>'Demi Carte Photo'
                ], $fileFieldOptions);

                  $image = $this->getSubject();
                  $fileFileOptions = array('required' => false);
                  if($image && ($webPath = $image->getWebPath1())){
                      //get the container so the full path to the image 
                      $container = $this->getConfigurationPool()->getContainer();
                      $fullPath = $container->get('request_stack')->getCurrentRequest()->getBasePath().'/'.$webPath;
                    #  $fullPath = '/uploads/images/etudiant/'.$webPath;
          
                      //add a help
                      $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="admin-preview" />';
          
                  }
                   else {
                       $fileFieldOptions['help'] = 'Ajouter une Image (4Mo max)(1100x700)';
                   }
          
                  $formMapper->add('fichier', UploadFichierType::class,[
                    'label' => 'Votre CV'
                ],$fileFieldOptions);

      $formMapper->add('contact', TextType::class);

      $formMapper->add('attributions', ModelType::class, [
        'class' => Attribution::class,
        'multiple' => true,
         'property' => 'contenu',
              ]);

              $formMapper->add('publications', ModelType::class, [
                'class' => Publication::class,
                'multiple' => true,
                 'property' => 'libelle',
                      ]);

                 
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nom');
        $datagridMapper->add('matricule');
        $datagridMapper->add('categorie');
        $datagridMapper->add('dateservice');
        $datagridMapper->add('sexe');
        $datagridMapper->add('image');
    }

    protected function configureListFields(ListMapper $listMapper)
    {  
        $listMapper->addIdentifier('id');
         $listMapper->addIdentifier('nom');
        $listMapper->addIdentifier('matricule');
        $listMapper->addIdentifier('categorie');
        $listMapper->addIdentifier('dateservice');
        $listMapper->addIdentifier('sexe');
        $listMapper->addIdentifier('contact');
    
       

    }
}