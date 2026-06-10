<?php
session_start();
require "../utils/database.php";

if(!empty($_SESSION) && $_SESSION['role'] == 'admin') {
    echo "admin";
}

$result = (new Database())->find("monsters");

?>