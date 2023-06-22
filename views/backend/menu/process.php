<?php
    require_once __DIR__ . "/../../../Class/Menu.php";

    $menuClass = new Menu();
    $action = $_GET['action'];

    if ($action == "add")
    {
        $menuClass->addData(
            $_POST['category'],
            $_POST['name'],
            $_POST['price'],
            $_POST['body'],
            $_POST['tag']
        );
        header("location:../home.php");
    }else if($action == "update") 
    {
        $menuClass->updateData(
            $_POST['id'],
            $_POST['category'],
            $_POST['name'],
            $_POST['price'],
            $_POST['body'],
            $_POST['tag']
        );
        header("location:../home.php");
    }else if($action == "delete")
    {
        $menuClass->deleteData(
            $_GET['id']
        );
        header("location:../home.php");
    }