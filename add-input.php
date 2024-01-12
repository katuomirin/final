<?php
require 'dbconect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームが送信されたか確認

    // フォームから値を取得
    $companyName = $_POST['company_name'];
    $companyWebsite = $_POST['company_website'];
    $status = $_POST['status'];

    // 新しいレコードをデータベースに挿入
    $tableName = 'Job hunting';
    $query = "INSERT INTO `$tableName` (`name`, `home`, `situ`) VALUES (:companyName, :companyWebsite, :status)";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':companyName', $companyName);
    $stmt->bindParam(':companyWebsite', $companyWebsite);
    $stmt->bindParam(':status', $status);

    if ($stmt->execute()) {
        echo "Record added successfully!";
    } else {
        echo "Error: Unable to add record.";
        // 必要に応じてエラーに関する詳細情報を出力できます
        // echo "Error: " . $stmt->errorInfo()[2];
    }
}

$pdo = null; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Record</title>
</head>
<body>

<h2>Add Record</h2>

<form action="add-input.php" method="post">
    <label for="company_name">企業名:</label>
    <input type="text" id="company_name" name="company_name" required><br>

    <label for="company_website">企業ホームページ:</label>
    <input type="text" id="company_website" name="company_website" required><br>

    <label for="status">状況:</label>
    <input type="text" id="status" name="status" required><br>

    <input type="submit" value="Add">
</form>

</body>
</html>
