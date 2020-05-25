<?php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\AdminBundle\Form\Type\ModelType;
use App\Entity\Attribution;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Sonata\Form\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

final class PartenaireAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        

        $formMapper->add('libelle', TextType::class);
        
        $formMapper->add('description', TextareaType::class);

        $formMapper->add('Responsable', TextType::class);

        $formMapper->add('contact', TextType::class);

        $image = $this->getSubject();
        $fileFileOptions = array('required' => false);
        if($image && ($webPath = $image->getWebPath())){
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

        $formMapper->add('imageFile', VichImageType::class, $fileFieldOptions);

        $formMapper->add('attributions', ModelType::class, [
            'class' => Attribution::class,
            'multiple' => true,
             'property' => 'contenu',
                  ]);
    
                 

              
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('libelle');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('libelle');
        $listMapper->addIdentifier('description');
        $listMapper->addIdentifier('responsable');
        $listMapper->addIdentifier('contact');

    }
}