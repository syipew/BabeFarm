<div class="container mt-5">

<style>
body {
    background: url("<?= base_url('assets/kesehatan.jpg') ?>") no-repeat center center fixed;
    background-size: cover;
}

.judul-kesehatan {
    font-weight: 700;
    font-size: 26px;
    margin-bottom: 20px;
    color: #fff;
}

.tabel-kesehatan {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 6px 18px rgba(0,0,0,.1);
    width: 100%;
}

.tabel-kesehatan thead th {
    background-color: #10375C;
    color: #fff;
    text-align: center;
    vertical-align: middle;
}

.tabel-kesehatan tbody td {
    vertical-align: middle;
    text-align: center;
}

.tabel-kesehatan tbody tr:hover {
    background-color: #f4f6fa;
}

.btn {
    border-radius: 6px;
    font-size: 14px;
}

.btn-primary {
    background-color: #10375C;
    border: none;
    color: #fff;
}

.btn-warning {
    background-color: #f0ad4e;
    border: none;
    color: #fff;
}

.btn-danger {
    background-color: #d9534f;
    border: none;
    color: #fff;
}
</style>

<h4 class="text-center judul-kesehatan">Data Kesehatan</h4>

<div class="d-flex justify-content-end mb-3">
    <a href="<?= base_url('kesehatan/tambah') ?>" class="btn btn-primary btn-sm">
        + Tambah Data
    </a>
</div>

<?php if (!empty($alert)): ?>
<script>
window.addEventListener('load', function () {
    let icon = 'success';
    let title = 'Berhasil';
    Swal.fire({
        icon: icon,
        title: title,
        text: <?= json_encode($alert['message']) ?>,
        timer: 2000,
        showConfirmButton: false
    });
});
</script>
<?php endif; ?>

<table class="table table-bordered tabel-kesehatan">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th>Jenis</th>
            <th>Tanggal Pemeriksaan</th>
            <th>Penyakit</th>
            <th>Gejala</th>
            <th>Tindakan</th>
            <th width="20%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($kesehatan as $k): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $k->jenis_ayam ?></td>
            <td><?= date('d F Y', strtotime($k->tanggal_pemeriksaan)) ?></td>
            <td><?= $k->penyakit ?></td>
            <td><?= $k->gejala ?></td>
            <td><?= $k->tindakan ?></td>
            <td>
                <a href="<?= base_url('kesehatan/edit/'.$k->id_kesehatan) ?>" class="btn btn-warning btn-sm">Edit</a>
                <form action="<?= base_url('kesehatan/hapus/'.$k->id_kesehatan) ?>" 
                    method="post" 
                    style="display:inline;"
                    onsubmit="return confirm('Yakin mau menghapus data kesehatan ini?')">
                    <input type="hidden" name="hapus" value="1">
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

</div>
