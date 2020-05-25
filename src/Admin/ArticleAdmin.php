<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Entity\Categorie;
use App\Entity\User;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Form\Type\VichImageType; 
use Vich\UploaderBundle\Templating\Helper\UploaderHelper as VichUploaderManager;
use App\Form\UploadedImageType;
use App\Form\UploadFichierType;
use Sonata\Form\Type\DatePickerType;
use Sonata\AdminBundle\Form\Type\ModelHiddenType;



final class ArticleAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        
        $formMapper->add('libelle', TextType::class);

        $formMapper->add('categorie', ModelType::class, [
            'class' => Categorie::class,
             'property' => 'libelle',
            ]);
        $formMapper->add('resume', TextareaType::class);
        $formMapper->add('contenu', TextareaType::class);
        $formMapper->add('date_debut', DatePickerType::class);
        $formMapper->add('date_fin', DatePickerType::class);

       $formMapper->add('visible', ChoiceFieldMaskType::class, [
             'choices' => [
            'oui' => 'true',
                'non' => 'false'
                     ]
        ]);

      

        $formMapper->add('images', 'collection', [
            'entry_type'  => UploadedImageType::class,
            'allow_add'    =>true,
            'allow_delete'  => true,
            'by_reference' => false,
        ]);
        $formMapper->add('fichiers', 'collection', [
            'entry_type'  => UploadFichierType::class,
            'allow_add'    =>true,
            'allow_delete'  => true,
            'by_reference' => false,
        ]);

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
         $datagridMapper->add('libelle');
        $datagridMapper->add('categorie');
        $datagridMapper->add('date_debut');
        $datagridMapper->add('visible');
        $datagridMapper->add('resume');
        $datagridMapper->add('date_fin');
        

    }

    protected function configureListFields(ListMapper $listMapper)
    {
           
                     
                           $listMapper->addIdentifier('libelle');
                           $listMapper->addIdentifier('categorie');
                           $listMapper->addIdentifier('date_debut');
                           $listMapper->addIdentifier('visible', 'boolean');
                           $listMapper->addIdentifier('resume');  
                           $listMapper->addIdentifier('contenu'); 
                           $listMapper->addIdentifier('date_fin');
                           $listMapper->addIdentifier('images');
                           $listMapper->addIdentifier('fichiers');
                           $listMapper->addIdentifier('user');
                          
                         
                     
     }
        /**
         * {@inheritdoc}
         */
            public function setUpdateByAttribute($article){

                $user = $this->getConfigurationPool()
                             ->getContainer()
                             ->get('security.token_storage')
                             ->getToken()->getUser();
                             $article->setUser($user);
            }

        /**
         * {@inheritdoc}
         */
            public function prePersist($article){

        /**  $user = $this->getConfigurationPool()
                     ->getContainer()->get('security.token_storage')
                     ->getToken()->getUser();
                      $object->setUser($user);*/

        $this->setUpdateByAttribute($article);
     }
     
     /**
      * {@inheritdoc}
      */
  
         public function preUpdate($article){
          
        /**   $user = $this->getConfigurationPool()
                 ->getContainer()->get('security.token_storage')
                 ->getToken()->getUser();
                $object->setUser($user);*/

        $this->setUpdateByAttribute($article);
      }
    }