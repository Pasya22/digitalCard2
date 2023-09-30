<?php

class Katalog extends Controller
{
    public  function index()
    {
        $data['judul'] = 'Katalog';
        $data['kategori'] = $this->model('admin_model')->getALLKategori();
        $data['katalog'] = $this->model('admin_model')->getALLKatalog();
        $username = $this->model('auth_model')->getLoggedInUsername();
        $data['username'] = $username;

        $this->view('templates/header', $data);
        $this->view('katalog/katalog', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Katalog';
        $data['kategori'] = $this->model('admin_model')->getALLKategori();
        $data['katalog'] = $this->model('admin_model')->getALLKatalogById($id);

        // Mendapatkan id_user dari model auth_model
        $id_user = $this->model('auth_model')->getLoggedInUserId();
        $data['id_user'] = $id_user;

        $username = $this->model('auth_model')->getLoggedInUsername();
        $data['username'] = $username;

        $this->view('templates/header', $data);
        $this->view('katalog/detail', $data);
        $this->view('templates/footer');
    }


    public function addTransaksiUser()
    {

        // Periksa apakah pengguna sudah login
        if (!isset($_SESSION["user_session"]) || empty($_SESSION["user_session"])) {
            // Jika belum login, arahkan ke halaman login
            header("Location: " . BASEURL . "auth/login");
            exit();
        }

        $Duser =  $_SESSION['user_session']['username'];

        $nama_katalog = $_POST['nama_katalog'];
        $kode_trx = $_POST['kode_trx'];
        $harga =  $_POST['harga'];
        $jumlah =  $_POST['jumlah'];

        // Menghitung total harga
        $total_harga = $harga * $jumlah;
        $totalNya =  $_POST[$total_harga];
        if ($this->model('admin_model')->tambahDataTrx($_POST) > 0) {
            Flasher::setFlash('', 'Add Data User', 'Berhasil ', 'success');


            // Bangun URL untuk pesan WhatsApp
            $whatsapp_url = "https://wa.me/6281252501275?text=Nama%3A%20" . $Duser . "%0AKode%20Trx%20%3A" .  $kode_trx . "%0Anama%20katalog%20%3A" .  $nama_katalog . "%0AHarga%20Katalog%20%3A" . $harga . "%0AJumlah%20Trx%20%3A" . $jumlah . "%3A%0ATotal%20Harga%3A%20" . $totalNya;
            header("Location: $whatsapp_url");
        } else {
            Flasher::setFlash('Add Data User', 'Gagal ', 'danger');
            header('Location: ' . BASEURL . 'Katalog/Detail');
            exit;
        }
    }
}
