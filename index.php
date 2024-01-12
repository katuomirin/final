<?php
require 'dbconect.php';

try {
    $tableName = 'Job_hunting'; 

    $stmt = $pdo->query($query);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>企業名</th><th>OtherColumn</th></tr>"; 
    foreach ($result as $row) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$pdo = null; 

