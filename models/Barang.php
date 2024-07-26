<?php
class Barang {
    private $conn;
    private $table_name = "barang";

    public $id;
    public $nama_barang;
    public $keterangan;
    public $satuan;
    public $id_pengguna;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nama_barang=:nama_barang, keterangan=:keterangan, satuan=:satuan, id_pengguna=:id_pengguna";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nama_barang", $this->nama_barang);
        $stmt->bindParam(":keterangan", $this->keterangan);
        $stmt->bindParam(":satuan", $this->satuan);
        $stmt->bindParam(":id_pengguna", $this->id_pengguna);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nama_barang=:nama_barang, keterangan=:keterangan, satuan=:satuan, id_pengguna=:id_pengguna WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nama_barang", $this->nama_barang);
        $stmt->bindParam(":keterangan", $this->keterangan);
        $stmt->bindParam(":satuan", $this->satuan);
        $stmt->bindParam(":id_pengguna", $this->id_pengguna);
        $stmt->bindParam(":id", $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
