<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Blood;


/**
 * @Route("/blood")
 */
class BloodController extends Controller
{
    /**
     * @Route("/", name="blood")
     */
    public function getBood(Request $request)
    {
        $user = $this -> getUser();

        $blood = $user -> getBloods();
        $data = $user -> getDataPersonal();
        return $this->render('static/blood.html.twig',[
          'blood'=> $blood,
          'data' => $data
        ]);
    }


    /**
     * @Route("/add/{id}", name="blood_add")
     */
    public function addBood(Request $request, $id)
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
