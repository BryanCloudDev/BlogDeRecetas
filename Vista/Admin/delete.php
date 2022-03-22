<?php
    include 'Vista/Admin/headerAdmin.php';

    $users = getUsers();
    if(!isset($_POST['id'])){
        include "componentes/not_found.php";
        exit;
    }
    $userId = $_POST['id'];
    deleteUser($userId);

    header("Location: index.php")

?>
