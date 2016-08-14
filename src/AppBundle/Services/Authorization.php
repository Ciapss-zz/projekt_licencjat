<?php

namespace AppBundle\Services;


class Authorization
{



    public function isAdmin($user)
    {
      $roleAuth = $user -> getRoles()[0];
      if ($roleAuth == "ROLE_SUPER_ADMIN") {
        return true;
      }
    }

}
