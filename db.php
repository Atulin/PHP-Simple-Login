<?php
class Db {
    private PDO $conn;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->conn = new PDO("sqlite:".__DIR__."/database.sql");
    }

    /**
     * @return PDO
     */
    public function getConn() : PDO
    {
        return $this->conn;
    }

}
