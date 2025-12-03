<link rel="stylesheet" href="assets/style.css">
<?php
// index.php (Router)
require_once 'viewmodels/PelangganViewModel.php';
require_once 'viewmodels/MekanikViewModel.php';
require_once 'viewmodels/ServisViewModel.php';
require_once 'viewmodels/PesananServisViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'pelanggan'; // Default
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity === 'pelanggan') {
    $vm = new PelangganViewModel();
    switch ($action) {
        case 'list': $pelangganList = $vm->getPelangganList(); require_once 'views/pelanggan_list.php'; break;
        case 'add': require_once 'views/pelanggan_form.php'; break;
        case 'edit': $id = $_GET['id']; $pelanggan = $vm->getPelangganById($id); require_once 'views/pelanggan_form.php'; break;
        case 'save': $vm->addPelanggan($_POST['nama_pelanggan'], $_POST['kontak']); header('Location: index.php?entity=pelanggan&action=list'); break;
        case 'update': $vm->updatePelanggan($_GET['id'], $_POST['nama_pelanggan'], $_POST['kontak']); header('Location: index.php?entity=pelanggan&action=list'); break;
        case 'delete': $vm->deletePelanggan($_GET['id']); header('Location: index.php?entity=pelanggan&action=list'); break;
    }
} elseif ($entity === 'mekanik') {
    $vm = new MekanikViewModel();
    switch ($action) {
        case 'list': $mekanikList = $vm->getMekanikList(); require_once 'views/mekanik_list.php'; break;
        case 'add': require_once 'views/mekanik_form.php'; break;
        case 'edit': $id = $_GET['id']; $mekanik = $vm->getMekanikById($id); require_once 'views/mekanik_form.php'; break;
        case 'save': $vm->addMekanik($_POST['nama_mekanik'], $_POST['spesialisasi']); header('Location: index.php?entity=mekanik&action=list'); break;
        case 'update': $vm->updateMekanik($_GET['id'], $_POST['nama_mekanik'], $_POST['spesialisasi']); header('Location: index.php?entity=mekanik&action=list'); break;
        case 'delete': $vm->deleteMekanik($_GET['id']); header('Location: index.php?entity=mekanik&action=list'); break;
    }
} elseif ($entity === 'servis') {
    $vm = new ServisViewModel();
    switch ($action) {
        case 'list': $servisList = $vm->getServisList(); require_once 'views/servis_list.php'; break;
        case 'add': require_once 'views/servis_form.php'; break;
        case 'edit': $id = $_GET['id']; $servis = $vm->getServisById($id); require_once 'views/servis_form.php'; break;
        case 'save': $vm->addServis($_POST['jenis_servis'], $_POST['biaya']); header('Location: index.php?entity=servis&action=list'); break;
        case 'update': $vm->updateServis($_GET['id'], $_POST['jenis_servis'], $_POST['biaya']); header('Location: index.php?entity=servis&action=list'); break;
        case 'delete': $vm->deleteServis($_GET['id']); header('Location: index.php?entity=servis&action=list'); break;
    }
} elseif ($entity === 'pesananservis') {
    $vm = new PesananServisViewModel();
    switch ($action) {
        case 'list': $pesananServisList = $vm->getPesananServisList(); require_once 'views/pesananservis_list.php'; break;
        case 'add':
            $pelangganList = $vm->getPelangganList();
            $mekanikList = $vm->getMekanikList();
            $servisList = $vm->getServisList();
            require_once 'views/pesananservis_form.php'; break;
        case 'edit':
            $id = $_GET['id'];
            $pesananServis = $vm->getPesananServisById($id);
            $pelangganList = $vm->getPelangganList();
            $mekanikList = $vm->getMekanikList();
            $servisList = $vm->getServisList();
            require_once 'views/pesananservis_form.php'; break;
        case 'save':
            $vm->addPesananServis($_POST['id_pelanggan'], $_POST['id_mekanik'], $_POST['id_servis'], $_POST['tgl_masuk'], $_POST['catatan']);
            header('Location: index.php?entity=pesananservis&action=list'); break;
        case 'update':
            $vm->updatePesananServis($_GET['id'], $_POST['id_pelanggan'], $_POST['id_mekanik'], $_POST['id_servis'], $_POST['tgl_masuk'], $_POST['catatan']);
            header('Location: index.php?entity=pesananservis&action=list'); break;
        case 'delete': $vm->deletePesananServis($_GET['id']); header('Location: index.php?entity=pesananservis&action=list'); break;
        default: header('Location: index.php?entity=pelanggan&action=list'); break;
    }
} else {
    echo "404 Entity Not Found";
}