<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ更新</title>
</head>
<body>

<h2>データ更新</h2>

<?php
require 'dbconect.php';

// 修正: 変更する企業のデータを取得
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $tableName = 'Job hunting';
    $query = "SELECT * FROM `$tableName` WHERE `ID` = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    // 修正: 取得したデータを変数に代入
    $companyName = $data['企業名'] ?? '';
    $companyWebsite = $data['企業ホームページ'] ?? '';
    $status = $data['状況'] ?? '';
}
?>

<form action='update-process.php' method='post'>
    <label for='name'>企業名:</label>
    <input type='text' name='name' value='<?php echo $companyName; ?>' required>
    <br>

    <label for='home'>企業ホームページ:</label>
    <input type='text' name='home' value='<?php echo $companyWebsite; ?>' required>
    <br>

    <label for='situ'>状況:</label>
    <input type='text' name='situ' value='<?php echo $status; ?>' required>
    <br>

    <input type='hidden' name='id' value='<?php echo $id; ?>'>
    <input type='submit' value='データを更新'>
</form>

</body>
</html>
