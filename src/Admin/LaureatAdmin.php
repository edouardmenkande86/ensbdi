<?php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Form\Type\VichImageType;
use App\Entity\Filiere;

final class LaureatAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('nom', TextType::class);
        $formMapper->add('matricule', TextType::class);

        $formMapper->add('moyenne', NumberType::class);
        $formMapper->add('rang', IntegerType::class);
        $formMapper->add('annee', TextType::class);

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

        $formMapper->add('filiere', ModelType::class, [
            'class' => Filiere::class,
             'property' => 'libelle',
                  ]);

              
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nom');
        $datagridMapper->add('matricule');
        $datagridMapper->add('image');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('nom');
        $listMapper->addIdentifier('matricule');
        $listMapper->addIdentifier('moyenne');
        $listMapper->addIdentifier('rang');
        $listMapper->addIdentifier('image');

    }
}