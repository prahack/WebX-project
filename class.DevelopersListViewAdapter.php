<?php
require_once ('interface.ViewAdapter.php');
class DevelopersListAdapter implements ViewAdapter{
    private $developers;

    public function __construct(DevelopersList $developers){
        $this->developers=$developers;
    }

    public function view($result_set){
        $this->developers->displayDevelopersList($result_set);
    }
}

?>