<footer>

</footer>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->


<script src="https://kit.fontawesome.com/09e00d7278.js" crossorigin="anonymous"></script>
<script src="<?= BASEURL; ?>js/script.js"></script>
<script>
    //-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- - filter data transaksi-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- - // 
    document.addEventListener('DOMContentLoaded', function() {
        const statusFilter = document.getElementById('statusFilter');
        const customerSearch = document.getElementById('customerSearch');
        const amountSearch = document.getElementById('amountSearch');
        const ascCheckbox = document.getElementById('ascCheckbox');

        const tableRows = document.querySelectorAll('#myTable tbody tr');

        function filterTable() {
            const selectedStatus = statusFilter.value.toLowerCase();
            const customerQuery = customerSearch.value.toLowerCase();
            const amountQuery = amountSearch.value.toLowerCase();

            tableRows.forEach(row => {
                const status = row.querySelector('td:nth-child(9)').textContent.toLowerCase();
                console.log('status', status);
                const customer = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                const amount = row.querySelector('td:nth-child(7)').textContent.toLowerCase();

                const statusMatch = selectedStatus === 'all' || status === selectedStatus;
                const customerMatch = customer.includes(customerQuery);
                const amountMatch = amount.includes(amountQuery);

                if (statusMatch && customerMatch && amountMatch) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function sortTable(ascending) {
            const rows = Array.from(tableRows);

            rows.sort((a, b) => {
                const aValue = parseInt(a.querySelector('td:nth-child(1)').textContent);
                const bValue = parseInt(b.querySelector('td:nth-child(1)').textContent);

                if (ascending) {
                    return aValue - bValue;
                } else {
                    return bValue - aValue;
                }
            });

            const tbody = document.querySelector('#myTable tbody');

            rows.forEach(row => {
                tbody.appendChild(row);
            });
        }

        statusFilter.addEventListener('change', filterTable);
        customerSearch.addEventListener('input', filterTable);
        amountSearch.addEventListener('input', filterTable);
        ascCheckbox.addEventListener('change', () => sortTable(ascCheckbox.checked));
    });
</script>
<script>
    // sort user ===================================================== -------------------------- //

    document.addEventListener('DOMContentLoaded', function() {
        var ascButton = document.getElementById('ascOption');
        var descButton = document.getElementById('descOption');
        // var table = document.getElementById('myUser').getElementsByTagName('tbody')[0];
        // var rows = table.getElementsByTagName('tr');
        // var ascending = true;

        ascOption.addEventListener('click', function() {
            sortTable('asc');
        });

        descOption.addEventListener('click', function() {
            sortTable('desc');
        });

        function sortTable(sortDirection) {
            var table = document.getElementById('myUser').getElementsByTagName('tbody')[0];
            var rows = table.getElementsByTagName('tr');
            var arr = Array.from(rows);

            arr.sort(function(row1, row2) {
                var cell1 = row1.cells[0].textContent.trim();
                var cell2 = row2.cells[0].textContent.trim();

                if (sortDirection === 'asc') {
                    return cell1 - cell2;
                } else if (sortDirection === 'desc') {
                    return cell2 - cell1;
                }
            });

            for (var i = 0; i < arr.length; i++) {
                table.appendChild(arr[i]);
            }
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        var roleFilter = document.getElementById('roleFilter');
        var activasiFilter = document.getElementById('activasiFilter');
        var userSearch = document.getElementById('userSearch');
        // var sscCheckbox = document.getElementById('sscCheckbox'); // Sesuaikan dengan nama yang benar
        var table = document.getElementById('myUser');

        function applyFilters() {
            var roleValue = roleFilter.value;
            var activasiValue = activasiFilter.value;
            var searchTerm = userSearch.value.toLowerCase();
            // var isAscending = sscCheckbox.checked;

            var rows = table.querySelectorAll('tbody tr');

            rows.forEach(function(row) {
                var email = row.cells[1].textContent.toLowerCase();
                var username = row.cells[2].textContent.toLowerCase();
                var role = row.cells[3].textContent.toLowerCase();
                var activasi = row.cells[4].textContent.toLowerCase();

                var showRow = true;

                if (roleValue !== 'all' && role !== roleValue) {
                    showRow = false;
                }

                if (activasiValue !== 'all' && activasi !== activasiValue) {
                    showRow = false;
                }

                if (searchTerm !== '' && (email.indexOf(searchTerm) === -1 && username.indexOf(searchTerm) === -1)) {
                    showRow = false;
                }

                row.style.display = showRow ? '' : 'none';
            });
        }

        roleFilter.addEventListener('change', applyFilters);
        activasiFilter.addEventListener('change', applyFilters);
        userSearch.addEventListener('input', applyFilters);
        // sscCheckbox.addEventListener('change', applyFilters); // Perbaikan di sini
    });
    // sort user ===================================================== -------------------------- //
</script>


<!----------------------------------------------------- dropdown transaksi ------------------------------------------------->
<script>
    const dropdown = document.getElementById('statusFilter');
    const icon = document.querySelector('.icon-dropdown');

    dropdown.addEventListener('change', function() {
        icon.classList.add('active');
        icon.style.transform = 'rotate(90deg)';
    });

    dropdown.addEventListener('click', function(event) {
        event.stopPropagation(); // Mencegah event klik dari menyebar ke elemen dokumen
        if (!icon.classList.contains('active')) {
            icon.style.transform = 'rotate(180deg)';
        } else {
            icon.style.transform = 'rotate(0deg)';
        }
        icon.classList.toggle('active');
    });

    document.addEventListener('click', function() {
        icon.classList.remove('active');
        icon.style.transform = 'rotate(0deg)';
    });
</script>
<!-- =========================================== data paket ========================================================== -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var paket = document.getElementById('paket');
        var fiturFilter = document.getElementById('fitur');
        // var ascOption = document.getElementById('ascOption');
        // var descOption = document.getElementById('descOption');
        var table2 = document.getElementById('datatable');

        function applyFilters() {
            var paketValue = paket.value;
            var fiturValue = fiturFilter.value.toLowerCase();

            var rows = table2.querySelectorAll('tbody tr');

            rows.forEach(function(row) {
                var nama_paket = row.cells[2].textContent.toLowerCase();
                var nama_kategori = row.cells[3].textContent.toLowerCase();
                var fitur = row.cells[4].textContent.toLowerCase();

                var showRow = true;

                if (paketValue !== 'all' && nama_kategori !== paketValue) {
                    showRow = false;
                }

                if (fiturValue !== '' && (fitur.indexOf(fiturValue) === -1 && nama_paket.indexOf(fiturValue) === -1)) {
                    showRow = false;
                }

                row.style.display = showRow ? '' : 'none';
            });
        }

        function sortTable(sortDirection) {
            var rowsArray = Array.from(table.rows);

            rowsArray.sort(function(row1, row2) {
                var cell1 = row1.cells[0].textContent.trim();
                var cell2 = row2.cells[0].textContent.trim();

                if (sortDirection === 'asc') {
                    return cell1 - cell2;
                } else if (sortDirection === 'desc') {
                    return cell2 - cell1;
                }
            });

            for (var i = 0; i < rowsArray.length; i++) {
                table.appendChild(rowsArray[i]);
            }
        }

        ascOption.addEventListener('click', function() {
            sortTable('asc');
        });

        descOption.addEventListener('click', function() {
            sortTable('desc');
        });

        paket.addEventListener('change', applyFilters);
        fiturFilter.addEventListener('input', applyFilters);
    });
</script>
<!-- =========================================== data paket ========================================================== -->



<!-- ==================================================== data report ============================================================= -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= BASEURL . 'jspdf/dist/html2pdf.bundle.min.js' ?>"></script>
<script src="<?= BASEURL . 'jsexcel/dist/xlsx.full.min.js' ?>"></script>
<!-- <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        TableTools.DEFAULTS.aButtons = ["copy", "csv", "xls"];

        $('#laporanBody').dataTable({
            "sDom": 'T<"clear">lfrtip'
        });
    });
</script> -->
<script>
    $(document).ready(function() {
        $("#filterForm").submit(function(e) {
            e.preventDefault();
            var startDate = $("#tanggal_mulai").val() + ' 00:01:01';
            var endDate = $("#tanggal_selesai").val() + ' 23:59:59';

            startDate = new Date(startDate);
            endDate = new Date(endDate);

            $("#laporanBody tr").each(function() {
                var rowDate = new Date($(this).find("td:eq(2)").text()); // Ubah angka (1) sesuai dengan kolom tanggal masuk

                if (rowDate >= startDate && rowDate <= endDate) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
<script>
    var filterApplied = false;

    function exportToExcel() {
        var dataToExport = filterApplied ? getFilteredData() : getAllData();
        var ws = XLSX.utils.aoa_to_sheet(dataToExport);

        // Konfigurasi kolom untuk memformat field
        ws["!cols"] = [{
                wch: 15
            },
            {
                wch: 15
            },
            {
                wch: 15
            },
            {
                wch: 10
            },
            {
                wch: 15
            } // Ubah wch dari 10 menjadi 15 untuk memperluas lebar kolom total
        ];


        var wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
        XLSX.writeFile(wb, 'Report.xlsx');
    }

    function getAllData() {
        var table = document.getElementById("laporanTable");
        var rows = table.getElementsByTagName("tr");
        var allData = [];


        var headerRow = [];
        var headerCols = rows[0].querySelectorAll("th");
        for (var k = 0; k < headerCols.length; k++) {
            headerRow.push(headerCols[k].innerText);
        }
        allData.push(headerRow);

        for (var i = 0; i < rows.length; i++) {
            var cols = rows[i].getElementsByTagName("td");
            var row = [];

            for (var j = 0; j < cols.length; j++) {
                row.push(cols[j].innerText);
            }

            allData.push(row);
            console.log(allData);
        }

        // Tambahkan baris total
        // var totalRow = document.getElementById("totalOmset");
        // totalRow.style.display = "none";

        // var totalRow = ["", "", "", "", 'total'].document.getElementById("totalOmset").innerText;
        // totalRow.push("", "", "", "", "Total :", document.getElementById("totalOmset").innerText);
        // allData.push(totalRow);
        // Tambahkan kolom kosong untuk "Total"


        return allData;
    }

    // Event listener untuk form filter
    document.getElementById("filterForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Menghindari pengiriman form
        displayData(); // Tampilkan data setelah filter
    });

    function displayData() {
        var filteredData = getFilteredData();
        var tableBody = document.getElementById("laporanBody");
        var total = 0;
        tableBody.innerHTML = ""; // Bersihkan konten tabel

        for (var i = 0; i < filteredData.length; i++) {
            var row = document.createElement("tr");

            for (var j = 0; j < filteredData[i].length; j++) {
                var cell = document.createElement("td");
                cell.textContent = filteredData[i][j];
                row.appendChild(cell);
                if (i > 0) { // Melewati baris header
                    total += parseInt(row[5].replace("Rp.", "").replace(".", "").trim());
                }
            }

            tableBody.appendChild(row);

        }


        filterApplied = filteredData.length > 1; // Periksa apakah ada data selain header
    }

    function updateTotalOmset() {
        var total = 0;
        var rows = document.getElementById("laporanBody").getElementsByTagName("tr");
        console.log(rows);
        for (var i = 1; i < rows.length; i++) { // Dimulai dari 1 untuk melewati baris header
            var cols = rows[i].getElementsByTagName("td");
            var totalCol = cols[5]; // Kolom total (indeks 5)
            if (totalCol) {
                var value = totalCol.innerHTML.replace("Rp.", "").replace(".", "").trim();
                total += parseInt(value);
            }
        }

        document.getElementById("totalOmset").innerHTML = 'Rp.' + numberWithCommas(total);
    }

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function getFilteredData() {
        var startDate = new Date(document.getElementById("tanggal_mulai").value + "T00:01:01");
        var endDate = new Date(document.getElementById("tanggal_selesai").value + "T23:51:01");
        var table = document.getElementById("laporanTable");
        var rows = table.getElementsByTagName("tr");
        var filteredData = [];
        console.log("Start Date:", startDate);
        console.log("End Date:", endDate);

        var headerRow = [];
        var headerCols = rows[0].querySelectorAll("th");
        for (var k = 0; k < headerCols.length; k++) {
            headerRow.push(headerCols[k].innerText);
        }
        filteredData.push(headerRow);

        for (var i = 1; i < rows.length; i++) {
            var cols = rows[i].querySelectorAll("td");

            var trxDate = new Date(cols[2].innerText);
            console.log("trxdat", trxDate);
            if (trxDate >= startDate && trxDate <= endDate) {
                var row = [];

                for (var j = 0; j < cols.length; j++) {
                    row.push(cols[j].innerText);
                }
                updateTotalOmset()
                filteredData.push(row);
                console.log(cols);
            }
        }

        filterApplied = filteredData.length > 1; // Periksa apakah ada data selain header

        console.log("Rows Length:", rows.length);
        console.log("Filtered Data Length:", filteredData.length);

        return filteredData;
    }



    function exportToPDF() {
        /* Ambil konten HTML yang ingin Anda konversi */
        var element = document.getElementById('laporanTable');

        /* Konversi konten ke PDF */
        html2pdf(element);
        updateTotalOmset();
    }

    function printData() {
        window.print();
    }
</script>


<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#filterForm").submit(function(e) {
            e.preventDefault();
            var startDate = $("#tanggal_mulai").val();
            var endDate = $("#tanggal_selesai").val();

            $.ajax({
                url: "<?= BASEURL . 'Admin/filterByTanggalKeluar'; ?>",
                type: "POST",
                data: {
                    start_date: startDate,
                    end_date: endDate
                },
                dataType: 'json',
                success: function(data) {
                    $("#laporanBody").empty(); // Bersihkan isi tbody
                    $.each(data, function(i, item) {

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

<!-- ===================================================== end data report ============================================================ -->
<!----------------------------------------------------- dropdown transaksi ------------------------------------------------->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/super-build/ckeditor.js"></script>

<script>
    // This sample still does not showcase all CKEditor&nbsp;5 features (!)
    // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
    CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        toolbar: {
            items: [
                'exportPDF', 'exportWord', '|',
                'findAndReplace', 'selectAll', '|',
                'heading', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                'alignment', '|',
                'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                'textPartLanguage', '|',
                'sourceEditing'
            ],
            shouldNotGroupWhenFull: true

        },
        // Changing the language of the interface requires loading the language file using the <script> tag.
        // language: 'es',
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
        heading: {
            options: [{
                    model: 'paragraph',
                    title: 'Paragraph',
                    class: 'ck-heading_paragraph'
                },
                {
                    model: 'heading1',
                    view: 'h1',
                    title: 'Heading 1',
                    class: 'ck-heading_heading1'
                },
                {
                    model: 'heading2',
                    view: 'h2',
                    title: 'Heading 2',
                    class: 'ck-heading_heading2'
                },
                {
                    model: 'heading3',
                    view: 'h3',
                    title: 'Heading 3',
                    class: 'ck-heading_heading3'
                },
                {
                    model: 'heading4',
                    view: 'h4',
                    title: 'Heading 4',
                    class: 'ck-heading_heading4'
                },
                {
                    model: 'heading5',
                    view: 'h5',
                    title: 'Heading 5',
                    class: 'ck-heading_heading5'
                },
                {
                    model: 'heading6',
                    view: 'h6',
                    title: 'Heading 6',
                    class: 'ck-heading_heading6'
                }
            ]
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: 'Welcome to CKEditor&nbsp;5!',
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        fontSize: {
            options: [10, 12, 14, 'default', 18, 20, 22],
            supportAllValues: true
        },
        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
        htmlSupport: {
            allow: [{
                name: /.*/,
                attributes: true,
                classes: true,
                styles: true
            }]
        },
        // Be careful with enabling previews
        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
        htmlEmbed: {
            showPreviews: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
        mention: {
            feeds: [{
                marker: '@',
                feed: [
                    '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                    '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                    '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                    '@sugar', '@sweet', '@topping', '@wafer'
                ],
                minimumCharacters: 1
            }]
        },
        // The "super-build" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
        removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',
            'CKBox',
            'CKFinder',
            'EasyImage',
            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType.
            'MathType',
            // The following features are part of the Productivity Pack and require additional license.
            'SlashCommand',
            'Template',
            'DocumentOutline',
            'FormatPainter',
            'TableOfContents',
            'PasteFromOfficeEnhanced'
        ]
    });
</script>
<script>
    $('input').focus(function() {
        $(this).parents('.form-group').addClass('focused');
    });

    $('input').blur(function() {
        var inputValue = $(this).val();
        if (inputValue == "") {
            $(this).removeClass('filled');
            $(this).parents('.form-group').removeClass('focused');
        } else {
            $(this).addClass('filled');
        }
    })
</script>
<script>
    var btnMenu = document.getElementById('btn-menu-admin');
    var sidebar = document.getElementById('sidebarAdmin');
    var ctnAdmin = document.getElementById('contentAdmin');
    btnMenu.addEventListener('click', function() {
        if (sidebar.style.display === "none") {
            sidebar.style.display = "block";
        } else {
            sidebar.style.display = "none";
            ctnAdmin.style.width = "100%";
        }
    })
</script>
<script>
    const previewImage = (event) => {
        /**
         * Get the selected files.
         */
        const imageFiles = event.target.files
        /**
         * Count the number of files selected.
         */
        const imageFilesLength = imageFiles.length
        /**
         * If at least one image is selected, then proceed to display the preview.
         */
        if (imageFilesLength > 0) {
            /**
             * Get the image path.
             */
            const imageSrc = URL.createObjectURL(imageFiles[0])
            /**
             * Select the image preview element.
             */
            const imagePreviewElement = document.querySelector("#preview-selected-image")
            const imageBefore = document.querySelector("#gambarLama")
            /**
             * Assign the path to the image preview element.
             */
            imagePreviewElement.src = imageSrc
            /**
             * Show the element by changing the display value to "block".
             */
            imagePreviewElement.style.display = "block"
            imageBefore.style.display = "none"
        }
    }

    const previewImage2 = (event) => {
        /**
         * Get the selected files.
         */
        const imageFiles = event.target.files
        /**
         * Count the number of files selected.
         */
        const imageFilesLength = imageFiles.length
        /**
         * If at least one image is selected, then proceed to display the preview.
         */
        if (imageFilesLength > 0) {
            /**
             * Get the image path.
             */
            const imageSrc = URL.createObjectURL(imageFiles[0])
            /**
             * Select the image preview element.
             */
            const imagePreviewElement = document.querySelector("#preview-selected-image2")
            const imageBefore = document.querySelector("#gambarLama2")
            /**
             * Assign the path to the image preview element.
             */
            imagePreviewElement.src = imageSrc
            /**
             * Show the element by changing the display value to "block".
             */
            imagePreviewElement.style.display = "block"
            imageBefore.style.display = "none"
        }
    }

    const previewImage3 = (event) => {
        /**
         * Get the selected files.
         */
        const imageFiles = event.target.files
        /**
         * Count the number of files selected.
         */
        const imageFilesLength = imageFiles.length
        /**
         * If at least one image is selected, then proceed to display the preview.
         */
        if (imageFilesLength > 0) {
            /**
             * Get the image path.
             */
            const imageSrc = URL.createObjectURL(imageFiles[0])
            /**
             * Select the image preview element.
             */
            const imagePreviewElement = document.querySelector("#preview-selected-image3")
            const imageBefore = document.querySelector("#gambarLama3")
            /**
             * Assign the path to the image preview element.
             */
            imagePreviewElement.src = imageSrc
            /**
             * Show the element by changing the display value to "block".
             */
            imagePreviewElement.style.display = "block"
            imageBefore.style.display = "none"
        }
    }

    const previewImage4 = (event) => {
        /**
         * Get the selected files.
         */
        const imageFiles = event.target.files
        /**
         * Count the number of files selected.
         */
        const imageFilesLength = imageFiles.length
        /**
         * If at least one image is selected, then proceed to display the preview.
         */
        if (imageFilesLength > 0) {
            /**
             * Get the image path.
             */
            const imageSrc = URL.createObjectURL(imageFiles[0])
            /**
             * Select the image preview element.
             */
            const imagePreviewElement = document.querySelector("#preview-selected-image4")
            const imageBefore = document.querySelector("#gambarLama4")
            /**
             * Assign the path to the image preview element.
             */
            imagePreviewElement.src = imageSrc
            /**
             * Show the element by changing the display value to "block".
             */
            imagePreviewElement.style.display = "block"
            imageBefore.style.display = "none"
        }
    }

    const previewImage5 = (event) => {
        /**
         * Get the selected files.
         */
        const imageFiles = event.target.files
        /**
         * Count the number of files selected.
         */
        const imageFilesLength = imageFiles.length
        /**
         * If at least one image is selected, then proceed to display the preview.
         */
        if (imageFilesLength > 0) {
            /**
             * Get the image path.
             */
            const imageSrc = URL.createObjectURL(imageFiles[0])
            /**
             * Select the image preview element.
             */
            const imagePreviewElement = document.querySelector("#preview-selected-image5")
            const imageBefore = document.querySelector("#gambarLama5")
            /**
             * Assign the path to the image preview element.
             */
            imagePreviewElement.src = imageSrc
            /**
             * Show the element by changing the display value to "block".
             */
            imagePreviewElement.style.display = "block"
            imageBefore.style.display = "none"
        }
    }
</script>
</body>

</html>

<script>
    // function previewImage(event) {
    //     var input = event.target;
    //     var preview = document.getElementById('preview');

    //     var reader = new FileReader();
    //     reader.onload = function () {
    //         preview.src = reader.result;
    //     };
    //     reader.readAsDataURL(input.files[0]);
    // }
</script>