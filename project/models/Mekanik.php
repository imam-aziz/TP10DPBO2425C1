<?php
// models/Mekanik.php
require_once "config/Database.php";
class Mekanik
{
    private $conn;
    private $table = "mekanik";
    
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama_mekanik, $spesialisasi) {
        $query = "INSERT INTO " . $this->table . " (nama_mekanik, spesialisasi) VALUES (:nama_mekanik, :spesialisasi)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_mekanik', $nama_mekanik);
        $stmt->bindParam(':spesialisasi', $spesialisasi);
        return $stmt->execute();
    }

    public function update($id, $nama_mekanik, $spesialisasi) {
        $query = "UPDATE " . $this->table . " SET nama_mekanik = :nama_mekanik, spesialisasi = :spesialisasi WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama_mekanik', $nama_mekanik);
        $stmt->bindParam(':spesialisasi', $spesialisasi);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}