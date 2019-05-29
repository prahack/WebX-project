<?php
//require_once ('class.DevelopersList.php');
class DevelopersListAdapter implements ViewAdapter{
    private $developers;

    public function __construct(DevelopersList $developers){
        $this->developers=$developers;
    }

    public function viewDevelopersList($result_set){
        $this->developers->displayDevelopersList($result_set);
    }
}

?>