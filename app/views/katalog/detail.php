<?php

$this->view('templates/navbar', $data);
?>
<main>
    <div class="container-detail-katalog">
        <div class="container-detail">
            <div class="primary-box">
                <div id="main-slider" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <img src="<?= BASEURL ?>assets/img/katalog/<?= $data['katalog']['nama_gambar'] ?>" />
                            </li>
                            <li class="splide__slide">
                                <img src="<?= BASEURL ?>assets/img/katalog/<?= $data['katalog']['nama_gambar2'] ?>" />
                            </li>
                            <li class="splide__slide">
                                <img src="<?= BASEURL ?>assets/img/katalog/<?= $data['katalog']['nama_gambar3'] ?>" />
                            </li>
                            <li class="splide__slide">
                                <img src="<?= BASEURL ?>assets/img/katalog/<?= $data['katalog']['nama_gambar4'] ?>" />
                            </li>
                        </ul>
                    </div>
                </div>
                <ul id="thumbnails" class="thumbnails">
                    <li class="thumbnail">
                        <img src="<?= BASEURL ?>assets/img/katalog/<?= $data['katalog']['nama_gambar'] ?>" />
                    </li>
                    <li class="thumbnail">
                        <img src="<?= BASEURL ?>assets/img/katalog/<?= $data['katalog']['nama_gambar2'] ?>" />
                    </li>
                    <li class="thumbnail">
                        <img src="<?= BASEURL ?>assets/img/katalog/<?= $data['katalog']['nama_gambar3'] ?>" />
                    </li>
                    <li class="thumbnail">
                        <img src="<?= BASEURL ?>assets/img/katalog/<?= $data['katalog']['nama_gambar4'] ?>" />
                    </li>
                </ul>
            </div>
            <div class="secondary-box content-box">

                <form action="<?= BASEURL ?>Katalog/addTransaksiUser" method="post">
                    <input type="hidden" name="katalog_id" value="<?= $data['katalog']['katalog_id'] ?>">
                    <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">
                    <input type="hidden" name="metode_trx" value="BCA">
                    <!-- yang metode di ganti dulu paket ya -->
                    <input type="hidden" name="kode_trx" value="2345453">
                    <input type="hidden" name="status_trx" value="Pending">

                    <div class="title">
                        <h2><?= $data['katalog']['nama_katalog'] ?></h2>
                        <input type="hidden" name="nama_katalog" value="<?= $data['katalog']['nama_katalog'] ?>">
                    </div>
                    <div class="deskripsi">
                        <p> <?= $data['katalog']['deskripsi_katalog']; ?> </p>
                    </div>
                    <div class="harga">
                        <h6>Harga : <?= $data['katalog']['harga'] ?></h6>
                        <input type="hidden" name="harga" value="<?= $data['katalog']['harga'] ?>">
                    </div>
                    <div class="stok">
                        <h6>Stok : <?= $data['katalog']['stock'] ?></h6>
                    </div>
                    <div class="quantity">
                        <input id="stok" type="hidden" value="<?= $data['katalog']['stock'] ?>">
                        <input type='button' value='-' class='qtyminus minus' field='quantity' />
                        <input type='text' name="jumlah" value='1' class='qty' readonly />
                        <input type='button' value='+' class='qtyplus plus' field='quantity' />
                    </div>
                    <div class="button">

                        <button>Masukan Keranjang</button>
                        <button type="submit">Beli Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container-produk-category">
            <div class="header">
                <div class="title title-home">
                    <h2>Rekomendasi Produk Yang Serupa</h2>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-gem"></i>
                    <span class="border"></span>
                </div>
            </div>
            <div class="button-box">
                <div class="splide category" role="group" aria-label="Splide Basic HTML Example">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php foreach ($data['kategori'] as $kategori) : ?>
                                <li class="splide__slide">
                                    <button class="button-cat"><?= $kategori['nama_kategori'] ?></button>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content-box">
                <?php foreach ($data['kategori'] as $kategori) : ?>
                    <?php $data['katalogId'] = $this->model('admin_model')->getKategoriByIdM8($kategori['id_kategori']); ?>
                    <div class="contentCategory" id="content">
                        <?php foreach ($data['katalogId'] as $katalog) : ?>
                            <div class="product-1">
                                <a href="<?= BASEURL . 'Katalog/detail/' . $katalog['katalog_id'] ?>">
                                    <figure>
                                        <img src="<?= BASEURL ?>assets/img/katalog/<?= $katalog['nama_gambar'] ?>" alt=''>
                                    </figure>
                                    <div class="deskripsi">
                                        <h5><?= $katalog['nama_katalog'] ?></h5>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach ?>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</main>
<?php
$this->view('templates/footer1', $data);
?>