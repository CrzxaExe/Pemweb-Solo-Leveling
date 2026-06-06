<?php
require "../utils/database.php";

$id = $_GET['id'];

$d = new Database();
$stmt = $d->db->prepare("DELETE FROM humans WHERE char_id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit();
?>