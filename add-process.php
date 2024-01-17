<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ追加</title>
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

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 12px;
            font-size: 16px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #008CBA;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #0077A3;
        }

        a {
            display: block;
            color: #333;
            text-decoration: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>新しいデータを追加</h2>

    <?php
    require 'dbconect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $companyName = $_POST['name'];
        $companyWebsite = $_POST['home'];
        $status = $_POST['situ'];
        $memo = $_POST['memo'];

        $tableName = 'Job hunting';
        $query = "INSERT INTO `$tableName` (`name`, `home`, `situ`,`memo`) VALUES (:companyName, :companyWebsite, :status,:memo)";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':companyName', $companyName);
        $stmt->bindParam(':companyWebsite', $companyWebsite);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':memo', $memo);

        if ($stmt->execute()) {
            echo "<p>データが正常に追加されました!</p>";
        } else {
            echo "<p>エラー: レコードを追加できませんでした。</p>";
        }
    }

    $pdo = null;
    echo '<a href="index.php">ホームへ戻る</a>';
    ?>
</div>

</body>
</html>
