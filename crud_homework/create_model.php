<?php
    require_once("./database/database.php");
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name = isset($_POST["name"]) ? $_POST["name"]:"";
        $age = isset($_POST["age"]) ? $_POST["age"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $profile = isset($_POST["image_url"]) ? $_POST["image_url"] : "";
    }
    createStudent($name,$age,$email,$profile);
    header('Location: index.php');
?>
