<?php

namespace Core\Classes;

use App\User;

class Auth {
  

   public function starts($user)
   {
        $_SESSION['user'] = $user;
        $date = new \DateTime(date('Y-m-d H:i:s'));
        $date->modify('+24 hours');
        $_SESSION['due_session'] = $date->format('Y-m-d H:i:s');
   }

   public function refresh(User $user)
   {
       $this->starts($user);
   }
}