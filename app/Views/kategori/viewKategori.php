<?= $this->extend('layout'); ?>

<?= $this->section('judul'); ?>
KATEGORI FILMS
<?= $this->endSection('judul'); ?>




<?= $this->section('subjudul'); ?>

FILM YANG TERSEDIA <br>
    
        <?php
            echo "Tanggal : " . date("Y-m-d") . "<br>";
            echo "Hari    : " . date("l") . "<br>";
            
            
            ?>
<?= $this->endSection('subjudul'); ?>


<!-- isi -->
<?= $this->section('isi'); ?>

<?= form_button('', 'Tambah Film', [
    'class' => 'btn btn-primary mb-4',
    'onclick' => "location.href=('" . site_url('kategori/formtambah') . "')"
]) ?>

<?= session()->getFlashdata('sukses'); ?>

<table class="table table-striped table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>nama film</th>
            <th>nama kategori</th>
            <th style="width: 15%;">aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor = 1;
        foreach ($tampildata as $row) :
        ?>

            <tr>
                <td><?= $nomor++; ?></td>
                <td><?= $row['film']; ?></td>
                <td><?= $row['kategNama']; ?></td>
                <td>
                    <button type="button" class="btn btn-success" onclick="edit('<?= $row['kategId'] ?>')">
                        <i>Edit</i>
                    </button>

                    <form method="POST" action="/kategori/hapus/<?= $row['kategId'] ?>" style="display: inline;" onsubmit="return hapus();">
                        <input type="hidden" value="Hapus" name="_method">
                        <button type="submit" class="btn btn-danger">
                            <i>Hapus</i>
                        </button>
                    </form>

                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>

<script>
    function edit(id) {
        window.location = ('/kategori/formedit/' + id);
    }

    function hapus() {
        pesan = confirm('Data Ingin Dihapus ??');

        if (pesan) {
            return true;
        } else {
            return false;
        }
    }
</script>

<?= $this->endSection('isi'); ?>