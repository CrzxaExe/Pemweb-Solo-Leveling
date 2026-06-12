<?php
session_start();
require "../utils/database.php";

if(!empty($_SESSION) && $_SESSION['role'] == 'admin') {
    echo "admin";
}
// basePath untuk komponen topbar
$basePath = '..';
// include topbar (menggunakan $basePath)
include_once __DIR__ . '/../components/topbar.php';

$db = new Database();
// Ambil kolom dengan alias agar mudah diakses di view
$humans = $db->find("humans", "char_id AS id, char_name AS name, char_rank AS rank, char_description AS description, char_image AS image, char_guild AS guild, char_va AS va");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Humans | Solo Leveling Wiki</title>

    <link rel="stylesheet" href="../public/main.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>

<main class="page-shell">
    <section class="section-heading">
        <h2>HUMANS</h2>
        <p>Daftar karakter manusia pada wiki</p>
    </section>

    <div class="container">
        <div style="display:flex;justify-content:space-between;align-items:center;margin:1rem 0;">
            <div></div>
            <?php if(!empty($_SESSION['username']) && ($_SESSION['role'] ?? '') === 'admin'): ?>
                <a class="primary-btn" href="new.php">+ Create Human</a>
            <?php else: ?>
                <a class="primary-btn" href="../auth/login.php">Login to Create</a>
            <?php endif; ?>
        </div>

        <?php if(empty($humans)): ?>
            <div class="empty-state" style="padding:3rem 1rem;text-align:center;color:#aaa;">
                <h3>Tidak ada data manusia.</h3>
                <p>Belum ada karakter yang ditambahkan ke database.</p>
            </div>
        <?php else: ?>
            <div class="grid grid--cards" style="display:flex;flex-wrap:wrap;gap:1rem;">
                <?php foreach($humans as $h): ?>
                    <article class="card" style="width:260px;background:rgba(0,0,0,0.45);padding:1rem;border-radius:8px;">
                        <div class="card-media" style="height:180px;display:flex;align-items:center;justify-content:center;overflow:hidden;border-radius:6px;background:#111;">
                            <?php if(!empty($h['image'])): ?>
                                <img src="<?= htmlspecialchars($h['image']) ?>" alt="<?= htmlspecialchars($h['name']) ?>" style="max-width:100%;height:auto;">
                            <?php else: ?>
                                <div style="color:#888;font-size:0.9rem;">No image</div>
                            <?php endif; ?>
                        </div>

                        <div class="card-body" style="padding-top:0.75rem;">
                            <h3 style="margin:0 0 0.25rem 0;color:#fff;"><?= htmlspecialchars($h['name']) ?></h3>
                            <div style="color:#9aa; font-size:0.9rem; margin-bottom:0.5rem;">Rank: <?= htmlspecialchars($h['rank']) ?></div>
                            <p style="color:#cbd5e0; font-size:0.9rem; height:3.6rem; overflow:hidden;"><?= htmlspecialchars($h['description']) ?></p>
                        </div>

                        <div class="card-actions" style="display:flex;gap:0.5rem;margin-top:0.75rem;">
                            <?php if(!empty($_SESSION['username']) && ($_SESSION['role'] ?? '') === 'admin'): ?>
                                <a class="btn btn--edit" href="edit.php?id=<?= htmlspecialchars($h['id']) ?>" style="background:#2b6cb0;color:#fff;padding:0.4rem 0.6rem;border-radius:4px;text-decoration:none;">Edit</a>
                                <a class="btn btn--delete" href="delete.php?id=<?= htmlspecialchars($h['id']) ?>" onclick="return confirm('Hapus karakter ini?')" style="background:#e53e3e;color:#fff;padding:0.4rem 0.6rem;border-radius:4px;text-decoration:none;">Delete</a>
                            <?php else: ?>
                                <a class="btn" href="../auth/login.php" style="background:#4a5568;color:#fff;padding:0.4rem 0.6rem;border-radius:4px;text-decoration:none;">Login to manage</a>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<script src="../public/js/script.js"></script>
</body>
</html>