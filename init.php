<?php
require_once ('db.php');

$conn = (new Db())->getConn();

$sql = 'CREATE TABLE users (
    id integer primary key autoincrement,
    login varchar(30) not null,
    password varchar(255) not null 
)';

$result = $conn->exec($sql);

if ($result === false) {
    $error = $conn->errorInfo();
    echo <<<HTML
        <h1>Something went wrong...</h1>
        <table>
            <tr>
                <td>SQL error</td>
                <td>$error[0]</td>
            </tr>
            <tr>
                <td>Driver code</td>
                <td>$error[1]</td>
            </tr>
            <tr>
                <td>SQL error</td>
                <td>$error[2]</td>
            </tr>
        </table>
        HTML;


} else {
    echo 'Database initialized succesfully!';
}
