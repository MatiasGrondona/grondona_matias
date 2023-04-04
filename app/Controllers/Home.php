<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        /*
        return view('welcome_message');
        return view('principal.html');
        return view('plantilla.php');
        return view('header');
        return view('navbar');
        return view('carusel');
        return view('footer');
        */
        return view('header') . view('navbar') . view('carusel') . view('productos') . view('footer');
    }
    /*
    public function home(){
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('carusel');
        $this->load->view('footer');
    }
    */
}

