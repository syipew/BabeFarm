<div style="
    background: url('<?= base_url('assets/ayam.jpg') ?>') center/cover no-repeat;
    min-height: 650px;
    padding: 40px;
">

<div style="
    max-width: 520px;
    margin: auto;
    background: white;
    padding: 30px;
    border-radius: 10px;
">

<h2 style="text-align:center; margin-bottom:25px;">Data Profil</h2>

<div class="form-group">
    <label>Nama Lengkap</label>
    <input type="text" value="<?= $profil->nama_lengkap ?>" readonly>
</div>

<div class="form-group">
    <label>Username</label>
    <input type="text" value="<?= $profil->username ?>" readonly>
</div>

<div class="form-group">
    <label>Password</label>
    <input type="password" value="<?= $profil->password ?>" readonly>
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" value="<?= $profil->email ?>" readonly>
</div>

<div class="form-group">
    <label>Nomor Telepon</label>
    <input type="text" value="<?= $profil->nomor_telepon ?>" readonly>
</div>

<div style="text-align:center; margin-top:25px;">
    <a href="<?= base_url('profil/edit') ?>"
       style="
            background:#1e2a3d;
            color:white;
            padding:10px 20px;
            text-decoration:none;
            border-radius:5px;
       ">
        Edit Data Profil
    </a>
</div>

</div>
</div>