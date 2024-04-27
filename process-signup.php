<?php

if (empty($_POST["name"])) {
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

// Additional validation for new fields
if (empty($_POST["contact"])) {
    die("Contact is required");
}

if (empty($_POST["address"])) {
    die("Address is required");
}

if (empty($_POST["payment_terms"])) {
    die("Payment terms are required");
}

if (empty($_POST["credit_limit"])) {
    die("Credit limit is required");
}

$mysqli = require __DIR__ . "/datab.php";

/*$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$contact = $_POST["contact"];
$address = $_POST["address"];
$payment_terms = $_POST["payment_terms"];
$credit_limit = $_POST["credit_limit"];*/

$sql = "INSERT INTO customer (name, email, password, contact, address, payment_terms, credit_limit)
VALUES (?,?,?,?,?,?,?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssssss",
                  $_POST["name"],
                  $_POST["email"],
                  $_POST["password"],
                  $_POST["contact"],
                  $_POST["address"],
                  $_POST["payment_terms"],
                  $_POST["credit_limit"]);
                  
if ($stmt->execute()) {
    
    header("Location: signup-success.html");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}








