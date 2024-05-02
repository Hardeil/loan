<?php
class Database {
    private $servername;
    private $username;
    private $password;
    private $database;
    private $conn;

    // Constructor to initialize connection parameters
    public function __construct($servername, $username, $password, $database) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    // Method to establish connection
    public function connect() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Method to close connection
    public function close() {
        $this->conn->close();
    }

    // Getter method for connection object
    public function getConnection() {
        return $this->conn;
    }

    // Method to execute an INSERT query
    public function insert($sql) {
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Method to execute an UPDATE query
    public function update($sql) {
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Method to execute a DELETE query
    public function delete($sql) {
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "loan";

$databaseObj = new Database($servername, $username, $password, $database);

$databaseObj->connect();

$conn = $databaseObj->getConnection();

$databaseObj->close();
?>



