<?php

namespace App\Controllers;

use App\Core\Template;

class LoginController
{
    
    public function auth() 
    {
        try {
            $user = new \App\Models\User();
            $user->setEmail( $_POST['email'] );
            $user->setPassword( $_POST['password'] );
            $user->authLogin();

            header("Location: ". Template::getUrl() . './dashboard');
        } catch (\Exception $e) {
            $_SESSION['msg_error'] = ['msg' => $e->getMessage(), 'count' => 0];            
            header("Location: ". Template::getUrl() . './');

            // echo "Email invalido seu noia";
        }
            
    }
    
    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        header("Location: ". Template::getUrl() . '/' );
    }
}