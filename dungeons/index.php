<?php
session_start();
require "../utils/database.php";

$basePath = '..';
$db = new Database();
$dungeons = $db->find("dungeons");

function dungeon_icon(string $name): string
{
    switch ($name) {
        case 'plus':
            return '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M11 5h2v6h6v2h-6v6h-2v-6H5v-2h6V5Z"/></svg>';
        case 'trash':
            return '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 3h6l1 2h4v2H4V5h4l1-2Zm-2 6h10l-.7 11H7.7L7 9Zm3 2v7h2v-7h-2Zm4 0v7h2v-7h-2Z"/></svg>';
        case 'edit':
            return '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m4 16.8 11.5-11.5 3.2 3.2L7.2 20H4v-3.2ZM17 3.8l1.2-1.2a1.5 1.5 0 0 1 2.1 0l1.1 1.1a1.5 1.5 0 0 1 0 2.1L20.2 7 17 3.8Z"/></svg>';
        default:
            return '';
    }
}

include_once __DIR__ . '/../components/topbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dungeons | Solo Leveling Wiki</title>

    <link rel="stylesheet" href="../public/main.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>

<main class="wiki-page dungeon-page">
    <header class="dungeon-page__header">
        <h1 class="wiki-title">DUNGEONS</h1>

        <?php if(!empty($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
        <a class="wiki-btn wiki-plus" href="new.php" aria-label="Tambah dungeon">
            <?= dungeon_icon('plus') ?>
        </a>
        <?php endif; ?>
    </header>

    <?php if (empty($dungeons)): ?>
        <p class="wiki-empty">Belum ada dungeon.</p>
    <?php else: ?>
        <section class="dungeon-list">
            <?php foreach ($dungeons as $i => $d): ?>
                <article class="dungeon-item <?= $i === 0 ? 'is-open' : '' ?>">
                    <div class="dungeon-item__head">
                        <button
                            type="button"
                            class="dungeon-item__toggle"
                            aria-expanded="<?= $i === 0 ? 'true' : 'false' ?>"
                        >
                            <h2 class="dungeon-item__title">
                                <?= htmlspecialchars($d['dungeon_name']) ?>
                            </h2>
                            <div class="rank">
                                <?= htmlspecialchars($d['dungeon_rank']) ?>
                            </div>
                        </button>

                        <?php if(!empty($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                        <div class="wiki-actions">
                            <a class="wiki-btn wiki-btn--small"
                               href="delete.php?id=<?= urlencode($d['dungeon_id']) ?>"
                               onclick="return confirm('Hapus dungeon ini?')"
                               aria-label="Hapus dungeon">
                                <?= dungeon_icon('trash') ?>
                            </a>

                            <a class="wiki-btn wiki-btn--small"
                               href="edit.php?id=<?= urlencode($d['dungeon_id']) ?>"
                               aria-label="Edit dungeon">
                                <?= dungeon_icon('edit') ?>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="dungeon-item__body">
                        <div class="dungeon-item__media">
                            <img
                                src="<?= htmlspecialchars($d['dungeon_image'] ?: '../public/images/Cartenon_Temple.webp') ?>"
                                alt="<?= htmlspecialchars($d['dungeon_name']) ?>"
                            >
                        </div>

                        <div class="dungeon-item__copy">
                            <h2><?= htmlspecialchars($d['dungeon_name']) ?></h2>
                            <div class="rank"><?= htmlspecialchars($d['dungeon_rank']) ?></div>
                            <p><?= htmlspecialchars($d['dungeon_description']) ?></p>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>
</main>

<script>
document.querySelectorAll('.dungeon-item__toggle').forEach((btn) => {
    btn.addEventListener('click', () => {
        const item = btn.closest('.dungeon-item');
        item.classList.toggle('is-open');

        btn.setAttribute(
            'aria-expanded',
            item.classList.contains('is-open') ? 'true' : 'false'
        );
    });
});
</script>

<script src="../public/js/script.js"></script>
</body>
</html>