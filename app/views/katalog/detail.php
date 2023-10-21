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
                    <input type="hidden" name="kategori_id" value="<?= $data['katalog']['kategori_id'] ?>">
                    <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">
                    <input type="hidden" name="tgl_keluar_stock" value="<?= date('Y-m-d H:i:s') ?>">
                    <!-- yang metode di ganti dulu paket ya -->
                    <input type="hidden" name="paket_id" value="<?= $paket['paket']['paket_id'] ?>">
                    <input type="hidden" name="kode_trx" value="<?= $this->model('admin_model')->generateRandomCode() ?>">
                    <input type="hidden" name="status_trx" value="1">

                    <div class="title">
                        <h2><?= $data['katalog']['nama_katalog'] ?></h2>
                        <input type="hidden" name="nama_katalog" value="<?= $data['katalog']['nama_katalog'] ?>">
                    </div>
                    <div class="deskripsi">
                        <p style="text-align: justify;">
                            <?php
                            // $deskripsi_katalog = htmlspecialchars_decode($data['katalog']['deskripsi_katalog']);
                            // $deskripsi_katalog = str_replace(".", "<br>", $deskripsi_katalog);

                            // if (strpos($deskripsi_katalog, ".") !== false) {
                            //     $str = str_replace('.', "<br>", $deskripsi_katalog);
                            // }
                            // $deskripsi_katalog = preg_replace("/(?<!\d)\:(?!\d)/", ":<br>", $deskripsi_katalog);
                            // echo "Deskripsi Katalog: " . $deskripsi_katalog . "<br>";
                            $deskripsi_katalog = htmlspecialchars_decode($data['katalog']['deskripsi_katalog']);

                            if (strpos($deskripsi_katalog, ".") !== false || strpos($deskripsi_katalog, ":") !== false) {
                                $replacements = ['.' => '.<br>', ':' => ':<br>'];
                                foreach ($replacements as $search => $replace) {
                                    $deskripsi_katalog = str_replace($search, $replace, $deskripsi_katalog);
                                }

                                for ($i = 1; $i < 10; $i++) {
                                    $deskripsi_katalog = str_replace($i . '.<br>', $i . '.', $deskripsi_katalog);
                                }
                            }

                            echo $deskripsi_katalog;

                            ?>

                        </p>
                    </div>
                    <div class="harga">
                        <!-- <h6>Harga : Rp. <?= number_format($data['katalog']['harga'], 0, ',', '.') ?></h6> -->
                        <input type="hidden" name="harga" value="<?= $data['katalog']['harga'] ?>">
                    </div>
                    <!-- <div class="stok">
                        <h6>Stok : <?= $data['katalog']['stock'] ?></h6>
                    </div> -->
                    <div class="quantity">
                        <input id="stok" type="hidden" value="<?= $data['katalog']['stock'] ?>">
                        <!-- <input type='button' value='-' class='qtyminus minus' field='quantity' /> -->
                        <input type="hidden" name="total" value="<?= $data['katalog']['harga'] ?>">
                            <input type="hidden" name="jumlah" value="1">
                        <!-- <input type='button' value='+' class='qtyplus plus' field='quantity' /> -->
                    </div>
                    <div class="button">
                        <button>Masukan Keranjang</button>
                        <button type="submit">Beli Sekarang</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="content-paket">


            <?php foreach ($data['paket']  as $paket) : ?>
                <div class="container-paket">
                    <div class="card-paket">
                        <form action="<?= BASEURL ?>Katalog/addTransaksiPaket" method="post">
                            <div class="header-paket">
                                <h2 class="nama-paket"><?= $paket['nama_paket'] ?></h2>
                                <!-- <input type="hidden" name="nama_paket" value="<?= $paket['nama_paket'] ?>"> -->
                            </div>
                            <div class="deskripsi-paket">
                                <?php
                                $fitur = htmlspecialchars_decode($paket['fitur']);

                                if (strpos($fitur, ".") !== false || strpos($fitur, ":") !== false) {
                                    $replacements = ['.' => '.<br>', ':' => ':<br>'];
                                    foreach ($replacements as $search => $replace) {
                                        $fitur = str_replace($search, $replace, $fitur);
                                    }

                                    for ($i = 1; $i < 10; $i++) {
                                        $fitur = str_replace($i . '.<br>', $i . '.', $fitur);
                                    }
                                }

                                echo $fitur;
                                ?>
                                <br>
                                <?= 'Harga : Rp.' . number_format($paket['harga_paket'], 0, ',', '.') ?>
                                <!-- <input type="hidden" name="fitur" value="<?= $paket['fitur'] ?>"> -->
                                <!-- <input type="hidden" name="harga_paket" value="<?= $paket['harga_paket'] ?>"> -->
                            </div>

                            <input type="hidden" name="katalog_id" value="<?= $data['katalog']['katalog_id'] ?>">
                            <input type="hidden" name="kategori_id" value="<?= $data['katalog']['kategori_id'] ?>">
                            <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">
                            <input type="hidden" name="paket_id" value="<?= $paket['paket_id'] ?>">
                            <input type="hidden" name="tgl_keluar_stock" value="<?= date('Y-m-d H:i:s') ?>">
                            <input type="hidden" name="kode_trx" value="<?= $this->model('admin_model')->generateRandomCode() ?>">
                            <input type="hidden" name="status_trx" value="1">
                            <input type="hidden" name="total" value="<?= $paket['harga_paket'] ?>">
                            <input type="hidden" name="jumlah" value="1">
                            <br>
                            <button type="submit" class="btn-beli">Beli Paket</button>
                        </form>
                    </div>
                </div>
            <?php endforeach ?>
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
                    <?php
                    $katalogs = $this->model('admin_model')->getKategoriByIdM8($kategori['id_kategori']);

                    ?>
                    <div class="contentCategory" id="content">
                        <?php foreach ($katalogs as $katalog) : ?>
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