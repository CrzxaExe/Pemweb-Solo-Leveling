<?php
session_start();
require "../utils/database.php";

$basePath = '..';
$db = new Database();
$humans = $db->find("humans");
$activeId = $_GET["id"] ?? ($humans[0]["char_id"] ?? "");
$activeIndex = 0;

foreach ($humans as $index => $human) {
    if ($human["char_id"] === $activeId) {
        $activeIndex = $index;
        break;
    }
}

$stmt = $db->db->prepare("SELECT * FROM abilities WHERE owner_id = ? ORDER BY ability_name");
$abilitiesByOwner = [];

foreach ($humans as $human) {
    $stmt->execute([$human["char_id"]]);
    $abilitiesByOwner[$human["char_id"]] = $stmt->fetchAll();
}

include_once __DIR__ . '/../components/topbar.php';
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

<main class="page-shell humans-page humans-fullscreen">
    <?php if(empty($humans)): ?>
        <section class="humans-empty">
            <h1>HUMANS</h1>
            <p>Belum ada karakter yang ditambahkan ke database.</p>
            <a class="human-action human-action--wide" href="new.php">Tambah karakter</a>
        </section>
    <?php else: ?>
        <section class="human-showcase" aria-label="Human character showcase">
            <div class="human-showcase__frame" aria-hidden="true">
                <span class="human-line human-line--top"></span>
                <span class="human-line human-line--left"></span>
                <span class="human-line human-line--right"></span>
                <span class="human-node human-node--one"></span>
                <span class="human-node human-node--two"></span>
            </div>

            <div class="human-copy">
                <h1 id="active-name"><?= htmlspecialchars($humans[$activeIndex]["char_name"]) ?></h1>
                <div class="human-meta">
                    <span id="active-rank"><?= htmlspecialchars($humans[$activeIndex]["char_rank"]) ?></span>
                    <span id="active-guild"><?= htmlspecialchars($humans[$activeIndex]["char_guild"]) ?></span>
                </div>
                <p id="active-description"><?= htmlspecialchars($humans[$activeIndex]["char_description"]) ?></p>
                <p class="human-va"><span id="active-va"><?= htmlspecialchars($humans[$activeIndex]["char_va"]) ?></span></p>
            </div>

            <figure class="human-portrait">
                <div class="human-portrait__glow" aria-hidden="true"></div>
                <img
                    id="active-image"
                    src="<?= htmlspecialchars($humans[$activeIndex]["char_image"]) ?>"
                    alt="<?= htmlspecialchars($humans[$activeIndex]["char_name"]) ?>"
                >
                <figcaption id="active-caption"><?= htmlspecialchars($humans[$activeIndex]["char_name"]) ?></figcaption>
            </figure>

<aside class="human-abilities" aria-label="Character abilities">
    <div class="human-abilities__heading">
        <span>KEMAMPUAN</span>
        <strong id="ability-count"><?= count($abilitiesByOwner[$humans[$activeIndex]["char_id"]] ?? []) ?></strong>
    </div>

    <div class="human-abilities__list" id="ability-list"></div>
    <div class="human-abilities__desc" id="ability-desc" hidden></div>
</aside>

            <nav class="human-actions" aria-label="Human actions">
                <a class="human-action" id="delete-link" href="delete.php?id=<?= htmlspecialchars($humans[$activeIndex]["char_id"]) ?>" onclick="return confirm('Hapus karakter ini?')" aria-label="Hapus karakter">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 3h6l1 2h4v2H4V5h4l1-2Zm-2 6h10l-.7 11H7.7L7 9Zm3 2v7h2v-7h-2Zm4 0v7h2v-7h-2Z"/></svg>
                </a>
                <a class="human-action" id="ability-link" href="../abilities/index.php?id=<?= htmlspecialchars($humans[$activeIndex]["char_id"]) ?>" aria-label="Buka ability">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14.8 3.2 21 1l-2.2 6.2-9.9 9.9-4-4 9.9-9.9ZM3.6 14.4l6 6-2.1 2.1-2.2-2.2-2 2L1.7 20.7l2-2-2.2-2.2 2.1-2.1Z"/></svg>
                </a>
                <a class="human-action" href="new.php" aria-label="Tambah karakter">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M11 5h2v6h6v2h-6v6h-2v-6H5v-2h6V5Z"/></svg>
                </a>
                <a class="human-action" id="edit-link" href="edit.php?id=<?= htmlspecialchars($humans[$activeIndex]["char_id"]) ?>" aria-label="Edit karakter">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m4 16.8 11.5-11.5 3.2 3.2L7.2 20H4v-3.2ZM17 3.8l1.2-1.2a1.5 1.5 0 0 1 2.1 0l1.1 1.1a1.5 1.5 0 0 1 0 2.1L20.2 7 17 3.8Z"/></svg>
                </a>
            </nav>
        </section>

        <section class="human-thumbnails" aria-label="Choose human character">
            <button class="human-thumb-nav" id="human-prev" type="button" aria-label="Karakter sebelumnya"><span aria-hidden="true"></span></button>

            <div class="human-thumb-track-wrapper">
                <div class="human-thumb-track">
                    <?php foreach($humans as $index => $human): ?>
                        <button
                            class="human-thumb <?= $index === $activeIndex ? 'is-active' : '' ?>"
                            type="button"
                            data-index="<?= $index ?>"
                            aria-label="Tampilkan <?= htmlspecialchars($human["char_name"]) ?>"
                        >
                            <img src="<?= htmlspecialchars($human["char_image"]) ?>" alt="">
                            <strong><?= htmlspecialchars($human["char_rank"]) ?></strong>
                            <span><?= htmlspecialchars($human["char_name"]) ?></span>
                            <small><?= htmlspecialchars($human["char_va"]) ?></small>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <button class="human-thumb-nav human-thumb-nav--next" id="human-next" type="button" aria-label="Karakter berikutnya"><span aria-hidden="true"></span></button>
        </section>
    <?php endif; ?>
</main>

<script>
const humans = <?= json_encode($humans, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
const abilitiesByOwner = <?= json_encode($abilitiesByOwner, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;

const activeName = document.getElementById("active-name");
const activeRank = document.getElementById("active-rank");
const activeGuild = document.getElementById("active-guild");
const activeDescription = document.getElementById("active-description");
const activeVa = document.getElementById("active-va");
const activeImage = document.getElementById("active-image");
const activeCaption = document.getElementById("active-caption");
const abilityList = document.getElementById("ability-list");
const abilityCount = document.getElementById("ability-count");
const deleteLink = document.getElementById("delete-link");
const abilityLink = document.getElementById("ability-link");
const editLink = document.getElementById("edit-link");

const thumbTrackWrapper = document.querySelector('.human-thumb-track-wrapper');
const thumbTrack = document.querySelector('.human-thumb-track');
let thumbs = Array.from(document.querySelectorAll('.human-thumb'));
let currentHumanIndex = <?= (int) $activeIndex ?>;

const prevBtn = document.getElementById('human-prev');
const nextBtn = document.getElementById('human-next');

function escapeHtml(value) {
    return String(value ?? "").replace(/[&<>\"']/g, (char) => ({
        "&": "&amp;",
        "<": "&lt;",
        ">": "&gt;",
        "\"": "&quot;",
        "'": "&#039;"
    })[char]);
}

function renderAbilities(ownerId) {
    const abilities = abilitiesByOwner[ownerId] || [];
    abilityCount.textContent = abilities.length;

    if (abilities.length === 0) {
        abilityList.innerHTML = '<p class="human-ability-empty">Belum ada ability.</p>';
        return;
    }

    // render two-column abilities: left = description panel, right = list of names
    abilityList.innerHTML = `
        <div class="human-abilities__body">
            <div class="human-abilities__desc" id="ability-desc"></div>
            <div class="human-abilities__names">
                ${abilities.map((ability, i) => `
                    <div class="human-ability" data-index="${i}" data-name="${escapeHtml(ability.ability_name)}" data-desc="${escapeHtml(ability.ability_description)}">
                        <h2>${escapeHtml(ability.ability_name)}</h2>
                    </div>
                `).join("")}
            </div>
        </div>
    `;

    // bind toggles for the names
    bindAbilityToggles();
}

function bindAbilityToggles() {
    const descEl = document.getElementById('ability-desc');
    const items = Array.from(abilityList.querySelectorAll('.human-ability'));
    items.forEach(item => {
        item.removeEventListener('click', item._toggleHandler);
        const handler = (e) => {
            if (e.target.closest('a,button')) return;
            const isOpen = item.classList.contains('is-open');
            // close all
            items.forEach(it => it.classList.remove('is-open'));
            if (isOpen) {
                // was open -> close
                descEl.innerHTML = '';
            } else {
                // open this one
                item.classList.add('is-open');
                descEl.innerHTML = `
<div class="ability-popup">
    ${escapeHtml(item.dataset.desc)}
</div>
`;
            }
        };
        item._toggleHandler = handler;
        item.addEventListener('click', handler);
    });
}

function updateTrack() {
    if (!thumbs.length || !thumbTrackWrapper) return;
    const wrapper = thumbTrackWrapper;
    const track = thumbTrack;
    const thumbEl = thumbs[0];
    const thumbWidth = thumbEl.offsetWidth;
    const gap = parseFloat(getComputedStyle(track).gap) || 16;
    const translate = (wrapper.clientWidth / 2) - (thumbWidth / 2) - currentHumanIndex * (thumbWidth + gap);
    track.style.transform = `translateX(${translate}px)`;
}

function setActiveHuman(index) {
    const human = humans[index];
    if (!human) return;

    currentHumanIndex = index;

    activeName.textContent = human.char_name || "";
    activeRank.textContent = human.char_rank || "";
    activeGuild.textContent = human.char_guild || "";
    activeDescription.textContent = human.char_description || "";
    activeVa.textContent = human.char_va || "";
    activeImage.src = human.char_image || "";
    activeImage.alt = human.char_name || "";
    activeCaption.textContent = human.char_name || "";

    deleteLink.href = `delete.php?id=${encodeURIComponent(human.char_id)}`;
    abilityLink.href = `../abilities/index.php?id=${encodeURIComponent(human.char_id)}`;
    editLink.href = `edit.php?id=${encodeURIComponent(human.char_id)}`;
    renderAbilities(human.char_id);

    thumbs.forEach((thumb) => thumb.classList.toggle("is-active", Number(thumb.dataset.index) === index));

    updateTrack();
}

function bindThumbEvents() {
    thumbs.forEach((thumb) => {
        thumb.removeEventListener('click', thumb._clickHandler);
        const handler = () => setActiveHuman(Number(thumb.dataset.index));
        thumb._clickHandler = handler;
        thumb.addEventListener('click', handler);
    });
}

bindThumbEvents();

prevBtn?.addEventListener('click', () => {
    const nextIndex = (currentHumanIndex - 1 + humans.length) % humans.length;
    setActiveHuman(nextIndex);
});

nextBtn?.addEventListener('click', () => {
    const nextIndex = (currentHumanIndex + 1) % humans.length;
    setActiveHuman(nextIndex);
});

window.addEventListener('resize', () => updateTrack());

// initial render
setActiveHuman(currentHumanIndex);

</script>
<script src="../public/js/script.js"></script>
</body>
</html>
  </div>
</main>

