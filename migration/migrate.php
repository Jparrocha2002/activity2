<?php

include 'user_table.php';

$migrate = new UserMigration();
$migrate->createTable();
?>
