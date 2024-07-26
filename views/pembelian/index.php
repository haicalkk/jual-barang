<h1 class="text-2xl font-bold mb-4">Daftar Pembelian</h1>

<a href="/jual-barang/pembelian/create" class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Pembelian</a>
<table class="min-w-full bg-white border border-gray-300">
    <thead class="bg-gray-100 text-left">
        <tr>
            <th class="py-2 px-4 border-b font-bold">ID</th>
            <th class="py-2 px-4 border-b font-bold">Nama Barang</th>
            <th class="py-2 px-4 border-b font-bold">Jumlah Pembelian</th>
            <th class="py-2 px-4 border-b font-bold">Harga Beli</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pembelian_list as $index => $pembelian): ?>
        <tr class="<?php echo $index % 2 == 0 ? 'bg-gray-50' : 'bg-white'; ?>">
            <td class="py-2 px-4 border-b"><?php echo $pembelian['id']; ?></td>
            <td class="py-2 px-4 border-b"><?php echo $pembelian['nama_barang']; ?></td>
            <td class="py-2 px-4 border-b"><?php echo $pembelian['jumlah_pembelian']; ?></td>
            <td class="py-2 px-4 border-b">Rp. <?php echo number_format($pembelian['harga_beli'], 2); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
