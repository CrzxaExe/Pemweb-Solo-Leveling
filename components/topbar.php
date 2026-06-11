<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// $basePath ditentukan oleh file yang me-include topbar ini
// Default ke '.' (root) jika tidak diset
$basePath = $basePath ?? '.';
?>

<nav class="site-nav" id="siteNav" aria-label="Main navigation">
    <a class="brand" href="<?= $basePath ?>/index.php#home">
        <strong>
            SOLOLEVELING
            <small>K6</small>
        </strong>
        <span>Fanpage Wiki</span>
    </a>

    <ul class="nav-links">
        <li><a href="<?= $basePath ?>/humans/index.php">Humans</a></li>
        <li><a href="<?= $basePath ?>/dungeons/index.php">Dungeons</a></li>
        <li><a href="<?= $basePath ?>/monsters/index.php">Monsters</a></li>
    </ul>

    <?php if (!empty($_SESSION['username'])): ?>
        <form action="<?= $basePath ?>/auth/logout.php" method="POST" onsubmit="return confirm('Apakah anda ingin logout?')" style="justify-self: end;">
            <button type="submit" class="login-btn">Logout</button>
        </form>
    <?php else: ?>
        <a class="login-btn" href="<?= $basePath ?>/auth/login.php">Login</a>
    <?php endif; ?>
</nav>
