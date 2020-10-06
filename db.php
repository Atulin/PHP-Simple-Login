<?php

class Db
{
    private PDO $conn;

    /**
     * Database constructor.
     * @throws PDOException
     */
    public function __construct()
    {
        // Uncomment for SQLite connection
        // $this->conn = new PDO('sqlite:' . __DIR__ . '/database.sql');

        // Load an .ini file that contains connection details
        $ini = parse_ini_file(__DIR__ . '/dbdata.ini');

        // Extract the data from there.
        // It's optional, really, the `$ini` array can be used directly.
        $servername = $ini['db_server'];
        $username   = $ini['db_user'];
        $password   = $ini['db_password'];
        $dbname     = $ini['db_name'];

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
    public function getConn(): PDO
    {
        return $this->conn;
    }

}
