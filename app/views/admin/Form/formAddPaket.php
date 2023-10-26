<?php
if (!$_SESSION["user_session"]) {
    header("Location:" . BASEURL . "auth/login");
}

?>

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
                    <a href="">Add Data Paket</a>
                </div>
            </div>
            <div class="container-dashboard">
                <div class="container-katalog">
                    <div class="header">
                        <div class="title">
                            <h1>Tambah Data Paket</h1>
                        </div>
                    </div>
                    <div class="container-form">
                        <form action="<?= BASEURL ?>Admin/addPaket" method="post" class="form">

                            <div class="nama katalog">
                                <label for="nama katalog">Nama Paket</label>
                                <span>:</span>
                                <input name="nama_paket" id="nama katalog" type="text" placeholder="Masukan Nama Paket" required>
                            </div>
                            <div class="nama katalog">
                                <label for="nama katalog">harga paket</label>
                                <span>:</span>
                                <input name="harga_paket" id="harga_paket" type="text" placeholder="Masukan harga paket">
                            </div>
                            <div class="Category">
                                <label for="Category">Nama kategori</label>
                                <span>:</span>
                                <select name="id_kategori" id="id_kategori" required>
                                    <option value="">-- pilih kategori --</option>
                                    <?php foreach ($data['paketKate'] as $key) { ?>
                                        <option value="<?= $key['id_kategori'] ?>">
                                            <?= $key['nama_kategori'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="deskripsi ">
                                <label for="deskripsi">deskripsi</label>
                                <span>:</span>
                                <textarea class="deskrip" name="fitur" cols="30" rows="20"></textarea>
                            </div>
                            <div class="button-box">
                                <button type="submit" name="submit">Simpan</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </main>
        <footer></footer>
    </div>
</div>