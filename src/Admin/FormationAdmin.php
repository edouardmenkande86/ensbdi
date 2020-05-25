<?php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\HttpFoundation\File\File;
use App\Form\UploadedImageType;
use Sonata\Form\Type\CollectionType;
use App\Entity\Categorie;
use App\Entity\Image;





    final class FormationAdmin extends AbstractAdmin

    {
        protected function configureFormFields(FormMapper $formMapper)
        {
            

            $formMapper->add('libelle', TextType::class);
            
            $formMapper->add('contenu', TextareaType::class);

        

            $formMapper->add('categorie', ModelType::class, [
                'class' => Categorie::class,
                'property' => 'libelle',
                    ]);

                    $formMapper->add('image', 'collection', [
                        'label'=>'Photos',
                        'entry_type'  => UploadedImageType::class,
                        'allow_add'    =>true,
                        'allow_delete'  => true,
                        'by_reference' => false,
                    ]);
    
                
                    

                
        }

        protected function configureDatagridFilters(DatagridMapper $datagridMapper)
        {
            $datagridMapper->add('libelle');
            $datagridMapper->add('contenu');
            $datagridMapper->add('categorie');
        }

        protected function configureListFields(ListMapper $listMapper)
        {
            $listMapper->addIdentifier('libelle');
            $listMapper->addIdentifier('contenu');
            $listMapper->addIdentifier('categorie');
            $listMapper->addIdentifier('image');
            

        }
    }