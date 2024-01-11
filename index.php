<?php
require 'dbconect.php';

try {
    $tableName = 'Job hunting';

    $query = "SELECT * FROM `$tableName`";

    $stmt = $pdo->query($query);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        print_r($row);
        echo "<br>";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
?>

