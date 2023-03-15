<?= $this->extend('layout'); ?>

<?= $this->section('judul'); ?>
TAMBAH KATEGORI
<?= $this->endSection('judul'); ?>

<?= $this->section('subjudul'); ?>
<?= form_button('', 'Kembali', [
    'class' => 'btn btn-danger',
    'onclick' => "location.href=('" . site_url('kategori/index') . "')"
]); ?>

<?= $this->endSection('subjudul'); ?>


<?= $this->section('isi'); ?>

<?= form_open('kategori/simpandata') ?>

<div class="form-group">
    <label for="namafilm">Nama Film</label>
    <?= form_input('namafilm', '', [
        'class' => 'form-control',
        'id' => 'namafilm',
    ]); ?>
</div>
<div class="form-group">
    <label for="namakategori">Nama Kategori</label>
    <?= form_input('namakategori', '', [
        'class' => 'form-control',
        'id' => 'namakategori',
        'autofocus' => true
    ]); ?>
</div>

<div class="form-group">
    <?= form_submit('', 'simpan', [
        'class' => 'btn btn-success'
    ]); ?>
</div>
<?= form_close(); ?>
<?= $this->endSection('isi'); ?>