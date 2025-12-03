<?php
require_once 'models/Servis.php';

class ServisViewModel
{
    private $servisModel;

    public $id;
    public $jenis_servis;
    public $biaya;

    public function __construct() {
        $this->servisModel = new Servis();
    }

    public function bind($data) {
        $this->id = isset($data['id']) ? $data['id'] : null;
        $this->jenis_servis = isset($data['jenis_servis']) ? $data['jenis_servis'] : '';
        $this->biaya = isset($data['biaya']) ? $data['biaya'] : 0;
    }

    public function save() {
        if (!empty($this->id)) {
            return $this->servisModel->update($this->id, $this->jenis_servis, $this->biaya);
        } else {
            return $this->servisModel->create($this->jenis_servis, $this->biaya);
        }
    }

    // --- Fungsi Read & Delete ---
    public function getServisList() {
        return $this->servisModel->getAll();
    }
    public function getServisById($id) {
        return $this->servisModel->getById($id);
    }
    public function deleteServis($id) {
        return $this->servisModel->delete($id);
    }
}