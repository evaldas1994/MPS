<?php


namespace Controller;


use Core\Controller;

class Error extends Controller
{
    public function index() {
        $this->render('error/index', []);
    }
}