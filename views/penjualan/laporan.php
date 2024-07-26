<h1 class="text-2xl font-bold mb-4">Laporan Penjualan</h1>

<table class="min-w-full bg-white border border-gray-300 mb-4">
    <thead class="bg-gray-100 text-left">
        <tr>
            <th class="py-2 px-4 border-b font-bold">Nama Barang</th>
            <th class="py-2 px-4 border-b font-bold">Total Jumlah Pembelian</th>
            <th class="py-2 px-4 border-b font-bold">Total Jumlah Penjualan</th>
            <th class="py-2 px-4 border-b font-bold">Total Nominal Pembelian</th>
            <th class="py-2 px-4 border-b font-bold">Total Nominal Penjualan</th>
            <th class="py-2 px-4 border-b font-bold">Selisih</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($barang_summary as $summary): ?>
        <tr>
            <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($summary['nama_barang']); ?></td>
            <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($summary['total_jumlah_pembelian']); ?></td>
            <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($summary['total_jumlah_penjualan']); ?></td>
            <td class="py-2 px-4 border-b">Rp. <?php echo number_format($summary['total_nominal_pembelian'], 2); ?></td>
            <td class="py-2 px-4 border-b">Rp. <?php echo number_format($summary['total_nominal_penjualan'], 2); ?></td>
            <td class="py-2 px-4 border-b">Rp. <?php echo number_format($summary['selisih'], 2); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="bg-white p-4 rounded shadow-md">
    <h2 class="text-xl font-bold mb-2">Summary</h2>
    <p class="mb-2"><strong>Total Nominal Pembelian:</strong> Rp. <?php echo number_format($total_pembelian_nominal, 2); ?></p>
    <p class="mb-2"><strong>Total Nominal Penjualan:</strong> Rp. <?php echo number_format($total_penjualan_nominal, 2); ?></p>
    <p class="mb-2"><strong>Total Revenue:</strong> Rp. <?php echo number_format($total_revenue, 2); ?></p>
    <p><strong>Loss/Gain:</strong> Rp. <?php echo number_format($total_loss_gain, 2); ?></p>
</div>
