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

                        <form id="searchForm">
                            <div class="Category">
                                <label for="filter">Filter Paket</label>
                                <span>:</span>
                                <select name="filter" id="filter" style=" width:18%;">
                                    <option value=" " style="text-align: center;">-- Silahkan Pilih Filter --</option>
                                    <option value="semua">Berdasarkan ALL</option>
                                    <option value="kode_trx">Berdasarkan Kode TRX</option>
                                    <option value="nama_katalog">Berdasarkan Nama Katalog</option>
                                    <option value="username">Berdasarkan Nama Customer</option>
                                    <option value="metode_trx">Berdasarkan metode</option>
                                    <option value="jumlah">Berdasarkan jumlah</option>
                                    <option value="status_trx">Berdasarkan status</option>
                                </select>
                                <input name="search_keyword" id="search_keyword" type="text" placeholder=" Setelah Memilih Filter, Silahkan Masukkan Kata Kunci Filter">
                            </div>
                            <!-- <button type="submit">Filter</button> -->
                        </form>
                    </div>
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>Nama kategori</th>
                            <!-- <th>Paket A</th>
                            <th>Paket B</th>
                            <th>Paket C</th>
                            <th>Paket D</th> -->
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
                                <td><?= $item['fitur'] ?></td>
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