<?php
require "../utils/string.php";
require "../utils/database.php";

if(isset($_POST["add"])) {
    $id = STR::random(6);

    $form = [
        ":id" => $id,
        ":name" => trim($_POST["name"] ?? ''),
        ":species" => trim($_POST["species"] ?? ''),
        ":dungeon_id" => trim($_POST["dungeons_id"] ?? ''),
        ":description" => trim($_POST["description"] ?? ''),
        ":image" => $_POST["image"] ?: null,
        ":va" => trim($_POST["va"] ?? ''),
    ];

    $stmt = (new Database())->db->prepare("INSERT INTO monsters VALUES (:id, :name, :species, :dungeon_id, :description, :image, :va)");
    $stmt->execute($form);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monster Baru</title>
</head>
<body>
    <form action="new.php" method="post">
        <input type="text" name="name" id="name">
        <input type="text" name="species" id="species">
        <input type="text" name="dungeon_id" id="dungeon_id">
        <textarea type="text" name="description" id="description"></textarea>
        <input type="text" name="image" id="image">
        <input type="text" name="va" id="va">

        <input type="submit" value="add" name="add">
    </form>
</body>
</html>