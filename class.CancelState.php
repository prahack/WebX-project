<?php
include_once('class.State.php');
class CancelState extends State{
    function __construct(){

    }
    public function getState(){
        return "canceled";
    }
}
?> 