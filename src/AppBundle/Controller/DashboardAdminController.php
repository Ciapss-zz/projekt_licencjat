<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\DataPersonal;

class DashboardAdminController extends Controller
{
    /**
     * @Route("/admin/dashboard/{surname}", name="dashboard_admin")
     */
    public function indexAction(Request $request, $surname)
    {
      $user = $this -> getUser();
      $personalData = $user -> getDataPersonal();
      $repository = $this->getDoctrine()->getRepository('AppBundle:User');
      $role = "ROLE_USER";

      $query = $repository->createQueryBuilder('u')
      // ->innerJoin('u.dataPersonal')
      ->where('u.roles LIKE :roles')
      // ->andWHERE('u.surname LILE :surname')
      ->setParameter('roles', '%"'.$role.'"%')
      // ->setParameter('surname', '%"'.$surname.'"%')
      ->getQuery();
      // $em = $this->getDoctrine()->getManager();
      // $query=$em
      //   ->createQueryBuilder()
      //   ->select('u')
      //   ->from('AppBundle:User','u')
      //   ->innerJoin('u.dataPersonal','p','WITH', 'p.surname LIKE :surname')
      //   ->where('u.roles LIKE :roles')
      //   // ->orWhere('p.surname LIKE :surname')
      //   ->setParameter('roles', '%"'.$role.'"%')
      //   ->setParameter('surname', '%"'.$surname.'"%')
      //   ->getQuery();


      $patients = $query->getResult();
      dump($patients);
      return $this->render('admin/dashboard.html.twig',[
        'personalData' => $personalData,
        'patients' => $patients
      ]);
    }
}
