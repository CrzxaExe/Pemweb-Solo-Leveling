<?php
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