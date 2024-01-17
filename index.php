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
            position: relative;
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

        #add-button {
            background-color: #008CBA;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            position: absolute;
            left: 0;
        }

        #add-button:hover {
            background-color: #0077A3;
        }

        .company-link {
            color: #008CBA;
            text-decoration: none;
            font-weight: bold;
        }

        .company-link:hover {
            text-decoration: underline;
        }

        #header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        #header h2 {
            margin: 0;
        }

        #search-form {
            display: flex;
            align-items: center;
        }

        #search-input {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
            font-size: 16px;
        }

        #search-button {
            background-color: #008CBA;
            color: white;
            padding: 8px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        #search-button:hover {
            background-color: #0077A3;
        }
    </style>
</head>
<body>

<div id="header">
    <h2>就活状況整理</h2>

    <form id="search-form" action="" method="get">
        <label for="search-input">検索:</label>
        <input type="text" id="search-input" name="search" placeholder="検索キーワードを入力">
        <button type="submit" id="search-button">検索</button>
    </form>
</div>

<?php
require 'dbconect.php';

try {
    if ($pdo !== null) {
        $tableName = 'Job hunting';

        $searchKeyword = isset($_GET['search']) ? $_GET['search'] : '';

        $query = "SELECT * FROM `$tableName`";
        
        if (!empty($searchKeyword)) {
            $query .= " WHERE `name` LIKE :search OR `situ` LIKE :search OR `memo` LIKE :search";
        }

        $stmt = $pdo->prepare($query);

        if (!empty($searchKeyword)) {
            $stmt->bindValue(':search', '%' . $searchKeyword . '%', PDO::PARAM_STR);
        }

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<table>";
        echo "<tr><th>ID</th><th>企業名</th><th>企業ホームページ</th><th>状況</th><th>メモ</th><th>操作</th></tr>"; 
        foreach ($result as $row) {
            echo "<tr>";
            foreach ($row as $key => $value) {
                if ($key === '企業ホームページ') {
                    echo "<td><a class='company-link' href='$value' target='_blank'>$value</a></td>";
                } else {
                    echo "<td>$value</td>";
                }
            }

            echo "<td><form action='update-input.php' method='post'>";
            echo "<input type='hidden' name='id' value='{$row['id']}'>";
            echo "<input type='submit' value='更新'>";
            echo "</form></td>";

            echo "<td><form action='delete-process.php' method='post'>";
            echo "<input type='hidden' name='id' value='{$row['id']}'>";
            echo "<input type='submit' value='削除'>";
            echo "</form></td>";
            echo "</tr>";
        }
        echo "</table>";

        echo "<form action='add-input.php' method='post' >";
        echo "<input id='add-button' type='submit' value='追加'>";
        echo "</form>";
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
