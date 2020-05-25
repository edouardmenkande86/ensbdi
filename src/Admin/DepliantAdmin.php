<?php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Vich\UploaderBundle\Form\Type\VichFileType;

final class DepliantAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('libelle', TextType::class);
        
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
          
                  $formMapper->add('imageFile', VichFileType::class, $fileFieldOptions);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('libelle');
        $datagridMapper->add('url');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('libelle');
        $listMapper->addIdentifier('url');

    }
}