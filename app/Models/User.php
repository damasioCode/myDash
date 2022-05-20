<?php

namespace App\Models;

class User
{
    private $id;
    private $name;
    private $email;
    private $password;

    final public function authLogin() 
    {
        //connection to database
        $conn = Lib\Damakron\Database\Connection::getConn();

        //select user by email
        $sql = "SELECT * FROM users WHERE email = :email";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        
        if( $stmt->rowCount() ) {
            $result = $stmt->fetch();

            if( password_verify( $this->password, $result['password'] ) ){
                $_SESSION['user'] = [
                    'id_user' => $result['id'], 
                    'name_user' => $result['name']
                ];

                return true;
            }
        }
        throw new \Exception('Invalid email or password');
    }

    public function setName( $name ) 
    {
        $this->name = $name;
    }

    public function getName() 
    {
        return $this->name;
    }

    public function setEmail( $email ) 
    {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setPassword( $password ) 
    {
        $this->password = $password;
    }

    public function getPassword() 
    {
        return $this->password;
    }

    public function setId( $id ) 
    {
        $this->id = $id;
    }

    public function getId() 
    {
        return $this->id;
    }


}