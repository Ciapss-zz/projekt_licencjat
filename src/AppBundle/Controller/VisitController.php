<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\VisitRegisterForm;
use AppBundle\Entity\Visit;

class VisitController extends Controller
{
    /**
     * @Route("/visit/register", name="visit_register")
     */
    public function registerAction(Request $request)
    {
        $visit = new Visit();
        $user = $this -> getUser();
        $form = $this->createForm(VisitRegisterForm::class, $visit);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $visit = $form->getData();
            $visit -> setUser($user);
            dump($visit);
            $em = $this->getDoctrine()->getManager();
            $em->persist($visit);
            $em->flush();

            return $this->redirectToRoute('visit_register');
        }
        return $this->render('static/visit.html.twig',[
          'form' => $form -> createView()
        ]);
    }
}
