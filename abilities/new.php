<?php
require "../utils/string.php";
require "../utils/database.php";

session_start();

$id = $_GET["id"] ?? '';

if(empty($id) /*|| $_SESSION['role'] != "admin"*/) {
    echo "<script>history.back()</script>";
    exit;
}

if (isset($_POST["add"])) {
    $idr = STR::random(6);

    $form = [
        ":id" => $idr,
        ":owner_id" => trim($_POST["owner_id"] ?? ''),
        ":name" => trim($_POST["name"] ?? ''),
        ":type" => trim($_POST["type"] ?? ''),
        ":description" => trim($_POST["description"] ?? ''),
    ];

    $stmt = (new Database())->db->prepare("INSERT INTO abilities VALUES (:id, :owner_id, :name, :type, :description)");
    $stmt->execute($form);

    header("Location: index.php?id=".$id);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kemampuan Baru</title>

    <link rel="stylesheet" href="../public/main.css">
    <link rel="stylesheet" href="../public/css/dungeon-form.css">
    <style>
        .dungeons-edit-php .icon {
            transform: translateX(0);
        }

        .dungeons-edit-php .frame {
            min-height: auto;
            justify-content: start;
        }
    </style>
</head>

<body>
    <main class="dungeons-edit-php">
        <section class="frame" aria-labelledby="page-title">
            <header class="div">
                <a class="back" href="index.php" aria-label="Kembali">
                    <span class="rectangle" aria-hidden="true"></span>
                    <span class="text-wrapper">Kembali</span>
                </a>
                <h1 class="text-wrapper-2" id="page-title">Tambah</h1>
            </header>
            <section class="form" aria-label="Form edit dungeon">
                <form class="frame-3" action="" method="post">
                    <label class="div-wrapper" for="name">
                        <input
                            class="text-wrapper-4"
                            id="name"
                            required
                            name="name"
                            type="text"
                            placeholder="Nama"
                            aria-label="Nama" />
                    </label>
                        <input
                            class="text-wrapper-5"
                            id="owner_id"
                            required
                            name="owner_id"
                            type="hidden"
                            value="<?= $id ?>"
                            placeholder="Owner ID"
                            aria-label="Owner ID" />
                    <label class="div-wrapper" for="type">
                        <input
                            class="text-wrapper-4"
                            id="type"
                            required
                            name="type"
                            type="text"
                            placeholder="Type"
                            aria-label="Type" />
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
</body>

</html>