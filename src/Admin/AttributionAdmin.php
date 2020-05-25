<?php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

final class AttributionAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
            
        $formMapper->add('contenu', TextareaType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('contenu');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
 
        $listMapper->addIdentifier('contenu');

    }
}