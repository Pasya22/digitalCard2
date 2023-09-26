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
                            <h1>Data Semua Katalog</h1>
                        </div>
                        <div class="tambah">
                            <a href="<?= BASEURL ?>Admin/formAddKatalog">Tambah Katalog</a>
                        </div>
                    </div>
                    <div class="container-form">
                        <!-- <label for="nama_katalog">Cari Filter:</label>
                        <input name="nama_katalog" id="nama_katalog" type="text" placeholder="Masukan Nama Katalog"> -->
                        <form id="searchForm2">
                            <div class="Category">
                                <label for="filter">Filter Katalog</label>
                                <span>:</span>
                                <select name="filter" id="filter2" style=" width:18%;">
                                    <option value=" " style="text-align: center;">-- Silahkan Pilih Filter --</option>
                                    <option value="semua">Berdasarkan ALL</option>
                                    <option value="nama_gambar">Berdasarkan Gambar</option>
                                    <option value="nama_katalog">Berdasarkan Nama Katalog</option>
                                    <option value="harga">Berdasarkan Harga</option>
                                    <option value="stock">Berdasarkan Stok</option>
                                    <option value="sold">Berdasarkan Terjual</option>
                                </select>
                                <input name="search_keyword2" id="search_keyword2" type="text" placeholder=" Setelah Memilih Filter, Silahkan Masukkan Kata Kunci Filter">
                            </div>
                            <!-- <button type="submit">Filter</button> -->
                        </form>

                    </div>
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama Katalog</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Terjual</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $i = 1;
                        foreach ($data['katalog'] as $item) {

                        ?>
                            <tr class="table-active">
                                <td><?= $i++; ?></td>
                                <td class="image-katalog"><img src="<?= BASEURL . 'assets/img/katalog/' . $item['nama_gambar'] ?>" alt="" style="width:50%; height:4pc; text-align:center;"></td>
                                <td><?= $item['nama_katalog'] ?></td>
                                <td><?= $item['harga'] ?></td>
                                <td><?= $item['stock'] ?></td>
                                <td><?= $item['sold'] ?></td>
                                <td>
                                    <a class="ubah" href="<?= BASEURL . 'Admin/formEditKatalog/' . $item['katalog_id'] ?>">Edit</a>
                                    <a class="hapus" href="<?= BASEURL . 'Admin/deleteKatalog/' . $item['katalog_id'] ?>">Delete</a>
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
<script>
    // ------------------------------------------------------- filter data katalog ----------------------------------------------------------- // 
    document.getElementById('search_keyword2').addEventListener('input', function() {
        var filterValue = this.value.toLowerCase();
        var filterBy = document.getElementById('filter2').value;
        var rows = document.querySelectorAll('#myTable tbody tr');

        rows.forEach(function(row) {
            var data = row.querySelector('td:nth-child(' + (filterBy === ' ' ? 0 : filterBy === 'nama_gambar' ? 2 : filterBy === 'nama_katalog' ? 3 : filterBy === 'harga' ? 4 : filterBy === 'stock' ? 5 : 6) + ')').textContent.toLowerCase();
            if (filterValue.length > 0) {
                if (filterBy === 'semua') {
                    var matchFound = false;
                    row.querySelectorAll('td').forEach(function(cell) {
                        if (cell.textContent.toLowerCase().includes(filterValue)) {
                            matchFound = true;
                        }
                    });
                    if (matchFound) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                } else {
                    if (data.startsWith(filterValue)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            } else {
                row.style.display = '';
            }
        });
    });

    document.getElementById('searchForm2').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah pengiriman formulir
    });
</script>