<?php
session_start();

require "../utils/database.php";

$basePath = '..';
$db = new Database();

/* =========================
   MONSTERS
========================= */
$stmt = $db->db->query("
    SELECT m.*, d.dungeon_name
    FROM monsters m
    LEFT JOIN dungeons d
        ON m.dungeon_id = d.dungeon_id
");

$monsters = $stmt->fetchAll();

/* =========================
   ACTIVE MONSTER
========================= */
$activeId = $_GET['id'] ?? ($monsters[0]['char_id'] ?? '');

$activeIndex = 0;

foreach ($monsters as $i => $monster) {
    if ($monster['char_id'] === $activeId) {
        $activeIndex = $i;
        break;
    }
}

$active = $monsters[$activeIndex] ?? null;

/* =========================
   ABILITIES
========================= */
$abilitiesByOwner = [];

$abilityStmt = $db->db->prepare("
    SELECT *
    FROM abilities
    WHERE owner_id = ?
    ORDER BY ability_name
");

foreach ($monsters as $monster) {
    $abilityStmt->execute([$monster['char_id']]);

    $abilitiesByOwner[$monster['char_id']] =
        $abilityStmt->fetchAll();
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

    <title>Monsters | Solo Leveling Wiki</title>

    <link rel="stylesheet" href="../public/main.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>

<main class="wiki-page monster-page">

<?php if (!$active): ?>

    <p class="wiki-empty">Belum ada monster.</p>

    <a class="wiki-btn monster-plus" href="new.php">
        <?php wiki_icon('plus'); ?>
    </a>

<?php else: ?>

    <!-- ADD -->
    <a class="wiki-btn monster-plus" href="new.php">
        <?php wiki_icon('plus'); ?>
    </a>

    <!-- ACTIONS -->
    <div class="wiki-actions monster-top-actions">

        <a
            class="wiki-btn wiki-btn--small"
            id="mDelete"
            href="delete.php?id=<?= urlencode($active['char_id']) ?>"
            onclick="return confirm('Hapus monster ini?')"
        >
            <?php wiki_icon('trash'); ?>
        </a>

        <a
            class="wiki-btn wiki-btn--small"
            id="mAbilityPage"
            href="../abilities/index.php?id=<?= urlencode($active['char_id']) ?>"
        >
            <?php wiki_icon('ability'); ?>
        </a>

        <a
            class="wiki-btn wiki-btn--small"
            id="mEdit"
            href="edit.php?id=<?= urlencode($active['char_id']) ?>"
        >
            <?php wiki_icon('edit'); ?>
        </a>

    </div>

    <!-- DETAIL -->
    <aside class="monster-detail">

        <h1 id="mName">
            <?= htmlspecialchars($active['char_name']) ?>
        </h1>

        <div class="meta">
            <span id="mSpecies">
                <?= htmlspecialchars($active['char_species']) ?>
            </span>

            -

            <span id="mDungeon">
                <?= htmlspecialchars($active['dungeon_name']) ?>
            </span>
        </div>

        <img
            id="mImage"
            src="<?= htmlspecialchars($active['char_image']) ?>"
            alt="<?= htmlspecialchars($active['char_name']) ?>"
        >

        <p id="mDungeonText">
            <?= htmlspecialchars($active['dungeon_name']) ?>
        </p>

        <p id="mVa">
            VA:
            <?= htmlspecialchars($active['char_va']) ?>
        </p>

        <p id="mDesc">
            <?= htmlspecialchars($active['char_description']) ?>
        </p>

        <h2>Kemampuan</h2>

        <div class="monster-abilities" id="mAbilities">

            <?php foreach ($abilitiesByOwner[$active['char_id']] ?? [] as $ability): ?>

                <a
                    href="../abilities/index.php?id=<?= urlencode($active['char_id']) ?>"
                >
                    <?= htmlspecialchars($ability['ability_name']) ?>
                </a>

            <?php endforeach; ?>

        </div>

    </aside>

    <!-- LIST -->
    <section class="monster-list">

        <h2 class="monster-list-title">
            Daftar
        </h2>

        <div class="monster-grid">

            <?php foreach ($monsters as $i => $monster): ?>

                <article
                    class="monster-card"
                    data-index="<?= $i ?>"
                >

                    <img
                        src="<?= htmlspecialchars($monster['char_image']) ?>"
                        alt="<?= htmlspecialchars($monster['char_name']) ?>"
                    >

                    <div class="monster-card__body">

                        <small>
                            <?= htmlspecialchars($monster['char_species']) ?>
                        </small>

                        <strong>
                            <?= htmlspecialchars($monster['char_name']) ?>
                        </strong>

                        <span>
                            VA:
                            <?= htmlspecialchars($monster['char_va']) ?>
                        </span>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    </section>

<?php endif; ?>

</main>

<script>
const monsters = <?= json_encode(
    $monsters,
    JSON_HEX_TAG |
    JSON_HEX_APOS |
    JSON_HEX_QUOT |
    JSON_HEX_AMP
) ?>;

const abilities = <?= json_encode(
    $abilitiesByOwner,
    JSON_HEX_TAG |
    JSON_HEX_APOS |
    JSON_HEX_QUOT |
    JSON_HEX_AMP
) ?>;

const $ = (id) => document.getElementById(id);

function escapeHtml(value) {
    return String(value ?? '')
        .replace(/[&<>"']/g, (char) => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        }[char]));
}

function showMonster(index) {

    const monster = monsters[index];

    if (!monster) return;

    $('mName').textContent =
        monster.char_name || '';

    $('mSpecies').textContent =
        monster.char_species || '';

    $('mDungeon').textContent =
        monster.dungeon_name || '';

    $('mDungeonText').textContent =
        monster.dungeon_name || '';

    $('mVa').textContent =
        'VA: ' + (monster.char_va || '');

    $('mDesc').textContent =
        monster.char_description || '';

    $('mImage').src =
        monster.char_image || '';

    $('mImage').alt =
        monster.char_name || '';

    $('mDelete').href =
        'delete.php?id=' +
        encodeURIComponent(monster.char_id);

    $('mAbilityPage').href =
        '../abilities/index.php?id=' +
        encodeURIComponent(monster.char_id);

    $('mEdit').href =
        'edit.php?id=' +
        encodeURIComponent(monster.char_id);

    const abilityList =
        abilities[monster.char_id] || [];

    $('mAbilities').innerHTML =
        abilityList.map(ability => `
            <a href="../abilities/index.php?id=${encodeURIComponent(monster.char_id)}">
                ${escapeHtml(ability.ability_name)}
            </a>
        `).join('')
        ||
        '<p class="wiki-empty">Belum ada ability.</p>';
}

document
    .querySelectorAll('.monster-card')
    .forEach(card => {
        card.addEventListener('click', () => {
            showMonster(
                Number(card.dataset.index)
            );
        });
    });
</script>

<script src="../public/js/script.js"></script>

</body>
</html>