<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ更新</title>
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

        form {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 400px; /* フォームの幅を指定 */
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 12px;
            font-size: 16px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            resize: vertical; /* テキストエリアの垂直方向のリサイズを有効にします */
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h2>データ更新</h2>

<?php
require 'dbconect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $tableName = 'Job hunting';
    $query = "SELECT * FROM `$tableName` WHERE `ID` = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    $companyName = $data['企業名'] ?? '';
    $companyWebsite = $data['企業ホームページ'] ?? '';
    $status = $data['状況'] ?? '';
    $memo = $data['メモ'] ?? '';
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
    <textarea name='situ' rows='3' required><?php echo $status; ?></textarea>
    <br>

    <label for='memo'>メモ:</label>
    <textarea name='memo' rows='3' required><?php echo $memo; ?></textarea>
    <br>

    <input type='hidden' name='id' value='<?php echo $id; ?>'>
    <input type='submit' value='データを更新'>
</form>

</body>
</html>
