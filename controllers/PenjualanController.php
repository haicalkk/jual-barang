<?php
class PenjualanController {
    private $db;
    private $penjualan;
    private $pembelian;

    public function __construct() {
        require_once 'config/database.php';
        require_once 'models/Penjualan.php';
        require_once 'models/Pembelian.php';
        require_once 'models/Barang.php';
        $database = new Database();
        $this->db = $database->getConnection();
        $this->penjualan = new Penjualan($this->db);
        $this->pembelian = new Pembelian($this->db);
    }

    // Display a list of penjualan
    public function index() {
        $stmt = $this->penjualan->read();
        $penjualan_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $title = "List of Penjualan";
        $content = 'views/penjualan/index.php';
        include 'views/layouts/main.php';
    }

    // Show the form to create a new penjualan
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->penjualan->jumlah_penjualan = $_POST['jumlah_penjualan'];
            $this->penjualan->harga_jual = $_POST['harga_jual'];
            $this->penjualan->id_barang = $_POST['id_barang'];
            if ($this->penjualan->create()) {
                header("Location: /jual-barang/penjualan");
                exit();
            } else {
                echo "Failed to create penjualan.";
            }
        }

        // Fetch barang for the select input
        require_once 'models/Barang.php';
        $barang = new Barang($this->db);
        $stmt = $barang->read();
        $barang_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $title = "Create Penjualan";
        $content = 'views/penjualan/create.php';
        include 'views/layouts/main.php';
    }

    public function laporan() {
        // Fetch penjualan summary
        $penjualan_stmt = $this->penjualan->read();
        $penjualan_data = $penjualan_stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Fetch pembelian summary
        $pembelian_stmt = $this->pembelian->read();
        $pembelian_data = $pembelian_stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Initialize arrays for data aggregation
        $barang_summary = [];
        
        // Aggregate penjualan data
        foreach ($penjualan_data as $penjualan) {
            $id_barang = $penjualan['id_barang'];
            if (!isset($barang_summary[$id_barang])) {
                $barang_summary[$id_barang] = [
                    'nama_barang' => $penjualan['nama_barang'],
                    'total_jumlah_pembelian' => 0,
                    'total_jumlah_penjualan' => 0,
                    'total_nominal_pembelian' => 0,
                    'total_nominal_penjualan' => 0,
                ];
            }
            $barang_summary[$id_barang]['total_jumlah_penjualan'] += $penjualan['jumlah_penjualan'];
            $barang_summary[$id_barang]['total_nominal_penjualan'] += $penjualan['harga_jual'] * $penjualan['jumlah_penjualan'];
        }
    
        // Aggregate pembelian data
        foreach ($pembelian_data as $pembelian) {
            $id_barang = $pembelian['id_barang'];
            if (!isset($barang_summary[$id_barang])) {
                $barang_summary[$id_barang] = [
                    'nama_barang' => '',
                    'total_jumlah_pembelian' => 0,
                    'total_jumlah_penjualan' => 0,
                    'total_nominal_pembelian' => 0,
                    'total_nominal_penjualan' => 0,
                ];
            }
            $barang_summary[$id_barang]['total_jumlah_pembelian'] += $pembelian['jumlah_pembelian'];
            $barang_summary[$id_barang]['total_nominal_pembelian'] += $pembelian['harga_beli'] * $pembelian['jumlah_pembelian'];
        }
    
        // Prepare totals and summary
        $total_revenue = 0;
        $total_pembelian_nominal = 0;
        $total_penjualan_nominal = 0;
    
        foreach ($barang_summary as $id_barang => $summary) {
            $summary['selisih'] = $summary['total_nominal_penjualan'] - $summary['total_nominal_pembelian'];
            $barang_summary[$id_barang] = $summary;
            $total_revenue += $summary['total_nominal_penjualan'];
            $total_pembelian_nominal += $summary['total_nominal_pembelian'];
            $total_penjualan_nominal += $summary['total_nominal_penjualan'];
        }
    
        $total_loss_gain = $total_penjualan_nominal - $total_pembelian_nominal;
    
        $title = "Laporan Penjualan";
        $content = 'views/penjualan/laporan.php';
        include 'views/layouts/main.php';
    }
    
}
?>
