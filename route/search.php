<?php

include '../controller/UserController.php';

$data = new UserController();
$search = $data->search($_GET);
echo json_encode($search);
?>