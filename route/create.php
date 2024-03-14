<?php

include '../controller/UserController.php';

$create = new UserController();
echo $create->insert($_POST);

?>