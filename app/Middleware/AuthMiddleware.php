<?php

namespace App\Middlewares;

class AuthMiddleware   {
   
   


    public function handle()
    {
        $canPass = true;
        if(isset($_SESSION['user']))
        {
            $date = new \DateTime(date('Y-m-d H:i:s'));
            if( strtotime($_SESSION['due_session'])  <  $date->getTimestamp() )
            {
                unset($_SESSION['user']);
                unset($_SESSION['due_session']);
                $canPass = false;
                return redirect('home');
            }
        }
        return  $canPass;
    }
    
}