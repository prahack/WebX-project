<?php
require_once('class.UserAccount.php');
class DeveloperAccount extends UserAccount{
    private $profession;
    private $contactNum;
    private $linkedin;

    public function __construct($username,$useremail,$password,$usertype,$profession,$contactNum,$linkedin){
        parent::__construct($username,$useremail,$password,$usertype);
        $this->profession=$profession;
        $this->contactNum=$contactNum;
        $this->linkedin=$linkedin;    
    }

    public function setProfession($profession){
        $this->profession=$profession;
    }
    public function getProfession(){
        return $this->profession;
    }

    public function setContactNum($contactNum){
        $this->contactNum=$contactNum;
    }
    public function getContactNum(){
        return $this->contactNum;
    }

    public function setLinkedIn($linkedin){
        $this->linkedin=$linkedin;
    }
    public function getLinkedIn(){
        return $this->linkedin;
    }
}
?>