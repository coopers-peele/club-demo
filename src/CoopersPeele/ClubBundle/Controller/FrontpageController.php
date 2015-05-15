<?php

namespace CoopersPeele\ClubBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @route("/")
 * @Template()
 */
class FrontpageController extends Controller
{
    /**
     * @Route(
     *      "/",
     *      name="home"
     * )
     *
     */
    public function indexAction(Request $request)
    {
    	return array();
    }
}
