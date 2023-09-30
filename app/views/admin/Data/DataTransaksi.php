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
                        <div class="tambah">
                            <a href="<?= BASEURL ?>Admin/formAddTransaksi">Add Data Transaksi</a>
                        </div>
                    </div>
                    <div class="container-form">

                        <label>Status:
                            <select id="statusFilter">
                                <option value="all">All</option>
                                <option value="pending">Pending</option>
                                <option value="successful">Successful</option>
                                <option value="failed">Failed</option>
                                <option value="refund">Refund</option>
                            </select>
                        </label>

                        <label>Cari Customer:
                            <input type="text" id="customerSearch">
                        </label>

                        <label>Cari Jumlah:
                            <input type="text" id="amountSearch">
                        </label>

                        <label>
                            <input type="checkbox" id="ascCheckbox"> Ascending/Descending 
                        </label>
                    </div>

                    <table id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Customer</th>
                                <th>Code TRX</th>
                                <th>Catalog</th>
                                <th>Metode Payment</th>
                                <th>Quatity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <?php
                        $i = 1;
                        foreach ($data['trx'] as $item) {
                            // $data['user'] = $this->model('User_model')->getALLUserById($item['id_user']);
                            // $data['katalog'] = $this->model('admin_model')->getALLKatalogById($item['id_user']);
                        ?>

                            <tr class="table-active">
                                <td><?= $i++; ?></td>
                                <td><?= $item['username'] ?></td>
                                <td><?= $item['kode_trx'] ?></td>
                                <!-- <td><?= $item['kategori_katalog'] ?></td> -->
                                <td><?= $item['nama_katalog'] ?></td>
                                <td><?= $item['metode_trx'] ?></td>
                                <td><?= $item['jumlah'] ?></td>
                                <td><?= $item['status_trx'] ?></td>

                                <?php
                                if ($item['status_trx'] == 1) {
                                    echo '<td>PENDING</td>';
                                } elseif ($item['status_trx'] == 2) {
                                    echo '<td>BERHASIL</td>';
                                } elseif ($item['status_trx'] == 3) {
                                    echo '<td>GAGAL</td>';
                                } elseif ($item['status_trx'] == 4) {
                                    echo '<td>REFUND</td>';
                                }
                                ?>

                                <td>
                                    <a class="ubah" href="<?= BASEURL . 'Admin/formEditTrx/' . $item['trx_id'] ?>">Edit</a>
                                    <a class="hapus" href="<?= BASEURL . 'Admin/deleteTrx/' . $item['trx_id'] ?>">Delete</a>
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