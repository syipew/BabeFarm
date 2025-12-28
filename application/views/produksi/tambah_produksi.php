<style>
    body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.bg {
    background: url("<?= base_url('assets/ayam.jpg') ?>") center/cover no-repeat;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.card {
    background: #f4f6f6;
    width: 460px;
    padding: 30px 35px;
    border-radius: 16px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.25);
}

.card h2 {
    text-align: center;
    margin-bottom: 22px;
    font-size: 20px;
}

.form-group {
    margin-bottom: 10px;
}

label {
    font-size: 12px;
    color: #444;
    display: block;
    margin-bottom: 4px;
}

input {
    width: 100%;
    padding: 7px 8px;
    border-radius: 4px;
    border: 1px solid #bfc5c7;
    font-size: 13px;
}

.btn-group {
    display: flex;
    justify-content: center;
    gap: 14px;
    margin-top: 18px;
}

.btn {
    padding: 7px 22px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    font-size: 13px;
    font-weight: bold;
}

.btn-back {
    background: #1f3a5f;
    color: #fff;
    text-decoration: none;
}

.btn-save {
    background: #f1c40f;
    color: #000;
}

</style>

<div class="bg">
    <div class="container-form">
        <div class="card">
            <h2>Tambah Data Produksi</h2>

            <form action="<?= site_url('produksi/simpan') ?>" method="post">

                <div class="form-group">
                    <label>Tanggal Produksi</label>
                    <input type="date" name="tanggal_produksi" required>
                </div>

                <div class="form-group">
                    <label>Jumlah Produksi</label>
                    <input type="number" name="jumlah_produksi" required>
                </div>

                <div class="form-group">
                    <label>Satuan</label>
                    <input type="text" name="satuan" placeholder="butir / kg" required>
                </div>

                <div class="form-group">
                    <label>ID Kandang</label>
                    <input type="number" name="id_kandang" required>
                </div>

                <div class="btn-group">
                    <a href="<?= site_url('produksi') ?>" class="btn btn-back">Kembali</a>
                    <button type="submit" class="btn btn-save">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>
