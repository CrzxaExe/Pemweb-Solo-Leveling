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
    <title>Edit Human</title>

    <link rel="stylesheet" href="../public/main.css">
    <link rel="stylesheet" href="../public/css/human-form.css">
</head>

<body>
    <main class="human-edit-php">
        <section class="frame" aria-labelledby="page-title">
            <header class="div">
                <a class="back" href="index.php" aria-label="Kembali">
                    <span class="rectangle" aria-hidden="true"></span>
                    <span class="text-wrapper">Kembali</span>
                </a>
                <h1 class="text-wrapper-2" id="page-title">Edit</h1>
            </header>
            <section class="form" aria-label="Form edit dungeon">
                <figure class="frame-2">
                    <figcaption class="text-wrapper-3">Preview</figcaption>
                    <img class="image" id="preview-image" src="<?= $human["char_image"] ?>" alt="Preview" />
                </figure>
                <form class="frame-3" action="" method="post">
                    <input
                            class="text-wrapper-4"
                            id="id"
                            required
                            name="id"
                            type="hidden"
                            value="<?= $human["char_id"] ?>"
                            placeholder="Nama"
                            aria-label="Nama" />
                    <label class="div-wrapper" for="name">
                        <input
                            class="text-wrapper-4"
                            id="name"
                            required
                            name="name"
                            type="text"
                            value="<?= $human["char_name"] ?>"
                            placeholder="Nama"
                            aria-label="Name" />
                    </label>
                    <label class="div-wrapper" for="rank">
                        <input
                            class="text-wrapper-5"
                            id="rank"
                            required
                            name="rank"
                            type="text"
                            value="<?= $human["char_rank"] ?>"
                            placeholder="Rank"
                            aria-label="Rank" />
                    </label>
                    <label class="div-wrapper" for="guild">
                        <input
                            class="text-wrapper-5"
                            id="guild"
                            required
                            name="guild"
                            type="text"
                            value="<?= $human["char_guild"] ?>"
                            placeholder="Guild"
                            aria-label="Guild" />
                    </label>
                    <label class="div-wrapper" for="image">
                        <input
                            class="text-wrapper-4"
                            id="image"
                            required
                            name="image"
                            type="url"
                            value="<?= $human["char_image"] ?>"
                            placeholder="Image Url"
                            aria-label="Image URL" />
                    </label>
                    <label class="deskripsi" for="description">
                        <textarea
                            class="text-wrapper-6"
                            id="description"
                            required
                            name="description"
                            placeholder="Deskripsi"
                            aria-label="Deskripsi"><?= $human["char_description"] ?></textarea>
                    </label>
                    <label class="div-wrapper" for="va">
                        <input
                            class="text-wrapper-4"
                            id="va"
                            required
                            name="va"
                            type="text"
                            value="<?= $human["char_va"] ?>"
                            placeholder="VA"
                            aria-label="VA" />
                    </label>
                    <button class="icon" name="add" value="add" type="submit" aria-label="Simpan">
                        <span class="save" aria-hidden="true">
                            <img class="vector" src="../public/svg/save.svg" alt="" />
                        </span>
                        <span class="text-wrapper-7">Simpan</span>
                    </button>
                </form>
            </section>
        </section>
    </main>

    <script>
        const url = document.getElementById("image");
        const preview = document.getElementById("preview-image");

        url.addEventListener("change", (e) => {
            preview.src = e.target.value
        })
    </script>
</body>

</html>