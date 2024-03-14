<?php

include '../database/db.php';

class UserMigration extends Database
{
    public function createTable()
    {
        $this->conn->query('CREATE TABLE IF NOT EXISTS person(
            id int primary key auto_increment,
            first_name varchar(255) not null,
            last_name varchar(255) not null,
            age int not null,
            gender varchar(255) not null
        )');
    }
}

?>