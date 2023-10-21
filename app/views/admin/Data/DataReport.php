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
                <div class="container-user">
                    <div class="header">
                        <div class="title">
                            <h1>Data Semua Report</h1>
                        </div>
                    </div>
                    <div class="container-form">

                        <div class="container-form">
                            <form class="filterForm" action="<?= BASEURL . 'Admin/filterByTanggalKeluar' ?>" method="post">
                                <label for="tanggal_mulai">Tanggal Mulai:</label>
                                <input type="date" id="tanggal_mulai" name="start_date" class="filter" required>
                                <label for="tanggal_selesai">Tanggal Selesai:</label>
                                <input type="date" id="tanggal_selesai" name="end_date" class="filter" required>
                                <button type="submit" class="btn-neon">Tampil</button>
                            </form>
                        </div>

                        <button type="button" class="btn-dark" onclick="exportToExcel()">Export to Excel</button>

                        <button type="button" onclick="exportToPDF()" class="btn-dark">Export to PDF</button>
                        <button type="button" onclick="printData()" class="btn-dark">Print</button>


                    </div>
                    <table id="laporanTable">
                        <thead>
                            <tr>
                                <th>Kode TRX</th>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Keluar</th>
                                <th>Status</th>
                                <th>Terjual</th>
                                <th>total</th>
                            </tr>
                        </thead>
                        <tbody id="laporanBody">
                            <?php $total = 0;
                            foreach ($data['reports'] as $item) : ?>
                                <tr>
                                    <td><?= $item['kode_trx']; ?></td>
                                    <td><?= $item['tgl_masuk_stock']; ?></td>
                                    <td><?= $item['tgl_keluar_stock']; ?></td>
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
                                    <td><?= $item['jumlah']; ?></td>
                                    <?php $total += $item['total']; ?>
                                    <td><?= 'Rp.' . number_format($item['total'], 0, ',', '.'); ?></td>
                                </tr>
                            <?php endforeach; ?>


                            <tr>
                                <?php
                                $ColsPanTotal = '&nbsp;';
                                for ($i = 0; $i < 4; $i++) :
                                ?>
                                    <td style="display: none;">
                                        <?= $ColsPanTotal ?>
                                    </td>
                                <?php endfor ?>
                                <td colspan="5" class="tabelrocker" style="text-align: right;">
                                    <?= 'Total :' ?>
                                </td>
                                <td id="totalOmset">
                                    <?= 'Rp.' . number_format($total, 0, ',', '.') ?>
                                </td>
                            </tr>

                        </tbody>
                    </table>


                </div>
            </div>
        </main>
        <footer></footer>
    </div>
</div>