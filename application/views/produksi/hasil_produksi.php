<div style="
    background: url('<?= base_url('assets/produksi.jpg') ?>') center/cover no-repeat;
    min-height: 650px;
    padding: 40px;
">

    <div style="padding: 30px; min-height: 550px;">

        <h2 style="
            color: white;
            text-align: center;
            margin-bottom: 25px;
            font-weight: bold;
        ">
            Data Produksi
        </h2>

        <div style="text-align:right; margin-bottom:15px;">
            <a href="<?= site_url('produksi/tambah_produksi') ?>"
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
                    <th>Tanggal Produksi</th>
                    <th>Jumlah Produksi</th>
                    <th>Satuan</th>
                    <th>Kelola</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($produksi)): ?>
                    <?php $no=1; foreach($produksi as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->jenis_ayam ?></td>
                        <td><?= date('d F Y', strtotime($p->tanggal_produksi)) ?></td>
                        <td><?= $p->jumlah_produksi ?></td>
                        <td><?= $p->satuan ?></td>
                        <td>
                            <a href="<?= site_url('produksi/edit/'.$p->id_produksi) ?>">Edit</a> |
                            <a href="<?= site_url('produksi/hapus/'.$p->id_produksi) ?>"
                               onclick="return confirm('Yakin hapus data?')">
                               Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Data produksi belum tersedia</td>
                    </tr>
                <?php endif; ?>
            </tbody>

        </table>

    </div>
</div>

</body>
</html>
