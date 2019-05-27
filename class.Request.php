<?php

class Request{
    private $id;
    private $devEmail;
    private $devName;
    private $clientEmail;
    private $clientName;
    private $duration;
    private $description;
    private $state;

    public function __construct($id,$clientEmail,$clientName,$devEmail,$devName,$duration,$description){
        $this->id=$id;
        $this->devEmail=$devEmail;
        $this->devName=$devName;
        $this->clientEmail=$clientEmail;
        $this->clientName=$clientName;
        $this->duration=$duration;
        $this->description=$description;
        $this->state=new PendingState();
    }

    public function getClientName(){
        return $this->clientName;
    }

    public function getClientEmail(){
        return $this->clientEmail;
    }

    public function getDevName(){
        return $this->devName;
    }

    public function getDevEmail(){
        return $this->devEmail;
    }

    public function getDuration(){
        return $this->duration;
    }
    
    public function getDescription(){
        return $this->description;
    }
    
    public function setState($state){
        $this->state=$state;
    }
    public function returnState(){
        return $this->state;
    }
}

?>