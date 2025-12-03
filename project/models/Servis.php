<?php
// models/Servis.php
require_once "config/Database.php";
class Servis
{
    private $conn;
    private $table = "servis";
    
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

    public function create($jenis_servis, $biaya) {
        $query = "INSERT INTO " . $this->table . " (jenis_servis, biaya) VALUES (:jenis_servis, :biaya)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':jenis_servis', $jenis_servis);
        $stmt->bindParam(':biaya', $biaya);
        return $stmt->execute();
    }

    public function update($id, $jenis_servis, $biaya) {
        $query = "UPDATE " . $this->table . " SET jenis_servis = :jenis_servis, biaya = :biaya WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':jenis_servis', $jenis_servis);
        $stmt->bindParam(':biaya', $biaya);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}