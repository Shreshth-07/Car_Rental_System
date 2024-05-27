<?php
require "session.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental_db";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



 else {
    echo "Car not found.";
}

if(isset($_POST['remove'])) {
    $car_id = $_POST['car_id'];

    // Fetch the car details from the rented table
    $sql_select = "SELECT * FROM rented WHERE id = $car_id";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Insert the car details into the addcar table
        $sql_insert = "INSERT INTO addcar (model, number, capacity, rent) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bind_param("ssdi", $row['model'], $row['number'], $row['capacity'], $row['rent']);

        if ($stmt->execute()) {
            // Delete the car from the rented table
            $sql_delete = "DELETE FROM rented WHERE id = $car_id";
            $conn->query($sql_delete);

            header("Location: view.php");
            exit();

        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Car not found in the rented table.";
    }
}

$conn->close();
?>
