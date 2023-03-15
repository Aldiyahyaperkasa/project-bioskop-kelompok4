<?= $this->extend('layout'); ?>

<?= $this->section('judul'); ?>
EDIT KATEGORI
<?= $this->endSection('judul'); ?>

<?= $this->section('subjudul'); ?>
<?= form_button('', 'Kembali', [
    'class' => 'btn btn-danger',
    'onclick' => "location.href=('" . site_url('kategori/index') . "')"
]); ?>

<?= $this->endSection('subjudul'); ?>


<?= $this->section('isi'); ?>
<?= session()->getFlashdata('error'); ?>
<?= form_open('kategori/updatedata', '', [
    'idkategori' => $id
]) ?>

<div class="form-group">
    <label for="namafilm">Nama Film</label>
    <?= form_input('namafilm', $film, [
        'class' => 'form-control',
        'id' => 'namafilm',
    ]); ?>
</div>
<div class="form-group">
    <label for="namakategori">Nama Kategori</label>
    <?= form_input('namakategori', $nama, [
        'class' => 'form-control',
        'id' => 'namakategori',
    ]); ?>
</div>

<div class="form-group">
    <?= form_submit('', 'update', [
        'class' => 'btn btn-success'
    ]); ?>
</div>
<?= form_close(); ?>
<?= $this->endSection('isi'); ?>