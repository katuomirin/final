<?php
require 'dbconect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $tableName = 'Job hunting';
    $query = "DELETE FROM `$tableName` WHERE `ID` = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "データが正常に削除されました!";
    } else {
        echo "エラー: レコードを削除できませんでした。";
    }
}

$pdo = null;
echo '<br><a href="index.php">ホームへ戻る</a>';
?>
