<?php

namespace Controller;

use Core\Controller;
use Core\Db;
use Core\Request;
use Helper\Notification\ErrorSuccessBuilder;
use Helper\Validation\InputValidation;
use Helper\Validation\UserValidation;
use Model\User as UserModel;
use Session\Notification;

class User extends Controller
{
    public function index()
    {
        echo 'user index';
    }

    public function login_and_register()
    {
        $this->render('user/login_and_register', []);
    }

    public function create()
    {
        $user = new UserModel();
        $request = new Request();
        $notification = new Notification();

        $validation = new UserValidation();


        if ($validation->isRegisterValid($request->getPost('register-email-input'))) {
            $user->setEmail($request->getPost('register-email-input'));
            $user->setPassword(md5($request->getPost('register-password-input')));
            $user->setRole(0);
            $user->save();
        } else {
            echo 'Įrašykite el. pašto adresą';
        }

        header("Location: " . BASE_URL . '/user/login_and_register'); /* Redirect browser */
    }

    public function getUserObjectById($id)
    {
        $user = new UserModel();
        return $user->getUserObjectById($id);
    }
}