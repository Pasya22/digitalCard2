<?php
if (!$_SESSION["user_session"]) {
    header("Location:" . BASEURL . "auth/login");
}
?>
<!-- <a href="<?= BASEURL ?>auth/Logout">Logout</a> -->

<div class="container-admin">
    <?php
    $this->view('admin/templates/sidebar', $data);
    ?>
    <div id="contentAdmin" class="container-content-admin">
        <header>
            <?php
            $this->view('admin/templates/navbar', $data);
            ?>
        </header>
        <main>
            <div class="breadcrumbs">
                <div class="icon-box">
                    <a href="">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                </div>
                <div class="breadcrumb-box">
                    <a href="">Dashboard</a>
                    <p>/</p>
                    <a href="">Data Paket</a>
                    <p>/</p>
                    <a href="">Edit Data Paket</a>
                </div>
            </div>
            <div class="container-dashboard">
                <div class="container-katalog">
                    <div class="header">
                        <div class="title">
                            <h1>Ubah Data Paket</h1>
                        </div>
                    </div>
                    <div class="container-form">
                        <form action="<?= BASEURL . 'Admin/editPaket' ?>" method="POST">

                            <div class="nama katalog">
                                <label for="nama katalog">nama paket</label>
                                <span>:</span>
                                <input name="paket_id" id="nama katalog" type="hidden" placeholder="Masukan nama paket" value="<?= $data['paket']['paket_id'] ?>">
                                <input name="nama_paket" id="nama katalog" type="text" placeholder="Masukan nama paket" value="<?= $data['paket']['nama_paket'] ?>" >
                            </div>
                            <div class="nama katalog">
                                <label for="nama katalog">harga paket</label>
                                <span>:</span>
                                <input name="harga_paket" id="harga_paket" type="text" placeholder="Masukan harga paket" value="<?= $data['paket']['harga_paket'] ?>" >
                            </div>
                            <div class="Kategori">
                                <label for="Kategori">Kategori</label>
                                <span>:</span>
                                <select name="kategori_id" id="kategori_id">
                                    <?php $data['kategoriId'] = $this->model('admin_model')->getALLKategoriById($data['paket']['kategori_id']); ?>
                                    <option value="<?= $data['paket']['kategori_id'] ?>"><?= $data['kategoriId']['nama_kategori'] ?></option>
                                    <?php foreach ($data['paketKate'] as $key) { ?>
                                        <option value="<?= $key['id_kategori'] ?>">
                                            <?= $key['nama_kategori'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="deskripsi ">
                                <label for="deskripsi">deskripsi</label>
                                <span>:</span>
                                <textarea id="editor" name="fitur" cols="30" rows="20" required><?= $data['paket']['fitur'] ?></textarea>
                            </div>
                            <div class="button-box">
                                <button type="submit" name="submit">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer></footer>
    </div>
</div>