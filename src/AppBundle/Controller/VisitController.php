<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class VisitController extends Controller
{
    /**
     * @Route("/visit/register", name="visit_register")
     */
    public function registerAction(Request $request)
    {

        return $this->render('static/visit.html.twig');
    }
}
