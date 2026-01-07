<style>
        body {
            background: url("<?= base_url('assets/keuangan.jpg') ?>") no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            padding-bottom: 30px;
        }

        .data-keuangan-container {
            background-color: rgba(255, 255, 255, 0.45);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .judul-keuangan {
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 25px;
            color: #10375C;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }

        .judul-keuangan:after {
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

        .saldo-info {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .saldo-item {
            padding: 8px 15px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
        }

        .saldo-pemasukan {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
            border: 1px solid rgba(40, 167, 69, 0.3);
        }

        .saldo-pengeluaran {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        .saldo-total {
            background-color: rgba(16, 55, 92, 0.1);
            color: #10375C;
            border: 1px solid rgba(16, 55, 92, 0.3);
        }

        .table-responsive-custom {
            overflow-x: auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .tabel-keuangan {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 0 1px rgba(0,0,0,0.05);
            width: 100%;
            margin-bottom: 0;
        }

        .tabel-keuangan thead th {
            background: linear-gradient(to right, #10375C, #1a4d7c);
            color: #fff;
            text-align: center;
            vertical-align: middle;
            padding: 16px 12px;
            font-weight: 600;
            border: none;
            white-space: nowrap;
        }

        .tabel-keuangan tbody td {
            vertical-align: middle;
            text-align: center;
            padding: 14px 12px;
            border-top: 1px solid #eaeaea;
        }

        .tabel-keuangan tbody tr {
            transition: all 0.2s ease;
        }

        .tabel-keuangan tbody tr:nth-child(even) {
            background-color: #f9fafc;
        }

        .tabel-keuangan tbody tr:hover {
            background-color: #f0f6ff;
            transform: scale(1.002);
            box-shadow: 0 3px 8px rgba(0,0,0,0.05);
        }

        .badge-tanggal {
            background-color: #fef6e9;
            color: #d18a0f;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: 500;
            display: inline-block;
        }

        .badge-pemasukan {
            background-color: rgba(40, 167, 69, 0.15);
            color: #28a745;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
            border: 1px solid rgba(40, 167, 69, 0.3);
        }

        .badge-pengeluaran {
            background-color: rgba(220, 53, 69, 0.15);
            color: #dc3545;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        .badge-kategori {
            background-color: #e9f7fe;
            color: #1a4d7c;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: 500;
            display: inline-block;
        }

        .jumlah-pemasukan {
            font-weight: 700;
            color: #28a745;
            font-size: 16px;
        }

        .jumlah-pengeluaran {
            font-weight: 700;
            color: #dc3545;
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

        /* Indikator transaksi besar */
        .transaksi-besar {
            position: relative;
        }

        .transaksi-besar::after {
            content: '💵';
            position: absolute;
            top: -5px;
            right: -5px;
            font-size: 12px;
            background-color: rgba(255, 193, 7, 0.2);
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .data-keuangan-container {
                padding: 15px;
            }
            
            .header-actions {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .saldo-info {
                flex-direction: column;
                gap: 8px;
            }
            
            .tabel-keuangan thead th,
            .tabel-keuangan tbody td {
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
</head>
<body>

<div class="container mt-5">
    <div class="data-keuangan-container">
        <h4 class="text-center judul-keuangan">Data Keuangan</h4>

        <div class="header-actions">
            <div class="info-box">
                <?php if(!empty($keuangan)): ?>
                    <?php 
                    $total_pemasukan = 0;
                    $total_pengeluaran = 0;
                    $saldo = 0;
                    $transaksi_hari_ini = 0;
                    $today = date('Y-m-d');
                    
                    foreach($keuangan as $k) {
                        // Ubah "pendapatan" menjadi "pemasukan" untuk tampilan
                        $jenis_tampilan = ($k->jenis == 'pemasukan') ? 'pendapatan' : $k->jenis;
                        
                        if ($k->jenis == 'pemasukan') {
                            $total_pemasukan += $k->jumlah;
                            $saldo += $k->jumlah;
                        } else {
                            $total_pengeluaran += $k->jumlah;
                            $saldo -= $k->jumlah;
                        }
                        
                        if (date('Y-m-d', strtotime($k->tanggal_transaksi)) == $today) {
                            $transaksi_hari_ini++;
                        }
                    }
                    ?>
                    
                    <div class="saldo-info mt-2">
                        <span class="saldo-item saldo-pemasukan">
                            <i class="fas fa-arrow-up me-1"></i> Pendapatan: Rp <?= number_format($total_pemasukan, 0, ',', '.') ?>
                        </span>
                        <span class="saldo-item saldo-pengeluaran">
                            <i class="fas fa-arrow-down me-1"></i> Pengeluaran: Rp <?= number_format($total_pengeluaran, 0, ',', '.') ?>
                        </span>
                        <span class="saldo-item saldo-total">
                            <i class="fas fa-balance-scale me-1"></i> Saldo: Rp <?= number_format($saldo, 0, ',', '.') ?>
                        </span>
                        <?php if($transaksi_hari_ini > 0): ?>
                            <span class="saldo-item" style="background-color: rgba(23, 162, 184, 0.1); color: #17a2b8;">
                                <i class="fas fa-calendar-day me-1"></i> Hari Ini: <?= $transaksi_hari_ini ?>
                            </span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <div>
                <a href="<?= base_url('keuangan/tambah') ?>" class="btn btn-primary btn-tambah">
                    <i class="fas fa-plus-circle me-2"></i> Tambah Data
                </a>
            </div>
        </div>

        <div class="table-responsive-custom">
            <table class="table table-bordered tabel-keuangan">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Tanggal Transaksi</th>
                        <th>Jenis</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th width="22%">Kelola</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($keuangan)): ?>
                        <?php 
                        $no = 1; 
                        $rata_rata_transaksi = 0;
                        if (!empty($keuangan)) {
                            $total_jumlah = 0;
                            foreach($keuangan as $k) {
                                $total_jumlah += $k->jumlah;
                            }
                            $rata_rata_transaksi = $total_jumlah / count($keuangan);
                        }
                        
                        foreach($keuangan as $k): 
                            $is_large_transaction = ($k->jumlah > $rata_rata_transaksi * 3);
                            // Ubah "pendapatan" menjadi "pemasukan" untuk tampilan
                            $jenis_tampilan = ($k->jenis == 'pendapatan') ? 'pemasukan' : $k->jenis;
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <span class="badge-tanggal"><?= date('d F Y', strtotime($k->tanggal_transaksi)) ?></span>
                            </td>
                            <td>
                                <?php if($k->jenis == 'pemasukan'): ?>
                                    <span class="badge-pemasukan">
                                        <i class="fas fa-arrow-up me-1"></i> Pendapatan
                                    </span>
                                <?php else: ?>
                                    <span class="badge-pengeluaran">
                                        <i class="fas fa-arrow-down me-1"></i><?= ucfirst($k->jenis) ?>
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge-kategori"><?= $k->kategori ?></span>
                            </td>
                            <td class="<?= $is_large_transaction ? 'transaksi-besar' : '' ?>">
                                <?php if($k->jenis == 'pemasukan'): ?>
                                    <span class="jumlah-pemasukan">Rp <?= number_format($k->jumlah, 0, ',', '.') ?></span>
                                <?php else: ?>
                                    <span class="jumlah-pengeluaran">Rp <?= number_format($k->jumlah, 0, ',', '.') ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-aksi">
                                    <a href="<?= base_url('keuangan/edit/'.$k->id_keuangan) ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>
                                    <a href="<?= base_url('keuangan/hapus/'.$k->id_keuangan) ?>" 
                                       onclick="return confirm('Yakin hapus data?')"
                                       class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash me-1"></i> Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="no-data">
                                <i class="fas fa-money-bill-wave fa-2x mb-3 d-block"></i>
                                Belum ada data keuangan. Silakan tambah data terlebih dahulu.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <br>
        <?php if(!empty($keuangan)): ?>
        <div class="mt-4 d-flex justify-content-between align-items-center">
            <div class="small">
                <div class="d-flex gap-2">
                    <span class="badge bg-light text-dark p-2">
                        <i class="fas fa-info-circle me-1"></i>
                        💵 = Transaksi besar
                    </span><br>
                    <span class="badge bg-light text-dark p-2">
                        <i class="fas fa-arrow-up text-success me-1"></i>
                        Hijau = Pemasukan
                    </span><br>
                    <span class="badge bg-light text-dark p-2">
                        <i class="fas fa-arrow-down text-danger me-1"></i>
                        Merah = Pengeluaran
                    </span>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">