<?php
date_default_timezone_set("Asia/Colombo");
class Request{
    private $id;
    private $devEmail;
    private $devName;
    private $clientEmail;
    private $clientName;
    private $duration;
    private $description;
    private $state;
    private $timeStamp;
    private $clientRating;
    private $devRating;
    private $requestedTime;

    public function __construct($id,$clientEmail,$clientName,$devEmail,$devName,$duration,$description){
        $this->id=$id;
        $this->devEmail=$devEmail;
        $this->devName=$devName;
        $this->clientEmail=$clientEmail;
        $this->clientName=$clientName;
        $this->duration=$duration;
        $this->description=$description;
        $this->state=new PendingState();
        $this->timeStamp=time();
        $this->clientRating="not yet";
        $this->devRating="not yet";
        //$this->cancelTime=date("t");
        $m=date("M");
        $d=date("d");
        $y=date("Y");
        $h=date("H");
        $i=date("i");
        $this->requestedTime=$m."-".$d."-".$y." at ".$h.":".$i."H";

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

    public function getTimeStamp(){
        return $this->timeStamp;
    }
    
    public function setState($state){
        $this->state=$state;
    }
    public function returnState(){
        return $this->state;
    }

    public function getClientRating(){
        return $this->clientRating;
    }
    public function setClientRating($crating){
        $this->clientRating=$crating;
    }

    public function getDevRating(){
        return $this->devRating;
    }
    public function setDevRating($drating){
        $this->devRating=$drating;
    }

    public function getRTime(){
        return $this->requestedTime;
    }
}

?>