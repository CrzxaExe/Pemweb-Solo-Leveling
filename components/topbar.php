<?php
<<<<<<< HEAD
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
        <li><a href="<?= $basePath ?>/index.php#main">Humans</a></li>
        <li><a href="<?= $basePath ?>/index.php#main">Dungeons</a></li>
        <li><a href="<?= $basePath ?>/index.php#official">Monsters</a></li>
    </ul>

    <?php if (!empty($_SESSION['username'])): ?>
        <form action="<?= $basePath ?>/auth/logout.php" method="POST" onsubmit="return confirm('Apakah anda ingin logout?')" style="justify-self: end;">
            <button type="submit" class="login-btn">Logout</button>
        </form>
    <?php else: ?>
        <a class="login-btn" href="<?= $basePath ?>/auth/login.php">Login</a>
    <?php endif; ?>
</nav>
=======
session_start();
?>

<header>
    <div>
        test
    </div>
    <?php if(!empty($_SESSION)): ?>
        <div>
            <form action="../auth/logout.php" method="POST" onsubmit="return confirm('Apakah anda ingin logout?')">
                <input type="submit" value="Logout">
            </form>
        </div>
    <?php endif; ?>
</header>
>>>>>>> b26334a20541f4331088f3a16faac4e975b02167
