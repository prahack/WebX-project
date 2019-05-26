<?php
//require_once('class.UserAccount.php');
class ClientAccount extends UserAccount{
    public function __construct($username,$useremail,$password,$usertype){
        parent::__construct($username,$useremail,$password,$usertype);   
    } 
    public function setName($username){
        parent::setName();
    }
    public function getName(){
        parent::getName();
    }

    public function setEmail($useremail){
        parent::setEmail();
    }
    public function getEmail(){
        parent::getName();
    }

    public function setPassword($password){
        $this->password=$password;
    }
    public function getPassword(){
        return $this->password;
    }

    public function setUserType($usertype){
        $this->usertype=$usertype;
    }
    public function getType(){
        return $this->usertype=$usertype;
    }
}
?>