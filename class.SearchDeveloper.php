<?php
require_once ('class.SearchByEmail.php');
class SearchDeveloper{
    private $search;
    public function __construct(Search $search){
        $this->search=$search;
    }
    public function searchDev($input,$type){

        $this->search->search($input,$type);
    }
}

?>