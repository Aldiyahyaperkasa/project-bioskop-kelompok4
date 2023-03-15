<?= $this->extend('layout'); ?>


<?= $this->section('judul'); ?>
DATA FILMS
<?= $this->endSection('judul'); ?>


<?= $this->section('subjudul'); ?>
RINCIAN DATA FILM YANG TERSEDIA
<?= $this->endSection('subjudul'); ?>


<?= $this->section('isi'); ?>

<button type="button" class="btn btn-primary mb-4" onclick="location.href=('/film/tambah')">
    Tambah Data Film
</button>
<?= session()->getFlashdata('sukses'); ?>
<?= session()->getFlashdata('error'); ?>

<table class="table table-striped table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>kode film</th>
            <th>jadwal ditayangkan</th>
            <th>nama kategori film</th>
            <th>harga film</th>
            <th style="width: 21%;">aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor = 1;
        foreach ($tampildata->getResultArray() as $row) :
        ?>

            <tr>
                <td><?= $nomor++; ?></td>
                <td><?= $row['filmkode']; ?></td>
                <td><?= $row['filmjadwal']; ?></td>
                <td><?= $row['film']; ?> - <?= $row['kategNama'] ?> </td>
                <td><?= "Rp. " . $row['filmharga']; ?></td>
                <td>
                    <button type="button" class="btn btn-info" onclick="edit('<?= $row['filmkode'] ?>')">
                        <i>Edit</i>
                    </button>

                    <form method="POST" action="/film/hapus/<?= $row['filmkode'] ?>" style="display: inline;" onsubmit="return hapus();">
                        <input type="hidden" value="Hapus" name="_method">
                        <button type="submit" class="btn btn-danger">
                            <i>Hapus</i>
                        </button>
                    </form>
                    <button type="button" class="btn btn-success" onclick="pesan('<?= $row['filmkode'] ?>')">
                        <i>Pesan</i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>

<script>
    function edit(kode) {
        window.location.href = ('/Film/edit/' + kode);
    }

    function hapus(kode) {
        pesan = confirm('Data Ingin Dihapus ??');

        if (pesan) {
            return true;
        } else {
            return false;
        }
    }
</script>

<?= $this->endSection('isi'); ?>