<?php
// Load ViewModels
require_once 'viewmodels/PelangganViewModel.php';
require_once 'viewmodels/MekanikViewModel.php';
require_once 'viewmodels/ServisViewModel.php';
require_once 'viewmodels/PesananServisViewModel.php';

// Ambil Entity dan Action dari URL (default ke pesananservis)
$entity = isset($_GET['entity']) ? $_GET['entity'] : 'pesananservis';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Routing
switch ($entity) {
    case 'pelanggan':
        $viewModel = new PelangganViewModel();
        if ($action == 'save' || $action == 'update') {
            $viewModel->bind($_POST); 
            $viewModel->save();
            header("Location: index.php?entity=pelanggan");
        } elseif ($action == 'edit') {
            $pelanggan = $viewModel->getPelangganById($id);
            require 'views/pelanggan_form.php';
        } elseif ($action == 'delete') {
            $viewModel->deletePelanggan($id);
            header("Location: index.php?entity=pelanggan");
        } elseif ($action == 'add') {
            require 'views/pelanggan_form.php';
        } else {
            $pelangganList = $viewModel->getPelangganList();
            require 'views/pelanggan_list.php';
        }
        break;

    case 'mekanik':
        $viewModel = new MekanikViewModel();
        if ($action == 'save' || $action == 'update') {
            $viewModel->bind($_POST);
            $viewModel->save();
            header("Location: index.php?entity=mekanik");
        } elseif ($action == 'edit') {
            $mekanik = $viewModel->getMekanikById($id);
            require 'views/mekanik_form.php';
        } elseif ($action == 'delete') {
            $viewModel->deleteMekanik($id);
            header("Location: index.php?entity=mekanik");
        } elseif ($action == 'add') {
            require 'views/mekanik_form.php';
        } else {
            $mekanikList = $viewModel->getMekanikList();
            require 'views/mekanik_list.php';
        }
        break;

    case 'servis':
        $viewModel = new ServisViewModel();
        if ($action == 'save' || $action == 'update') {
            $viewModel->bind($_POST);
            $viewModel->save();
            header("Location: index.php?entity=servis");
        } elseif ($action == 'edit') {
            $servis = $viewModel->getServisById($id);
            require 'views/servis_form.php';
        } elseif ($action == 'delete') {
            $viewModel->deleteServis($id);
            header("Location: index.php?entity=servis");
        } elseif ($action == 'add') {
            require 'views/servis_form.php';
        } else {
            $servisList = $viewModel->getServisList();
            require 'views/servis_list.php';
        }
        break;

    case 'pesananservis':
    default:
        $viewModel = new PesananServisViewModel();
        if ($action == 'save' || $action == 'update') {
            // ⭐️ BINDING
            $viewModel->bind($_POST);
            $viewModel->save();
            header("Location: index.php?entity=pesananservis");
        } elseif ($action == 'edit') {
            $pesananServis = $viewModel->getPesananServisById($id);
            // Load data untuk dropdown
            $pelangganList = $viewModel->getPelangganList();
            $mekanikList = $viewModel->getMekanikList();
            $servisList = $viewModel->getServisList();
            require 'views/pesananservis_form.php';
        } elseif ($action == 'delete') {
            $viewModel->deletePesananServis($id);
            header("Location: index.php?entity=pesananservis");
        } elseif ($action == 'add') {
            // Load data untuk dropdown
            $pelangganList = $viewModel->getPelangganList();
            $mekanikList = $viewModel->getMekanikList();
            $servisList = $viewModel->getServisList();
            require 'views/pesananservis_form.php';
        } else {
            $pesananServisList = $viewModel->getPesananServisList();
            require 'views/pesananservis_list.php';
        }
        break;
}
?>