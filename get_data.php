<?php
$host = 'localhost';
$db   = 'student';
$user = 'root';
$pass = '';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT gender, COUNT(*) AS count FROM Persons GROUP BY gender");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $genders = [];
    $genderCounts = [];

    foreach ($data as $row) {
        $genders[] = $row['gender'];
        $genderCounts[] = (int)$row['count'];
    }

    echo json_encode(['genders' => $genders, 'genderCounts' => $genderCounts]);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>
