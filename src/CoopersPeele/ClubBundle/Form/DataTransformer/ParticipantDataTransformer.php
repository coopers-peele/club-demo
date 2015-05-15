<?php

namespace CoopersPeele\ClubBundle\Form\DataTransformer;

use CoopersPeele\ClubBundle\Propel\Participant;
use Symfony\Component\Form\DataTransformerInterface;

class ParticipantDataTransformer implements DataTransformerInterface
{
    /**
     * Transforms an array of Participant instances into an array of ids.
     *
     * @param Array[Participant] $participants an array of participants
     * @return Array an array of ids
     */
    public function transform($participants)
    {
        $ids = array();

        foreach ($participants as $participant) {
            $ids[] = $participant->getMemberId();
        }

        return $ids;
    }

    /**
     * Transforms an array of ids into an array of Participant instances
     *
     * @param Array $ids an array of ids
     * @return Array[Participant] an array of participants
     */
    public function reverseTransform($ids)
    {
        $participants = array();

        foreach ($ids as $id) {
            $participant = new Participant();

            $participant->setMemberId($id);

            $participants[] = $participant;
        }

        return $participants;
    }
}
