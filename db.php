<?php

class Db
{
    // Change to `true` to use SQLite file-based database
    private const USE_SQLITE = false;

    private PDO $conn;

    /**
     * Database constructor.
     * @throws PDOException
     */
    public function __construct()
    {
        if (self::USE_SQLITE) {
            $this->conn = new PDO('sqlite:' . __DIR__ . '/database.sql');
        } else {

            // Load an .ini file that contains connection details
            $ini = parse_ini_file(__DIR__ . '/dbdata.ini');

            // Extract the data from there.
            // It's optional, really, the `$ini` array can be used directly.
            $servername = $ini['db_server'];
            $username = $ini['db_user'];
            $password = $ini['db_password'];
            $dbname = $ini['db_name'];

            // Connection proper
            try {
                // Create the PDO object
                $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                // Make sure any errors will be shown
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                throw $e;
            }
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
