<!--Author: Lim Shao Fan-->
<?php

require_once '../Singleton/DBconnection.php';

class Admin {
    
    private $full_name;
    private $username;
    private $id;
    private $password;
    
    public function __construct($id, $full_name, $username) {
        $this->id = $id;
        $this->full_name = $full_name;
        $this->username = $username;
    }
    
    public function updateAdmin(){
        $instance = DBconnection::getInstance();
        $connn = $instance->getConnection();
        $id = $this->id;
        $full_name = $this->full_name;
        $username = $this->username;
        
        $pstmt = $connn->prepare("UPDATE tbl_admin SET
            full_name = '$full_name',
            username = '$username'
            WHERE id='$id'
                ");
        $pstmt->execute();
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id): void {
        $this->id = $id;
    }
    
    public function getFullName(){
        return $this->full_name;
    }
    
    public function setFullName($full_name): void {
        $this->full_name = $full_name;
    }
    
    public function getUsername(){
        return $this->username;
    }
    
    public function setUsername($username): void {
        $this->username = $username;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function setPassword($password): void {
        $this->password = $password;
    }
    
}

