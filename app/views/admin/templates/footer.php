<footer>

</footer>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script src="https://kit.fontawesome.com/09e00d7278.js" crossorigin="anonymous"></script>
<script src="<?= BASEURL; ?>js/script.js"></script>
<script>
    // filter data 
    // document.getElementById('nama_katalog').addEventListener('input', function() {
    //     var filterValue = this.value;
    //     var rows = document.querySelectorAll('#myTable tbody tr');

    //     rows.forEach(function(row) {
    //         var namaKatalog = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
    //         if (namaKatalog.includes(filterValue.toLowerCase())) {
    //             row.style.display = '';
    //         } else {
    //             row.style.display = 'none';
    //         }
    //     });
    // });

    //-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- - filter data transaksi-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- - // 
    document.getElementById('search_keyword').addEventListener('input', function() {
        var filterValue = this.value.toLowerCase();
        var filterBy = document.getElementById('filter').value;
        var rows = document.querySelectorAll('#myTable tbody tr');

        rows.forEach(function(row) {
            var data = row.querySelector('td:nth-child(' + (filterBy === ' ' ? 0 : filterBy === 'username' ? 2 : filterBy === 'kode_trx' ? 3 : filterBy === 'nama_katalog' ? 4 : filterBy === 'metode_trx' ? 5 : filterBy === 'jumlah' ? 6 : 7) + ')').textContent.toLowerCase();
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

    document.getElementById('searchForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah pengiriman formulir
    });
</script>

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