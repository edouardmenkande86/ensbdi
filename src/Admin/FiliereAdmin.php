<?php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\AdminBundle\Form\Type\ModelType;
use App\Entity\Cycle;
use App\Entity\Departement;

final class FiliereAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('libelle', TextType::class);
        
        $formMapper->add('description', TextareaType::class);

        $formMapper->add('cycles', ModelType::class, [
            'class' => Cycle::class,
            'multiple' => true,
             'property' => 'numero',
                  ]);

                  $formMapper->add('departement', ModelType::class, [
                    'class' => Departement::class,
                   'property' => 'libelle',
                          ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('libelle');
        $datagridMapper->add('description');
        $datagridMapper->add('departement');
        $datagridMapper->add('cycles');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('libelle');
        $listMapper->addIdentifier('description');

    }
}