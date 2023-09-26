<main>
    <div class="container-content">
        <div class="breadcrumbs-box p2 mt2">
            <div class="title">
                <h2>Tambah Penyuluhan</h2>
            </div>
            <div class="breadcrumbs mt1">
                <ul class="">
                    <li>
                        <a href="<?= BASEURL ?>Petugas/penyuluh">Data Penyuluhan</a>
                    </li>
                    <li>
                        <p>*</p>
                    </li>
                    <li>
                        <a href="<?= BASEURL ?>Petugas/ubahPenyuluh/<?= $data['penyuluh'][0]['penyuluh_id'] ?>">Ubah Penyuluh</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container-laporan-penyuluh mt2">
            <div class="content-penyuluh p2">
                <form action="<?= BASEURL; ?>Petugas/ubahPenyuluhPetugas" method="post" enctype="multipart/form-data">
                    <div class="content-box">
                        <input type="hidden" name="user_id" value="<?= $data['penyuluh'][0]['user_id'] ?>">
                        <input type="hidden" name="penyuluh_id" value="<?= $data['penyuluh'][0]['penyuluh_id'] ?>">
                        <div class="item mt1 input">
                            <div class="label-box">
                                <label for="name">NIP</label>
                                <p>:</p>
                            </div>
                            <input type="text" name="nip" value="<?= $data['penyuluh'][0]['nip'] ?>" placeholder="Masukan NIP" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                        </div>
                        <div class="item mt1 input">
                            <div class="label-box">
                                <label for="name">Kecamatan</label>
                                <p>:</p>
                            </div>
                            <select name="kecamatan_id" id="kecamatan" class="select" onchange="getDesa()">
                                <option value="<?= $data['kec_id']['kecamatan_id'] ?>"><?= $data['kec_id']['nama'] ?></option>
                                <?php foreach ($data['allkecamatan'] as $kec) : ?>
                                    <option value="<?= $kec['kecamatan_id'] ?>"><?= $kec['nama'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="item mt1 input">
                            <div class="label-box">
                                <label for="name">Desa</label>
                                <p>:</p>
                            </div>
                            <select name="desa_id" id="desa" class="select">
                                <option value="<?= $data['des_id']['desa_id'] ?>"><?= $data['des_id']['nama'] ?></option>
                                <option value="">a</option>
                                <option value="">b</option>
                            </select>
                        </div>
                        <div class="button-box mt2">
                            <button class="save btn-green">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>