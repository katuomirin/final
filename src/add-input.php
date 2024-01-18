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

        form {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 400px; 
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
    </style>
</head>
<body>

<h2>新しいデータを追加</h2>

<form action='add-process.php' method='post'>
    <label for='name'>企業名:</label>
    <input type='text' name='name' required>
    <br>

    <label for='home'>企業ホームページ:</label>
    <input type='text' name='home' required>
    <br>

    <label for='situ'>状況:</label>
    <input type='text' name='situ' required>
    <br>

    <label for='memo'>メモ:</label>
    <input type='text' name='memo' required>
    <br>

    <input type='submit' value='データを追加'>
</form>

</body>
</html>
