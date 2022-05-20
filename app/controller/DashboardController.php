<?php

namespace App\Controller;

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
            $loader = new \Twig\Loader\FilesystemLoader('../app/view');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                'auto_reload' => true,
            ]);
    
            $template = $twig->load('dashboard.html');
            $parameters['name_user'] = $_SESSION['user']['name_user'];
            $parameters['base_url'] = Template::getUrl();
            
            echo $template->render( $parameters );
        } else {
            header("Location: ". Template::getUrl() . '/' );
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        header("Location: ". Template::getUrl() . '/' );
    }

}