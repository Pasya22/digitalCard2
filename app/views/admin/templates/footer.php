<footer>

</footer>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
                const status = row.querySelector('td:nth-child(8)').textContent.toLowerCase();
                console.log('status', status);
                const customer = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const amount = row.querySelector('td:nth-child(6)').textContent.toLowerCase();

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
                const aValue = parseInt(a.querySelector('td:nth-child(6)').textContent);
                const bValue = parseInt(b.querySelector('td:nth-child(6)').textContent);

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
    // Dapatkan elemen dropdown dan ikon
    const dropdown = document.getElementById('statusFilter');
    const icon = document.querySelector('.icon-dropdown');

    // Tambahkan event listener untuk mengubah ikon ketika dropdown dipilih
    dropdown.addEventListener('change', function() {
        icon.classList.add('active');
        icon.style.transform = 'rotate(90deg)';
    });

    // Tambahkan event listener untuk mengubah ikon ketika dropdown di-hover
    dropdown.addEventListener('mouseover', function() {
        if (!icon.classList.contains('active')) {
            icon.style.transform = 'rotate(0deg)';
        }
    });

    // Kembalikan ikon ke posisi normal saat mouse meninggalkan dropdown
    dropdown.addEventListener('mouseout', function() {
        if (!icon.classList.contains('active')) {
            icon.style.transform = 'rotate(180deg)';
        }
    });

    // Tambahkan event listener untuk membatalkan perubahan ikon saat ikon di-klik kembali
    icon.addEventListener('click', function(event) {
        event.stopPropagation(); // Menghentikan event klik dari memicu event listener dokumen
        icon.classList.remove('active');
        icon.style.transform = 'rotate(0deg)';
    });

    // Tambahkan event listener ke elemen dokumen untuk menanggapi klik di luar dropdown atau ikon
    document.addEventListener('click', function() {
        icon.classList.remove('active');
        icon.style.transform = 'rotate(0deg)';
    });
</script>
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