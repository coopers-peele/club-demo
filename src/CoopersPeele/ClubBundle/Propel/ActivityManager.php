<?php

namespace CoopersPeele\ClubBundle\Propel;

use CoopersPeele\ClubBundle\Filter\Type\ActivityFilterType;
use CoopersPeele\ClubBundle\Propel\ActivityQuery;
use Symfony\Component\HttpFoundation\Request;
use UAM\Bundle\DatatablesBundle\Propel\AbstractEntityManager;

class ActivityManager extends AbstractEntityManager
{
    /**
     * @inheritdoc
     */
    protected function getQuery(Request $request)
    {
        return ActivityQuery::create();
    }

    /**
     * @inheritdoc
     */
    protected function getSearchColumns(Request $request)
    {
        return array(
            'name' => 'Name LIKE "%%%s%%"'
        );
    }

    /**
     * @inheritdoc
     */
    protected function getSortColumns(Request $request)
    {
        return array(
            0 => 'Date',
            1 => 'Name',
        );
    }

    /**
     * @inheritdoc
     */
    protected function getDefaultSortOrder(Request $request)
    {
        return array(
            array('Name', 'asc')
        );
    }

    /**
     * @inheritdoc
     */
    public function getFilterType(Request $request)
    {
        return new ActivityFilterType();
    }
}
