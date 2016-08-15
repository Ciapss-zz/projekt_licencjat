<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Form\MedicalHistory;
use AppBundle\Entity\History;

/**
 * @Route("/history")
 */
class HistoryController extends Controller
{
    /**
     * @Route("/", name="history")
     */
    public function showHistory(Request $request)
    {
        $user = $this -> getUser();
        $visits = $user -> getHistories();
        return $this->render('static/history.html.twig',[
          'visits' => $visits
        ]);
    }

    /**
     * @Route("/add/{id}", name="history_add")
     */
    public function addHistory(Request $request, $id)
    {
        $user = $this -> getDoctrine() -> getRepository('AppBundle:User') -> findOneById($id);
        $history = new History();
        $form = $this -> createForm(MedicalHistory::class, $history);
        $form -> handleRequest($request);

        $visits = $this -> getDoctrine() -> getRepository('AppBundle:History') -> findByUser($user);


        if ($form -> isSubmitted() && $form -> isValid()) {
          $history = $form -> getData();
          $history -> setUser($user);

          $em = $this -> getDoctrine() -> getManager();
          $em -> persist($history);
          $em -> flush();

          $this -> addFlash(
            'notice',
            'Description of a visit was added!'
          );

          return $this -> redirectToRoute('history_add', [
            'id' => $id,
            'visits' => $visits
          ]);
        }
        return $this->render('static/addHistory.html.twig',[
          'form' => $form -> createView(),
          'visits' => $visits
        ]);
    }
}
