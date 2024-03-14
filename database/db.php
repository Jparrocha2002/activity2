<?php

class Database
{
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli('localhost','root','','parrocha');
        $this->conn->query('USE parrocha');
    }
}
?>