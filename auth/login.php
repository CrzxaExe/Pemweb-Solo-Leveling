<?php
require_once "../utils/database.php";
$error = [];

if(isset($_POST["login"])) {
    $username = trim($_POST["username"] ?? '');
    $password = trim($_POST["password"] ?? '');
<<<<<<< HEAD

=======
    
>>>>>>> b26334a20541f4331088f3a16faac4e975b02167
    if(strlen($username) < 1 || strlen($password) < 1) {
        $error[] = "Username atau password kosong";
    }

    if(empty($error)) {
<<<<<<< HEAD
        $d = new Database();

=======
        echo "test " . $username;
        $d = new Database();
        
>>>>>>> b26334a20541f4331088f3a16faac4e975b02167
        $result = $d->findOne("users", "username", $username);
        if(empty($result)) $error[] = "Username tidak ditemukan";

        if(empty($error) && !password_verify($password, $result['password'])) {
            $error[] = "Password salah";
        } else {
<<<<<<< HEAD
=======
            echo $username . " : " . $password;

>>>>>>> b26334a20541f4331088f3a16faac4e975b02167
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["role"] = $result['role'] ?? 'user';

            header("Location: ../index.php");
<<<<<<< HEAD
            exit;
        }
    }
}
?>
=======
        }
    }
}
if(!empty($error)) print_r($error);
?>

>>>>>>> b26334a20541f4331088f3a16faac4e975b02167
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Login | Solo Leveling Wiki</title>

    <link rel="stylesheet" href="../public/main.css">
    <link rel="stylesheet" href="../public/css/auth.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="login-page">

    <div class="glow glow-blue"></div>
    <div class="glow glow-purple"></div>
    <div class="glow glow-bottom"></div>

    <div class="login-card">

        <h1 class="login-title">LOG IN</h1>

        <?php if(!empty($error)): ?>
            <div class="login-error">
                <?php foreach($error as $e): ?>
                    <p><?= htmlspecialchars($e) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form class="login-form" action="login.php" method="POST">

            <div class="form-group">
                <label>Username</label>

                <input
                    type="text"
                    name="username"
                    id="username"
                    placeholder="Masukan username"
                >
            </div>

            <div class="form-group">
                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="************"
                >
            </div>

            <div class="login-action">

                <button type="submit" name="login" class="login-submit">
                    Login
                </button>

                <p class="register-text">
                    Belum memiliki akun? Yaudah
                </p>

            </div>

        </form>

    </div>

</div>

</body>
</html>
=======
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="POST">
        <input type="text" name="username" id="username">
        <input type="text" name="password" id="password">

        <input type="submit" value="login" name="login">
    </form>
</body>
</html>
>>>>>>> b26334a20541f4331088f3a16faac4e975b02167
