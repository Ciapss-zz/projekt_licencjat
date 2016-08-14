<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Blood;
use AppBundle\Form\BloodTestForm;


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
      $repository = $this->getDoctrine()->getRepository('AppBundle:User');
      $user = $repository-> findOneById($id);
      $blood = new Blood();
      $bloods = $user -> getBloods();
      $data = $user -> getDataPersonal();
      $form = $this -> createForm(BloodTestForm::class,$blood);
      $form ->handleRequest ($request);
      if ($form -> isSubmitted() && $form -> isValid() )
      {
        $blood = $form -> getData();
        $blood -> setUser($user);
        $em = $this -> getDoctrine() -> getManager();
        $em -> persist($blood);
        $em -> flush();
        $this -> addFlash(
          'notice',
          'Form were saved!'
        );
        return $this -> redirectToRoute('blood_add',[
          'id' => $id
        ]);
      }
      return $this->render('static/addBlood.html.twig',[
        'blood'=> $blood,
        'bloods'=> $bloods,
        'form' => $form -> createView(),
        'id' => $id,
        'data' => $data
      ]);
    }
}
