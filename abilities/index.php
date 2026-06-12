<?php
session_start();

require "../utils/database.php";

$basePath = '..';
$db = new Database();

/* =========================
   ABILITIES
========================= */
$ownerId = $_GET['id'] ?? '';

if ($ownerId) {
    $stmt = $db->db->prepare("
        SELECT *
        FROM abilities
        WHERE owner_id = ?
        ORDER BY ability_name
    ");

    $stmt->execute([$ownerId]);
    $abilities = $stmt->fetchAll();
} else {
    $abilities = $db->find('abilities');
}

include_once __DIR__ . '/../components/topbar.php';
include_once __DIR__ . '/../components/wiki-icons.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Abilities | Solo Leveling Wiki</title>

    <link rel="stylesheet" href="../public/main.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/wiki-pages.css">
</head>

<body>

<main class="wiki-page abilities-page">

    <section class="abilities-wrap">

        <!-- ADD BUTTON -->
         <?php if(!empty($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
        <a
            class="wiki-btn wiki-plus"
            href="new.php<?= $ownerId ? '?owner_id=' . urlencode($ownerId) : '' ?>"
            aria-label="Tambah Ability"
        >
            <?php wiki_icon('plus'); ?>
        </a>
        <?php endif; ?>

        <?php if (empty($abilities)): ?>

            <p class="wiki-empty">
                Belum ada ability untuk karakter ini.
            </p>

        <?php endif; ?>

        <?php foreach ($abilities as $ability): ?>

            <article class="ability-card">

                <small>
                    <?= htmlspecialchars($ability['ability_type']) ?>
                </small>

                <h2>
                    <?= htmlspecialchars($ability['ability_name']) ?>
                </h2>

                <p>
                    <?= htmlspecialchars($ability['ability_description']) ?>
                </p>

                <div class="wiki-actions">

                    <a
                        class="wiki-btn"
                        href="delete.php?id=<?= urlencode($ability['id']) ?>"
                        onclick="return confirm('Hapus ability ini?')"
                        aria-label="Hapus Ability"
                    >
                        <?php wiki_icon('trash'); ?>
                    </a>

                    <a
                        class="wiki-btn"
                        href="edit.php?id=<?= urlencode($ability['id']) ?>"
                        aria-label="Edit Ability"
                    >
                        <?php wiki_icon('edit'); ?>
                    </a>

                </div>

            </article>

        <?php endforeach; ?>

    </section>

</main>

<script src="../public/js/script.js"></script>

</body>
</html>