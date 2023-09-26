<?php
// session_start(); // Mulai sesi

// if (!$_SESSION["user_session"]) {
//     header("Location: " . BASEURL . "auth/login"); // Pindahkan ini ke bagian atas jika perlu
//     exit(); // Penting untuk menghentikan eksekusi setelah mengarahkan pengguna
// }
$this->view('templates/navbar', $data);
?>
<main>
    <div class="container-deskripsi">
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
</main>
<?php
$this->view('templates/footer1', $data);
?>