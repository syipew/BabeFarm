<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .bg {
        background: url("<?= base_url('assets/img/ayam.jpg') ?>") center/cover no-repeat;
        min-height: 100vh;
        position: relative;
    }

    .bg::after {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.55);
    }

    .container-form {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .card {
        background: #f8f8f8;
        width: 420px;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    }

    .card h2 {
        text-align: center;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 12px;
    }

    label {
        font-size: 13px;
        color: #333;
        display: block;
        margin-bottom: 4px;
    }

    input {
        width: 100%;
        padding: 8px;
        border: 1px solid #aaa;
        border-radius: 4px;
    }

    .btn-group {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .btn {
        padding: 8px 20px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        font-weight: bold;
    }

    .btn-back {
        background: #1e2a3d;
        color: white;
    }

    .btn-save {
        background: #f1c40f;
        color: black;
    }

    .title-top {
        position: absolute;
        top: 20px;
        left: 30px;
        color: #aaa;
        letter-spacing: 1px;
        font-size: 14px;
        z-index: 2;
    }
</style>

<div class="bg">

    <div class="container-form">
        <div class="card">
            <h2>Edit Data Kesehatan</h2>

            <form action="#" method="post">
                <div class="form-group">
                    <label>Jenis Ayam</label>
                    <input type="text" name="jenis_ayam">
                </div>

                <div class="form-group">
                    <label>Tangggal_Pemeriksaan</label>
                    <input type="date" name="tanggal_pemeriksaan">
                </div>

                <div class="form-group">
                    <label>Penyakit</label>
                    <input type="text" name="penyakit">
                </div>

                <div class="form-group">
                    <label>Gejala</label>
                    <input type="text" name="gejala">
                </div>

                <div class="form-group">
                    <label>Tindakan</label>
                    <input type="text" name="tindakan">
                </div>

                <div class="form-group">
                    <label>Kelola</label>
                    <input type="text" name="kelola">
                </div>

                <div class="btn-group">
                    <a href="<?= base_url('kesehatan') ?>" class="btn btn-back">Kembali</a>
                    <button class="btn btn-save">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>
