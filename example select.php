<!DOCTYPE html>
<?php
/**
 * A simple PDO SELECT example. Use the grades table (grades.sql) 
 * from eLearn, and make sure you change connect.php to use your 
 * correct login information.
 * 
 * Sam Scott, McMaster University, 2025
 */
include "connect.php";
$limit = 50;

$command = "SELECT firstname, lastname FROM grades WHERE final_exam>=? ORDER BY lastname";
$stmt = $dbh->prepare($command);
$params = [$limit];
$success = $stmt->execute($params);
?>
<html>

<head>
    <title>SELECT Queries</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/basic_examples.css">
</head>

<body>
    <?php
    if ($success) {
        echo "<p>Win!</p>";
        echo "<p>{$stmt->rowCount()} rows were retrieved by your query.</p>";
        echo "<p><strong>Students with final exam grades of $limit or more:</strong></p>";
        echo "<ul>";
        while ($row = $stmt->fetch()) {
            echo "<li>$row[firstname] $row[lastname]</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Fail…</p>";
    }
    ?>
</body>

</html>