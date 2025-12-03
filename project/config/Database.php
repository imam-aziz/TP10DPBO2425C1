<?php
class Database
{
    private $host = "localhost";
    private $database = "bengkel_azul"; // NAMA DATABASE BARU
    private $username = "root";
    private $password = "";
    private $conn;

    // ... (kode getConnection() tetap sama)
    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}