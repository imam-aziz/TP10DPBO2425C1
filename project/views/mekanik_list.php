<?php require_once 'views/template/header.php'; ?>

<h2 class="mt-4">Daftar Mekanik</h2>
<a href="index.php?entity=mekanik&action=add" class="btn btn-primary">Tambah Mekanik</a>
<table class="w-full border">
    <tr>
        <th>Nama Mekanik</th>
        <th>Spesialisasi</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($mekanikList as $mekanik): ?>
        <tr>
            <td><?php echo htmlspecialchars($mekanik['nama_mekanik']); ?></td>
            <td><?php echo htmlspecialchars($mekanik['spesialisasi']); ?></td>
            <td>
                <a href="index.php?entity=mekanik&action=edit&id=<?php echo $mekanik['id']; ?>" class="btn">Edit</a>
                |
                <a href="index.php?entity=mekanik&action=delete&id=<?php echo $mekanik['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus mekanik ini?');">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php require_once 'views/template/footer.php'; ?>