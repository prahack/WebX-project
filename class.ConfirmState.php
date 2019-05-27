<?php
class ConfirmState extends State{
    function __construct(){

    } 
    public function changeState(Request $request){
        $request->setState(new ConfirmState());
    }
    public function getState(){
        return "confirm";
    }
}
?>