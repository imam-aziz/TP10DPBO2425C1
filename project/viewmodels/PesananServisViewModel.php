<?php
require_once 'models/Pelanggan.php';
require_once 'models/Mekanik.php';
require_once 'models/Servis.php';
require_once 'models/PesananServis.php';

class PesananServisViewModel
{
    private $pelangganModel;
    private $mekanikModel;
    private $servisModel;
    private $pesananServisModel;

    public $id;
    public $id_pelanggan;
    public $id_mekanik;
    public $id_servis;
    public $tgl_masuk;
    public $catatan;

    public function __construct() {
        $this->pelangganModel = new Pelanggan();
        $this->mekanikModel = new Mekanik();
        $this->servisModel = new Servis();
        $this->pesananServisModel = new PesananServis();
    }

    public function bind($data) {
        $this->id = isset($data['id']) ? $data['id'] : null;
        $this->id_pelanggan = isset($data['id_pelanggan']) ? $data['id_pelanggan'] : null;
        $this->id_mekanik = isset($data['id_mekanik']) ? $data['id_mekanik'] : null;
        $this->id_servis = isset($data['id_servis']) ? $data['id_servis'] : null;
        $this->tgl_masuk = isset($data['tgl_masuk']) ? $data['tgl_masuk'] : date('Y-m-d');
        $this->catatan = isset($data['catatan']) ? $data['catatan'] : '';
    }

    public function save() {
        if (!empty($this->id)) {
            return $this->pesananServisModel->update($this->id, $this->id_pelanggan, $this->id_mekanik, $this->id_servis, $this->tgl_masuk, $this->catatan);
        } else {
            return $this->pesananServisModel->create($this->id_pelanggan, $this->id_mekanik, $this->id_servis, $this->tgl_masuk, $this->catatan);
        }
    }

    // --- Fungsi Pendukung View (Dropdown & Read) ---
    public function getPesananServisList() { return $this->pesananServisModel->getAll(); }
    public function getPesananServisById($id) { return $this->pesananServisModel->getById($id); }
    public function deletePesananServis($id) { return $this->pesananServisModel->delete($id); }

    // Untuk Dropdown di Form
    public function getPelangganList() { return $this->pelangganModel->getAll(); }
    public function getMekanikList() { return $this->mekanikModel->getAll(); }
    public function getServisList() { return $this->servisModel->getAll(); }
}