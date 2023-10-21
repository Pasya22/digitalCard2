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
                            <h1>Data Transaksi</h1>
                        </div>
                        <!-- <div class="tambah">
                            <a href="<?= BASEURL ?>Admin/formAddTransaksi">Add Data Transaksi</a>
                        </div> -->
                    </div>
                    <div class="container-form">
                        <label>Status:
                            <select id="statusFilter" class="neon">
                                <option value="all">All</option>
                                <option value="pending">Pending</option>
                                <option value="successful">Successful</option>
                                <option value="failed">Failed</option>
                                <option value="refund">Refund</option>
                            </select>
                            <i class="icon-dropdown"></i>
                        </label>
                        <label>Cari Customer:
                            <input type="text" id="customerSearch" class="neonIn" placeholder="Masukan kata Kunci">
                        </label>

                        <label>Cari Jumlah:
                            <input type="text" id="amountSearch" class="neonIn" placeholder="Masukan kata Kunci">
                        </label>

                        <label>
                            <input type="checkbox" id="ascCheckbox" class="neonIn"> Ascending/Descending
                        </label>
                    </div>

                    <table id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Transaksi</th>
                                <th>Customer</th>
                                <th>Code TRX</th>
                                <th>Catalog</th>
                                <th>Paket</th>
                                <th>Quatity</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <?php
                        $i = 1;

                        foreach ($data['trxs'] as $item) {
                            if ($item['paket_id'] != 0) {
                                $item['nama_katalog'] = "none";
                            }
                            if ($item['paket_id'] == 0) {
                                $item['nama_paket'] = "none";
                            }
                        ?>

                            <tr class="table-active">
                                <td><?= $i++; ?></td>
                                <td><?= $item['tgl_keluar_stock'] ?></td>
                                <td><?= $item['username'] ?></td>
                                <td><?= $item['kode_trx'] ?></td>
                                <td><?= $item['nama_katalog'] ?></td>
                                <td><?= $item['nama_paket'] ?></td>
                                <td><?= 'Rp.' . number_format($item['total'], 0, ',', '.') ?></td>
                                <td><?= $item['jumlah'] ?></td>
                                <?php
                                if ($item['status_trx'] == 1) {
                                    echo "<td>pending</td>";
                                } elseif ($item['status_trx'] == 2) {
                                    echo "<td>successful</td>";
                                } elseif ($item['status_trx'] == 3) {
                                    echo "<td>failed</td>";
                                } elseif ($item['status_trx'] == 4) {
                                    echo "<td>refund</td>";
                                }
                                ?>
                                <td>
                                    <a class="ubah" href="<?= BASEURL . 'Admin/formEditTrx/' . $item['trx_id'] ?>">Edit</a>
                                    <a class="hapus" href="<?= BASEURL . 'Admin/deleteTrx/' . $item['trx_id'] ?>">Delete</a>
                                </td>
                            </tr>
                        <?php } ?> 

                    </table>
                    <div class="data">
                        <?php if ($data['pagination']['currentPage'] >  $data['pagination']['totalPages']) : ?>
                            <a href="<?= BASEURL . 'Admin/DataTransaksi/' . ($data['pagination']['currentPage'] - 1) ?>">Previous</a>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <=  $data['pagination']['totalPages']; $i++) : ?>
                            <a href="<?= BASEURL . 'Admin/DataTransaksi/' . $i ?>" <?php if ($data['pagination']['currentPage'] == $i) echo 'class="active"' ?>><?= $i ?></a>
                        <?php endfor; ?>

                        <?php if ($data['pagination']['currentPage'] <  $data['pagination']['totalPages']) : ?>
                            <a href="<?= BASEURL . 'Admin/DataTransaksi/' . ($data['pagination']['currentPage'] + 1) ?>">Next</a>
                        <?php endif; ?>
                    </div>


                </div>
            </div>
        </main>
        <footer></footer>
    </div>
</div>