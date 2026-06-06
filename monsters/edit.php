<?php
require "../utils/string.php";
require "../utils/database.php";

$d = new Database();

$id = $_GET["id"] ?? "";

$stmt = $d->db->prepare("SELECT * FROM monsters WHERE char_id = ?");
$stmt->execute([$id]);
$monster = $stmt->fetch();

if(empty($monster)) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form = [
        ":id" => $_POST["id"],
        ":name" => trim($_POST["name"] ?? ''),
        ":species" => trim($_POST["species"] ?? ''),
        ":dungeon_id" => trim($_POST["dungeon_id"] ?? ''),
        ":description" => trim($_POST["description"] ?? ''),
        ":image" => $_POST["image"] ?: null,
        ":va" => trim($_POST["va"] ?? ''),
    ];

    $sql = "UPDATE monsters SET
                char_name = :name,
                char_species = :species,
                dungeon_id = :dungeon_id,
                char_description = :description,
                char_image = :image,
                char_va = :va
            WHERE char_id = :id";

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
    <title>Monster Baru</title>
</head>
<body>
    <form action="" method="post">
        <input hidden type="text" name="id" id="id" value="<?= $monster['char_id'] ?>">
        <input type="text" name="name" id="name" value="<?= $monster['char_name'] ?>">
        <input type="text" name="species" id="species" value="<?= $monster['char_species'] ?>">
        <input type="text" name="dungeon_id" id="dungeon_id" value="<?= $monster['dungeon_id'] ?>">
        <textarea name="description" id="description"><?= $monster['char_description'] ?></textarea>
        <input type="text" name="image" id="image" value="<?= $monster['char_image'] ?>">
        <input type="text" name="va" id="va" value="<?= $monster['char_va'] ?>">

        <input type="submit" value="edit" name="edit">
    </form>
</body>
</html>