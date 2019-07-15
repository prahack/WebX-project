<?php
require_once('class.State.php');
class FinishState extends State{
    function __construct(){

    }
    public function getState(){
        return "finished";
    }
}
?>