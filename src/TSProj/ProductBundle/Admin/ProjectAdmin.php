<?php

namespace TSProj\ProductBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ProjectAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('projectName')
            ->add('projectStartDate','doctrine_orm_datetime', array('field_type'=>'sonata_type_datetime_picker',))
            ->add('projectEndDate','doctrine_orm_datetime', array('field_type'=>'sonata_type_datetime_picker',))
            ->add('projectStatus',null,array('choices'=> \TSProj\ProductBundle\Entity\WorkStatus::$status_list));
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('projectBarcode')
            ->add('projectName')
            ->add('orderDate') 
            ->add('amount')
            ->add('client')    
            ->add('projectDeliveryAddress')
            ->add('projectContactPhoneNo')
            ->add('expectDeliveryDate')
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
            ->tab('Project')    
                ->with('General',
                   array('class'       =>  'col-md-6',
                         'box_class'   =>  'box'))
                        ->add('projectBarcode')    
                        ->add('projectName')
                        ->add('projectStatus',null,array('expanded'=>true,'multiple'=>false,'empty_value'=>false,))
                ->end()    
                ->with('Contact Info',
                   array('class'       =>  'col-md-6',
                         'box_class'   =>  'box box-solid',))
                        ->add('client')      
                        ->add('projectDeliveryAddress','textarea')
                        ->add('projectContactPhoneNo')       
                ->end()
                ->with('Project Date',
                   array('class'       =>  'col-md-6',
                         'box_class'   =>  'box'))    
                        ->add('orderDate','sonata_type_date_picker') 
                        ->add('expectedDeliveryDate','sonata_type_date_picker')    
                        ->add('projectStartDate','sonata_type_date_picker')
                        ->add('projectEndDate','sonata_type_date_picker')
                ->end()    
                ->with('General',
                   array('class'       =>  'col-md-6',
                         'box_class'   =>  'box'))     
                        ->add('amount')    
                        ->add('projectTimeConsuming',null,array('required'=>false,'read_only'=>true))
                ->end() 
            ->end() 
            ->tab('Product')    
                         ->add('product', 'sonata_type_collection',
                            array(),
                            array(
                                'edit' => 'inline',
                                'inline' => 'table',
                            )
                         )   
           ->end()
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('projectName')
            ->add('projectDeliveryAddress')
            ->add('projectContactPhoneNo')
            ->add('projectStartDate')
            ->add('projectEndDate')
            ->add('projectTimeConsuming')
        ;
    }

//    public function configure()
//    {
//            $this->setTemplate("list", "TSProjProductBundle:Admin:list.html.twig");
//    }
}
