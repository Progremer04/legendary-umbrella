<?php
include 'confing.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Etudient</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="desing_form">
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required><br><br>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required><br><br>

            <label for="score">Score:</label>
            <input type="number" id="score" name="score" step="0.01" required><br><br>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select><br><br>

            <input type="submit" value="Add Person" name="addperson">
        </form>
        <a href="show_statique.php" target="_blank"><button>Statistiques</button></a>
    </div>
</body>

</html>
<!-- Code PHP  !>
<?php
include 'confing.php';

if ($_POST['addperson']) {
    $firstname = $_POST['first_name'] ?? null;
    $lastname = $_POST['last_name'] ?? null;
    $score = $_POST['score'] ?? null;
    $gender = $_POST['gender'] ?? null;
    $sql = "INSERT INTO persons (first_name, last_name, score, gender) VALUES ('$firstname', '$lastname', '$score', '$gender')";
    $conn = mysqli_query($conn, $sql);
    if ($conn) {
        echo "<script>alert('Add Success');</script>";
    } else {
        echo "<script>alert('Add Failed');</script>";
    }
}
?>