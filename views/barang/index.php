<h1 class="text-2xl font-bold mb-4">Daftar Barang</h1>

<a href="/jual-barang/barang/create" class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Barang</a>
<table class="min-w-full bg-white border border-gray-300">
    <thead class="bg-gray-100 text-left">
        <tr>
            <th class="py-2 px-4 border-b font-bold">ID</th>
            <th class="py-2 px-4 border-b font-bold">Nama Barang</th>
            <th class="py-2 px-4 border-b font-bold">Keterangan</th>
            <th class="py-2 px-4 border-b font-bold">Satuan</th>
            <th class="py-2 px-4 border-b font-bold">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($barang_list as $index => $barang) : ?>
            <tr class="<?php echo $index % 2 == 0 ? 'bg-gray-50' : 'bg-white'; ?>">
                <td class="py-2 px-4 border-b"><?php echo $barang['id']; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $barang['nama_barang']; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $barang['keterangan']; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $barang['satuan']; ?></td>
                <td class="py-2 px-4 border-b">
                    <a href="/jual-barang/barang/update/<?php echo $barang['id']; ?>" class="text-blue-500 hover:text-blue-700">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="/jual-barang/barang/delete/<?php echo $barang['id']; ?>" class="text-red-500 hover:text-red-700 ml-4">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
