<?php

class Deskripsi extends Controller
{
    public  function index()
    {
        $data['judul'] = 'Deskripsi';
        $data['kategori'] = $this->model('admin_model')->getALLKategori();
        $data['katalog'] = $this->model('admin_model')->getALLKatalog();
        $data['produk1'] = $this->model('admin_model')->getALLKatalogById(5);
        $data['produk2'] = $this->model('admin_model')->getALLKatalogById(15);
        $username = $this->model('auth_model')->getLoggedInUserId();
        $data['username'] = $username;
        $this->view('templates/header', $data);
        $this->view('deskripsi/deskripsi', $data);
        $this->view('templates/footer');
    }
}
