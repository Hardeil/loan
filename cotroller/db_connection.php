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
}

// Usage
$servername = "localhost";
$username = "root";
$password = "";
$database = "loan";

// Create database object
$databaseObj = new Database($servername, $username, $password, $database);

// Connect to the database
$databaseObj->connect();

// Use the connection
$conn = $databaseObj->getConnection();

// Perform database operations here

// Close the connection when done
$databaseObj->close();
?>


