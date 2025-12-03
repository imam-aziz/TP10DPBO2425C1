<?php
// viewmodels/ServisViewModel.php
require_once 'models/Servis.php';
class ServisViewModel
{
    private $servis;
    public function __construct() {
        $this->servis = new Servis();
    }
    
    public function getServisList() {
        return $this->servis->getAll();
    }
    public function getServisById($id) {
        return $this->servis->getById($id);
    }
    public function addServis($jenis_servis, $biaya) {
        return $this->servis->create($jenis_servis, $biaya);
    }
    public function updateServis($id, $jenis_servis, $biaya) {
        return $this->servis->update($id, $jenis_servis, $biaya);
    }
    public function deleteServis($id) {
        return $this->servis->delete($id);
    }
}