<?php
require_once 'models/Mekanik.php';

class MekanikViewModel
{
    private $mekanikModel;

    public $id;
    public $nama_mekanik;
    public $spesialisasi;

    public function __construct() {
        $this->mekanikModel = new Mekanik();
    }

    public function bind($data) {
        $this->id = isset($data['id']) ? $data['id'] : null;
        $this->nama_mekanik = isset($data['nama_mekanik']) ? $data['nama_mekanik'] : '';
        $this->spesialisasi = isset($data['spesialisasi']) ? $data['spesialisasi'] : '';
    }

    public function save() {
        if (!empty($this->id)) {
            return $this->mekanikModel->update($this->id, $this->nama_mekanik, $this->spesialisasi);
        } else {
            return $this->mekanikModel->create($this->nama_mekanik, $this->spesialisasi);
        }
    }

    // --- Fungsi Read & Delete ---
    public function getMekanikList() {
        return $this->mekanikModel->getAll();
    }
    public function getMekanikById($id) {
        return $this->mekanikModel->getById($id);
    }
    public function deleteMekanik($id) {
        return $this->mekanikModel->delete($id);
    }
}