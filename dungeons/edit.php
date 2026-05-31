<?php
require "../utils/string.php";
require "../utils/database.php";

$d = new Database();

$id = $_GET["id"] ?? "";

$stmt = $d->db->prepare("SELECT * FROM dungeons WHERE dungeon_id = ?");
$stmt->execute([$id]);
$dungeon = $stmt->fetch();

if(empty($dungeon)) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form = [
        ":id" => $_POST["id"],
        ":name" => trim($_POST["name"] ?? ''),
        ":rank" => trim($_POST["rank"] ?? ''),
        ":location" => trim($_POST["location"] ?? ''),
        ":description" => trim($_POST["description"] ?? ''),
        ":image" => $_POST["image"] ?: null,
    ];

    $sql = "UPDATE dungeons SET
                dungeon_name = :name,
                dungeon_rank = :rank,
                dungeon_location = :location,
                dungeon_description = :description,
                dungeon_image = :image
            WHERE dungeon_id = :id";

    $stmt = $d->db->prepare($sql);
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
    <form action="" method="post">
        <input hidden type="text" name="id" id="id" value="<?= $dungeon['dungeon_id'] ?>">
        <input type="text" name="name" id="name" value="<?= $dungeon['dungeon_name'] ?>">
        <input type="text" name="rank" id="rank" value="<?= $dungeon['dungeon_rank'] ?>">
        <input type="text" name="location" id="location" value="<?= $dungeon['dungeon_location'] ?>">
        <textarea name="description" id="description"><?= $dungeon['dungeon_description'] ?></textarea>
        <input type="text" name="image" id="image" value="<?= $dungeon['dungeon_image'] ?>">

        <input type="submit" value="edit" name="edit">
    </form>
</body>
</html>