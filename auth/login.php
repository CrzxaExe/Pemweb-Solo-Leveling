<?php
require_once "../utils/database.php";
$error = [];

if(isset($_POST["login"])) {
    $username = trim($_POST["username"] ?? '');
    $password = trim($_POST["password"] ?? '');
    
    if(strlen($username) < 1 || strlen($password) < 1) {
        $error[] = "Username atau password kosong";
    }

    if(empty($error)) {
        echo "test " . $username;
        $d = new Database();
        
        $result = $d->findOne("users", "username", $username);
        if(empty($result)) $error[] = "Username tidak ditemukan";

        if(empty($error) && !password_verify($password, $result['password'])) {
            $error[] = "Password salah";
        } else {
            echo $username . " : " . $password;

            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["role"] = $result['role'] ?? 'user';

            header("Location: ../index.php");
        }
    }
    
}
if(!empty($error)) print_r($error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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