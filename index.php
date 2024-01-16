<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>就活状況整理</title>
</head>
<body>

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
            echo "<tr><th>ID</th><th>企業名</th><th>企業ホームページ</th><th>状況</th><th>操作</th></tr>"; 
            foreach ($result as $row) {
                echo "<tr>";
                foreach ($row as $key => $value) {
                    echo "<td>$value</td>";
                }

                // 更新ボタン
                echo "<td><form action='update-input.php' method='post'>";
                echo "<input type='hidden' name='id' value='{$row['id']}'>";
                echo "<input type='submit' value='更新'>";
                echo "</form></td>";

                // 削除ボタン
                echo "<td><form action='delete-process.php' method='post'>";
                echo "<input type='hidden' name='id' value='{$row['id']}'>";
                echo "<input type='submit' value='削除'>";
                echo "</form></td>";

                echo "</tr>";
            }

            echo "</table>";

            // 追加ボタン
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

