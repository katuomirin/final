<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ追加</title>
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

    <input type='submit' value='データを追加'>
</form>

</body>
</html>
