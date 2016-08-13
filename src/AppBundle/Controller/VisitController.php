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

        $form = $this->createForm(VisitRegisterForm::class, $visit);
        return $this->render('static/visit.html.twig',[
          'form' => $form -> createView()
        ]);
    }
}
