<?php
// Require the database connection file
require ('db.php');

// Get the database connection object
$conn = (new Db())->getConn();

$login = $_POST['login'];
$pass = $_POST['password'];

// Hash the password with default algorithm
// You can also use PASSWORD_BCRYPT or PASSWORD_ARGON2ID if you feel like it
// PASSWORD_DEFAULT simply uses the algorithm recommended for the current version of PHP, right now it's BCrypt
$hash = password_hash($pass, PASSWORD_DEFAULT);

// Create the SQL query with named parameters
$sql = 'INSERT INTO users (login, password) VALUES (:login, :pass)';

// Prepare it, to use prepared statements
$stmt = $conn->prepare($sql);

// Execute it, using prepared statements
$stmt->execute([
    'login' => $login,
    'pass' => $hash
]);

// Redirect with a success message
header('Location: index.php?msg=registered');
