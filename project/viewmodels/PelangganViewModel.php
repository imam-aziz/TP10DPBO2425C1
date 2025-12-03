<?php
// viewmodels/PelangganViewModel.php
require_once 'models/Pelanggan.php';
class PelangganViewModel
{
    private $pelanggan;
    public function __construct() {
        $this->pelanggan = new Pelanggan();
    }
    // ... (getPelangganList, getPelangganById, addPelanggan, updatePelanggan, deletePelanggan methods)
    public function getPelangganList() {
        return $this->pelanggan->getAll();
    }
    public function getPelangganById($id) {
        return $this->pelanggan->getById($id);
    }
    public function addPelanggan($nama_pelanggan, $kontak) {
        return $this->pelanggan->create($nama_pelanggan, $kontak);
    }
    public function updatePelanggan($id, $nama_pelanggan, $kontak) {
        return $this->pelanggan->update($id, $nama_pelanggan, $kontak);
    }
    public function deletePelanggan($id) {
        return $this->pelanggan->delete($id);
    }
}