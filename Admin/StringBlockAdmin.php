<?php

namespace Symfony\Cmf\Bundle\BlockBundle\Admin;

use Symfony\Cmf\Bundle\BlockBundle\Admin\AbstractBlockAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

/**
 * @author Daniel Leech <daniel@dantleech.com>
 */
class StringBlockAdmin extends AbstractBlockAdmin
{
    protected $baseRouteName = 'cmf_block_string';
    protected $baseRoutePattern = '/cmf/block/string';

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id', 'text');
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('form.group_general')
            ->add('parentDocument', 'doctrine_phpcr_odm_tree', array('root_node' => $this->getRootPath(), 'choice_list' => array(), 'select_root_node' => true))
            ->add('name', 'text')
            ->add('body', 'textarea')
            ->end()
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name',  'doctrine_phpcr_nodename');
    }
}

