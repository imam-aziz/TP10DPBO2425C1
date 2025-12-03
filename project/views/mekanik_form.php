<?php require_once 'views/template/header.php'; ?>

<h2 class="text-xl mb-4"><?php echo isset($mekanik) ? 'Edit Data Mekanik' : 'Tambah Mekanik Baru'; ?></h2>
<form action="index.php?entity=mekanik&action=<?php echo isset($mekanik) ? 'update&id=' . $mekanik['id'] : 'save'; ?>" method="POST">
    <div>
        <label>Nama Mekanik:</label>
        <input type="text" name="nama_mekanik" value="<?php echo isset($mekanik) ? $mekanik['nama_mekanik'] : ''; ?>" required>
    </div>
    <div>
        <label>Spesialisasi:</label>
        <input type="text" name="spesialisasi" value="<?php echo isset($mekanik) ? $mekanik['spesialisasi'] : ''; ?>" required>
    </div>
    <button type="submit">Simpan</button>
</form>
<?php require_once 'views/template/footer.php'; ?>