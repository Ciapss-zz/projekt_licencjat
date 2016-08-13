<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Blood;

class BloodController extends Controller
{
    /**
     * @Route("/blood", name="blood")
     */
    public function indexAction(Request $request)
    {
        $user = $this -> getUser();

        $blood = $user -> getBloods();
        $data = $user -> getDataPersonal();
        return $this->render('static/blood.html.twig',[
          'blood'=> $blood,
          'data' => $data
        ]);
    }
}
