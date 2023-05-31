<?php
class transaksi extends Controller {

    public function __construct(){

        if($_SESSION['session_login'] != 'sudah_login') {
            
        Flasher::setMessage('Login','Tidak ditemukan.','danger');
        header('location: '. base_url . '/login');
        exit;
        
        }
    }

    public function index(){
        $data['title']='Data Transaksi Keuangan';
        $data['transaksi']=$this->model('TransaksiModel')->getAllTransaksi();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('transaksi/index', $data);
        $this->view('templates/footer');
    }




    public function tambahTransaksi(){
        $data['title'] = 'Tambah Data Transaksi Keuangan';
        $data['pembayaran']=$this->model('PembayaranModel')->getAllPembayaran();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('transaksi/create', $data);
        $this->view('templates/footer');
    }
    public function simpanTransaksi(){
        if( $this->model('TransaksiModel')->tambahTransaksi($_POST) > 0 ){
            Flasher::setMessage('Berhasil','ditambahkan', 'success');
            header('location: ' . base_url . '/transaksi');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/transaksi');
            exit;
        }
    }  



    
    public function editTransaksi($id){
        $data['title'] = 'Detail Data Transaksi Keuangan';
        $data['pembayaran']=$this->model('PembayaranModel')->getAllPembayaran();
        $data['transaksi'] = $this->model('TransaksiModel')->getTransaksiById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('transaksi/edit', $data);
        $this->view('templates/footer');
    }
    public function updateTransaksi(){
        if( $this->model('TransaksiModel')->updateDataTransaksi($_POST) > 0 ){
            Flasher::setMessage('Berhasil','diupdate', 'success');
            header('location: ' . base_url . '/transaksi');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/transaksi');
            exit;
        }
    }  


    

    public function cariTransaksi(){
        $data['title'] = 'Data Transaksi Keuangan';
        $data['transaksi'] = $this->model('TransaksiModel')->cariTransaksi();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('transaksi/index', $data);
        $this->view('templates/footer');
    }
    public function hapusTransaksi($id){
        if( $this->model('TransaksiModel')->deleteTransaksi($id) > 0 ){
            Flasher::setMessage('Berhasil','dihapus', 'success');
            header('location: ' . base_url . '/transaksi');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/transaksi');
            exit;
        }
    }  



}
