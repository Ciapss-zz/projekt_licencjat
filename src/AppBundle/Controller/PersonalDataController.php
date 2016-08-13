<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\PersonalDataForm;
use AppBundle\Entity\DataPersonal;

class PersonalDataController extends Controller
{
    /**
     * @Route("/personal/data", name="personal_data")
     */
    public function indexAction(Request $request)
    {


        $user = $this->getUser();
        if ($user -> getDataPersonal()) {
          $data = $user -> getDataPersonal();
        } else {
          $data= new DataPersonal();
        }


        $form = $this->createForm(PersonalDataForm::class, $data) -> setData($data);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            $data -> setUser($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();

            return $this->redirectToRoute('personal_data');
        }

        return $this->render('static/personalData.html.twig', [
          'form' => $form->createView(),
        ]);
    }
}
