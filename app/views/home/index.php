<?php
// session_start(); // Mulai sesi

// if (!$_SESSION["user_session"]) {
//     header("Location: " . BASEURL . "auth/login"); // Pindahkan ini ke bagian atas jika perlu
//     exit(); // Penting untuk menghentikan eksekusi setelah mengarahkan pengguna
// }
$this->view('templates/navbar', $data);
?>

<main>
    <div class="container-home">
        <div class="container-carousel">
            <div class="splide splidex" role="group" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <figure class="banner">
                                <img src="<?= BASEURL ?>assets/img/banner/banner1.avif" alt="">
                            </figure>
                        </li>
                        <li class="splide__slide">
                            <figure class="banner">
                                <img src="<?= BASEURL ?>assets/img/banner/banner2.avif" alt="">
                            </figure>
                        </li>
                        <li class="splide__slide">
                            <figure class="banner">
                                <img src="<?= BASEURL ?>assets/img/banner/banner3.avif" alt="">
                            </figure>
                        </li>
                        <li class="splide__slide">
                            <figure class="banner">
                                <img src="<?= BASEURL ?>assets/img/banner/banner4.avif" alt="">
                            </figure>
                        </li>
                        <li class="splide__slide">
                            <figure class="banner">
                                <img src="<?= BASEURL ?>assets/img/banner/banner5.avif" alt="">
                            </figure>
                        </li>
                        <li class="splide__slide">
                            <figure class="banner">
                                <img src="<?= BASEURL ?>assets/img/banner/banner6.avif" alt="">
                            </figure>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-produk-category">
            <div class="header">
                <div class="title title-home">
                    <h2>Produk Per Kategori</h2>
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
                                    <a class="button-cat" style="cursor: pointer;" href="<?= BASEURL . 'Katalog/detail2/' . $kategori['id_kategori'] ?>"><?= $kategori['nama_kategori'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="button-box">
                            <ul>
                                <?php foreach ($data['su_kate'] as $kategori) : ?>
                                    <?php if ($kategori['id_kategori'] == 1) : ?>
                                        <li>
                                            <button class="button-cat" data-subkategoriid="<?= $kategori['id_sub_kategori'] ?>" onclick="redirectToDetail2(<?= $kategori['id_kategori'] ?>)">
                                                <?= $kategori['nama_sub_kategori'] ?>
                                            </button>
                                        </li>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <div class="content-box">
                <!-- Content box content goes here -->
            </div>

        </div>
        <div class=" container-penjelasan-produk">
            <div class="header">
                <div class="title title-home">
                    <h2>Penjelasan Produk</h2>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-gem"></i>
                    <span class="border"></span>
                </div>
            </div>
            <div class="content">
                <div class="primary-box content-box">
                    <div class="title">
                        <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, placeat!</h2>
                    </div>
                    <div class="deskripsi">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam iure autem sunt distinctio aperiam accusantium voluptatem rerum voluptates atque eos numquam ex consequuntur praesentium harum, quia itaque fuga quod nisi animi laudantium doloremque incidunt quis ratione iste? Voluptate quo quidem, consequatur blanditiis consectetur, neque distinctio labore omnis autem molestiae aliquid nihil porro nesciunt quae ullam possimus maxime, rem ut ducimus! Eos aperiam ut repudiandae, delectus consequatur atque aspernatur corporis quisquam sunt iusto alias maiores excepturi qui neque impedit culpa consequuntur. Officiis sint enim cum nesciunt modi, voluptas placeat ab. Ea alias voluptas consectetur explicabo maiores, magnam quae. Quam, id eveniet!</p>
                    </div>
                    <div class="button">
                        <button>Click Me</button>
                    </div>
                </div>
                <div class="secondary-box">
                    <figure>
                        <img src="<?= BASEURL ?>assets/img/katalog/<?= $data['produk1']['nama_gambar'] ?>" alt="">
                    </figure>
                </div>
            </div>
        </div>
        <div class="container-penjelasan-produk">
            <div class="header">
                <div class="title title-home">
                    <h2>Penjelasan Produk</h2>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-gem"></i>
                    <span class="border"></span>
                </div>
            </div>
            <div class="content">
                <div class="primary-box">
                    <figure>
                        <img src="<?= BASEURL ?>assets/img/katalog/<?= $data['produk2']['nama_gambar'] ?>" alt="">
                    </figure>
                </div>
                <div class="secondary-box content-box">
                    <div class="title">
                        <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, placeat!</h2>
                    </div>
                    <div class="deskripsi">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam iure autem sunt distinctio aperiam accusantium voluptatem rerum voluptates atque eos numquam ex consequuntur praesentium harum, quia itaque fuga quod nisi animi laudantium doloremque incidunt quis ratione iste? Voluptate quo quidem, consequatur blanditiis consectetur, neque distinctio labore omnis autem molestiae aliquid nihil porro nesciunt quae ullam possimus maxime, rem ut ducimus! Eos aperiam ut repudiandae, delectus consequatur atque aspernatur corporis quisquam sunt iusto alias maiores excepturi qui neque impedit culpa consequuntur. Officiis sint enim cum nesciunt modi, voluptas placeat ab. Ea alias voluptas consectetur explicabo maiores, magnam quae. Quam, id eveniet!</p>
                    </div>
                    <div class="button">
                        <button>Click Me</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
<script>
    function redirectToDetail2(subKategoriId) {
        localStorage.setItem('activeSubKategoriId', subKategoriId);
        var url = "<?= BASEURL . 'Katalog/detail2/' ?>";
        window.location.href = url + subKategoriId;
    }

    var buttons = document.querySelectorAll('.button-cat');

    for (let i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', function() {
            var activeSubKategoriId = this.dataset.subkategoriid;

            buttons.forEach(function(button) {
                button.classList.remove('active');
            });

            this.classList.add('active');

            localStorage.setItem('activeSubKategoriId', activeSubKategoriId);
        });
    }
</script>
<?php
$this->view('templates/footer1', $data);
?>