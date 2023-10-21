<?php
if (!$_SESSION["user_session"]) {
    header("Location:" . BASEURL . "auth/login");
}

?>
<!-- <a href="<?= BASEURL ?>auth/Logout">Logout</a> -->

<!-- <?= Flasher::flash() ?> -->



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
            <div class="container-dashboard">
                <div class="container-katalog">
                    <div class="header">
                        <div class="title">
                            <h1>Data Semua Paket</h1>
                        </div>
                        <div class="tambah">
                            <a href="<?= BASEURL ?>Admin/formAddPaket">Tambah Paket</a>
                        </div>
                    </div>
                    <div class="container-form">
                        <label>Status:
                            <select id="paket" class="neon">
                                <option value="all">All</option>
                                <option value="Paket Comunity">Paket Comunity</option>
                                <option value="Paket Super">Paket Super</option>
                                <option value="Paket Basic">Paket Basic </option>
                            </select>
                            <i class="icon-dropdown"></i>
                        </label>
                        <label>Cari fitur:
                            <input type="text" id="fitur" class="neonIn" placeholder="Masukan kata Kunci">
                        </label>

                        <label>
                            <div class="dropdown">
                                <button class="dropbtn">Sort Direction</button>
                                <div class="dropdown-content">
                                    <a href="#" id="ascOption">Ascending</a>
                                    <a href="#" id="descOption">Descending</a>
                                </div>
                            </div>

                        </label>

                    </div>

                    <table id="datatable">
                        <tr>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>Nama kategori</th>
                            <th>Fitur</th>
                            <th>Aksi</th>
                        </tr>


                        <?php
                        $i = 1;

                        foreach ($data['paket'] as $item) {

                        ?>
                            <tr class="table-active">
                                <td><?= $i++; ?></td>
                                <!-- <td class="image-katalog"><img src="<?= BASEURL . 'assets/img/katalog/' . $item['nama_gambar'] ?>" alt="" style="width:50%; height:4pc; text-align:center;"></td> -->
                                <td><?= $item['nama_paket'] ?></td>
                                <td><?= $item['nama_kategori'] ?></td>
                                <td style="text-align: left; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                                    <?php
                                    $fitur = htmlspecialchars_decode($item['fitur']);

                                    if (strpos($fitur, ".") !== false || strpos($fitur, ":") !== false) {
                                        $replacements = ['.' => '.<br>', ':' => ':<br>'];
                                        foreach ($replacements as $search => $replace) {
                                            $fitur = str_replace($search, $replace, $fitur);
                                        }

                                        for ($m = 1; $m < 10; $m++) {
                                            $fitur = str_replace($m . '.<br>', $m . '.', $fitur);
                                        }
                                    }

                                    echo $fitur;
                                    ?>
                                </td>
                                <td>
                                    <a class="ubah" href="<?= BASEURL . 'Admin/formEditPaket/' . $item['paket_id'] ?>">Edit</a>
                                    <a class="hapus" href="<?= BASEURL . 'Admin/deletePaket/' . $item['paket_id'] ?>">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </main>
        <footer></footer>
    </div>
</div>