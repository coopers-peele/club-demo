<?php

namespace CoopersPeele\ClubBundle\Propel;

use CoopersPeele\ClubBundle\Filter\Type\MemberFilterType;
use CoopersPeele\ClubBundle\Propel\MemberQuery;
use Symfony\Component\HttpFoundation\Request;
use UAM\Bundle\DatatablesBundle\Propel\AbstractEntityManager;

class MemberManager extends AbstractEntityManager
{
    /**
     * @inheritdoc
     */
    protected function getQuery(Request $request)
    {
        return MemberQuery::create('Member');
    }

    /**
     * @inheritdoc
     */
    protected function getSearchColumns(Request $request)
    {
        return array(
            'last_name' => 'LastName LIKE "%%%s%%"',
            'first_name' => 'FirstName LIKE "%%%s%%"'
        );
    }

    /**
     * @inheritdoc
     */
    protected function getSortColumns(Request $request)
    {
        return array(
            0 => 'LastName',
            1 => 'FirstName',
            2 => 'DateJoined',
            3 => 'DateLeft'
        );
    }

    /**
     * @inheritdoc
     */
    protected function getDefaultSortOrder(Request $request)
    {
        return array(
            array('LastName', 'asc'),
            array('FirstName', 'asc')
        );
    }

    /**
     * @inheritdoc
     */
    public function getFilterType(Request $request)
    {
        return new MemberFilterType();
    }
}
