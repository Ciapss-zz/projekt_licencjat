<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\DataPersonal;

class DashboardAdminController extends Controller
{
    /**
     * @Route("/admin/dashboard", name="dashboard_admin")
     */
    public function indexAction(Request $request)
    {
      $user = $this -> getUser();
      $personalData = $user -> getDataPersonal();
      $repository = $this->getDoctrine()->getRepository('AppBundle:User');
      $role = "ROLE_USER";

      $query = $repository->createQueryBuilder('u')
      ->where('u.roles LIKE :roles')
      ->setParameter('roles', '%"'.$role.'"%')
      ->getQuery();

      $patients = $query->getResult();

      return $this->render('admin/dashboard.html.twig',[
        'personalData' => $personalData,
        'patients' => $patients
      ]);
    }
}
