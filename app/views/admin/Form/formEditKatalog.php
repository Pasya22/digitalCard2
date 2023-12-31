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
                    <a href="">Data Catalog</a>
                    <p>/</p>
                    <a href="">Edit Data Catalog</a>
                </div>
            </div>
            <div class="container-dashboard">
                <div class="container-katalog container">
                    <div class="header">
                        <div class="title">
                            <h1>Ubah Data Katalog</h1>
                        </div>
                    </div>
                    <div class="container-form">
                        <form action="<?= BASEURL . 'Admin/editKatalog' ?>" method="POST" enctype='multipart/form-data'>
                            <input name="id_katalog" id="id_katalog" type="hidden" value="<?= $data['catalog']['id_katalog'] ?>">
                            <input name="gambar_lama" type="hidden" value="<?= $data['catalog']['nama_gambar'] ?>">
                            <input name="gambar_lama2" type="hidden" value="<?= $data['catalog']['nama_gambar2'] ?>">
                            <input name="gambar_lama3" type="hidden" value="<?= $data['catalog']['nama_gambar3'] ?>">
                            <input name="gambar_lama4" type="hidden" value="<?= $data['catalog']['nama_gambar4'] ?>">
                            <input name="gambar_lama5" type="hidden" value="<?= $data['catalog']['nama_gambar5'] ?>">
                            <div class="gambar">
                                <label for="">gambar</label>
                                <span>:</span>
                                <div class="gambar-box">
                                    <figure>
                                        <?php
                                        if (!empty($data['catalog']['nama_gambar'])) {
                                            echo '  <img id="gambarLama"
                                            src="' . BASEURL . 'assets/img/katalog/' . $data["catalog"]["nama_gambar"] . '"
                                            alt="">';
                                        }
                                        ?>
                                        <img id="preview-selected-image">
                                        <label for="gambar" class="lbl-img">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <input name="nama_gambar" type="file" id="gambar" accept="image/*" onchange="previewImage(event);" value="<?= $data['catalog']['nama_gambar'] ?>">
                                        </label>
                                    </figure>
                                    <figure>
                                        <?php
                                        if (!empty($data['catalog']['nama_gambar2'])) {
                                            echo '  <img id="gambarLama2"
                                            src="' . BASEURL . 'assets/img/katalog/' . $data["catalog"]["nama_gambar2"] . '"
                                            alt="">';
                                        }
                                        ?>
                                        <img id="preview-selected-image2">
                                        <label for="gambar2" class="lbl-img">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <input name="nama_gambar2" type="file" id="gambar2" accept="image/*" onchange="previewImage2(event);" value="<?= $data['catalog']['nama_gambar2'] ?>">
                                        </label>
                                    </figure>
                                    <figure>
                                        <?php
                                        if (!empty($data['catalog']['nama_gambar3'])) {
                                            echo '  <img id="gambarLama3"
                                            src="' . BASEURL . 'assets/img/katalog/' . $data["catalog"]["nama_gambar3"] . '"
                                            alt="">';
                                        }
                                        ?>
                                        <img id="preview-selected-image3">
                                        <label for="gambar3" class="lbl-img">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <input name="nama_gambar3" type="file" id="gambar3" accept="image/*" onchange="previewImage3(event);" value="<?= $data['catalog']['nama_gambar3'] ?>">
                                        </label>
                                    </figure>
                                    <figure>
                                        <?php
                                        if (!empty($data['catalog']['nama_gambar4'])) {
                                            echo '  <img id="gambarLama4"
                                            src="' . BASEURL . 'assets/img/katalog/' . $data["catalog"]["nama_gambar4"] . '"
                                            alt="">';
                                        }
                                        ?>
                                        <img id="preview-selected-image4">
                                        <label for="gambar4" class="lbl-img">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <input name="nama_gambar4" type="file" id="gambar4" accept="image/*" onchange="previewImage4(event);" value="<?= $data['catalog']['nama_gambar4'] ?>">
                                        </label>
                                    </figure>
                                    <figure>
                                        <?php
                                        if (!empty($data['catalog']['nama_gambar5'])) {
                                            echo '  <img id="gambarLama5"
                                            src="' . BASEURL . 'assets/img/katalog/' . $data["catalog"]["nama_gambar5"] . '"
                                            alt="">';
                                        }
                                        ?>
                                        <img id="preview-selected-image5">
                                        <label for="gambar5" class="lbl-img">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <input name="nama_gambar5" type="file" id="gambar5" accept="image/*" onchange="previewImage5(event);" value="<?= $data['catalog']['nama_gambar5'] ?>">
                                        </label>
                                    </figure>
                                </div>
                            </div>
                            <div class="nama katalog">
                                <label for="nama katalog">nama katalog</label>
                                <span>:</span>
                                <input name="nama_katalog" id="nama katalog" type="text" placeholder="Masukan nama katalog" value="<?= $data['catalog']['nama_katalog'] ?>">
                            </div>
                            <div class="harga">
                                <label for="harga">harga</label>
                                <span>:</span>
                                <input name="harga" id="harga" type="text" placeholder="Masukan harga" value="<?= $data['catalog']['harga'] ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                            </div>
                            <div class="stok">
                                <label for="stok">stok</label>
                                <span>:</span>
                                <input name="stock" id="stok" type="text" placeholder="Masukan stok" value="<?= $data['catalog']['stock'] ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                            </div>
                            <div class="stok">
                                <label for="stok">tanggal masuk stok</label>
                                <span>:</span>
                                <input name="tgl_masuk_stock" id="tgl_masuk_stock" type="datetime-local" value="<?= $data['catalog']['tgl_masuk_stock'] ?>">
                            </div>
                            <div class="terjual">
                                <label for="terjual">terjual</label>
                                <span>:</span>
                                <input name="sold" id="terjual" type="text" placeholder="Masukan terjual" value="<?= $data['catalog']['sold'] ?>" readonly>
                            </div>
                            <!-- <div class="Kategori">
                                <label for="Kategori">Kategori</label>
                                <span>:</span>
                                <select name="id_kategori" id="id_kategori" required>
                                    <?php $data['kategoriId'] = $this->model('admin_model')->getALLKategoriById($data['catalog']['id_kategori']); ?>
                                    <option value="<?= $data['catalog']['id_kategori'] ?>"><?= $data['kategoriId']['nama_kategori'] ?></option>
                                    <?php foreach ($data['catalog2'] as $key) { ?>
                                        <option value="<?= $key['id_kategori'] ?>">
                                            <?= $key['nama_kategori'] ?></option>
                                    <?php } ?>
                                </select>
                            </div> -->


                            <div class="Category">
                                <label for="Category">Nama kategori</label>
                                <span>:</span>
                                <select name="id_kategori" id="id_kategori" required>
                                    <option value="">-- pilih kategori --</option>
                                    <?php foreach ($data['catalog2'] as $key) { ?>
                                        <option value="<?= $key['id_kategori'] ?>">
                                            <?= $key['nama_kategori'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="sub-category">
                                <label for="sub_kategori">Sub Kategori</label>
                                <span>:</span>
                                <select name="id_sub_kategori" id="id_sub_kategori" required>
                                    <option value="">-- pilih sub kategori --</option>
                                </select>
                            </div>
   
                            <div class="deskripsi ">
                                <label for="deskripsi">deskripsi</label>
                                <span>:</span>
                                <textarea class="deskrip" name="deskripsi_katalog" cols="30" rows="20"><?= $data['catalog']['deskripsi_katalog'] ?></textarea>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#id_kategori').on('change', function() {
            var id_kategori = $(this).val();
            if (id_kategori) {
                $.ajax({
                    type: 'POST',
                    url: '<?= BASEURL ?>Admin/getSubKategori', // Tentukan URL yang akan digunakan untuk mengambil sub kategori
                    data: 'id_kategori=' + id_kategori,
                    success: function(html) {
                        $('#id_sub_kategori').html(html);
                    }
                });
            } else {
                $('#id_sub_kategori').html('<option value="">-- pilih sub kategori --</option>');
            }
        });
    });
</script>