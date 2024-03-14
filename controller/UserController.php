<?php

include '../model/user.php';

class UserController extends User
{
    public function insertData()
    {
        return $this->insert($_POST);
    }

    public function allData()
    {
        return $this->getAll();
    }

    public function searchData()
    {
        return $this->search();
    }
}

?>