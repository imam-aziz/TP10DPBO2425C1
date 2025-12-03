<?php
// models/PesananServis.php
require_once "config/Database.php";
class PesananServis
{
    private $conn;
    private $table = "pesanan_servis";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        // Query JOIN untuk mengambil data dari 3 tabel (Pelanggan, Mekanik, Servis)
        $query = "SELECT ps.*, 
            p.nama_pelanggan AS nama_pelanggan, 
            m.nama_mekanik AS nama_mekanik,
            s.jenis_servis AS jenis_servis,
            s.biaya AS biaya_servis
            FROM " . $this->table . " ps
            JOIN pelanggan p ON ps.id_pelanggan = p.id
            JOIN mekanik m ON ps.id_mekanik = m.id
            JOIN servis s ON ps.id_servis = s.id";
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

    public function create($id_pelanggan, $id_mekanik, $id_servis, $tgl_masuk, $catatan) {
        $query = "INSERT INTO " . $this->table . " (id_pelanggan, id_mekanik, id_servis, tgl_masuk, catatan) 
                  VALUES (:id_pelanggan, :id_mekanik, :id_servis, :tgl_masuk, :catatan)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_pelanggan', $id_pelanggan);
        $stmt->bindParam(':id_mekanik', $id_mekanik);
        $stmt->bindParam(':id_servis', $id_servis);
        $stmt->bindParam(':tgl_masuk', $tgl_masuk);
        $stmt->bindParam(':catatan', $catatan);
        return $stmt->execute();
    }

    public function update($id, $id_pelanggan, $id_mekanik, $id_servis, $tgl_masuk, $catatan) {
        $query = "UPDATE " . $this->table . " SET 
                  id_pelanggan = :id_pelanggan, 
                  id_mekanik = :id_mekanik, 
                  id_servis = :id_servis,
                  tgl_masuk = :tgl_masuk,
                  catatan = :catatan
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':id_pelanggan', $id_pelanggan);
        $stmt->bindParam(':id_mekanik', $id_mekanik);
        $stmt->bindParam(':id_servis', $id_servis);
        $stmt->bindParam(':tgl_masuk', $tgl_masuk);
        $stmt->bindParam(':catatan', $catatan);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}