<?php require_once 'views/template/header.php'; ?>

<h2 class="text-xl mb-4"><?php echo isset($servis) ? 'Edit Data Servis' : 'Tambah Servis Baru'; ?></h2>
<form action="index.php?entity=servis&action=<?php echo isset($servis) ? 'update&id=' . $servis['id'] : 'save'; ?>" method="POST">
    <div>
        <label>Jenis Servis:</label>
        <input type="text" name="jenis_servis" value="<?php echo isset($servis) ? $servis['jenis_servis'] : ''; ?>" required>
    </div>
    <div>
        <label>Biaya (Rp):</label>
        <input type="number" name="biaya" value="<?php echo isset($servis) ? $servis['biaya'] : ''; ?>" required>
    </div>
    <button type="submit">Simpan</button>
</form>
<?php require_once 'views/template/footer.php'; ?>