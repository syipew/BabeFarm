<div style="
    background: url('<?= base_url('assets/ayam-bg.jpg') ?>') center/cover no-repeat;
    min-height: 650px;
    padding: 40px;
">

    <div style="
        padding: 30px;
        min-height: 550px;
    ">

        <h2 style="
            color: white;
            text-align: center;
            margin-bottom: 25px;
            font-weight: bold;
        ">
            Data Ayam
        </h2>

        <div style="text-align:right; margin-bottom:15px;">
            <a href="<?= site_url('ayam/tambah') ?>"
               style="
                    background:#1e2a3d;
                    color:white;
                    padding:8px 16px;
                    text-decoration:none;
                    border-radius:4px;
                    font-size:14px;
               ">
                + Tambah Data
            </a>
        </div>

        <table border="1" width="100%" cellpadding="8" cellspacing="0"
               style="
                    border-collapse: collapse;
                    background: white;
                    font-size: 14px;
                    text-align: center;
               ">

            <thead style="background:#1e2a3d; color:white;">
                <tr>
                    <th>No.</th>
                    <th>Jenis</th>
                    <th>Tanggal Masuk</th>
                    <th>Jumlah Tambah</th>
                    <th>Umur Awal</th>
                    <th>Jumlah Mati</th>
                    <th>Jumlah</th>
                    <th>Kelola</th>
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
                        edit | hapus
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>

        </table>

    </div>
</div>
