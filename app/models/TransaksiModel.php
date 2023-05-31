<?php

class TransaksiModel {

    private $table = "transaksi";
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllTransaksi() {
        $this->db->query("SELECT transaksi.*, pembayaran.nama_pembayaran FROM " . $this->table . " JOIN pembayaran ON pembayaran.nama_pembayaran = transaksi.pembayaran_nama");
        return $this->db->resultSet();
    }

    public function tambahTransaksi($data) {
        $this->db->query("INSERT INTO transaksi (tanggal, pembayaran_nama, nama_pengirim, nama_penerima, jumlah) 
            VALUES (:tanggal, :pembayaran_nama, :nama_pengirim, :nama_penerima, :jumlah)");
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('pembayaran_nama', $data['pembayaran_nama']);
        $this->db->bind('nama_pengirim', $data['nama_pengirim']);
        $this->db->bind('nama_penerima', $data['nama_penerima']);
        $this->db->bind('jumlah', $data['jumlah'] );
        $this->db->execute();

        return $this->db->rowCount();
    }


    public function getTransaksiById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    

    public function updateDataTransaksi($data) {
        $this->db->query("UPDATE transaksi SET tanggal=:tanggal, `pembayaran_nama`=:pembayaran_nama, nama_pengirim=:nama_pengirim, nama_penerima=:nama_penerima, jumlah=:jumlah WHERE id=:id");
        $this->db->bind('id', $data['id']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('pembayaran_nama', $data['pembayaran_nama']);
        $this->db->bind('nama_pengirim', $data['nama_pengirim']);
        $this->db->bind('nama_penerima', $data['nama_penerima']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    
    public function cariTransaksi() {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE tanggal LIKE :key 
                          OR pembayaran_nama LIKE :key 
                          OR nama_pengirim LIKE :key 
                          OR nama_penerima LIKE :key 
                          OR jumlah LIKE :key");
        $this->db->bind(':key', "%$key%", PDO::PARAM_STR);
        return $this->db->resultSet();
    }
    

    public function deleteTransaksi($id){
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        $this->db->execute();
    
        return $this->db->rowCount();
    }


    
    



}



?>
