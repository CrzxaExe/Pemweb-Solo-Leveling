<?php
$siteTitle = "Solo Leveling Fan Wiki";
$officialLinks = [
    [
        "title" => "OFFICIAL<br>ANIME SITE",
        "url" => "https://sololeveling-anime.net/",
        "class" => "anime",
    ],
    [
        "title" => "NOVEL<br>KAKAOPAGE",
        "url" => "https://page.kakao.com/",
        "class" => "novel",
    ],
    [
        "title" => "Webtoon -<br>Kakaopage",
        "url" => "https://page.kakao.com/",
        "class" => "webtoon",
    ],
    [
        "title" => "Tappytoon",
        "url" => "https://www.tappytoon.com/",
        "class" => "tappytoon",
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $siteTitle; ?></title>
    <link rel="stylesheet" href="public/main.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <main class="page-shell">
        <section class="hero" id="home">
            <div class="hero__media" aria-hidden="true"></div>
            <div class="hero__shade" aria-hidden="true"></div>
            <div class="hero__figma-lines" aria-hidden="true">
                <span class="line line--left"></span>
                <span class="line line--top-short"></span>
                <span class="line line--title"></span>
                <span class="line line--copy-top"></span>
                <span class="line line--copy-bottom"></span>
                <span class="line line--bottom-short"></span>
                <span class="node node--top"></span>
                <span class="node node--title"></span>
                <span class="node node--copy-top"></span>
                <span class="node node--copy-bottom"></span>
            </div>
            <img class="hero__logo-mark" src="public/images/solo-leveling-logo.png" alt="Solo Leveling logo">

            <div class="hero__content">
                <h1>SOLO LEVELING</h1>
                <p class="hero__subtitle">Fanpage Wiki</p>

                <div class="hero__copy">
                    <p>
                        Di dunia di mana para pemburu, para pejuang manusia yang memiliki
                        kemampuan sihir harus bertarung melawan monster-monster mematikan
                        untuk melindungi umat manusia dari kepunahan yang tak terelakkan,
                        seorang pemburu yang terkenal lemah bernama Sung Jinwoo terjebak
                        dalam perjuangan bertahan hidup yang seolah tak berujung.
                    </p>
                </div>

                <a href="#main" class="primary-btn">Explore</a>
            </div>

            <div class="hero__vertical">
                <span></span>
                <strong><span>SOLOLEVELING</span></strong>
                <span></span>
            </div>
        </section>

<<<<<<< HEAD
        <?php
        $basePath = '.';
        include 'components/topbar.php';
        ?>
=======
        <nav class="site-nav" id="siteNav" aria-label="Main navigation">
        <a class="brand" href="#home">
        <strong>
        SOLOLEVELING
        <small>K6</small>
        </strong>
        <span>Fanpage Wiki</span>
            </a>

            <ul class="nav-links">
                <li><a href="#main">Humans</a></li>
                <li><a href="#main">Dungeons</a></li>
                <li><a href="#official">Monsters</a></li>
            </ul>

            <a class="login-btn" href="#">Login</a>
        </nav>
>>>>>>> b26334a20541f4331088f3a16faac4e975b02167

        <section class="about-section" id="main">
            <div class="section-heading">
                <span></span>
                <h2>MAIN</h2>
            </div>

            <div class="about-grid">
                <article class="novel-panel">
                    <h3>NOVEL</h3>
                    <p>
Solo Leveling (나 혼자만 레벨업) adalah novel web Korea yang ditulis oleh Chu-Gong (추공). Novel ini pertama kali diserialisasikan oleh Papyrus pada 4 November 2016 dan berakhir dengan 14 jilid serta 270 bab. Pada 13 April 2018, serialisasi webtoon dirilis di KakaoPage, digambar oleh seniman Gi So-Ryeong (기소령) dan Jang Sung-Rak (장성락). Serial ini secara resmi berakhir pada 29 Desember 2021 dengan total 179 bab yang dirilis. Serial webtoon spin-off yang diadaptasi dari cerita sampingan novel web tersebut diluncurkan sekitar 13 bulan kemudian, tepatnya pada 20 Januari 2023, dan berakhir pada 31 Mei 2023, dengan total 21 bab yang telah dirilis.
                    </p>
                </article>

                <div class="character-stage" aria-label="Solo Leveling main visual">
                    <div class="stage-glow stage-glow--purple" aria-hidden="true"></div>
                    <div class="stage-glow stage-glow--blue" aria-hidden="true"></div>

                    <img
                        class="main-character"
                        src="public/images/sung-jinwoo.png"
                        alt="Sung Jinwoo"
                        loading="eager"
                        decoding="async"
                    >

                    <img
                        class="main-shadow"
                        src="public/images/shadow-army.png"
                        alt=""
                        aria-hidden="true"
                        loading="eager"
                        decoding="async"
                    >

                    <div class="about-graffiti">WhatAbout</div>
                    <div class="arise-block" aria-hidden="true"></div>
                    <div class="arise-text" aria-hidden="true">ARISE</div>
                </div>
            </div>
        </section>

        <section class="official-section" id="official">
            <div class="official-heading">
                <div class="vertical-label">OFFICIALTE</div>
                <div class="vertical-label1">OFFICIALTE</div>
                <div class="vertical-label2">OFFICIALTE</div>
                <div class="heading-line">
                    <h2>OFFICIALTE</h2>
                    <span></span>
                </div>
                <p>Official Site</p>
            </div>

            <div class="official-grid">
                <?php foreach ($officialLinks as $link): ?>
                    <a class="official-card official-card--<?= $link["class"]; ?>" href="<?= $link["url"]; ?>" target="_blank" rel="noopener">
                        <span class="card-title"><?= $link["title"]; ?></span>

<?php if ($link["class"] === "novel"): ?>
    <span class="card-quote">
        If You Gaze Long Into an Abyss, the<br>
        Abyss Also Gazes Into You
    </span>

    <span class="card-square"></span>
<?php endif; ?>
                        <span class="blue-left"></span>
<span class="blue-panel"></span>
<span class="cut-top"></span>
<span class="cut-stem"></span>
<img
    class="card-diamond"
    src="public/images/Group 1.svg"
    alt=""
    aria-hidden="true"
>
                        <span class="card-go">GO</span>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

<<<<<<< HEAD
    <script src="public/js/script.js"></script>
</body>
</html>
=======
    <script src="js/script.js"></script>
</body>
</html>
>>>>>>> b26334a20541f4331088f3a16faac4e975b02167
