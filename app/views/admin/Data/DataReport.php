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

                    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
                    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $("#filterForm").submit(function(e) {
                                e.preventDefault();
                                var start_date = $("#tanggal_mulai").val();
                                var end_date = $("#tanggal_selesai").val();

                                $.ajax({
                                    url: "<?= BASEURL . 'Admin/filterByTanggalKeluar'; ?>",
                                    type: "POST",
                                    data: {
                                        start_date: start_date,
                                        end_date: end_date
                                    },
                                    dataType: 'json',
                                    success: function(data) {
                                        $("#laporanBody").empty(); // Bersihkan isi tbody
                                        $.each(data, function(i, item) {
                                            var tgl_masuk = new Date(item.tgl_masuk_stock);
                                            var tgl_keluar = new Date(item.tgl_keluar_stock);

                                            var formattedTglMasuk = tgl_masuk.getDate() + '-' + (tgl_masuk.getMonth() + 1) + '-' + tgl_masuk.getFullYear();
                                            var formattedTglKeluar = tgl_keluar.getDate() + '-' + (tgl_keluar.getMonth() + 1) + '-' + tgl_keluar.getFullYear();

                                            var row = '<tr>';
                                            row += '<td>' + item.kode_trx + '</td>';
                                            row += '<td>' + formattedTglMasuk + '</td>';
                                            row += '<td>' + formattedTglKeluar + '</td>';
                                            row += '<td>' + item.jumlah + '</td>';
                                            row += '<td>' + item.total + '</td>';
                                            row += '<td>' + getStatusLabel(item.status_trx) + '</td>';
                                            row += '</tr>';

                                            $("#laporanBody").append(row); // Tambahkan baris ke tbody
                                        });
                                    },

                                    error: function(error) {
                                        console.log(error);
                                    }
                                });
                            });

                            function getStatusLabel(status_trx) {
                                switch (status_trx) {
                                    case 1:
                                        return 'pending';
                                    case 2:
                                        return 'successful';
                                    case 3:
                                        return 'failed';
                                    case 4:
                                        return 'refund';
                                    default:
                                        return '';
                                }
                            }
                        });
                    </script> -->
                </div>
            </div>
        </main>
        <footer></footer>
    </div>
</div>