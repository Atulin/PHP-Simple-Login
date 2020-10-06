<?php
require_once ('db.php');

$conn = (new Db())->getConn();

$login = $_POST['login'];
$pass = $_POST['password'];

// Hash the password
$hash = password_hash($pass, PASSWORD_DEFAULT);

// Create the SQL query
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
