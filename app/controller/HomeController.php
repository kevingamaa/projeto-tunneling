<?php

namespace App\Controllers;

use App\User;
use Core\Classes\Auth;
use Core\Classes\Controller;
use Core\Classes\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        // dd($_SESSION);

        return  $this->view('home.index');
    }
}
