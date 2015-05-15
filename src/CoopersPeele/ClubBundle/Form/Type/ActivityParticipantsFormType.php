<?php

namespace CoopersPeele\ClubBundle\Form\Type;

use CoopersPeele\ClubBundle\Propel\Activity;
use CoopersPeele\ClubBundle\Form\Type\ParticipantsChoiceType;
use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActivityParticipantsFormType extends BaseAbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                $form = $event->getForm();

                $activity = $event->getData();

                $form->add(
                    'participants',
                    new ParticipantsChoiceType(),
                    array(
                        'expanded' => true,
                        'multiple' => true,
                        'label' => false,
                        'choices' => $this->getParticipantChoices($activity),
                        'by_reference' => true,
                        'attr' => array(
                            'label-class' => 'checkbox-inline'
                        )
                    )
                );
            }
        );

        $builder->add('submit', 'submit', array(
            'label' => 'activity.submit',
            'attr' => array(
                'class' => 'btn btn-primary',
            ),
        ));
    }

    protected function getParticipantChoices(Activity $activity)
    {
        $members = $activity->getEligibleMembers();

        $choices = array();

        foreach ($members as $member) {
            $choices[$member->getId()] = sprintf(
                '%s %s',
                $member->getFirstName(),
                $member->getLastName()
            );
        }

        return $choices;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoopersPeele\ClubBundle\Propel\Activity',
        ));
    }

    public function getName()
    {
        return 'activity_participants';
    }
}
