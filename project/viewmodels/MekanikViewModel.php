<?php
// viewmodels/MekanikViewModel.php
require_once 'models/Mekanik.php';
class MekanikViewModel
{
    private $mekanik;
    public function __construct() {
        $this->mekanik = new Mekanik();
    }
    // ... (getMekanikList, getMekanikById, addMekanik, updateMekanik, deleteMekanik methods)
    public function getMekanikList() {
        return $this->mekanik->getAll();
    }
    public function getMekanikById($id) {
        return $this->mekanik->getById($id);
    }
    public function addMekanik($nama_mekanik, $spesialisasi) {
        return $this->mekanik->create($nama_mekanik, $spesialisasi);
    }
    public function updateMekanik($id, $nama_mekanik, $spesialisasi) {
        return $this->mekanik->update($id, $nama_mekanik, $spesialisasi);
    }
    public function deleteMekanik($id) {
        return $this->mekanik->delete($id);
    }
}