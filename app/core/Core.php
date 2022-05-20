<?php

namespace App\Core;

use App\Core\Template;

class Core
{
    private $url;

    private $controller = 'App\\Controller\\PageController';
    private $method = 'index';
    private $params = [];

    private $user;

    private $error;

    public function __construct()
    {
        $this->user = $_SESSION['user'] ?? null;

        $this->error = $_SESSION['msg_error'] ?? null;

        if (isset($this->error)) {
            if ($this->error['count'] === 0) {
                $_SESSION['msg_error']['count']++;
            } else {
                unset($_SESSION['msg_error']);
            }
        }
    }

    final public function run( $request )
    {
        if( isset( $request['url'] ) ) {
            $pagePermission = [];
            //split url into controller, method and params
            $this->url = explode( '/', $request['url'] );

            //get url controller
            $this->controller = 'App\\Controller\\'.ucfirst($this->url[0]).'Controller';
            array_shift($this->url);

            if( isset($this->url[0]) && !empty($this->url[0]) ) {
                //get url method
                $this->method = $this->url[0];
                array_shift($this->url);

                if( isset($this->url[0]) && !empty($this->url[0]) ) {

                    //get url params
                    $this->params = $this->url;
                }
            }

            if(!method_exists($this->controller, $this->method)) {
                // header('Location: http://localhost:8080/myDash/public/404');
                header("Location: ". Template::getUrl() . '/404');
            }

            // if( $this->user ) {
            //     array_push($pagePermission, 'App\\Controller\\DashboardController');
                
            //     if( !isset( $this->controller ) || !in_array( $this->controller, $pagePermission ) ) {
            //         $this->controller = 'App\\Controller\\DashboardController';
            //         $this->method = 'index';
            //     } 
            // } 
            // else {
            //     array_push($pagePermission, 'App\\Controller\\LoginController');
    
            //     if( !isset( $this->controller ) || !in_array( $this->controller, $pagePermission ) ) {
            //         $this->controller = 'App\\Controller\\LoginController';
            //         $this->method = 'index';
            //         header('Location: http://localhost:8080/myDash/public/login');
            //     }
            // }
        } 


        return call_user_func([
            new $this->controller, $this->method
        ], $this->params);
        
    }
}