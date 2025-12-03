<?php
require_once 'views/template/header.php';
?>

<h2 class="mt-4">Daftar Pelanggan</h2>
<a href="index.php?entity=pelanggan&action=add" class="btn btn-primary">Tambah Pelanggan</a>
<table class="w-full border">
    <tr>
        <th>Name</th>
        <th>Kontak</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($pelangganList as $pelanggan): ?>
        <tr>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($pelanggan['nama_pelanggan']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($pelanggan['kontak']); ?></td>
            <td class="border px-4 py-2">
                <a href="index.php?entity=pelanggan&action=edit&id=<?php echo $pelanggan['id']; ?>" class="btn">Edit</a>
                |
                <a href="index.php?entity=pelanggan&action=delete&id=<?php echo $pelanggan['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this pelanggan?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
