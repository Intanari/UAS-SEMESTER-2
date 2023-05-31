<?php
class pembayaran extends Controller {

    public function __construct(){

        if($_SESSION['session_login'] != 'sudah_login') {
            
        Flasher::setMessage('Login','Tidak ditemukan.','danger');
        header('location: '. base_url . '/login');
        exit;
        
        }
    }

    public function index(){
        $data['title']='Data Metode Pembayaran ';
        $data['pembayaran']=$this->model('PembayaranModel')->getAllPembayaran();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pembayaran/index', $data);
        $this->view('templates/footer');
    }




    public function tambahPembayaran(){
        $data['title'] = 'Tambah Metode Pembayaran';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pembayaran/create', $data);
        $this->view('templates/footer');
    }
    public function simpanPembayaran(){
        if( $this->model('PembayaranModel')->tambahPembayaran($_POST) > 0 ){
            Flasher::setMessage('Berhasil','ditambahkan', 'success');
            header('location: ' . base_url . '/pembayaran');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/pembayaran');
            exit;
        }
    }  



    
    public function editPembayaran($id){
        $data['title'] = 'Detail Metode Pembayaran';
        $data['pembayaran'] = $this->model('PembayaranModel')->getPembayaranById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pembayaran/edit', $data);
        $this->view('templates/footer');
    }
    public function updatePembayaran(){
        if( $this->model('PembayaranModel')->updateDataPembayaran($_POST) > 0 ){
            Flasher::setMessage('Berhasil','diupdate', 'success');
            header('location: ' . base_url . '/pembayaran');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/pembayaran');
            exit;
        }
    }  


    

    public function cariPembayaran(){
        $data['title'] = 'Data Metode Pembayaran';
        $data['pembayaran'] = $this->model('PembayaranModel')->cariPembayaran();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pembayaran/index', $data);
        $this->view('templates/footer');
    }
    public function hapusPembayaran($id){
        if( $this->model('PembayaranModel')->deletePembayaran($id) > 0 ){
            Flasher::setMessage('Berhasil','dihapus', 'success');
            header('location: ' . base_url . '/pembayaran');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/pembayaran');
            exit;
        }
    }  



}
