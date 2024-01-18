<?php

const SERVER = 'mysql219.phy.lolipop.lan';
const DBNAME = 'LAA1517463-final';
const USER = 'LAA1517463';
const PASS = 'Pass0922';

$connect = 'mysql:host=' . SERVER . ';dbname=' . DBNAME . ';charset=utf8';

try {
    $pdo = new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die(); // プログラムを停止
}
?>

