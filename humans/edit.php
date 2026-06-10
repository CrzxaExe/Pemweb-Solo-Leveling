<?php
require "../utils/string.php";
require "../utils/database.php";

$d = new Database();

$id = $_GET["id"] ?? "";

$stmt = $d->db->prepare("SELECT * FROM humans WHERE char_id = ?");
$stmt->execute([$id]);
$human = $stmt->fetch();

if(empty($human)) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form = [
        ":id" => $_POST["id"],
        ":name" => trim($_POST["name"] ?? ''),
        ":rank" => trim($_POST["rank"] ?? ''),
        ":description" => trim($_POST["description"] ?? ''),
        ":image" => $_POST["image"] ?: null,
        ":guild" => trim($_POST["guild"] ?? ''),
        ":va" => trim($_POST["va"] ?? ''),
    ];

    $sql = "UPDATE humans SET
                char_name = :name,
                char_rank = :rank,
                char_description = :description,
                char_image = :image,
                char_guild = :guild,
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
    <title>human Baru</title>
</head>
<body>
    <form action="" method="post">
        <input hidden type="text" name="id" id="id" value="<?= $human['char_id'] ?>">
        <input type="text" name="name" id="name" value="<?= $human['char_name'] ?>">
        <input type="text" name="rank" id="rank" value="<?= $human['char_rank'] ?>">
        <textarea name="description" id="description"><?= $human['char_description'] ?></textarea>
        <input type="text" name="image" id="image" value="<?= $human['char_image'] ?>">
        <input type="text" name="guild" id="guild" value="<?= $human['char_guild'] ?>">
        <input type="text" name="va" id="va" value="<?= $human['char_va'] ?>">

        <input type="submit" value="edit" name="edit">
    </form>
</body>
</html>