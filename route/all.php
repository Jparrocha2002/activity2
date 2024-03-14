<?php

include '../controller/UserController.php';

$all = new UserController();
$all->allData($_GET);

?>