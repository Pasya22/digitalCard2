<?php
$this->view('templates/navbar', $data);
?>
<main>
    <div class="container-katalog">
        <div class="container-produk-katalog">
            <div class="header">
                <div class="title title-home">
                    <?php
                    foreach ($data['kategori'] as $key) :
                        if ($key['id_kategori'] == 1) {
                            echo  '<h2>Kategori Website</h2>';
                        } elseif ($key['id_kategori'] == 2) {
                            echo  '<h2>Kategori Design</h2>';
                        }
                    endforeach
                    ?>

                </div>
                <div class="icon">
                    <i class="fa-solid fa-gem"></i>
                    <span class="border"></span>
                </div>
            </div>
            <div class="button-box">
                <ul>
                    <?php foreach ($data['sub_kategori'] as $kategori) : ?>
                        <?php
                        $isActive = ($kategori['id_sub_kategori'] == $data['activeSubKategoriId']) ? 'active' : '';
                        ?>
                        <li>
                            <button class="button-cat <?= $isActive ?>" data-subkategoriid="<?= $kategori['id_sub_kategori'] ?>">
                                <?= $kategori['nama_sub_kategori'] ?>
                            </button>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="content-box">
                <?php foreach ($data['sub_kategori'] as $kategori) : ?>
                    <?php
                    $data['katalogId'] = $this->model('admin_model')->getALLKatalogSubategoriById($kategori['id_sub_kategori']);
                    // $pakets = $this->model('admin_model')->getPaketByKategoriId($kategori['id_kategori']);
                    ?>
                    <div class="contentCategory" id="content">
                        <?php foreach ($data['katalogId'] as $katalog) : ?>
                            <div class="product-1">
                                <a href="<?= BASEURL . 'Katalog/detail/' . $katalog['id_katalog'] ?>">
                                    <figure>
                                        <img src="<?= BASEURL ?>assets/img/katalog/<?= $katalog['nama_gambar'] ?>" alt=''>
                                    </figure>
                                    <div class="deskripsi">
                                        <h5><?= $katalog['nama_katalog'] ?></h5>
                                    </div>
                                </a>
                                <!-- Show associated packages -->
                            </div>

                        <?php endforeach ?>
                    </div>
                <?php endforeach ?>
            </div>

        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var activeSubKategoriId = localStorage.getItem('activeSubKategoriId');

        if (activeSubKategoriId) {
            var activeButton = $('.button-cat[data-subkategoriid="' + activeSubKategoriId + '"]');
            if (activeButton.length > 0) {
                activeButton.addClass('active');
                loadKatalogBySubKategori(activeSubKategoriId);
            }
        }

        $('.button-cat').click(function() {
            var activeSubKategoriId = $(this).data('subkategoriid');

            $('.button-cat').removeClass('active');
            $(this).addClass('active');

            localStorage.setItem('activeSubKategoriId', activeSubKategoriId);

            loadKatalogBySubKategori(activeSubKategoriId);
        });

        function loadKatalogBySubKategori(subKategoriId) {
            var container = $('.contentCategory');

            $.ajax({
                url: "<?= BASEURL . 'Katalog/getKatalogBySubKategori/' ?>" + subKategoriId,
                type: 'POST',
                dataType: 'html',
                success: function(data) {
                    container.html(data);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
</script>
<?php
$this->view('templates/footer1', $data);
?>