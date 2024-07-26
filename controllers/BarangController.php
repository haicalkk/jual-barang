<?php
class BarangController {
    private $db;
    private $barang;

    public function __construct() {
        require_once 'config/database.php';
        require_once 'models/Barang.php';
        $database = new Database();
        $this->db = $database->getConnection();
        $this->barang = new Barang($this->db);
    }

    // Display a list of barang
    public function index() {
        $title = "Barang List";
        $stmt = $this->barang->read();
        $barang_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $content = 'views/barang/index.php';
        include 'views/layouts/main.php';
    }

    // Show the form to create a new barang
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->barang->nama_barang = $_POST['nama_barang'];
            $this->barang->keterangan = $_POST['keterangan'];
            $this->barang->satuan = $_POST['satuan'];
            $this->barang->id_pengguna = $_SESSION['user_id'];
            if ($this->barang->create()) {
                header("Location: /jual-barang/barang");
                exit();
            } else {
                $title = "Create Barang - Error";
                $content = 'views/barang/create_error.php';
                include 'views/layouts/main.php';
            }
        } else {
            $title = "Create Barang";
            $content = 'views/barang/create.php';
            include 'views/layouts/main.php';
        }
    }

    // Show the form to update an existing barang
    public function update($id = null) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Handle form submission
            $this->barang->id = $_POST['id'];
            $this->barang->nama_barang = $_POST['nama_barang'];
            $this->barang->keterangan = $_POST['keterangan'];
            $this->barang->satuan = $_POST['satuan'];
            $this->barang->id_pengguna = $_SESSION['user_id']; // Set from session
            
            if ($this->barang->update()) {
                header("Location: /jual-barang/barang");
                exit();
            } else {
                $title = "Update Barang - Error";
                $content = 'views/barang/update_error.php';
                include 'views/layouts/main.php';
            }
        } else {
            // Fetch barang details for editing
            if ($id) {
                $this->barang->id = $id;
                $stmt = $this->barang->read(); // Use readOne() to fetch a single record
                $barang = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($barang) {
                    $title = "Update Barang";
                    $content = 'views/barang/update.php';
                    include 'views/layouts/main.php';
                } else {
                    // Handle case where barang is not found
                    header("Location: /jual-barang/barang");
                    exit();
                }
            } else {
                header("Location: /jual-barang/barang");
                exit();
            }
        }
    }

    // Delete an existing barang
    public function delete($id = null) {
        if ($id) {
            $this->barang->id = $id;
            if ($this->barang->delete()) {
                header("Location: /jual-barang/barang");
                exit();
            } else {
                $title = "Delete Barang - Error";
                $content = 'views/barang/delete_error.php';
                include 'views/layout/main.php';
            }
        } else {
            header("Location: /jual-barang/barang");
            exit();
        }
    }
}
?>
