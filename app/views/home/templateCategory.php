<?php foreach ($data['katalog'] as $katalog) : ?>
    <div class="product-1">
        <figure>
            <img src="<?= BASEURL ?>assets/img/katalog/<?= $katalog['nama_gambar'] ?>" alt=''>
        </figure>
        <div class="deskripsi">
            <h5><?= $katalog['nama_katalog'] ?></h5>
            <p><?= $katalog['harga'] ?></p>
        </div>
    </div>
<?php endforeach ?>