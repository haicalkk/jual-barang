<h1 class="text-2xl font-bold mb-4">Daftar Penjualan</h1>

<a href="/jual-barang/penjualan/create" class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Penjualan</a>
<table class="min-w-full bg-white border border-gray-300">
    <thead class="bg-gray-100 text-left">
        <tr>
            <th class="py-2 px-4 border-b font-bold">ID</th>
            <th class="py-2 px-4 border-b font-bold">Nama Barang</th>
            <th class="py-2 px-4 border-b font-bold">Jumlah Penjualan</th>
            <th class="py-2 px-4 border-b font-bold">Harga Jual</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($penjualan_list as $index => $penjualan): ?>
        <tr class="<?php echo $index % 2 == 0 ? 'bg-gray-50' : 'bg-white'; ?>">
            <td class="py-2 px-4 border-b"><?php echo $penjualan['id']; ?></td>
            <td class="py-2 px-4 border-b"><?php echo $penjualan['nama_barang']; ?></td>
            <td class="py-2 px-4 border-b"><?php echo $penjualan['jumlah_penjualan']; ?></td>
            <td class="py-2 px-4 border-b">Rp. <?php echo number_format($penjualan['harga_jual'], 2); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
