<?php
class SearchDeveloper{
    private $search;
    public function __construct(Search $search){
        $this->search=$search;
    }
    public function searchDev($input){
        $this->search->search($input);
    }
}

?>