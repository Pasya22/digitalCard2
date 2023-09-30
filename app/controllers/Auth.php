<?php

class Auth extends Controller
{
    public function index()
    {
        $data['judul'] = 'Toko Tani';
        $this->view('admin/templates/header', $data);
        $this->view('home/index', $data);
        $this->view('admin/templates/footer');
    }

    public function logout()
    {
        $data['judul'] = 'Agency';
        $this->view('admin/templates/header', $data);
        $this->view('auth/logout', $data);
        $this->view('admin/templates/footer');
    }

    public function login()
    {
        $data['judul'] = 'Agency';
        $this->view('admin/templates/header', $data);
        $this->view('auth/login', $data);
        $this->view('admin/templates/footer');
    }

    public function register()
    {
        $data['judul'] = 'Register';
        $this->view('admin/templates/header', $data);
        $this->view('auth/register', $data);
        $this->view('admin/templates/footer');
    }

    public function registerUser()
    {
        if ($this->model('Auth_model')->register($_POST) > 0) {
            Flasher::setFlash('', 'Registrasi', 'Berhasil ', 'success');
            header('Location: ' . BASEURL . 'Auth/login');
            exit;
        } else {
            Flasher::setFlash('Username Atau No Telepon Telah Di Gunakan', 'Registrasi', 'Gagal ', 'danger');
            header('Location: ' . BASEURL . 'Auth/register');
            exit;
        }
    }


    public function loginUser()
    {
        $result = $this->model('Auth_model')->login($_POST);
        if ($result) {
            // var_dump($_SESSION['user_session']['role_id']);
            // die;
            if ($_SESSION['user_session']['role_id'] == 1) {
                Flasher::setFlash('', 'Login', 'Berhasil (Admin)', 'success');
                header('Location: ' . BASEURL . 'Admin/index');
                exit;
            } elseif ($_SESSION['user_session']['role_id'] == 2) {
                Flasher::setFlash('', 'Login', 'Berhasil (User)', 'success');
                header('Location: ' . BASEURL . 'Home/index');
                exit;
            } else {
                // Tambahkan penanganan jika role_id tidak valid
                Flasher::setFlash('Role tidak valid', 'Login', 'Gagal', 'danger');
                header('Location: ' . BASEURL . 'auth/login');
                exit;
            }
        } else {
            Flasher::setFlash('Username / Password Salah atau Akun Tidak Aktif', 'Gagal', 'danger');
            header('Location: ' . BASEURL . 'auth/login');
            exit;
        }
    }
}
