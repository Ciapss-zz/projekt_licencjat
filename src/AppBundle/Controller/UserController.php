<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use AppBundle\Form\PersonalDataForm;
use AppBundle\Entity\DataPersonal;

/**
 * User controller.
 *
 * @Route("/user")
 */
class UserController extends Controller
{


    /**
     * Deletes a User entity.
     *
     * @Route("/{id}", name="user_delete")
     */
    public function deleteAction(Request $request, User $user)
    {
        // $form = $this->createDeleteForm($user);
        // $form->handleRequest($request);

        // if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();
        // }

        return $this->redirectToRoute('dashboard_admin');
    }

    /**
     * Edit a User entity.
     *
     * @Route("/edit/{id}", name="user_edit")
     */
    public function editAction(Request $request, User $user, $id)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:User');

        $user = $repository-> findById($id);
        dump($user);
        $data = $user[0] -> getDataPersonal();



        $form = $this->createForm(PersonalDataForm::class, $data) -> setData($data);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();

            $this->addFlash(
              'notice',
              'Your changes were saved!'
          );

            return $this->redirectToRoute('user_edit', [
            'id' => $id
          ]);
        }

        return $this->render('static/personalData.html.twig', [
        'form' => $form->createView(),
      ]);
    }
}
