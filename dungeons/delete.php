<?php
require "../utils/database.php";

$id = $_GET['id'];

$d = new Database();
$stmt = $d->db->prepare("DELETE FROM dungeons WHERE dungeon_id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit();
?>