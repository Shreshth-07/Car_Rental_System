<?php
	require "../DB_connect.php";
    require "../session.php"
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, 
						initial-scale=1.0">
    <title>Agency Page</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <h1 class="headi">Car Rental Agency</h1>
            </div>
            <div class="nav-links">
      
                <a href="../logout.php">Back</a>
            </div>
        </nav>
</header>

<section>
        <h1 class="heading">Agency Page</h1>
        <h3 class="title">Log-In Form</h3>
</section>
<form class="login-box" method="post" action="#">
                <input type="email" class="email ele" name="email" placeholder="youremail@email.com" required>
                <input type="password" class="password ele" name="password" placeholder="password" required>
                <button type="submit" name="login" class="clkbtn">Login</button>
</form>
<h2>IF YOU DONT HAVE ACCOUNT <a href="Agency_registraion.php">Sign UP</a></h2>


<footer>
        <p>&copy; 2023 Car Rental Agency. All rights reserved.</p>
    </footer>
</body>

<?php
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user data from the database
    $sql = "SELECT * FROM agencies WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Redirect to home.html upon successful login
            $_SESSION['loggedin'] = true;
            $_SESSION['agency']=true;
            $_SESSION['email']=$email;
            header("Location: ../available.php");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }
}

if(isset($_POST['signup'])){
    header("Location: Customer_registraion.php");

}

?>

</html>
