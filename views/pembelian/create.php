<h1 class="text-2xl font-bold my-4">Tambah Pembelian</h1>
<form action="/jual-barang/pembelian/create" method="POST" class="bg-white p-4 rounded shadow-md w-1/2">
    <div class="mb-4">
        <label for="id_barang" class="block text-gray-700">Barang:</label>
        <select name="id_barang" id="id_barang" class="w-full border px-2 py-1 rounded" required>
            <option value="">Pilih Barang</option>
            <?php foreach ($barang_list as $barang): ?>
            <option value="<?php echo $barang['id']; ?>"><?php echo $barang['nama_barang']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-4">
        <label for="jumlah_pembelian" class="block text-gray-700">Jumlah Pembelian:</label>
        <input type="number" name="jumlah_pembelian" id="jumlah_pembelian" class="w-full border px-2 py-1 rounded" required>
    </div>
    <div class="mb-4">
        <label for="harga_beli" class="block text-gray-700">Harga Beli:</label>
        <input type="number" name="harga_beli" id="harga_beli" class="w-full border px-2 py-1 rounded" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
</form>
<a href="/jual-barang/pembelian" class="mt-4 inline-block text-blue-500">Kembali</a>
