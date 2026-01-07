<div class="container mt-5">
    <style>
        body {
            background: url('<?= base_url('assets/produksi.jpg') ?>') center/cover no-repeat fixed;
            background-size: cover;
            min-height: 100vh;
            padding-bottom: 30px;
        }

        .data-produksi-container {
            background-color: rgba(255, 255, 255, 0.45);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .judul-produksi {
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 25px;
            color: #10375C;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }

        .judul-produksi:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(to right, #10375C, #f0ad4e);
            border-radius: 2px;
        }

        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding: 15px 20px;
            background: linear-gradient(to right, rgba(16, 55, 92, 0.05), rgba(240, 173, 78, 0.05));
            border-radius: 10px;
        }

        .btn-tambah {
            background: linear-gradient(to right, #10375C, #1a4d7c);
            color: #ffffff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(16, 55, 92, 0.3);
            transition: all 0.3s ease;
        }

        .btn-tambah:hover {
            background: linear-gradient(to right, #0d2f4f, #163f66);
            color: #ffffff;
        }

        .info-box {
            background-color: #f8f9fa;
            padding: 10px 15px;
            border-radius: 8px;
            border-left: 4px solid #10375C;
            font-weight: 500;
            color: #495057;
        }

        .table-responsive-custom {
            overflow-x: auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .tabel-produksi {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 0 1px rgba(0,0,0,0.05);
            width: 100%;
            margin-bottom: 0;
        }

        .tabel-produksi thead th {
            background: linear-gradient(to right, #10375C, #1a4d7c);
            color: #fff;
            text-align: center;
            vertical-align: middle;
            padding: 16px 12px;
            font-weight: 600;
            border: none;
            white-space: nowrap;
        }

        .tabel-produksi tbody td {
            vertical-align: middle;
            text-align: center;
            padding: 14px 12px;
            border-top: 1px solid #eaeaea;
        }

        .tabel-produksi tbody tr {
            transition: all 0.2s ease;
        }

        .tabel-produksi tbody tr:nth-child(even) {
            background-color: #f9fafc;
        }

        .tabel-produksi tbody tr:hover {
            background-color: #f0f6ff;
            transform: scale(1.002);
            box-shadow: 0 3px 8px rgba(0,0,0,0.05);
        }

        .badge-jenis {
            background-color: #e9f7fe;
            color: #10375C;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
        }

        .badge-tanggal {
            background-color: #fef6e9;
            color: #d18a0f;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: 500;
            display: inline-block;
        }

        .badge-satuan {
            background-color: #f0f6ff;
            color: #1a4d7c;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: 500;
            display: inline-block;
        }

        .jumlah-produksi-cell {
            font-weight: 700;
            color: #28a745;
            font-size: 16px;
        }

        .btn-aksi {
            display: flex;
            gap: 8px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            padding: 8px 16px;
            transition: all 0.2s ease;
            border: none;
        }

        .btn-warning {
            background-color: #f0ad4e;
            color: #fff;
            box-shadow: 0 3px 6px rgba(240, 173, 78, 0.2);
        }

        .btn-warning:hover {
            background-color: #e09c3d;
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(240, 173, 78, 0.3);
            color: #fff;
        }

        .btn-danger {
            background-color: #d9534f;
            color: #fff;
            box-shadow: 0 3px 6px rgba(217, 83, 79, 0.2);
        }

        .btn-danger:hover {
            background-color: #c9302c;
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(217, 83, 79, 0.3);
            color: #fff;
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #6c757d;
            font-style: italic;
        }

        /* Indikator produksi tinggi */
        .produksi-tinggi {
            position: relative;
        }

        .produksi-tinggi::after {
            content: '↑';
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #28a745;
            color: white;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            font-size: 12px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .data-produksi-container {
                padding: 15px;
            }
            
            .header-actions {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .tabel-produksi thead th,
            .tabel-produksi tbody td {
                padding: 10px 8px;
                font-size: 14px;
            }
            
            .btn-aksi {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-aksi .btn {
                width: 100%;
                margin-bottom: 5px;
            }
        }
    </style>

    <div class="data-produksi-container">
        <h4 class="text-center judul-produksi">Data Produksi</h4>

        <div class="header-actions">
            <div class="info-box">
                <?php if(!empty($produksi)): ?>
                    <?php 
                    $total_produksi = 0;
                    $produksi_hari_ini = 0;
                    $today = date('Y-m-d');
                    foreach($produksi as $p) {
                        $total_produksi += $p->jumlah_produksi;
                        if (date('Y-m-d', strtotime($p->tanggal_produksi)) == $today) {
                            $produksi_hari_ini += $p->jumlah_produksi;
                        }
                    }
                    ?>
                    | Total Produksi: <span class="fw-bold"><?= $total_produksi ?></span>
                    <?php if($produksi_hari_ini > 0): ?>
                        | Hari Ini: <span class="fw-bold text-success"><?= $produksi_hari_ini ?></span>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            
            <div>
                <a href="<?= site_url('produksi/tambah_produksi') ?>" class="btn btn-primary btn-tambah">
                    <i class="fas fa-plus-circle me-2"></i> Tambah Data
                </a>
            </div>
        </div>

        <div class="table-responsive-custom">
            <table class="table table-bordered tabel-produksi">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Jenis</th>
                        <th>Tanggal Produksi</th>
                        <th>Jumlah Produksi</th>
                        <th width="10%">Satuan</th>
                        <th width="22%">Kelola</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($produksi)): ?>
                        <?php 
                        $no=1; 
                        $rata_rata = 0;
                        if (!empty($produksi)) {
                            $total = 0;
                            foreach($produksi as $p) {
                                $total += $p->jumlah_produksi;
                            }
                            $rata_rata = $total / count($produksi);
                        }
                        foreach($produksi as $p): 
                            $is_high_production = ($p->jumlah_produksi > $rata_rata * 1.5);
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <span class="badge-jenis"><?= $p->jenis_ayam ?></span>
                            </td>
                            <td>
                                <span class="badge-tanggal"><?= date('d F Y', strtotime($p->tanggal_produksi)) ?></span>
                            </td>
                            <td class="jumlah-produksi-cell <?= $is_high_production ? 'produksi-tinggi' : '' ?>">
                                <?= $p->jumlah_produksi ?>
                            </td>
                            <td>
                                <span class="badge-satuan"><?= $p->satuan ?></span>
                            </td>
                            <td>
                                <div class="btn-aksi">
                                    <a href="<?= site_url('produksi/edit_produksi/'.$p->id_produksi) ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <a href="<?= site_url('produksi/hapus/'.$p->id_produksi) ?>"
                                       onclick="return confirm('Yakin hapus data?')"
                                       class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash me-1"></i>Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="no-data">
                                <i class="fas fa-egg fa-2x mb-3 d-block"></i>
                                Data produksi belum tersedia. Silakan tambah data terlebih dahulu.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <br>
        <?php if(!empty($produksi)): ?>
        <div class="mt-4 d-flex justify-content-between align-items-center">
            <div class="small">
                <div class="d-flex gap-2">
                    <span class="badge bg-light text-dark p-2">
                        <i class="fas fa-chart-line me-1"></i>
                        Panah hijau = Produksi tinggi
                    </span>
                    <br>
                    <span class="badge bg-light text-dark p-2">
                        <i class="fas fa-calendar-day me-1"></i>
                        Produksi hari ini: <?= $produksi_hari_ini ?? 0 ?>
                    </span>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Tambahkan Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">