<style>
body {
    background: url("<?= base_url('assets/register.jpg') ?>") no-repeat center center fixed;
    background-size: cover;
}

.form-card {
    background: #ffffffee;
    border-radius: 20px;
    padding: 30px;
    max-width: 500px;
    margin: 80px auto;
    box-shadow: 0 10px 30px rgba(0,0,0,0.25);
}

.form-card h4 {
    text-align: center;
    margin-bottom: 25px;
    font-weight: 700;
}

.form-control {
    border-radius: 10px;
}

.btn {
    border-radius: 10px;
    padding: 8px 25px;
}
</style>

<div class="form-card">
    <h4>Tambah Data Pakan</h4>

    <form action="<?= base_url('pakan/tambah') ?>" method="post">
        <div class="mb-3">
            <label>Nama Pakan</label>
            <input type="text" name="nama_pakan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Stok Awal</label>
            <input type="number" name="stok_awal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Stok Sisa</label>
            <input type="number" name="stok_sisa" class="form-control" required>
        </div>

        <div class="mb-4">
            <label>Satuan</label>
            <input type="text" name="satuan" class="form-control" placeholder="Kg / Sak" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="<?= base_url('pakan') ?>" class="btn btn-dark">Kembali</a>
            <button type="submit" class="btn btn-warning">Simpan</button>
        </div>
    </form>
</div>
