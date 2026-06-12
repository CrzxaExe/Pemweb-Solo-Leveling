<?php
require "../utils/database.php";

session_start();

$id = $_GET["id"];

if(empty($id)) {
    echo "<script>history.back()</script>";
    exit;
}

$d = new Database();
$data = $d->findOne("abilities", "owner_id", $id);

print_r($data);

?>