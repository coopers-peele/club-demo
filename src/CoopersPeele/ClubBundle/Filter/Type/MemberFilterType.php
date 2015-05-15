<?php

namespace CoopersPeele\ClubBundle\Filter\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MemberFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('last_name', 'text');

        $builder->add('first_name', 'text');
    }

    public function getName()
    {
        return 'member_filter';
    }
}
