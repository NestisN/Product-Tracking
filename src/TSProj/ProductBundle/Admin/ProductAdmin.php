<?php

namespace TSProj\ProductBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ProductAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('productBarcode')
            ->add('productName')
            ->add('productDescription')
            ->add('productTimeConsuming')
            ->add('drawingId')
            ->add('drawingLocation')    
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper    
            ->add('id')
            ->add('productBarcode')
            ->add('productName')
            ->add('productDescription')
            ->add('productTimeConsuming')
            ->add('drawingId')
            ->add('drawingLocation')   
            ->add('process')    
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General',
                   array('class'       =>  'col-md-6',
                         'box_class'   =>  'box'))    
                    ->add('productBarcode')
                    ->add('productName')
                    ->add('productDescription')
                    ->add('drawingId')
                    ->add('drawingLocation')     
                    ->add('productStatus',null,array('expanded'=>true,'multiple'=>false,'empty_value'=>false,))    
            ->end()
            ->with('Process List',
                   array('class'       =>  'col-md-6',
                         'box_class'   =>  'box'))
                ->add('process',null,
                   array(  'expanded'  =>  true,
                           'multiple'  =>  true,
                        ))   
            ->end()
            ->with('Performance',
                   array('class'       =>  'col-md-6',
                         'box_class'   =>  'box'))
                     ->add('stock')
                     ->add('productTimeConsuming',null,array('required'=>false,'read_only'=>true))
            ->end()    
        ;
    }

    public function getNewInstance()
    {
        $instance = parent::getNewInstance();

        // Set date to today
        $dateTime = new \DateTime();

        // Instance points to the entity that is being created
        $instance->setLastMaintDateTime($dateTime);

        return $instance;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('productBarcode')
            ->add('productName')
            ->add('productDescription')
            ->add('productTimeConsuming')
            ->add('drawingId')
            ->add('drawingLocation') 
            ->add('process')       
        ;
    }
}
