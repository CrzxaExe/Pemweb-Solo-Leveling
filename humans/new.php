<?php
require "../utils/string.php";
require "../utils/database.php";

if (isset($_POST["add"])) {
    $id = STR::random(6);

    $form = [
        ":id" => $id,
        ":name" => trim($_POST["name"] ?? ''),
        ":rank" => trim($_POST["rank"] ?? ''),
        ":description" => trim($_POST["description"] ?? ''),
        ":image" => $_POST["image"] ?: null,
        ":guild" => trim($_POST["guild"] ?? ''),
        ":va" => trim($_POST["va"] ?? ''),
    ];

    $stmt = (new Database())->db->prepare("INSERT INTO humans VALUES (:id, :name, :rank, :description, :image, :guild, :va)");
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
    <title>Human Baru</title>

    <link rel="stylesheet" href="../public/main.css">
    <link rel="stylesheet" href="../public/css/human-form.css">
</head>

<body>
    <main class="human-edit-php">
        <section class="frame" aria-labelledby="page-title">
            <header class="div">
                <a class="back" href="#" aria-label="Kembali">
                    <span class="rectangle" aria-hidden="true"></span>
                    <span class="text-wrapper">Kembali</span>
                </a>
                <h1 class="text-wrapper-2" id="page-title">Tambah</h1>
            </header>
            <section class="form" aria-label="Form edit dungeon">
                <figure class="frame-2">
                    <figcaption class="text-wrapper-3">Preview</figcaption>
                    <img class="image" id="preview-image" src="" alt="Preview" />
                </figure>
                <form class="frame-3" action="" method="post">
                    <label class="div-wrapper" for="name">
                        <input
                            class="text-wrapper-4"
                            id="name"
                            required
                            name="name"
                            type="text"
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
                            aria-label="Deskripsi"></textarea>
                    </label>
                    <label class="div-wrapper" for="va">
                        <input
                            class="text-wrapper-4"
                            id="va"
                            required
                            name="va"
                            type="text"
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