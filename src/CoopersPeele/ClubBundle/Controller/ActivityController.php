<?php

namespace CoopersPeele\ClubBundle\Controller;

use CoopersPeele\ClubBundle\Form\Type\ActivityFormType;
use CoopersPeele\ClubBundle\Form\Type\ActivityParticipantsFormType;
use CoopersPeele\ClubBundle\Propel\Activity;
use CoopersPeele\ClubBundle\Propel\ActivityManager;
use CoopersPeele\ClubBundle\Propel\ActivityQuery;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UAM\Bundle\DatatablesBundle\Controller\DatatablesEnabledControllerTrait;

/**
 * @route("/activity")
 * @Template()
 */
class ActivityController extends Controller
{
    use DatatablesEnabledControllerTrait {
        indexAction as baseIndexAction;
        listAction as baseListAction;
    }

    /**
     * @Route(
     *      "/activity",
     *      name="activities"
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
     *      "/list",
     *      name="activity_list",
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
     *      "/create",
     *      name="activity_create"
     * )
     */
    public function createAction(Request $request)
    {
        $activity = new Activity();

        $form = $this->createForm(
            new ActivityFormType(),
            $activity,
            array(
                'action' => $this->generateUrl($request->attributes->get('_route'))
            )
        );

        $form->handleRequest($request);

        if ($form->isValid()) {
            $activity->save();

            return $this->redirect($this->generateUrl(
                'activity_show',
                array(
                    'id' => $activity->getId()
                )
            ));
        }

        return array(
            'activity' => $activity,
            'form' => $form->createView(),
        );
    }

    /**
    * @Route(
    *       "/{id}",
    *       name="activity_show",
    *       requirements={
    *           "id": "\d+"
    *       }
    * )
    */
    public function showAction(Request $request, $id)
    {
        $activity = ActivityQuery::create()
            ->findPk($id);

        if (!$activity) {
            throw $this->createNotFoundException('Activity Not Found');
        }

        $form = $this->createForm(
            new ActivityParticipantsFormType(),
            $activity,
            array(
                'action' => $this->generateUrl('activity_show', array('id' => $id)),
            )
        );

        $form->handleRequest($request);

        if ($form->isValid()) {
            $activity->save();
        }

        return array(
            'activity' => $activity,
            'form' => $form->createView(),
        );
    }

    protected function getEntityManager()
    {
        return new ActivityManager();
    }
}
