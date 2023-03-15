<?= $this->extend('layout'); ?>


<?= $this->section('judul'); ?>
Form Tambah film
<?= $this->endSection('judul'); ?>


<?= $this->section('subjudul'); ?>

<button type="button" class="btn btn-danger" onclick="location.href=('/film/index')">
    Kembali
</button>
<?= $this->endSection('subjudul'); ?>


<?= $this->section('isi'); ?>

<?= form_open_multipart('film/simpandata') ?>
<?= session()->getFlashdata('error') ?>

<div class="row mb-3 justify-content-center">
    <label for="" class="col-sm-2 col-form-label">Kode Film</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="kodefilm" name="kodefilm" autofocus>
    </div>
</div>

<div class="row mb-3 justify-content-center">
    <label for="" class="col-sm-2 col-form-label">Jadwal Ditayangkan</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="jadwalfilm" name="jadwalfilm">
    </div>
</div>

<div class="row mb-3 justify-content-center">
    <label for="" class="col-sm-2 col-form-label">Pilih Kategori Film</label>
    <div class="col-sm-6">
        <select name="kategori" id="kategori" class="form-control">
            <option selected value="">Pilih Kategori Film</option>
            <?php foreach ($datakategori as $kat) : ?>
                <option value="<?= $kat['kategId'] ?>"> <?= $kat['film'] ?> </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="row mb-3 justify-content-center">
    <label for="" class="col-sm-2 col-form-label">Harga Film</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="harga" name="harga">
    </div>
</div>

<div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-8 d-flex flex-row-reverse">
        <input type="submit" class="btn btn-success" value="Simpan">
    </div>
</div>
<?= form_close() ?>
<?= $this->endSection('isi'); ?>