<?php

namespace CoopersPeele\ClubBundle\Form\Type;

use CoopersPeele\ClubBundle\Form\DataTransformer\ParticipantDataTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ParticipantsChoiceType extends AbstractType
{
    public function getParent()
    {
        return 'choice';
    }

    public function getName()
    {
        return 'participant_choice';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer(new ParticipantDataTransformer());
    }
}
