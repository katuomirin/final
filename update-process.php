<?php
require 'dbconect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $companyName = $_POST['name'];
    $companyWebsite = $_POST['home'];
    $status = $_POST['situ'];

    $tableName = 'Job hunting';
    $query = "UPDATE `$tableName` SET `name` = :companyName, `home` = :companyWebsite, `situ` = :status WHERE `ID` = :id";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':companyName', $companyName);
    $stmt->bindParam(':companyWebsite', $companyWebsite);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "データが正常に更新されました!";
    } else {
        echo "エラー: レコードを更新できませんでした。";
    }
}

$pdo = null;
echo '<br><a href="index.php">ホームへ戻る</a>';
?>
