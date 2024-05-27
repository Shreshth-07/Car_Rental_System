<?php
require "../session.php";
require "../DB_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Car - Car Rental Agency</title>
    <link rel="stylesheet" href="../CSS/styleadd.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <h1 class="heading">Car Rental Agency</h1>
            </div>
            <div class="nav-links">
                <a href="addcar.php">Add New Cars</a>
                <a href="../available.php">Available to rent</a>
                <a href="ViewBooking.php">View Booked Cars</a>
                <a href="../logout.php">Log Out</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="form-section">
            <div class="form-container">
                <h2>Add New Car</h2>
                <form method="post" action="#">
                    <div class="form-group">
                        <label for="model">Vehicle Model</label>
                        <input type="text" id="model" name="model" required>
                    </div>
                    <div class="form-group">
                        <label for="number">Vehicle Number</label>
                        <input type="text" id="number" name="number" required>
                    </div>
                    <div class="form-group">
                        <label for="capacity">Seating Capacity</label>
                        <input type="number" id="capacity" name="capacity" required>
                    </div>
                    <div class="form-group">
                        <label for="rent">Rent per Day</label>
                        <input type="number" id="rent" name="rent" required>
                    </div>
                    <button type="submit" name="add" class="btn">Add Car</button>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Car Rental Agency. All rights reserved.</p>
    </footer>
</body>
<?php
if(isset($_POST['add']))  {
    $model = $_POST['model'];
    $number = $_POST['number'];
    $capacity = $_POST['capacity'];
    $rent = $_POST['rent'];
    $email = $_SESSION['email'];
    $sql = "INSERT INTO addcar (model, number, capacity, rent, email) VALUES ('$model', '$number', $capacity, $rent, '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: addcar.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
</html>