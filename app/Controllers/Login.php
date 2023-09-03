<?php

namespace App\Controllers;

use App\Models\LoginModel;


class Login extends BaseController
{
    public function index(): string
    {   
        return view('application/header').view('login/login').view('application/footer');
    }

    public function register(){
        return view('application/header').view('login/signup').view('application/footer');
    }

    public function auth(){

        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('pass');

        $loginModel = new LoginModel();

        $user = $loginModel->getUser($email, $pass);

        $session = session();
        
        if($user){
            $session->set('user', $user);

            return $this->verifyUser();

        } else {
            $session->setFlashdata('error', 'Credenciais Inválidas');
            return redirect()->to('login');
        }
    }

    public function verifyUser(){
        $session = session();

        $user = $session->get('user');
        if(!$user){
            return redirect()->to('login');
        } else {
            if($user->tipoUsuario == 1){
                return redirect()->to('/');
            } else if($user->tipoUsuario == 2){
                return redirect()->to('prad');
            }
        }
    }

    public function signup(){
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('pass');

        $session = session();

        $loginModel = new LoginModel();
        
        if($loginModel->getUser($email)){ 
            $session->setFlashdata('error', 'O usuário ja está cadastrado!');
            return redirect()->to('register');
        } else { 
            $loginModel->insertUser($name, $email, $pass);
        }
    }
}