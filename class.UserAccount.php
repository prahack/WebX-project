<?php
abstract class UserAccount{
    public $username;
    private $useremail;
    private $password;
    private $usertype;
  
    public function __construct($username,$useremail,$password,$usertype){
      $this->username = $username;
      $this->useremail = $useremail;
      $this->password = $password;
      $this->usertype = $usertype;
    }

    public function setName($username){
        $this->username=$username;
    }
    public function getName(){
        return $this->username;
    }

    public function setEmail($useremail){
        $this->useremail=$useremail;
    }
    public function getEmail(){
        return $this->useremail;
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