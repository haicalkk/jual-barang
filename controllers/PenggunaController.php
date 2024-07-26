<?php
class PenggunaController {
    private $db;
    private $pengguna;

    public function __construct() {
        require_once 'config/database.php';
        require_once 'models/Pengguna.php';
        $database = new Database();
        $this->db = $database->getConnection();
        $this->pengguna = new Pengguna($this->db);
    }

    // Show the registration form
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->pengguna->nama_pengguna = $_POST['nama_pengguna'];
            $this->pengguna->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $this->pengguna->nama_depan = $_POST['nama_depan'];
            $this->pengguna->nama_belakang = $_POST['nama_belakang'];
            $this->pengguna->no_hp = $_POST['no_hp'];
            $this->pengguna->alamat = $_POST['alamat'];
            $this->pengguna->id_akses = 1;
            if ($this->pengguna->create()) {
                header("Location: /jual-barang/pengguna/login");
                exit();
            } else {
                echo "Failed to register.";
            }
        }
        include 'views/auth/register.php';
    }

    // Show the login form
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->pengguna->nama_pengguna = $_POST['nama_pengguna'];
            $user_data = $this->pengguna->getByNamaPengguna();
            if ($user_data && password_verify($_POST['password'], $user_data['password'])) {
                session_start();
                $_SESSION['user_id'] = $user_data['id'];
                $_SESSION['id_akses'] = $user_data['id_akses'];
                header("Location: /jual-barang/");
                exit();
            } else {
                echo "Invalid credentials.";
            }
        }
        include 'views/auth/login.php';
    }

    // Log out the user
    public function logout() {
        session_start();
        session_destroy();
        header("Location: /jual-barang/pengguna/login");
        exit();
    }
}
?>
