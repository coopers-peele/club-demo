<?php

namespace CoopersPeele\ClubBundle\Form\Type;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActivityFormType extends BaseAbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('date', 'date', array(
            'label' => 'activity.form.date.label',
            'widget' => 'single_text',
            'attr' => array(
                'class' => 'date',
            ),
        ));

        $builder->add('name', 'text', array(
            'label' => 'activity.form.description.label',
        ));

        $builder->add('save', 'submit', array(
            'label' => 'activity.save',
            'attr' => array(
                'class' => 'btn btn-primary',
            ),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoopersPeele\ClubBundle\Propel\Activity'
        ));
    }

    public function getName()
    {
        return 'activity';
    }
}
