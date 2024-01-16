<?php
require 'dbconect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $companyName = $_POST['name'];
    $companyWebsite = $_POST['home'];
    $status = $_POST['situ'];

    $tableName = 'Job hunting';
    $query = "INSERT INTO `$tableName` (`name`, `home`, `situ`) VALUES (:companyName, :companyWebsite, :status)";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':companyName', $companyName);
    $stmt->bindParam(':companyWebsite', $companyWebsite);
    $stmt->bindParam(':status', $status);

    if ($stmt->execute()) {
        echo "データが正常に追加されました!";
    } else {
        echo "エラー: レコードを追加できませんでした。";
    }
}

$pdo = null;
?>
