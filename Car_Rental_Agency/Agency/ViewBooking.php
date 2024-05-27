<?php
	require "../DB_connect.php";
    require "../session.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rented Cars - Car Rental Agency</title>
    <link rel="stylesheet" href="../CSS/styleview.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <h1 class="heading">Car Rental Agency</h1>
            </div>
            <div class="nav-links">
            <a href="../available.php">Available to rent</a>
                <a href="addcar.php">Add New Cars</a>
                <a href="../logout.php">Log Out</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="cars-section">
            <div class="cars-container">
                <h2>Rented Cars</h2>
                <div class="car-list">
                    <table class="rented-cars-table">
                        <thead>
                            <tr>
                                <th>Vehicle Model</th>
                                <th>Vehicle Number</th>
                                <th>Seating Capacity</th>
                                <th>Rent per Day</th>
                                <th>Contact Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $em = $_SESSION['email'];
                            $sql_select = "SELECT * FROM rented WHERE email = '$em'";
                            $result = $conn->query($sql_select);
                            if ($result->num_rows > 0){
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$row['model']."</td>";
                                echo "<td>".$row['number']."</td>";
                                echo "<td>".$row['capacity']."</td>";
                                echo "<td>".$row['rent']."</td>";
                                echo "<td>".$row['number']."</td>";
                                echo "<td>
                                        <form method='post' action='#'>
                                            <input type='hidden' name='car_id' value='".$row['id']."'>
                                            <button type='submit' name='remove' style='background-color: #ff0000; color: #fff; padding: 5px 10px; border: none; border-radius: 4px; cursor: pointer;'>Remove</button>
                                        </form>
                                    </td>";
                                echo "</tr>";
                            }
                        }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Car Rental Agency. All rights reserved.</p>
    </footer>
</body>

<?php
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

            header("Location: ViewBooking.php");
            exit();

        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Car not found in the rented table.";
    }
}

?>
</html>
