<?php

class User {
	
	private $_username;

   

    public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
    }
    

    // Constructor
	
    public function __construct($username){
        $this->_username = $username;
        
        }
}





?>