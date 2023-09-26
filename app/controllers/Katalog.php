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
        session_start(); // Mulai sesi

        // Periksa apakah pengguna sudah login
        if (!isset($_SESSION["user_session"]) || empty($_SESSION["user_session"])) {
            // Jika belum login, arahkan ke halaman login
            header("Location: " . BASEURL . "auth/login");
            exit();
        }

        if ($this->model('admin_model')->tambahDataTrx($_POST) > 0) {
            Flasher::setFlash('', 'Add Data User', 'Berhasil ', 'success');
            header('Location: ' . BASEURL . 'Katalog/index');
            exit;
        } else {
            Flasher::setFlash('Add Data User', 'Gagal ', 'danger');
            header('Location: ' . BASEURL . 'Katalog/Detail');
            exit;
        }
    }
}
