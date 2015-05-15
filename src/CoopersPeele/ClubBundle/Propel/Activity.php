<?php

namespace CoopersPeele\ClubBundle\Propel;

use CoopersPeele\ClubBundle\Propel\om\BaseActivity;

class Activity extends BaseActivity
{
    public function getEligibleMembers()
    {
        $date = $this->getDate();

        return MemberQuery::create()
            ->filterByDateJoined(array('max' => $date))
            ->condition('left after', 'member.date_left >= ?', $date)
            ->condition('never left', 'member.date_left IS NULL')
            ->where(array('left after', 'never left'), 'or')
            ->orderByLastName()
            ->orderByFirstname()
            ->find();
    }
}
