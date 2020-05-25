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
use App\Entity\Responsable;
use App\Entity\Attribution;
use App\Entity\Depliant;




final class DivisionAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        

        $formMapper->add('libelle', TextType::class);
        
        $formMapper->add('description', TextareaType::class);

        

        $formMapper->add('responsable', ModelType::class, [
            'class' => Responsable::class,
             'property' => 'nom',
                  ]);

                  $formMapper->add('images', 'collection', [
                      'label'=>'Photos',
                    'entry_type'  => UploadedImageType::class,
                    'allow_add'    =>true,
                    'allow_delete'  => true,
                    'by_reference' => false,
                ]);
 
                $formMapper->add('attributions', ModelType::class, [
                    'class' => Attribution::class,
                    'multiple' => true,
                     'property' => 'contenu',
                          ]);

        $formMapper->add('depliants', ModelType::class, [
            'class' => Depliant::class,
            'multiple' => true,
             'property' => 'libelle',
                  ]);   
                 

              
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('libelle');
        $datagridMapper->add('description');
        $datagridMapper->add('attributions');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id');
        $listMapper->addIdentifier('libelle');
        $listMapper->addIdentifier('description');
        $listMapper->addIdentifier('images');
        $listMapper->addIdentifier('attributions');

    }
}