<?php

class PembayaranModel {

    private $table = "pembayaran";
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllPembayaran() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahPembayaran($data){
        $this->db->query("INSERT INTO pembayaran (nama_pembayaran) VALUES(:nama_pembayaran)");
        $this->db->bind('nama_pembayaran',$data['nama_pembayaran']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getPembayaranById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    

    public function updateDataPembayaran($data){
        $this->db->query("UPDATE pembayaran SET nama_pembayaran=:nama_pembayaran WHERE id=:id");
        $this->db->bind('id',$data['id']);
        $this->db->bind('nama_pembayaran',$data['nama_pembayaran']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariPembayaran(){
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_pembayaran LIKE :key");
        $this->db->bind(':key', "%$key%", PDO::PARAM_STR);
        return $this->db->resultSet();
    }

    public function deletePembayaran($id){
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        $this->db->execute();
    
        return $this->db->rowCount();
    }


    
    



}



?>
