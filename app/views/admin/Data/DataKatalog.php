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
                        <!-- <div class="filter-controls">
                            <button onclick="filterTable('all')">Show All</button>
                            <label><input type="checkbox" onclick="filterTable('out-of-stock')">Out of Stock</label>
                        </div> -->

                        <form id="searchForm">
                            <div class="Category">
                                <label for="filter">Search Nama Transaksi</label>
                                <span>:</span>
                                <input type="text" id="myInput" onkeyup="applyFilters()" placeholder="Search for names.." title="Type in a name">
                            </div>
                            <div class="Category">
                                <label for="sortByPrice">filter harga </label>
                                <span>:</span>
                                <select id="sortByPrice" onchange="applyFilters()" class="neon">
                                    <option value="normal"> pilih berdasarkan harga </option>
                                    <option value="asc">Terkecil ke Terbesar</option>
                                    <option value="desc">Terbesar ke Terkecil</option>
                                </select>
                            </div>
                            <div class="filter-controls">
                                <label class="container">
                                    Filter by Stok
                                    <input type="checkbox" id="filterStok" class="checkfil" onclick="applyFilters()" />
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">
                                    Filter by Terjual
                                    <input type="checkbox" id="filterTerjual" class="checkfil" onclick="applyFilters()" />
                                    <span class="checkmark"></span>
                                </label>
                                <button onclick="resetFilters()" class="resetBtn btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Stok Masuk</th>
                                <th>Foto</th>
                                <th>Nama Katalog</th>
                                <th>Harga</th>
                                <!-- <th>deskripsi</th> -->
                                <th>Stok</th>
                                <th>Terjual</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($data['katalog'] as $item) {
                            ?>
                                <tr class="table-active table-row">
                                    <td><?= $i++; ?></td>
                                    <td><?= $item['tgl_masuk_stock'] ?></td>
                                    <td class="image-katalog"><img src="<?= BASEURL . 'assets/img/katalog/' . $item['nama_gambar'] ?>" alt="" style="width:50%; height:4pc; text-align:center;"></td>
                                    <td><?= $item['nama_katalog'] ?></td>
                                    <td><?= 'Rp.' . number_format($item['harga'], 0, ',', '.') ?></td>
                                    <!-- <td>
                                        <?php
                                        $deskripsi_katalog = htmlspecialchars_decode($item['deskripsi_katalog']);
                                        $deskripsi_katalog = str_replace("<br>", "<br>", $deskripsi_katalog);
                                        echo  $deskripsi_katalog . "<br>";
                                        ?>
                                    </td> -->
                                    <td><?= $item['stock'] ?></td>
                                    <td><?= $item['sold'] ?></td>
                                    <td>
                                        <a class="ubah" href="<?= BASEURL . 'Admin/formEditKatalog/' . $item['id_katalog'] ?>">Edit</a>
                                        <a class="hapus" href="<?= BASEURL . 'Admin/deleteKatalog/' . $item['id_katalog'] ?>">Delete</a>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </main>

        <footer></footer>
    </div>
</div>
<script>
    function applyFilters() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        var sortValue = document.getElementById('sortByPrice').value;

        var filterStok = document.getElementById('filterStok').checked;
        var filterTerjual = document.getElementById('filterTerjual').checked;

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
                txtValue = td.textContent || td.innerText;

                // Filter by Name
                var nameFilter = txtValue.toUpperCase().indexOf(filter) > -1;

                // Filter by Stok
                var stok = parseInt(tr[i].getElementsByTagName('td')[5].innerText);
                var filterStokCondition = !filterStok || (filterStok && stok !== 0);

                // Filter by Terjual
                var terjual = parseInt(tr[i].getElementsByTagName('td')[6].innerText);
                var filterTerjualCondition = !filterTerjual || (filterTerjual && terjual !== 0);

                // Apply Filters
                if (nameFilter && filterStokCondition && filterTerjualCondition) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        // Sort Table
        var switching, x, y, shouldSwitch;
        var rows = table.rows;

        if (sortValue !== 'normal') {
            switching = true;
            while (switching) {
                switching = false;
                for (i = 1; i < (rows.length - 1); i++) {
                    x = rows[i].getElementsByTagName("TD")[4].innerText;
                    y = rows[i + 1].getElementsByTagName("TD")[4].innerText;

                    var xValue = parseInt(x.replace(/[^\d]/g, ''), 10);
                    var yValue = parseInt(y.replace(/[^\d]/g, ''), 10);

                    if (sortValue === 'asc' ? (xValue > yValue) : (xValue < yValue)) {
                        shouldSwitch = true;
                        break;
                    }
                }

                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
    }

    function resetFilters() {
        document.getElementById("searchForm").reset();
        var table = document.getElementById("myTable");
        var tr = table.getElementsByTagName("tr");
        for (var i = 0; i < tr.length; i++) {
            tr[i].style.display = "";
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        window.originalTableHTML = document.getElementById('myTable').innerHTML;
    });



    // filter by name catalog ------------------------------------------------- //
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }



    // function sortTable() {
    //     var table, rows, switching, i, x, y, shouldSwitch;
    //     var sortValue = document.getElementById('sortByPrice').value;
    //     table = document.getElementById("myTable");
    //     switching = true;

    //     while (switching) {
    //         switching = false;
    //         rows = table.rows;

    //         for (i = 1; i < (rows.length - 1); i++) {
    //             x = rows[i].getElementsByTagName("TD")[3].innerText;
    //             y = rows[i + 1].getElementsByTagName("TD")[3].innerText;

    //             // Extract numeric values and convert to integers for comparison
    //             xValue = parseInt(x.replace(/[^\d]/g, ''), 10);
    //             yValue = parseInt(y.replace(/[^\d]/g, ''), 10);

    //             if (sortValue === 'asc' ? (xValue > yValue) : (xValue < yValue)) {
    //                 shouldSwitch = true;
    //                 break;
    //             }
    //         }

    //         if (shouldSwitch) {
    //             rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
    //             switching = true;
    //         }
    //     }
    // }

    // function sortTable() {
    //     var sortValue = document.getElementById('sortByPrice').value;
    //     console.log(sortValue);
    //     var table = document.getElementById('myTable');
    //     var rows = table.getElementsByTagName('tr');
    //     var switching = true;

    //     while (switching) {
    //         switching = false;

    //         for (var i = 1; i < (rows.length - 1); i++) {
    //             var x = rows[i].getElementsByTagName('td')[4];
    //             var y = rows[i + 1].getElementsByTagName('td')[4];

    //             if (sortValue === 'desc' ? (parseFloat(x.innerText) > parseFloat(y.innerText)) : (parseFloat(x.innerText) < parseFloat(y.innerText))) {
    //                 rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
    //                 switching = true;
    //                 break;
    //             }
    //         }
    //     }
    // }



    // // function sortTable() {
    //     var table, rows, switching, i, x, y,shouldSwitch;
    //     var sortValue = document.getElementById('sortByPrice').value;
    //     console.log(sortValue);
    //     table = document.getElementById("myTable");
    //     switching = true;
    //     /*Make a loop that will continue until
    //     no switching has been done:*/
    //     while (switching) {
    //         //start by saying: no switching is done:
    //         switching = false;
    //         rows = table.rows;
    //         /*Loop through all table rows (except the
    //         first, which contains table headers):*/
    //         for (i = 1; i < (rows.length - 1); i++) {
    //             //start by saying there should be no switching:
    //                 sortValue = false;
    //             /*Get the two elements you want to compare,
    //             one from current row and one from the next:*/
    //             x = rows[i].getElementsByTagName("TD")[3];
    //             y = rows[i + 1].getElementsByTagName("TD")[3];
    //             //check if the two rows should switch place:
    //             if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
    //                 //if so, mark as a switch and break the loop:
    //                 shouldSwitch = true;
    //                 break;
    //             }
    //         }

    //         if (shouldSwitch) {
    //             /*If a switch has been marked, make the switch
    //             and mark that a switch has been done:*/
    //             rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
    //             switching = true;
    //         }
    //     }
    // }

    // document.getElementById('filterName').addEventListener('keyup', filterTable);
    // document.getElementById('filterSold').addEventListener('click', filterTable);
    // document.getElementById('sortByPrice').addEventListener('change', sortTable);
</script>


<script>
    // ------------------------------------------------------- filter data katalog ----------------------------------------------------------- // 


    // document.getElementById('filter2').addEventListener('change', function() {
    //     var selectedFilter = this.value;
    //     applyFilter();
    // });

    // document.getElementById('search_keyword2').addEventListener('input', function() {
    //     applyFilter();
    // });

    // function applyFilter() {
    //     var selectedFilter = document.getElementById('filter2').value;
    //     var filterValue = document.getElementById('search_keyword2').value.toLowerCase();
    //     var rows = document.querySelectorAll('#myTable tbody tr');
    //     var noResultsMessage = document.getElementById('noResultsMessage');
    //     var matchFound = false;

    //     rows.forEach(function(row) {
    //         var cells = row.querySelectorAll('td');
    //         var matchFoundInRow = false;

    //         cells.forEach(function(cell, index) {
    //             var data = cell.textContent.toLowerCase();

    //             if (filterValue.length > 0) {
    //                 if (selectedFilter === 'semua') {
    //                     if (data.includes(filterValue)) {
    //                         matchFoundInRow = true;
    //                         matchFound = true;
    //                     }
    //                 } else if (index === parseInt(selectedFilter)) {
    //                     if (data.includes(filterValue)) {
    //                         matchFoundInRow = true;
    //                         matchFound = true;
    //                     }
    //                 }
    //             } else {
    //                 matchFoundInRow = true;
    //             }
    //         });

    //         if (matchFoundInRow) {
    //             row.style.display = '';
    //         } else {
    //             row.style.display = 'none';
    //         }
    //     });

    //     if (noResultsMessage) {
    //         if (!matchFound) {
    //             noResultsMessage.style.display = 'block';
    //         } else {
    //             noResultsMessage.style.display = 'none';
    //         }
    //     }
    // }
</script>