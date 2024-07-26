<?php
class Penjualan {
    private $conn;
    private $table_name = "penjualan";

    public $id;
    public $jumlah_penjualan;
    public $harga_jual;
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
        $query = "INSERT INTO " . $this->table_name . " SET jumlah_penjualan=:jumlah_penjualan, harga_jual=:harga_jual, id_barang=:id_barang";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":jumlah_penjualan", $this->jumlah_penjualan);
        $stmt->bindParam(":harga_jual", $this->harga_jual);
        $stmt->bindParam(":id_barang", $this->id_barang);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
