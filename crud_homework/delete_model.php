<?php
    require_once("./database/database.php");
    if(isset($_GET['id'])){
        deleteStudent($_GET['id']);
    }
    header('Location: index.php');
?>