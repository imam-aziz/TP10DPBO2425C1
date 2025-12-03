<?php require_once 'views/template/header.php'; ?>

<h2 class="text-xl mb-4"><?php echo isset($pesananServis) ? 'Edit Pesanan Servis' : 'Buat Pesanan Servis Baru'; ?></h2>
<form action="index.php?entity=pesananservis&action=<?php echo isset($pesananServis) ? 'update&id=' . $pesananServis['id'] : 'save'; ?>" method="POST">
    
    <div>
        <label>Pelanggan:</label>
        <select name="id_pelanggan" required>
            <option value="">-- Pilih Pelanggan --</option>
            <?php // Data Binding 1
            foreach ($pelangganList as $pelanggan): ?>
                <option value="<?php echo $pelanggan['id']; ?>" 
                    <?php echo (isset($pesananServis) && $pesananServis['id_pelanggan'] == $pelanggan['id']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($pelanggan['nama_pelanggan']); ?> (Kontak: <?php echo htmlspecialchars($pelanggan['kontak']); ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div>
        <label>Mekanik:</label>
        <select name="id_mekanik" required>
            <option value="">-- Pilih Mekanik --</option>
            <?php // Data Binding 2
            foreach ($mekanikList as $mekanik): ?>
                <option value="<?php echo $mekanik['id']; ?>" 
                    <?php echo (isset($pesananServis) && $pesananServis['id_mekanik'] == $mekanik['id']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($mekanik['nama_mekanik']); ?> (Spesialisasi: <?php echo htmlspecialchars($mekanik['spesialisasi']); ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div>
        <label>Jenis Servis:</label>
        <select name="id_servis" required>
            <option value="">-- Pilih Servis --</option>
            <?php // Data Binding 3
            foreach ($servisList as $servis): ?>
                <option value="<?php echo $servis['id']; ?>" 
                    <?php echo (isset($pesananServis) && $pesananServis['id_servis'] == $servis['id']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($servis['jenis_servis']); ?> (Rp<?php echo number_format($servis['biaya'], 0, ',', '.'); ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label>Tanggal Masuk:</label>
        <input type="date" name="tgl_masuk" value="<?php echo isset($pesananServis) ? $pesananServis['tgl_masuk'] : date('Y-m-d'); ?>" required>
    </div>

    <div>
        <label>Catatan/Keluhan:</label>
        <textarea name="catatan" rows="3"><?php echo isset($pesananServis) ? htmlspecialchars($pesananServis['catatan']) : ''; ?></textarea>
    </div>
    
    <button type="submit">Simpan Pesanan</button>
</form>
<?php require_once 'views/template/footer.php'; ?>