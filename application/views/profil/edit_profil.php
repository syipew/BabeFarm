<div style="
    background: url('<?= base_url('assets/ayam.jpg') ?>') center/cover no-repeat;
    min-height: 650px;
    padding: 40px;
">

    <div style="
        background:#f4f6f8;
        max-width:520px;
        margin:0 auto;
        padding:30px;
        border-radius:10px;
    ">

        <h2 style="text-align:center; margin-bottom:25px;">
            Edit Data Profil
        </h2>

        <form action="<?= base_url('profil/update') ?>" method="post">

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap"
                       value="<?= $profil->nama_lengkap ?>" required>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username"
                       value="<?= $profil->username ?>" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password"
                       value="<?= $profil->password ?>" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email"
                       value="<?= $profil->email ?>" required>
            </div>

            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" name="nomor_telepon"
                       value="<?= $profil->nomor_telepon ?>" required>
            </div>

            <div style="text-align:center; margin-top:25px;">
                <a href="<?= base_url('profil') ?>"
                   style="
                        background:#1e2a3d;
                        color:white;
                        padding:10px 20px;
                        text-decoration:none;
                        border-radius:5px;
                        margin-right:10px;
                   ">
                    Kembali
                </a>

                <button type="submit"
                        style="
                            background:#f1c40f;
                            padding:10px 25px;
                            border:none;
                            border-radius:5px;
                            font-weight:bold;
                        ">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>