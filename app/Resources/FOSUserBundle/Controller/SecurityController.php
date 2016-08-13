<?php
use Symfony\Component\HttpFoundation\RedirectResponse;

namespace FOS\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class SecurityController extends Controller
{

  public function loginAction(Request $request)
  {
      $authChecker = $this->container->get('security.authorization_checker');
      $router = $this->container->get('router');

      if ($authChecker->isGranted('ROLE_ADMIN')) {
          return new RedirectResponse($router->generate('admin_home'), 307);
      }

      if ($securityContext->isGranted('ROLE_USER')) {
          return new RedirectResponse($router->generate('dupa'), 307);
      }
  }
}
