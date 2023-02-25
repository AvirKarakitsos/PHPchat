<?php

namespace App\Validation;

use App\Models\User;

class Validator
{
    public function validateRegister($pseudo,$passw){
        
        if(!empty($pseudo) AND !empty($passw)){

            $user = new User();   
            $user->getUserByPseudo($pseudo);
            
            // var_dump($user->count_row);
            // die();
            
            if($user->count_row > 0){
                $_SESSION['error'] = "Ce pseudo n'est pas disponible !";
                return header('Location: /register');
                exit;
            }else{
                $new = new User();
                $new->saveUser($pseudo,$passw);

                $newUser = (new User())->getUserByPseudo($pseudo);   

                $_SESSION['id'] = $newUser[0]->id;
                return header("Location: /users");
            }

        }else{
            $_SESSION['error'] = 'Veuillez remplir les champs !';
            return header('Location: /register');
            exit;
        }
    }

    public function validate($pseudo,$mdp)
    {
        $user = new User();   
        $result = $user->getUserByPseudo($pseudo);

        if($user->count_row > 0){
            if(!empty($mdp)){
                if(password_verify($mdp,$result[0]->passw)){
                    $_SESSION['id'] = $result[0]->id;
                    return header('Location: /users');
                }else{
                    $_SESSION['error'] = 'Mot de passe incorrect !';
                    return header('Location: /login');
                    exit;
                }
            }else{
                $_SESSION['error'] = 'Veuillez entrer un mot de passe !';
                return header('Location: /login');
                exit;
            }

        }else{ 
            $_SESSION['error'] = 'champs obligatoires !';
            return header('Location: /login');
            exit;
        }
    }
}