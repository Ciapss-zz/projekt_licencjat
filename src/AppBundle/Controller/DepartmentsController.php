<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DepartmentsController extends Controller
{
    /**
     * @Route("/departments", name="departments")
     */
    public function indexAction(Request $request)
    {

        return $this->render('static/departments.html.twig');
    }
}
