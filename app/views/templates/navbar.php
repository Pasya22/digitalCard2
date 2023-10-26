<header class="header-home">
    <div class="container-navbar">
        <div class="logo-box">
            <figure>
                <img src="<?= BASEURL ?>assets/img/logo/javamovie.png" alt="">
            </figure>
        </div>
        <div class="menu-box">
            <ul>
                <li>
                    <a <?php if ($data['judul'] == 'Home' || $data['judul'] == 'Dashboard') {
                            echo "class='active'";
                        } ?> href="<?= BASEURL ?>Home/index">Home</a>
                </li>
                <li>
                    <a <?php if ($data['judul'] == 'Katalog' || $data['judul'] == 'Dashboard') {
                            echo "class='active'";
                        } ?> href="<?= BASEURL ?>katalog/index">Katalog</a>
                </li>
                <li>
                    <a <?php if ($data['judul'] == 'Deskripsi' || $data['judul'] == 'Dashboard') {
                            echo "class='active'";
                        } ?> href="<?= BASEURL ?>Deskripsi/index">Deskripsi</a>
                </li>
                <li>
                    <a href="">Tentang Kami</a>
                </li>
            </ul>
        </div>
        <div class="profile-box">
            <div class="keranjang">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
            <div class="profile">
                <a href="<?= BASEURL . 'Auth/logout' ?>">
                    Logout
                </a>
                <i class="fa-solid fa-circle-user"></i>
                <p><?= $data['username'] ?></p>
            </div>
        </div>

    </div>
</header>