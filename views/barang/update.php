<h1 class="text-2xl font-bold mb-4">Ubah Barang</h1>
<form action="/jual-barang/barang/update/<?php echo $barang['id']; ?>" method="POST" class="bg-white p-4 rounded shadow-md w-1/2">
    <input type="hidden" name="id" value="<?php echo $barang['id']; ?>"/>
    <div class="mb-4">
        <label for="nama_barang" class="block text-gray-700">Nama Barang:</label>
        <input type="text" name="nama_barang" id="nama_barang" value="<?php echo $barang['nama_barang']; ?>" class="w-full border px-2 py-1 rounded" required>
    </div>
    <div class="mb-4">
        <label for="keterangan" class="block text-gray-700">Keterangan:</label>
        <input type="text" name="keterangan" id="keterangan" value="<?php echo $barang['keterangan']; ?>" class="w-full border px-2 py-1 rounded" required>
    </div>
    <div class="mb-4">
        <label for="satuan" class="block text-gray-700">Satuan:</label>
        <input type="text" name="satuan" id="satuan" value="<?php echo $barang['satuan']; ?>" class="w-full border px-2 py-1 rounded" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Perbarui</button>
</form>
<a href="/jual-barang/barang" class="mt-4 inline-block text-blue-500">Kembali</a>
