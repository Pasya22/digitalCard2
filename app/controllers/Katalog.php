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

        // Tambahkan baris berikut untuk mendapatkan $activeSubKategoriId


        $this->view('templates/header', $data);
        $this->view('katalog/katalog', $data);
        $this->view('templates/footer');
    }


    public function detail($id)
    {
        $data['judul'] = 'Detail Katalog';

        $data['kategori'] = $this->model('admin_model')->getALLKategoriById2($id);
        $data['katalog'] = $this->model('admin_model')->getALLKatalogById($id);
        // $id_sub_kategori = $data['katalog']['id_sub_kategori'];
        // $data['sub_kategori'] = $this->model('admin_model')->getALLSubKategoriById($id_sub_kategori);
        $data['kategori'] = $this->model('admin_model')->getALLKategori();
        // var_dump($data['katalog'],$id,); die;

        // // Dapatkan paket berdasarkan kategori
        // $data['paket'] = $this->model('admin_model')->getPaketByKategoriId($id_sub_kategori);
        // $data['pakets'] = $this->model('admin_model')->getALLPaket();

        $data['trx'] = $this->model('admin_model')->getALLTransaksiById($id);

        // Mendapatkan id_user dari model auth_model
        $id_user = $this->model('auth_model')->getLoggedInUserId();
        $data['id_user'] = $id_user;

        $username = $this->model('auth_model')->getLoggedInUsername();
        $data['username'] = $username;

        $this->view('templates/header', $data);
        $this->view('katalog/detail', $data);
        $this->view('templates/footer');
    }

    public function detail2($subKategoriId)
    {
        $activeSubKategoriId = $subKategoriId;
        $data['activeSubKategoriId'] = $activeSubKategoriId;
        $data['judul'] =   'Detail Katalog';
        $data['kategori'] = $this->model('admin_model')->getALLKategoriById2($subKategoriId);
        $data['sub_kategori'] = $this->model('admin_model')->getALLSubKategoriById($subKategoriId);
        $data['katalog'] = $this->model('admin_model')->getALLKatalogById($subKategoriId);
        // var_dump($data['sub_kategori']);
        // die;
        // $data[]=   'Detail Katalog';
        $id_user = $this->model('auth_model')->getLoggedInUserId();
        $data['id_user'] = $id_user;

        $username = $this->model('auth_model')->getLoggedInUsername();
        $data['username'] = $username;
        $this->view('templates/header', $data);
        $this->view('katalog/detail2', $data);
        $this->view('templates/footer');
    }

    public function getKatalogBySubKategori($subKategoriId)
    {
        $katalog = $this->model('admin_model')->getALLKatalogSubategoriById($subKategoriId);

        $html = '';
        foreach ($katalog as $item) {
            $html .= '<div class="product-1">';
            $html .= '<a href="' . BASEURL . 'Katalog/detail/' . $item['id_katalog'] . '">';
            $html .= '<figure><img src="' . BASEURL . 'assets/img/katalog/' . $item['nama_gambar'] . '" alt=""></figure>';
            $html .= '<div class="deskripsi"><h5>' . $item['nama_katalog'] . '</h5></div>';
            $html .= '</a></div>';
        }
 
        echo $html;
    }



    // Gunakan fungsi generateRandomCode untuk mendapatkan kode transaksi acak


    public function addTransaksiUser()
    {

        // Periksa apakah pengguna sudah login
        if (!isset($_SESSION["user_session"]) || empty($_SESSION["user_session"])) {
            // Jika belum login, arahkan ke halaman login
            header("Location: " . BASEURL . "auth/login");
            exit();
        }

        // $Duser =  $_SESSION['user_session']['username'];



        // $nama_katalog = $_POST['nama_katalog'];
        // $kode_trx = $_POST['kode_trx'];
        // $harga =  $_POST['harga'];
        // $non_paket =  $_POST['non_paket'];
        // $jumlah =  $_POST['jumlah'];

        // Menghitung total harga
        // $total_harga = $harga * $jumlah;
        // $totalNya =  $total_harga;

        if ($this->model('admin_model')->tambahDataTrx($_POST) > 0) {
            Flasher::setFlash('', 'Transaksi', 'Berhasil ', 'success');


            // Bangun URL untuk pesan WhatsApp
            $whatsapp_url = "https://wa.me/6281252501275?text=Nama%3A%20" . 'Hallo Kak, Saya berminat membeli ini';

            header("Location: $whatsapp_url");
        } else {
            Flasher::setFlash('Transaksi', 'Gagal ', 'danger');
            header('Location: ' . BASEURL . 'Katalog/Detail/' .   $_POST['id_katalog']);
            exit;
        }
    }

    public function addTransaksiPaket()
    {
        // Periksa apakah pengguna sudah login
        if (!isset($_SESSION["user_session"]) || empty($_SESSION["user_session"])) {
            // Jika belum login, arahkan ke halaman login
            header("Location: " . BASEURL . "auth/login");
            exit();
        }

        // $Duser =  $_SESSION['user_session']['username'];
        // $nama_paket = $_POST['nama_paket'];
        // $harga_paket = 'Rp.' . number_format($_POST['harga_paket'], 0, ',', '.');

        // $jumlah =  $_POST['jumlah'];
        // $fiturs =  $_POST['fitur'];

        // // Menghitung total harga 
        // $totalNya =  'Rp.' . number_format($_POST['harga_paket'], 0, ',', '.');


        // $kode_trx = $_POST['kode_trx'];

        // Tambahkan data transaksi ke database 
        if ($this->model('admin_model')->tambahDataTrxPaket($_POST) > 0) {
            // Bangun URL untuk pesan WhatsApp
            $whatsapp_url = "https://wa.me/6281252501275?text=Nama%3A%20" . 'Hallo Kak, Saya berminat membeli ini';
            // Redirect ke URL WhatsApp
            header("Location: $whatsapp_url");
        } else {
            Flasher::setFlash('Transaksi', 'Gagal ', 'danger');
            header('Location: ' . BASEURL . 'Katalog/Detail/' . $_POST['id_katalog']);
            exit;
        }
    }
}
