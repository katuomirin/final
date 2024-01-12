<?php
require 'dbconect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームが送信されたか確認

    // フォームから値を取得
    $companyName = $_POST['name'];
    $companyWebsite = $_POST['home'];
    $status = $_POST['situ'];

    // 新しいレコードをデータベースに挿入
    $tableName = 'Job hunting';
    $query = "INSERT INTO `$tableName` (`企業名`, `企業ホームページ`, `状況`) VALUES (:companyName, :companyWebsite, :status)";
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
    <title>就活状況整理</title>
</head>
<body>

<h2>就活状況整理</h2>

<?php
require 'dbconect.php';

try {
    // Check if $pdo is null before using it
    if ($pdo !== null) {
        $tableName = 'Job hunting';
        $query = "SELECT * FROM `$tableName`";
        $stmt = $pdo->query($query);

        if ($stmt !== false) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo "<h2>就活状況整理</h2>";
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>企業名</th><th>企業ホームページ</th><th>状況</th></tr>"; 
            foreach ($result as $row) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }

            echo "</table>";

            // Add button to trigger the "Add" action
            echo "<form action='add-input.php' method='post'>";
            echo "<input type='submit' value='追加'>";
            echo "</form>";
        } else {
            echo "Error executing query.";
        }
    } else {
        echo "Error: Database connection is null.";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$pdo = null;
?>




</body>
</html>
