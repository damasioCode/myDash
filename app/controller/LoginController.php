<?php

namespace App\Controller;

use App\Core\Template;

class LoginController
{
    
    public function auth() 
    {
        try {
            $user = new \App\Model\User();
            $user->setEmail( $_POST['email'] );
            $user->setPassword( $_POST['password'] );
            $user->authLogin();

            header("Location: ". Template::getUrl() . '/dashboard');
        } catch (\Exception $e) {
            $_SESSION['msg_error'] = ['msg' => $e->getMessage(), 'count' => 0];            
            header('Location: http://localhost:8080/myDash/public/');

            // echo "Email invalido seu noia";
        }
        
    }
}