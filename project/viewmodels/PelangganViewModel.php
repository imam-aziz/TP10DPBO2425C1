<?php
require_once 'models/Pelanggan.php';

class PelangganViewModel
{
    private $pelangganModel;

    public $id;
    public $nama_pelanggan;
    public $kontak;

    public function __construct() {
        $this->pelangganModel = new Pelanggan();
    }

    public function bind($data) {
        $this->id = isset($data['id']) ? $data['id'] : null;
        $this->nama_pelanggan = isset($data['nama_pelanggan']) ? $data['nama_pelanggan'] : '';
        $this->kontak = isset($data['kontak']) ? $data['kontak'] : '';
    }

    // Logic Save (Create/Update otomatis berdasarkan ID)
    public function save() {
        if (!empty($this->id)) {
            return $this->pelangganModel->update($this->id, $this->nama_pelanggan, $this->kontak);
        } else {
            return $this->pelangganModel->create($this->nama_pelanggan, $this->kontak);
        }
    }

    // --- Fungsi Read & Delete ---
    public function getPelangganList() {
        return $this->pelangganModel->getAll();
    }
    public function getPelangganById($id) {
        return $this->pelangganModel->getById($id);
    }
    public function deletePelanggan($id) {
        return $this->pelangganModel->delete($id);
    }
}