<?php
// We need to start the session before we can use it
session_start();
// Require the database connection file
require ('db.php');

// Get the database connection object
$conn = (new Db())->getConn();

$login = $_POST['login'];
$pass = $_POST['pass'];

// Create the SQL query with named params
$sql = 'SELECT * FROM users u WHERE u.login = :login LIMIT 1';

// Prepare it, to use prepared statements
$stmt = $conn->prepare($sql);

// Execute it, using prepared statements
$stmt->execute([
    'login' => $login
]);

// Get a single result as an associative array
$user = $stmt->fetch( PDO::FETCH_ASSOC);

// Check if the password hash from the database matches the password provided by user
if (password_verify($pass, $user['password'])) {

    // If so, set some session variables
    $_SESSION['uid'] = $user['id'];
    $_SESSION['login'] = $user['login'];

// If not, redirect with an error message
} else {
    header('Location: index.php?msg=login_error');
}
