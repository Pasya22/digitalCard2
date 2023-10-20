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
                    <a href="">Data Catalog</a>
                    <p>/</p>
                    <a href="">Add Data Catalog</a>
                </div>
            </div>
            <div class="container-dashboard">
                <div class="container-katalog">
                    <div class="header">
                        <div class="title">
                            <h1>Tambah Data Katalog</h1>
                        </div>
                    </div>
                    <div class="container-form">
                        <form action="<?= BASEURL ?>Admin/addkatalog" method="post" enctype='multipart/form-data'>
                            <div class="gambar">
                                <label for="">gambar</label>
                                <span>:</span>
                                <div class="gambar-box">
                                    <figure>
                                        <img id="preview-selected-image">
                                        <label for="gambar" class="lbl-img">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <input name="nama_gambar" type="file" id="gambar" accept="image/*" onchange="previewImage(event);">
                                        </label>
                                    </figure>
                                    <figure>
                                        <img id="preview-selected-image2">
                                        <label for="gambar2" class="lbl-img">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <input name="nama_gambar2" type="file" id="gambar2" accept="image/*" onchange="previewImage2(event);">
                                        </label>
                                    </figure>
                                    <figure>
                                        <img id="preview-selected-image3">
                                        <label for="gambar3" class="lbl-img">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <input name="nama_gambar3" type="file" id="gambar3" accept="image/*" onchange="previewImage3(event);">
                                        </label>
                                    </figure>
                                    <figure>
                                        <img id="preview-selected-image4">
                                        <label for="gambar4" class="lbl-img">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <input name="nama_gambar4" type="file" id="gambar4" accept="image/*" onchange="previewImage4(event);">
                                        </label>
                                    </figure>
                                    <figure>
                                        <img id="preview-selected-image5">
                                        <label for="gambar5" class="lbl-img">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <input name="nama_gambar5" type="file" id="gambar5" accept="image/*" onchange="previewImage5(event);">
                                        </label>
                                    </figure>
                                </div>
                            </div>
                            <div class="nama katalog">
                                <label for="nama katalog">nama katalog</label>
                                <span>:</span>
                                <input name="nama_katalog" id="nama katalog" type="text" placeholder="Masukan nama katalog" required>
                            </div>
                            <div class="harga">
                                <label for="harga">harga</label>
                                <span>:</span>
                                <input name="harga" id="harga" type="text" placeholder="Masukan harga" required>
                            </div>
                            <div class="stok">
                                <label for="stok">stok</label>
                                <span>:</span>
                                <input name="stock" id="stok" type="text" placeholder="Masukan stok" required>
                            </div>
                            <div class="tgl_masuk_stock">
                                <label for="tgl_masuk_stock">tanggal masuk stok</label>
                                <span>:</span>
                                <input name="tgl_masuk_stock" id="tgl_masuk_stock" type="datetime-local">
                            </div>
                            <div class="sold">
                                <label for="sold">terjual</label>
                                <span>:</span>
                                <input name="sold" id="terjual" type="text" placeholder="Masukan terjual" value="0" readonly>
                            </div>
                            <div class="Category">
                                <label for="Category">Category</label>
                                <span>:</span>
                                <select name="kategori_id" id="kategori_id" required>
                                    <option value="">-- Choices Category --</option>
                                    <?php foreach ($data['kat_show'] as $key) { ?>
                                        <option value="<?= $key['id_kategori'] ?>">
                                            <?= $key['nama_kategori'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="deskripsi">
                                <label for="deskripsi">deskripsi</label>
                                <span>:</span>
                                <textarea name="deskripsi_katalog" class="deskrip" cols="30" rows="20"></textarea>
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