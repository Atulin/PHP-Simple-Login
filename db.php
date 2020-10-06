<?php
class Db {
    private PDO $conn;

    /**
     * Database constructor.
     * @throws PDOException
     */
    public function __construct()
    {
        // Uncomment for SQLite connection
        // $this->conn = new PDO("sqlite:".__DIR__."/database.sql");

        // Preferably take those from some .env file
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = 'MyDB';

        // Connection proper
        try {
            $this->conn = new PDO("mysql:host={$servername};dbname={$dbname}", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw $e;
        }

    }

    /**
     * @return PDO
     */
    public function getConn() : PDO
    {
        return $this->conn;
    }

}
