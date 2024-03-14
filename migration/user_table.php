<?php

include '../database/db.php';

class UserMigration extends Database
{
    public function createTable()
    {
        $this->conn->query('CREATE TABLE IF NOT EXISTS user(
            id int primary key auto_increment,
            first_name varchar(255) not null,
            last_name varchar(255) not null,
            email varchar(255) not null UNIQUE,
            password varchar(255) not null,
            token varchar(255) not null
        )');
    }
}

?>