<?php
    require_once("./database/database.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $student['name'] = isset($_POST["name"]) ? $_POST["name"] : "";
        $student['age'] = isset($_POST["age"]) ? $_POST["age"] : "";
        $student['email'] = isset($_POST["email"]) ? $_POST["email"] : "";
        $student['profile'] = isset($_POST["image_url"]) ? $_POST["image_url"] : "";
        $student['id'] = isset($_POST["id"]) ? $_POST["id"] : "";
        updateStudent($student);
    } 
    header('Location: index.php');
?>