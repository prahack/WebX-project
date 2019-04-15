<?php

class HashList {
	
   private static $users = array();

   

    public static function setUsers($user,$email) {
		HashList::$users['username'] = $user;
    }
    
    
    public static function getUser($email) {
		return HashList::$users['username'] ;
    }

    
	
    
}





?>