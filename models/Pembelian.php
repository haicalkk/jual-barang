<?php
class Pembelian {
    private $conn;
    private $table_name = "pembelian";

    public $id;
    public $jumlah_pembelian;
    public $harga_beli;
    public $id_barang;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * 
                  FROM " . $this->table_name . " p 
                  JOIN barang b ON p.id_barang = b.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET jumlah_pembelian=:jumlah_pembelian, harga_beli=:harga_beli, id_barang=:id_barang";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":jumlah_pembelian", $this->jumlah_pembelian);
        $stmt->bindParam(":harga_beli", $this->harga_beli);
        $stmt->bindParam(":id_barang", $this->id_barang);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
