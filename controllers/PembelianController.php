<?php
class PembelianController {
    private $db;
    private $pembelian;

    public function __construct() {
        require_once 'config/database.php';
        require_once 'models/Pembelian.php';
        require_once 'models/Barang.php';
        $database = new Database();
        $this->db = $database->getConnection();
        $this->pembelian = new Pembelian($this->db);
    }

    // Display a list of pembelian
    public function index() {
        $stmt = $this->pembelian->read();
        $pembelian_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $title = "List of Pembelian";
        $content = 'views/pembelian/index.php';
        include 'views/layouts/main.php';
    }

    // Show the form to create a new pembelian
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->pembelian->jumlah_pembelian = $_POST['jumlah_pembelian'];
            $this->pembelian->harga_beli = $_POST['harga_beli'];
            $this->pembelian->id_barang = $_POST['id_barang'];
            if ($this->pembelian->create()) {
                header("Location: /jual-barang/pembelian");
                exit();
            } else {
                echo "Failed to create pembelian.";
            }
        }

        // Fetch barang for the select input
        require_once 'models/Barang.php';
        $barang = new Barang($this->db);
        $stmt = $barang->read();
        $barang_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $title = "Create Pembelian";
        $content = 'views/pembelian/create.php';
        include 'views/layouts/main.php';
    }
}
?>
