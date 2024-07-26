<h1 class="text-2xl font-bold mb-4">Tambah Penjualan</h1>
<form action="/jual-barang/penjualan/create" method="POST" class="bg-white p-4 rounded shadow-md w-1/2">
    <div class="mb-4">
        <label for="id_barang" class="block text-gray-700">Barang:</label>
        <select name="id_barang" id="id_barang" class="w-full border px-2 py-1 rounded" required>
            <?php
            // Assuming $barang_list is provided from the controller
            foreach ($barang_list as $barang) {
                echo "<option value=\"{$barang['id']}\">{$barang['nama_barang']}</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-4">
        <label for="jumlah_penjualan" class="block text-gray-700">Jumlah Penjualan:</label>
        <input type="number" name="jumlah_penjualan" id="jumlah_penjualan" class="w-full border px-2 py-1 rounded" required>
    </div>
    <div class="mb-4">
        <label for="harga_jual" class="block text-gray-700">Harga Jual:</label>
        <input type="number" name="harga_jual" id="harga_jual" class="w-full border px-2 py-1 rounded" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
</form>
<a href="/jual-barang/penjualan" class="mt-4 inline-block text-blue-500">Kembali</a>
