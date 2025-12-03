<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($pelanggan) ? 'Edit Pelanggan' : 'Add Pelanggan'; ?></h2>
<form action="index.php?entity=pelanggan&action=<?php echo isset($pelanggan) ? 'update&id=' . $pelanggan['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Name:</label>
        <input type="text" name="nama_pelanggan" value="<?php echo isset($pelanggan) ? $pelanggan['nama_pelanggan'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Kontak:</label>
        <input type="text" name="kontak" value="<?php echo isset($pelanggan) ? $pelanggan['kontak'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
