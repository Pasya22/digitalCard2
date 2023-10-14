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
                    <a href="<?= BASEURL ?>Admin"> <!-- Ganti link sesuai dengan tujuan -->
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                </div>
                <div class="breadcrumb-box">
                    <a href="<?= BASEURL ?>Admin">Dashboard</a>
                    <p>/</p>
                    <a href="<?= BASEURL ?>Admin/dataCatalog">Data Catalog</a>
                    <p>/</p>
                    <a href="">Edit Data Transaksi</a>
                </div>
            </div>
            <div class="container-dashboard">
                <div class="container-katalog container">
                    <div class="header">
                        <div class="title">
                            <h1>Ubah Status Transaksi</h1>
                        </div>
                    </div>
                    <div class="container-form">
                        <form action="<?= BASEURL . 'Admin/editTrx/' . $data['trx']['trx_id'] ?>" method="POST">
                            <input type="hidden" name="trx_id" value="<?= $data['trx']['trx_id'] ?>">

                            <input name="kode_trx" id="kode_trx" type="hidden" value="<?= $data['trx']['kode_trx'] ?>">

                            <input name="id_user" id="id_user" type="hidden" value="<?= $data['trx']['id_user'] ?>">

                            <input name="paket_id" id="paket_id" type="hidden" value="<?= $data['trx']['paket_id'] ?>">

                            <input name="katalog_id" id="katalog_id" type="hidden" value="<?= $data['trx']['katalog_id'] ?>">

                            <input name="total" id="total" type="hidden" value="<?= $data['trx']['total'] ?>">

                            <input name="jumlah" id="jumlah" type="hidden" value="<?= $data['trx']['jumlah'] ?>">

                            <div class="Kategori">
                                <label for="status_trx">Status Transaksi</label>
                                <span>:</span>
                                <select name="status_trx" id="status_trx" required>
                                    <option value="1" <?= ($data['trx']['status_trx'] == 1) ? 'selected' : '' ?>>Pending</option>
                                    <option value="2" <?= ($data['trx']['status_trx'] == 2) ? 'selected' : '' ?>>Berhasil</option>
                                    <option value="3" <?= ($data['trx']['status_trx'] == 3) ? 'selected' : '' ?>>Tolak</option>
                                    <option value="4" <?= ($data['trx']['status_trx'] == 4) ? 'selected' : '' ?>>Refund</option>
                                </select>
                            </div>

                            <div class="button-box">
                                <button type="submit" name="submit">Ubah Status</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer></footer>
    </div>
</div>