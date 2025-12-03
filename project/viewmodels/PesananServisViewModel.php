<?php
// viewmodels/PesananServisViewModel.php
require_once 'models/Pelanggan.php';
require_once 'models/Mekanik.php';
require_once 'models/Servis.php';
require_once 'models/PesananServis.php';

class PesananServisViewModel
{
    // Memanggil 3 Model Master/Lookup
    private $pelanggan;
    private $mekanik;
    private $servis;
    private $pesanan_servis;

    public function __construct() {
        $this->pelanggan = new Pelanggan();
        $this->mekanik = new Mekanik();
        $this->servis = new Servis();
        $this->pesanan_servis = new PesananServis();
    }

    public function getPesananServisList() {
        return $this->pesanan_servis->getAll();
    }

    public function getPesananServisById($id) {
        return $this->pesanan_servis->getById($id);
    }

    // Fungsi khusus untuk Data Binding di View Form
    public function getPelangganList() {
        return $this->pelanggan->getAll();
    }

    public function getMekanikList() {
        return $this->mekanik->getAll();
    }
    
    public function getServisList() {
        return $this->servis->getAll();
    }

    public function addPesananServis($id_pelanggan, $id_mekanik, $id_servis, $tgl_masuk, $catatan) {
        return $this->pesanan_servis->create($id_pelanggan, $id_mekanik, $id_servis, $tgl_masuk, $catatan);
    }

    public function updatePesananServis($id, $id_pelanggan, $id_mekanik, $id_servis, $tgl_masuk, $catatan) {
        return $this->pesanan_servis->update($id, $id_pelanggan, $id_mekanik, $id_servis, $tgl_masuk, $catatan);
    }

    public function deletePesananServis($id) {
        return $this->pesanan_servis->delete($id);
    }
}