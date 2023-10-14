<?php

class admin_model extends Controller
{
    private $table = 'login';
    private $table2 = 'catalog';
    private $table3 = 'transaksi';
    private $table4 = 'kategori';
    private $table5 = 'paket';
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }


    //USER DATA =================================================//===================================

    // Get Data User ---------------------------- 
    public function getALLUser()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id_user DESC');
        return $this->db->resultSet();
    }
    // public function getTotalUser()
    // {
    //     $this->db->query('SELECT COUNT(*) FROM ' . $this->table . ' WHERE id_user = :id_user');
    //     return $this->db->resultSet();
    // }

    public function getALLUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_user = :id_user ORDER BY id_user DESC');
        $this->db->bind('id_user', $id);
        return $this->db->single();
    }

    // insert data user-----------------------------
    public function userAdd($data)
    {
        if (isset($data['password']) && isset($data['password1']) && $data['password'] != $data['password1']) {
            return false;
        }

        // cek apakah no hp mengandung karakter + dan 0-9
        if (!preg_match('/[^+0-9]/', trim($data['no_telepon']))) {
            // cek apakah no hp karakter 1-3 adalah +62
            if (substr(trim($data['no_telepon']), 0, 3) == '+62') {
                $hp = trim($data['no_telepon']);
            }
            // cek apakah no hp karakter 1 adalah 0
            elseif (substr(trim($data['no_telepon']), 0, 1) == '0') {
                $hp = '+62' . substr(trim($data['no_telepon']), 1);
            } else {
                return false;
            }
        }

        $username = $data['username'];
        $nomor = $hp;

        $cek = "SELECT username FROM login WHERE username =:username || no_telepon =:no_telepon ";
        $this->db->query($cek);
        $this->db->bind('username', $username);
        $this->db->bind('no_telepon', $nomor);
        $this->db->execute();
        $ceks = $this->db->rowCount();
        if ($ceks > 0) {
            return false;
        }

        $password = password_hash($data['password1'], PASSWORD_DEFAULT);
        $query = "INSERT INTO login(username,no_telepon,password,email,role_id,is_active)
                                    VALUES
                                    (:username, :no_telepon, :password, :email,:role_id,:is_active)
                                    ";


        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        $this->db->bind('role_id', $data['role_id']);
        $this->db->bind('is_active', $data['is_active']);
        $this->db->bind('no_telepon', $nomor);
        $this->db->bind('email', $data['email']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    // Edit Data User------------------------------------------

    public function userEdit($data)
    {

        // cek apakah no hp mengandung karakter + dan 0-9
        if (!preg_match('/[^+0-9]/', trim($data['no_telepon']))) {
            // cek apakah no hp karakter 1-3 adalah +62
            if (substr(trim($data['no_telepon']), 0, 3) == '+62') {
                $hp = trim($data['no_telepon']);
            }
            // cek apakah no hp karakter 1 adalah 0
            elseif (substr(trim($data['no_telepon']), 0, 1) == '0') {
                $hp = '+62' . substr(trim($data['no_telepon']), 1);
            } else {
                return false;
            }
        }

        $username = $data['username'];
        $nomor = $hp;

        $cek = "SELECT username,no_telepon FROM login WHERE (username = :username OR no_telepon = :no_telepon) AND NOT id_user =:id_user";
        $this->db->query($cek);
        $this->db->bind('username', $username);
        $this->db->bind('no_telepon', $nomor);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->execute();
        $ceks = $this->db->rowCount();
        if ($ceks > 0) {
            return false;
        }

        $password = password_hash($data['password1'], PASSWORD_DEFAULT);
        $query = "UPDATE login SET
                    username = :username,
                    password = :password,
                    role_id = :role_id,
                    is_active = :is_active,
                    email = :email,
                    no_telepon = :no_telepon
                    WHERE id_user = :id_user";

        $this->db->query($query);

        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $password);
        $this->db->bind('no_telepon', $nomor);
        $this->db->bind('role_id', $data['role_id']);
        $this->db->bind('is_active', $data['is_active']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('id_user', $data['id_user']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function userDelete($id)
    {
        $query = "DELETE FROM login WHERE id_user = :id_user";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    // End Data USER ===============================--------------------///

    // KATALOG DATA=============================================//===========================

    // GET DATA KATALOG=======================-----------------------------
    public function getALLKatalog()
    {
        $this->db->query('SELECT * FROM ' . $this->table2 . ' ORDER BY katalog_id DESC');
        return $this->db->resultSet();
    }

    public function getALLKatalogById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table2 . ' WHERE katalog_id = :katalog_id ORDER BY katalog_id DESC');
        $this->db->bind('katalog_id', $id);
        return $this->db->single();
    }

    public function getALLKatalogJoin()
    {
        $this->db->query('SELECT catalog.*, kategori.nama_kategori
                         FROM catalog
                         INNER JOIN kategori ON kategori.id_kategori = catalog.id_kategori
                         ORDER BY catalog.katalog_id DESC');
        return $this->db->resultSet();
    }


    public function tambahDatakatalog($data)
    {

        $gambar = $this->model('admin_model')->upload();
        $gambar2 = $this->model('admin_model')->upload2();
        $gambar3 = $this->model('admin_model')->upload3();
        $gambar4 = $this->model('admin_model')->upload4();
        $gambar5 = $this->model('admin_model')->upload5();


        $query = "INSERT INTO catalog
                                VALUES
                                ('', :nama_katalog, :deskripsi_katalog, :nama_gambar,:nama_gambar2,:nama_gambar3,:nama_gambar4,:nama_gambar5,:kategori_id, :harga, :stock ,:sold)
                                ";

        $this->db->query($query);
        $this->db->bind('nama_katalog', $data['nama_katalog']);
        $this->db->bind('deskripsi_katalog', strip_tags($data['deskripsi_katalog']));
        $this->db->bind('nama_gambar', $gambar);
        $this->db->bind('nama_gambar2', $gambar2);
        $this->db->bind('nama_gambar3', $gambar3);
        $this->db->bind('nama_gambar4', $gambar4);
        $this->db->bind('nama_gambar5', $gambar5);
        $this->db->bind('kategori_id', $data['kategori_id']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('stock', $data['stock']);
        $this->db->bind('sold', $data['sold']);


        $this->db->execute();

        return $this->db->rowCount();
    }



    public function editDatakatalog($data)
    {
        $gambarLama1 = htmlspecialchars($data["gambar_lama"]);
        $gambarLama2 = htmlspecialchars($data["gambar_lama2"]);
        $gambarLama3 = htmlspecialchars($data["gambar_lama3"]);
        $gambarLama4 = htmlspecialchars($data["gambar_lama4"]);
        $gambarLama5 = htmlspecialchars($data["gambar_lama5"]);

        if ($_FILES['nama_gambar']['error'] === 4) {
            $gambar1 = $gambarLama1;
        } else {
            $gambar1 = $this->model('admin_model')->upload();
        }
        if ($_FILES['nama_gambar2']['error'] === 4) {
            $gambar2 = $gambarLama2;
        } else {
            $gambar2 = $this->model('admin_model')->upload2();
        }
        if ($_FILES['nama_gambar3']['error'] === 4) {
            $gambar3 = $gambarLama3;
        } else {
            $gambar3 = $this->model('admin_model')->upload3();
        }
        if ($_FILES['nama_gambar4']['error'] === 4) {
            $gambar4 = $gambarLama4;
        } else {
            $gambar4 = $this->model('admin_model')->upload4();
        }
        if ($_FILES['nama_gambar5']['error'] === 4) {
            $gambar5 = $gambarLama5;
        } else {
            $gambar5 = $this->model('admin_model')->upload5();
        }

        $query = "UPDATE catalog SET 
                    nama_katalog = :nama_katalog,
                    deskripsi_katalog = :deskripsi_katalog,
                    nama_gambar = :nama_gambar,
                    nama_gambar2 = :nama_gambar2,
                    nama_gambar3 = :nama_gambar3,
                    nama_gambar4 = :nama_gambar4,
                    nama_gambar5 = :nama_gambar5,
                    kategori_id = :kategori_id,
                    harga = :harga,  
                    stock = :stock,
                    sold = :sold
                    WHERE katalog_id = :katalog_id";

        $this->db->query($query);

        $this->db->bind('katalog_id', $data['katalog_id']);
        $this->db->bind('nama_katalog', $data['nama_katalog']);
        $this->db->bind('deskripsi_katalog', strip_tags($data['deskripsi_katalog']));
        $this->db->bind('nama_gambar', $gambar1);
        $this->db->bind('nama_gambar2', $gambar2);
        $this->db->bind('nama_gambar3', $gambar3);
        $this->db->bind('nama_gambar4', $gambar4);
        $this->db->bind('nama_gambar5', $gambar5);
        $this->db->bind('kategori_id', $data['kategori_id']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('stock', $data['stock']);
        $this->db->bind('sold', $data['sold']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteDatakatalog($id)
    {
        $query = "DELETE FROM catalog WHERE katalog_id = :katalog_id";
        $this->db->query($query);
        $this->db->bind('katalog_id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // DATA TRANSAKSI    //--------------------------------------------------------------------

    // Get Data Transaksi
    public function getALLTransaksi()
    {
        $this->db->query('SELECT * FROM ' . $this->table3 . ' ORDER BY trx_id DESC');
        return $this->db->resultSet();
    }
    // Get By ID
    public function getALLTransaksiById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table3 . ' WHERE trx_id = :trx_id ORDER BY trx_id DESC');
        $this->db->bind('trx_id', $id);
        return $this->db->single();
    }
    // public function getALLTransaksiJoin()
    // {
    //     $this->db->query('SELECT transaksi.*,catalog.nama_katalog,login.username,paket.nama_paket
    //                      FROM transaksi
    //                      JOIN login ON transaksi.id_user = login.id_user  
    //                      LEFT JOIN paket ON transaksi.paket_id = paket.paket_id  
    //                      JOIN catalog ON transaksi.katalog_id = catalog.katalog_id
    //                      ORDER BY transaksi.trx_id DESC');
    //     return $this->db->resultSet();
    // }

    public function getALLTransaksiJoin()
    {
        $this->db->query('SELECT transaksi.*, catalog.nama_katalog, login.username, paket.nama_paket
                     FROM transaksi
                     JOIN login ON transaksi.id_user = login.id_user  
                     LEFT JOIN paket ON transaksi.paket_id = paket.paket_id  
                     JOIN catalog ON transaksi.katalog_id = catalog.katalog_id
                     ORDER BY transaksi.trx_id DESC');

       return $this->db->resultSet();
    }

    public function getALLTransaksiJoinById($id)
    {
        $this->db->query('SELECT transaksi.*,catalog.nama_katalog,login.username,paket.nama_paket
                         FROM transaksi
                         JOIN login ON transaksi.id_user = login.id_user  
                         LEFT JOIN paket ON transaksi.paket_id = paket.paket_id  
                         JOIN catalog ON transaksi.katalog_id = catalog.katalog_id
                         WHERE trx_id = :trx_id
                         ORDER BY trx_id DESC');
        $this->db->bind('trx_id', $id);
        return $this->db->single();
    }


    public function getTransaksiByKodeTrx($kode_trx)
    {
        $query = "SELECT transaksi.*,catalog.nama_katalog,login.username 
                  FROM transaksi 
                  JOIN login ON transaksi.id_user = login.id_user
                  JOIN catalog ON transaksi.katalog_id = catalog.katalog_id 
                  WHERE transaksi.kode_trx = :kode_trx";
        $this->db->query($query);
        $this->db->bind('kode_trx', $kode_trx);
        return $this->db->resultSet();
    }

    public function getTransaksiByNamaKatalog($nama_katalog)
    {
        $query = "SELECT transaksi.*,catalog.nama_katalog,login.username 
                  FROM transaksi 
                  JOIN login ON transaksi.id_user = login.id_user
                  JOIN catalog ON transaksi.katalog_id = catalog.katalog_id 
                  WHERE catalog.nama_katalog = :nama_katalog";
        $this->db->query($query);
        $this->db->bind('nama_katalog', $nama_katalog);
        return $this->db->resultSet();
    }
    public function getTransaksiByUsername($username)
    {
        $query = "SELECT transaksi.*,catalog.nama_katalog,login.username 
                  FROM transaksi 
                  JOIN login ON transaksi.id_user = login.id_user
                  JOIN catalog ON transaksi.katalog_id = catalog.katalog_id 
                  WHERE login.username = :username";
        $this->db->query($query);
        $this->db->bind('username', $username);
        return $this->db->resultSet();
    }

    // Add Data Trasaksi=========================--------------------------///
    public function tambahDataTrx($data)
    {
        // Calculate the total price
        $katalog = $this->model('admin_model')->getALLKatalogById($data['katalog_id']); // Assuming you have a method to retrieve katalog by ID
        $harga = $katalog['harga']; // Assuming 'harga' is the column name in the katalog table

        $total = $harga * $data['jumlah'];

        $query = "INSERT INTO transaksi (kode_trx, id_user, katalog_id, kategori_id, paket_id, total, jumlah, status_trx)
              VALUES (:kode_trx, :id_user, :katalog_id, :kategori_id, :paket_id, :total, :jumlah, :status_trx)";

        $this->db->query($query);
        $this->db->bind('kode_trx', $data['kode_trx']);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('katalog_id', $data['katalog_id']);
        $this->db->bind('kategori_id', $data['kategori_id']);
        $this->db->bind('paket_id', $data['paket_id']);
        $this->db->bind('total', $total);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('status_trx', $data['status_trx']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function tambahDataTrxPaket($data)
    {
        $query = "INSERT INTO transaksi (kode_trx, id_user, katalog_id, kategori_id, paket_id, total, jumlah, status_trx)
                  VALUES (:kode_trx, :id_user, :katalog_id, :kategori_id, :paket_id, :total, :jumlah, :status_trx)";

        // var_dump($data);
        // die;
        $this->db->query($query);
        $this->db->bind('kode_trx', $data['kode_trx']);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('katalog_id', $data['katalog_id']);
        $this->db->bind('kategori_id', $data['kategori_id']);
        $this->db->bind('paket_id', $data['paket_id']);
        $this->db->bind('total', $data['total']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('status_trx', $data['status_trx']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    function generateRandomCode($length = 8)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $code;
    }


    // Gunakan fungsi generateRandomCode untuk mendapatkan kode transaksi acak



    // END Add Data Trasaksi=========================--------------------------///


    // Edit Data Trasaksi=========================--------------------------///
    public function trxEdit($data)
    {

        $query = "UPDATE transaksi SET
                    kode_trx = :kode_trx,
                    id_user = :id_user,
                    katalog_id = :katalog_id,
                    paket_id = :paket_id,
                    total = :total,
                    jumlah = :jumlah,
                    status_trx = :status_trx
                    WHERE trx_id = :trx_id";
        // var_dump($data);
        // die;

        $this->db->query($query);

        $this->db->bind('katalog_id', $data['katalog_id']);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('kode_trx', $data['kode_trx']);
        $this->db->bind('paket_id', $data['paket_id']);
        $this->db->bind('total', $data['total']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('status_trx', $data['status_trx']);
        $this->db->bind('trx_id', $data['trx_id']);
        $this->db->execute();
        return $this->db->rowCount();
    }



    // END Edit Data Trasaksi=========================--------------------------///

    // Delete Data Trasaksi=========================--------------------------///
    public function trxDelete($id)
    {
        $query = "DELETE FROM transaksi WHERE trx_id = :trx_id";
        $this->db->query($query);
        $this->db->bind('trx_id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    // END Delete Data Trasaksi=========================--------------------------///

    // END TRANSAKSI    //--------------------------------------------------------------------



    // Data kategori============----------
    public function getALLKategori()
    {
        $this->db->query('SELECT * FROM ' . $this->table4 . ' ORDER BY id_kategori ASC');
        return $this->db->resultSet();
    }


    public function getALLKategoriById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table4 . ' WHERE id_kategori = :id_kategori ORDER BY id_kategori DESC ');
        $this->db->bind('id_kategori', $id);
        return $this->db->single();
    }

    public function getKategoriByIdM8($id)
    {
        $this->db->query('SELECT * FROM catalog WHERE kategori_id = :kategori_id ORDER BY katalog_id DESC LIMIT 8');
        $this->db->bind('kategori_id', $id);
        return $this->db->resultSet();
    }

    public function getALLKatalogKategoriById($id)
    {
        $this->db->query('SELECT * FROM catalog WHERE kategori_id = :kategori_id ORDER BY katalog_id DESC');
        $this->db->bind('kategori_id', $id);
        return $this->db->resultSet();
    }
    public function getPaketByKategoriId($id)
    {
        $this->db->query('SELECT * FROM paket WHERE kategori_id = :kategori_id');
        $this->db->bind('kategori_id', $id);
        return $this->db->resultSet();
    }


    // GET DATA PAKET ================================================-----------------///
    public function getALLPaket()
    {
        $this->db->query('SELECT * FROM ' . $this->table5 . ' ORDER BY paket_id DESC');
        return $this->db->resultSet();
    }
    public function getALLPaketById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table5 . ' WHERE paket_id = :paket_id ORDER BY paket_id DESC ');
        $this->db->bind('paket_id', $id);
        return $this->db->single();
    }
    public function getALLPaketJoinById($id)
    {
        $query = "SELECT paket.*, kategori.nama_kategori 
        FROM paket 
        JOIN kategori ON paket.kategori_id = kategori.id_kategori 
        WHERE kategori.id_kategori = :kategori_id";

        $this->db->query($query);
        $this->db->bind('kategori_id', $id);
        return $this->db->resultSet();
    }

    public function getALLPaketJoin()
    {
        $this->db->query('SELECT paket.*,kategori.nama_kategori
                         FROM paket
                         JOIN kategori ON paket.kategori_id = kategori.id_kategori
                         ORDER BY paket.paket_id DESC');
        return $this->db->resultSet();
    }
    public function getPaketKatalogKategoriById($id)
    {
        $this->db->query('SELECT paket.*, katalog.*, kategori.*
                         FROM paket
                         JOIN katalog ON paket.katalog_id = katalog.id
                         JOIN kategori ON katalog.kategori_id = kategori.id
                         WHERE paket.id = :id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }


    // end data ==========================-----------------------//
    // Add Data Paket=========================--------------------------///
    public function tambahDataPaket($data)
    {
        $query = "INSERT INTO paket
                                VALUES
                                ('',:kategori_id,:nama_paket,:harga_paket,:fitur)
                                ";

        $this->db->query($query);
        $this->db->bind('kategori_id', $data['kategori_id']);
        $this->db->bind('nama_paket', $data['nama_paket']);
        $this->db->bind('harga_paket', $data['harga_paket']);
        $this->db->bind('fitur', $data['fitur']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    // END Add Data Paket=========================--------------------------///

    // Edit Data Paket=========================--------------------------///
    public function PaketEdit($data)
    {

        $query = "UPDATE paket SET
                    kategori_id = :kategori_id,
                    nama_paket = :nama_paket,  
                    harga_paket = :harga_paket, 
                    fitur = :fitur
                    WHERE paket_id = :paket_id";
        // var_dump($data);
        // die;

        $this->db->query($query);

        $this->db->bind('kategori_id', $data['kategori_id']);
        $this->db->bind('nama_paket', $data['nama_paket']);
        $this->db->bind('harga_paket', $data['harga_paket']);
        $this->db->bind('fitur',  $data['fitur']);
        $this->db->bind('paket_id', $data['paket_id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    // END Edit Data Paket=========================--------------------------///

    // Delete Data Paket=========================--------------------------///
    public function PaketDelete($id)
    {
        $query = "DELETE FROM paket WHERE paket_id = :paket_id";
        $this->db->query($query);
        $this->db->bind('paket_id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    // END Delete Data Paket=========================--------------------------///

    // END TRANSAKSI    //--------------------------------------------------------------------


    // end data katalog==============--------------------------------------------------///


    // DATA TRANSAKSI===================---------------------------

    public function upload()
    {
        $namaFile = $_FILES['nama_gambar']['name'];
        $error = $_FILES['nama_gambar']['error'];
        $tmpName = $_FILES['nama_gambar']['tmp_name'];
        $ektensiGambarValid = ['jpg', 'jpeg', 'png', 'webp', 'enc'];
        $ektensiGambar = explode('.', $namaFile);
        $ektensiGambar = strtolower(end($ektensiGambar));
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ektensiGambar;
        if ($error === 4) {
            echo "
                <script>
                    alert('Pilih gambar terlebih dahulu!');
                </script>";
            return false;
        }

        if (!in_array($ektensiGambar, $ektensiGambarValid)) {
            echo "
                <script>
                    alert('yang anda upload bukan gambar');
                </script>";
            return false;
        }


        move_uploaded_file($tmpName, 'assets/img/katalog/' . $namaFileBaru);

        return $namaFileBaru;
    }
    public function upload2()
    {
        $namaFile = $_FILES['nama_gambar2']['name'];
        $error = $_FILES['nama_gambar2']['error'];
        $tmpName = $_FILES['nama_gambar2']['tmp_name'];
        $ektensiGambarValid = ['jpg', 'jpeg', 'png', 'webp', 'enc'];
        $ektensiGambar = explode('.', $namaFile);
        $ektensiGambar = strtolower(end($ektensiGambar));
        $namaFileBaru2 = uniqid();
        $namaFileBaru2 .= '.';
        $namaFileBaru2 .= $ektensiGambar;
        if ($error === 4) {
            echo "
                <script>
                    alert('Pilih gambar terlebih dahulu!');
                </script>";
            return false;
        }

        if (!in_array($ektensiGambar, $ektensiGambarValid)) {
            echo "
                <script>
                    alert('yang anda upload bukan gambar');
                </script>";
            return false;
        }


        move_uploaded_file($tmpName, 'assets/img/katalog/' . $namaFileBaru2);

        return $namaFileBaru2;
    }
    public function upload3()
    {
        $namaFile = $_FILES['nama_gambar3']['name'];
        $error = $_FILES['nama_gambar3']['error'];
        $tmpName = $_FILES['nama_gambar3']['tmp_name'];
        $ektensiGambarValid = ['jpg', 'jpeg', 'png', 'webp', 'enc'];
        $ektensiGambar = explode('.', $namaFile);
        $ektensiGambar = strtolower(end($ektensiGambar));
        $namaFileBaru3 = uniqid();
        $namaFileBaru3 .= '.';
        $namaFileBaru3 .= $ektensiGambar;
        if ($error === 4) {
            echo "
                <script>
                    alert('Pilih gambar terlebih dahulu!');
                </script>";
            return false;
        }

        if (!in_array($ektensiGambar, $ektensiGambarValid)) {
            echo "
                <script>
                    alert('yang anda upload bukan gambar');
                </script>";
            return false;
        }


        move_uploaded_file($tmpName, 'assets/img/katalog/' . $namaFileBaru3);

        return $namaFileBaru3;
    }
    public function upload4()
    {
        $namaFile = $_FILES['nama_gambar4']['name'];
        $error = $_FILES['nama_gambar4']['error'];
        $tmpName = $_FILES['nama_gambar4']['tmp_name'];
        $ektensiGambarValid = ['jpg', 'jpeg', 'png', 'webp', 'enc'];
        $ektensiGambar = explode('.', $namaFile);
        $ektensiGambar = strtolower(end($ektensiGambar));
        $namaFileBaru4 = uniqid();
        $namaFileBaru4 .= '.';
        $namaFileBaru4 .= $ektensiGambar;
        if ($error === 4) {
            echo "
                <script>
                    alert('Pilih gambar terlebih dahulu!');
                </script>";
            return false;
        }

        if (!in_array($ektensiGambar, $ektensiGambarValid)) {
            echo "
                <script>
                    alert('yang anda upload bukan gambar');
                </script>";
            return false;
        }


        move_uploaded_file($tmpName, 'assets/img/katalog/' . $namaFileBaru4);

        return $namaFileBaru4;
    }
    public function upload5()
    {
        $namaFile = $_FILES['nama_gambar5']['name'];
        $error = $_FILES['nama_gambar5']['error'];
        $tmpName = $_FILES['nama_gambar5']['tmp_name'];
        $ektensiGambarValid = ['jpg', 'jpeg', 'png', 'webp', 'enc'];
        $ektensiGambar = explode('.', $namaFile);
        $ektensiGambar = strtolower(end($ektensiGambar));
        $namaFileBaru5 = uniqid();
        $namaFileBaru5 .= '.';
        $namaFileBaru5 .= $ektensiGambar;
        if ($error === 4) {
            echo "
                <script>
                    alert('Pilih gambar terlebih dahulu!');
                </script>";
            return false;
        }

        if (!in_array($ektensiGambar, $ektensiGambarValid)) {
            echo "
                <script>
                    alert('yang anda upload bukan gambar');
                </script>";
            return false;
        }


        move_uploaded_file($tmpName, 'assets/img/katalog/' . $namaFileBaru5);

        return $namaFileBaru5;
    }
}
