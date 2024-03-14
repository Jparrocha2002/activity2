<?php

class Database
{
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli('localhost','root','','api_db');
    }
}
?>