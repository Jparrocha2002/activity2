<?php

include '../controller/UserController.php';

$search = new UserController();
echo $search->search($_GET);

?>