<?php require_once 'views/template/header.php'; ?>

<h2 class="mt-4">Daftar Jenis Servis</h2>
<a href="index.php?entity=servis&action=add" class="btn btn-primary">Tambah Servis</a>
<table class="w-full border">
    <tr>
        <th>Jenis Servis</th>
        <th>Biaya (Rp)</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($servisList as $servis): ?>
        <tr>
            <td><?php echo htmlspecialchars($servis['jenis_servis']); ?></td>
            <td><?php echo number_format($servis['biaya'], 0, ',', '.'); ?></td>
            <td>
                <a href="index.php?entity=servis&action=edit&id=<?php echo $servis['id']; ?>" class="btn">Edit</a>
                |
                <a href="index.php?entity=servis&action=delete&id=<?php echo $servis['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus servis ini?');">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php require_once 'views/template/footer.php'; ?>