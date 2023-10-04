<?php
class Database
{
    public $host = 'localhost';
    public $login = 'root';
    public $pass = '';
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->login, $this->pass);
        if ($this->conn->connect_error) {
            die("Error connection: " . $this->conn->connect_error);
        }
    }

    public function createDatabase()
    {
        $createDatabaseSQL = "CREATE DATABASE IF NOT EXISTS ecarstrade";

        if ($this->conn->query($createDatabaseSQL) === TRUE) {
            echo "Database successfully create.<br>";
        } else {
            echo "Error creating database: " . $this->conn->error;
        }
    }

    public function createTable()
    {
        $this->conn->select_db("ecarstrade");

        $createTableSQL = "CREATE TABLE IF NOT EXISTS cars (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            mark_and_model VARCHAR(255) NOT NULL,
            first_registration_date DATE,
            mileage INT,
            gearbox VARCHAR(50),
            fuel VARCHAR(50),
            engine_size VARCHAR(50),
            power_kw INT,
            power_hp INT,
            emission_class VARCHAR(50),
            co2_value INT,
            country_of_origin VARCHAR(50)
        )";

        if ($this->conn->query($createTableSQL) === TRUE) {
            echo "Table 'cars' was successfully created or already exists.<br>";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
    }

    public function closeConnection()
    {
        $this->conn->close();
    }
}