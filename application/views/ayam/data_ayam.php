<div class="container mt-5">

<style>
body {
    background: url("<?= base_url('assets/ayam.png') ?>") no-repeat center center fixed;
    background-size: cover;
}

.judul-ayam {
    font-weight: 700;
    font-size: 26px;
    margin-bottom: 20px;
    color: #fff;
}

.tabel-ayam {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 6px 18px rgba(0,0,0,.1);
    width: 100%;
}

.tabel-ayam thead th {
    background-color: #10375C;
    color: #fff;
    text-align: center;
    vertical-align: middle;
}

.tabel-ayam tbody td {
    vertical-align: middle;
    text-align: center;
}

.tabel-ayam tbody tr:hover {
    background-color: #f4f6fa;
}

.btn {
    border-radius: 6px;
    font-size: 14px;
}

.btn-primary {
    background-color: #10375C;
    border: none;
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

<h4 class="text-center judul-ayam">Data Ayam</h4>

<div class="d-flex justify-content-end mb-3">
    <a href="<?= base_url('ayam/tambah') ?>" class="btn btn-primary btn-sm">
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

<table class="table table-bordered tabel-ayam">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th>Jenis</th>
            <th>Tanggal Masuk</th>
            <th>Jumlah Tambah</th>
            <th>Umur Awal</th>
            <th>Jumlah Mati</th>
            <th>Jumlah</th>
            <th width="20%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($ayam as $a): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $a->jenis_ayam ?></td>
            <td><?= date('d F Y', strtotime($a->tanggal_masuk)) ?></td>
            <td><?= $a->jumlah_tambah ?></td>
            <td><?= $a->umur_awal ?></td>
            <td><?= $a->jumlah_mati ?></td>
            <td><?= $a->jumlah_ayam ?></td>
            <td>
                <a href="<?= base_url('ayam/edit/'.$a->id_kandang) ?>" class="btn btn-warning btn-sm">Edit</a>
                <form action="<?= base_url('ayam/hapus/'.$a->id_kandang) ?>" 
                    method="post" 
                    style="display:inline;"
                    onsubmit="return confirm('Yakin mau menghapus data ayam ini?')">

                    <input type="hidden" name="hapus" value="1">

                    <button type="submit" class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

</div>
