<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\DataPersonal;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function indexAction(Request $request)
    {
        $user = $this -> getUser();
        $personalData = $user -> getDataPersonal();

        if ($this->get('app.authorization') -> isAdmin($user)) {
          return $this->redirectToRoute('dashboard_admin');
        }

        return $this->render('static/dashboard.html.twig',[
          'personalData' => $personalData
        ]);
    }
}
