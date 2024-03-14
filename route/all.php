<?php

include '../controller/UserController.php';

$all = new UserController();
$alldata = $all->getAll();
echo json_encode($alldata);

?>