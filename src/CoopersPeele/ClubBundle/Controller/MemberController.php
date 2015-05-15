<?php

namespace CoopersPeele\ClubBundle\Controller;

use CoopersPeele\ClubBundle\Propel\MemberManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UAM\Bundle\DatatablesBundle\Controller\DatatablesEnabledControllerTrait;

class MemberController extends Controller
{
    use DatatablesEnabledControllerTrait {
        indexAction as baseIndexAction;
        listAction as baseListAction;
    }

    /**
     * @Route(
     *      "/member",
     *      name="members"
     * )
     *
     * @Template()
     */
    public function indexAction(Request $request)
    {
        return $this->baseIndexAction($request);
    }

    /**
     * @Route(
     *      "/member/list",
     *      name="member_list",
     *      requirements={
     *          "_format": "json"
     *      },
     *      defaults={
     *          "_format": "json"
     *      }
     * )
     *
     * @Template()
     */
    public function listAction(Request $request)
    {
        return $this->baseListAction($request);
    }

    /**
     * @Route(
     *      "/member/{id}",
     *      name="member_show",
     *      requirements={
     *          "id": "\d+"
     *      }
     * )
     *
     * @Template()
     */
    public function showAction(Request $request, Member $member)
    {
        return array(
            'member' => $member
        );
    }

    /**
     * @Route(
     *      "/member/{id}/edit",
     *      name="member_edit",
     *      requirements={
     *          "id": "\d+"
     *      }
     * )
     *
     * @Template()
     */
    public function editAction(Request $request, Member $member)
    {
        // TODO Create and process form

        return array(
            'member' => $member
        );
    }

    /**
     * @inheritdoc
     */
    protected function getEntityManager()
    {
        return new MemberManager();
    }
}
