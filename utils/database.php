<?php
class Database {
    public $db;

    function __construct() {
        $this->db = require "koneksi.php";
    }

    // User Function
    function addUser(string $username, string $password, $role = "user") {
        if(!$username || !$password || !in_array($role, ['user','admin'])) throw new Error("Input is missing or error");

        $passwordHash = password_hash($password, PASSWORD_ARGON2I, [ 'cost' => 13 ]);

        $result = $this->db->prepare("INSERT INTO users VALUES (:username, :password, :role)");
        $result->bindParam(':username', $username);
        $result->bindParam(':password', $passwordHash);
        $result->bindParam(':role', $role);
        $result->execute();
    }
    function findUser(string $username) {
        $result = $this->db->prepare("SELECT * FROM users WHERE username = :username");
        $result->bindParam(':username', $username);
        $result->execute();

        return $result->fetch();
    }
    
    // Find Methods
    function find(string $table, string $col = "*") {
        if(!$table || $table == "") throw new Error("Table name is missing");

        $result = $this->db->prepare("SELECT {$col} FROM `{$table}`");
        $result->execute();

        return $result->fetchAll();
    }
    function findOne(string $table, string $key, string $value, string $col = "*") {
        if(!$table || $table == "") throw new Error("Table name is missing");
        if(strlen($key) < 1 || strlen($value) < 1) throw new Error("Key or value is missing");

        $result = $this->db->prepare("SELECT {$col} FROM `{$table}` WHERE `{$key}` = :value");
        $result->bindParam(':value', $value);
        $result->execute();

        return $result->fetch();
    }

    // Delete Methods
    function delete(string $table, string $key, string $value) {
        if(!$table || $table == "") throw new Error("Table name is missing");
        if(strlen(!$key) < 1 || strlen($value) < 1) throw new Error("Key or value is missing");

        $result = $this->db->prepare("DELETE FROM `{$table}` WHERE `{$key}` = :value");
        $result->bindParam(':value', $value);
        $result->execute();
    }

}
?>