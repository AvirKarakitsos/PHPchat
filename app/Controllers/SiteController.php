<?php

namespace App\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Validation\Validator;

class SiteController extends Controller
{
    public function redirect()
    {   
        return header('Location: /login');
    }

    public function login()
    {   
        return $this->view('login');
    }
    
    public function register()
    {   
        return $this->view('register');
    }

    public function storeUser()
    {
        $new = new Validator();
        $new->validateRegister($_POST['pseudo'],$_POST['password']);
    }


    public function loginUser()
    {   
        $validator = new Validator();
        $validator->validate($_POST['pseudo'],$_POST['password']);
        
    }

    public function index()
    {
        $this->isActive();

        $pseudo = (new User())->findById($_SESSION['id']);
        
        $request = new User();
        $result = $request->all();

        return $this->view('dashboard',compact('pseudo','result'));
    }

    public function show(int $id)
    {
        $this->isActive();
       
        $_SESSION['to'] = $id;

        $request = new Message();
        $result = $request->messagesBetween( $_SESSION['id'],$_SESSION['to']);

        return $this->view('show',compact('result'));
    }

    public function load()
    {
        $this->isActive();
       
        $request = new Message();
        $result = $request->messagesBetween( $_SESSION['id'],$_SESSION['to']);

        return $this->viewload('load',compact('result'));
    }

    public function store()
    {
        $message = new Message();
        $message->save($_SESSION['id'],$_SESSION['to']);

        return header("Location: /users/".$_SESSION['to']);
    }

    public function logout()
    {
       
        $_SESSION = array();
        session_destroy();
        
        return header('Location: /login');
    }

}