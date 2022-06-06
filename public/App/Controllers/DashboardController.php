<?php

namespace App\Controllers;

use App\Core\Template;

class DashboardController
{
    private $user;

    public function __construct() {
        
        $this->user = $_SESSION['user'] ?? null;

    }

    public function index()
    {
        if( $this->user ) {
            $loader = new \Twig\Loader\FilesystemLoader('./App/Views');
            $twig = new \Twig\Environment($loader, [
                'auto_reload' => true,
            ]);
    
            $template = $twig->load('dashboard.html');
            $parameters['name_user'] = $_SESSION['user']['name_user'];
            $parameters['base_url'] = $_ENV['BASE_PATH'];
            
            echo $template->render( $parameters );
        } else {
            header("Location: ". $_ENV['BASE_PATH'] );
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        header("Location: ". BASE_PATH );
    }

}