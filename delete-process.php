<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ削除</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 400px; /* コンテナの幅を指定 */
            text-align: center;
        }

        h2 {
            color: #333;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        a {
            display: block;
            background-color: #008CBA;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            font-size: 18px;
            margin-top: 20px;
        }

        a:hover {
            background-color: #0077A3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>データ削除</h2>

    <?php
    require 'dbconect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];

        $tableName = 'Job hunting';
        $query = "DELETE FROM `$tableName` WHERE `ID` = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "<p>データが正常に削除されました!</p>";
        } else {
            echo "<p>エラー: レコードを削除できませんでした。</p>";
        }
    }

    $pdo = null;
    echo '<a href="index.php">ホームへ戻る</a>';
    ?>
</div>

</body>
</html>
