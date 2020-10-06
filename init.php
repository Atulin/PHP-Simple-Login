<?php
require_once ('db.php');

$conn = (new Db())->getConn();

$sql = 'CREATE TABLE users (
    id integer primary key autoincrement,
    login varchar(30) not null,
    password varchar(255) not null 
)';

$conn->exec($sql);
