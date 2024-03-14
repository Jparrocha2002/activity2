<?php

include '../controller/UserController.php';

$create = new UserController();
echo $create->insertData($_POST);

?>