<?php

namespace App\Controllers;

abstract class Controller // on ne peut pas créer d'objet new Controller()
{  
  
    public function __construct()
    {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }

    }

    public function view(string $file, array $params = null)
    {
        ob_start();
        require VIEWS.$file.'.php';
        $content = ob_get_clean();

        require VIEWS.'layouts'.DIRECTORY_SEPARATOR.'app.php';
    }

    public function viewload(string $file, array $params = null)
    {
        ob_start();
        require VIEWS.$file.'.php';
        $content = ob_get_clean();

        require VIEWS.'layouts'.DIRECTORY_SEPARATOR.'appload.php';
    }

    public function isActive()
    {
        if($_SESSION['id']){
            return true;
        }else{
            return header('Location: /login');
        }

    }
}