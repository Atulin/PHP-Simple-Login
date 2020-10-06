<?php
session_start();
?>

<h2>Create a new account</h2>

<form action="register.php" method="post">
    <label>
        Login
        <input name="login" type="text">
    </label>

    <label>
        Password
        <input name="pass" type="password">
    </label>

    <input type="submit" value="Register">
</form>

<h2>Log into an existing one</h2>

<form action="login.php" method="post">
    <label>
        Login
        <input name="login" type="text">
    </label>

    <label>
        Password
        <input name="pass" type="password">
    </label>

    <input type="submit" value="Log in">
</form>

<h2>Session data</h2>

<pre><?=var_export($_SESSION, true)?></pre>
