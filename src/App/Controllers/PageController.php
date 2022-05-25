<?php

namespace App\Controllers;

use App\Core\Template;

$GLOBALS['PAGE_PERMISSIONS'] = [
    'login',
];

class PageController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('./App/Views');
        $twig = new \Twig\Environment($loader, [
            'auto_reload' => true,
        ]);
        $parameters['error'] = $_SESSION['msg_error']['msg'] ?? null;
        $parameters['name_user'] = $_SESSION['user']['name_user'] ?? null;
        $parameters['base_url'] = Template::getUrl() . '/../';
        // $parameters['post'] = var_dump($_POST);

        $template = $twig->load('home.html');
        echo $template->render( $parameters );
        // require_once __DIR__ . '/../view/home.php';
    }
    
    public function sobre() 
    {
        echo 'Essa é a pagina sobre';
    }
    
    public function debug( ) {
        // var_dump( $_GET['url'] );
        // echo 'Essa é a pagina 404';
    }
}