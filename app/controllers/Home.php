<?php

class Home extends Controller
{
    public  function index()
    {
        $data['judul'] = 'Home';
        // $data['user'] = $_SESSION['user_session'];
        // $data['info'] = $this->model('InfoTani_model')->getALLInfoById($_SESSION["user_session"]['user_id']);
        // $data['alluser'] = $this->model('User_model')->getALLUser();
        // $data['allkecamatan'] = $this->model('Wilayah_model')->getALLKecamatan();
        $data['kategori'] = $this->model('admin_model')->getALLKategori();
        $data['katalog'] = $this->model('admin_model')->getALLKatalog();
        $data['produk1'] = $this->model('admin_model')->getALLKatalogById(8);
        $data['produk2'] = $this->model('admin_model')->getALLKatalogById(15);
        $username = $this->model('auth_model')->getLoggedInUsername();
        $data['username'] = $username;
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
