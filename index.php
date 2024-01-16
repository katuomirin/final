<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>就活状況整理</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            background-color: #fff;
        }

        form {
            display: inline-block;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Add styling for the add button */
        #add-button {
            background-color: #008CBA;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        #add-button:hover {
            background-color: #0077A3;
        }

        /* Style for the hyperlink */
        .company-link {
            color: #008CBA;
            text-decoration: none;
            font-weight: bold;
        }

        .company-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php
require 'dbconect.php';

try {
    if ($pdo !== null) {
        $tableName = 'Job hunting';
        $query = "SELECT * FROM `$tableName`";
        $stmt = $pdo->query($query);

        if ($stmt !== false) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo "<h2>就活状況整理</h2>";
            echo "<table>";
            echo "<tr><th>ID</th><th>企業名</th><th>企業ホームページ</th><th>状況</th><th>操作</th></tr>"; 
            foreach ($result as $row) {
                echo "<tr>";
                foreach ($row as $key => $value) {
                    // 企業ホームページのセルにリンクを追加
                    if ($key === '企業ホームページ') {
                        echo "<td><a class='company-link' href='$value' target='_blank'>$value</a></td>";
                    } else {
                        echo "<td>$value</td>";
                    }
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
            echo "<input id='add-button' type='submit' value='追加'>";
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
