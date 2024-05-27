<?php
session_start();
// Check if the user is logged in
if($_SESSION['loggedin'] === true) {
    $_SESSION['loggedin'] = true;
} else {
    $_SESSION['loggedin'] = false;
}

if($_SESSION['agency'] === true) {
    $_SESSION['agency'] = true;
} else {
    $_SESSION['agency'] = false;
}
?>