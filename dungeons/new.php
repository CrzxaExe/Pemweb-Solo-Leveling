<?php
require "../utils/string.php";
require "../utils/database.php";

if(isset($_POST["add"])) {
    $id = STR::random(6);

    $form = [
        ":id" => $id,
        ":name" => trim($_POST["name"] ?? ''),
        ":rank" => trim($_POST["rank"] ?? ''),
        ":location" => trim($_POST["location"] ?? ''),
        ":description" => trim($_POST["description"] ?? ''),
        ":image" => $_POST["image"] ?: null,
    ];

    $stmt = (new Database())->db->prepare("INSERT INTO dungeons VALUES (:id, :name, :rank, :location, :description, :image)");
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
    <title>Dungeon Baru</title>
</head>
<body>
    <form action="new.php" method="post">
        <input type="text" name="name" id="name">
        <input type="text" name="rank" id="rank">
        <input type="text" name="location" id="location">
        <textarea type="text" name="description" id="description"></textarea>
        <input type="text" name="image" id="image">

        <input type="submit" value="add" name="add">
    </form>
</body>
</html>