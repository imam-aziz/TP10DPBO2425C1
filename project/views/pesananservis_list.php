<?php require_once 'views/template/header.php'; ?>

<h2 class="mt-4">Daftar Pesanan Servis</h2>
<a href="index.php?entity=pesananservis&action=add" class="btn btn-primary">Buat Pesanan Servis</a>
<table class="w-full border">
    <tr>
        <th>Tanggal Masuk</th>
        <th>Pelanggan</th>
        <th>Mekanik</th>
        <th>Servis</th>
        <th>Biaya</th>
        <th>Catatan</th>
        <th>Aksi</th>
    </tr>
    <?php 
    // Data Binding: Menggunakan variabel yang sudah di-JOIN oleh PesananServis Model
    foreach ($pesananServisList as $ps): ?>
        <tr>
            <td><?php echo htmlspecialchars($ps['tgl_masuk']); ?></td>
            <td><?php echo htmlspecialchars($ps['nama_pelanggan']); ?></td>
            <td><?php echo htmlspecialchars($ps['nama_mekanik']); ?></td>
            <td><?php echo htmlspecialchars($ps['jenis_servis']); ?></td>
            <td><?php echo number_format($ps['biaya_servis'], 0, ',', '.'); ?></td>
            <td><?php echo htmlspecialchars($ps['catatan']); ?></td>
            <td>
                <a href="index.php?entity=pesananservis&action=edit&id=<?php echo $ps['id']; ?>" class="btn">Edit</a>
                |
                <a href="index.php?entity=pesananservis&action=delete&id=<?php echo $ps['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin batalkan pesanan servis ini?');">Batal</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php require_once 'views/template/footer.php'; ?>