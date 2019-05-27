<?php
require_once ('class.State.php');

class PendingState extends State{
    function __construct(){

    }
    public function changeStateToConfirm(Request $request){
        $request->setState(new ConfirmState());
    }
    public function changeStateToCancel(Request $request){
        $request->setState(new CancelState());
    }
    public function getState(){
        return "pending";
    }
}

?>