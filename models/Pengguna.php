<?php
class Pengguna {
    private $conn;
    private $table_name = "pengguna";

    public $id;
    public $nama_pengguna;
    public $password;
    public $nama_depan;
    public $nama_belakang;
    public $no_hp;
    public $alamat;
    public $id_akses;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nama_pengguna=:nama_pengguna, password=:password, nama_depan=:nama_depan, nama_belakang=:nama_belakang, no_hp=:no_hp, alamat=:alamat, id_akses=:id_akses";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nama_pengguna", $this->nama_pengguna);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":nama_depan", $this->nama_depan);
        $stmt->bindParam(":nama_belakang", $this->nama_belakang);
        $stmt->bindParam(":no_hp", $this->no_hp);
        $stmt->bindParam(":alamat", $this->alamat);
        $stmt->bindParam(":id_akses", $this->id_akses);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getByNamaPengguna() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE nama_pengguna = :nama_pengguna LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nama_pengguna", $this->nama_pengguna);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
