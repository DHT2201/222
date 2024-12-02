<?php

    //Connect Database
    class ConnectDatabase {
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "projectfinal";
        private $conn;

        public function __construct() {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ($this->conn->connect_error) {
                die("Connection failed: ". $this->conn->connect_error);
            } else {
                $this->conn->set_charset("utf8mb4");
                // echo "Connected successfully";
            }
        }
        public function prepare($sql) {
            return $this->conn->prepare($sql);
        }
        // Method to get the connection
        public function getConnection() {
            return $this->conn;
        }

        // Close the connection when the object is destroyed
        public function __destruct() {
            if ($this->conn) {
                $this->conn->close();
                // echo "Connection closed";
            }
        }
    }
?>