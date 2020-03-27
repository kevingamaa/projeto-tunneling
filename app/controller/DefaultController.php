<?php

namespace App\Controllers;

class DefaultController {

    public function notFound() {
        echo 'not found';
    }


    public function forbidden() {
        echo 'Você não tem permissão para acessar';
    }

   
}