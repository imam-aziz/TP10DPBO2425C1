<?php
// models/Pelanggan.php
require_once "config/Database.php";
class Pelanggan
{
    private $conn;
    private $table = "pelanggan";
    // ... (getAll, getById, create(nama_pelanggan, kontak), update, delete methods sama)
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
    public function create($nama_pelanggan, $kontak) {
        $query = "INSERT INTO " . $this->table . " (nama_pelanggan, kontak) VALUES (:nama_pelanggan, :kontak)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_pelanggan', $nama_pelanggan);
        $stmt->bindParam(':kontak', $kontak);
        return $stmt->execute();
    }
    public function update($id, $nama_pelanggan, $kontak) {
        $query = "UPDATE " . $this->table . " SET nama_pelanggan = :nama_pelanggan, kontak = :kontak WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama_pelanggan', $nama_pelanggan);
        $stmt->bindParam(':kontak', $kontak);
        return $stmt->execute();
    }
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}