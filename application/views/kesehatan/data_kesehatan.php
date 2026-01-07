<div class="container mt-5">
    <style>
        body {
            background: url("<?= base_url('assets/kesehatan.jpg') ?>") no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            padding-bottom: 30px;
        }

        .data-kesehatan-container {
            background-color: rgba(255, 255, 255, 0.45);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .judul-kesehatan {
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 25px;
            color: #10375C;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }

        .judul-kesehatan:after {
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

        .tabel-kesehatan {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 0 1px rgba(0,0,0,0.05);
            width: 100%;
            margin-bottom: 0;
        }

        .tabel-kesehatan thead th {
            background: linear-gradient(to right, #10375C, #1a4d7c);
            color: #fff;
            text-align: center;
            vertical-align: middle;
            padding: 16px 12px;
            font-weight: 600;
            border: none;
            white-space: nowrap;
        }

        .tabel-kesehatan tbody td {
            vertical-align: middle;
            text-align: center;
            padding: 14px 12px;
            border-top: 1px solid #eaeaea;
        }

        .tabel-kesehatan tbody tr {
            transition: all 0.2s ease;
        }

        .tabel-kesehatan tbody tr:nth-child(even) {
            background-color: #f9fafc;
        }

        .tabel-kesehatan tbody tr:hover {
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

        .badge-penyakit {
            background-color: #ffeaea;
            color: #d9534f;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: 500;
            display: inline-block;
        }

        .badge-gejala {
            background-color: #f0f6ff;
            color: #1a4d7c;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: 500;
            display: inline-block;
        }

        .badge-tindakan {
            background-color: #e9f7fe;
            color: #28a745;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: 500;
            display: inline-block;
        }

        /* Style untuk badge status - DIPERBAIKI */
        .badge-status {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            display: block;
            min-width: 100px;
            margin: 0 auto 5px;
            transition: all 0.3s ease;
        }
        
        .badge-status-sembuh {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            cursor: default;
        }
        
        .badge-status-sakit {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            position: relative;
            cursor: pointer;
        }
        
        .badge-status-sakit:hover {
            background-color: #f1b0b7;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(217, 83, 79, 0.2);
        }
        
        .badge-status-sakit::after {
            content: '⚠';
            margin-left: 5px;
        }

        /* Tombol sembuh kecil di bawah status */
        .btn-status-action {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 15px;
            padding: 3px 10px;
            font-size: 11px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: 3px;
            opacity: 0.9;
        }
        
        .btn-status-action:hover {
            background-color: #218838;
            opacity: 1;
            transform: translateY(-1px);
            box-shadow: 0 3px 6px rgba(40, 167, 69, 0.2);
        }
        
        .btn-status-action i {
            font-size: 9px;
            margin-right: 3px;
        }

        .text-gejala, .text-tindakan {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            margin: 0 auto;
        }

        /* Tombol Aksi yang diperbaiki - DIPERBAIKI */
        .btn-aksi-container {
            display: flex;
            justify-content: center;
            gap: 6px;
            flex-wrap: nowrap;
        }

        .btn-aksi-group {
            display: inline-flex;
            gap: 8px;
            flex-wrap: nowrap;
        }

        .btn-aksi {
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            padding: 6px 12px;
            transition: all 0.2s ease;
            border: none;
            min-width: 70px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            white-space: nowrap;
            height: 34px;
        }

        .btn-aksi i {
            font-size: 12px;
            margin-right: 3px;
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

        .btn-success {
            background-color: #28a745;
            color: #fff;
            box-shadow: 0 3px 6px rgba(40, 167, 69, 0.2);
        }

        .btn-success:hover {
            background-color: #218838;
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(40, 167, 69, 0.3);
            color: #fff;
        }

        .btn-form {
            padding: 0;
            margin: 0;
            border: none;
            background: none;
            display: inline;
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #6c757d;
            font-style: italic;
        }

        /* Status indikator untuk penyakit serius */
        .status-urgent {
            position: relative;
        }

        .status-urgent::before {
            content: '';
            position: absolute;
            left: 5px;
            top: 50%;
            transform: translateY(-50%);
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #dc3545;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .tabel-kesehatan thead th:nth-child(5),
            .tabel-kesehatan tbody td:nth-child(5),
            .tabel-kesehatan thead th:nth-child(6),
            .tabel-kesehatan tbody td:nth-child(6) {
                max-width: 150px;
            }
            
            .text-gejala, .text-tindakan {
                max-width: 150px;
            }
        }

        @media (max-width: 768px) {
            .data-kesehatan-container {
                padding: 15px;
            }
            
            .header-actions {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .tabel-kesehatan thead th,
            .tabel-kesehatan tbody td {
                padding: 10px 8px;
                font-size: 14px;
            }
            
            .btn-aksi {
                font-size: 12px;
                padding: 5px 8px;
                min-width: 60px;
                height: 30px;
            }
            
            .btn-aksi i {
                margin-right: 2px;
                font-size: 11px;
            }
            
            .text-gejala, .text-tindakan {
                max-width: 120px;
            }
            
            .badge-status {
                min-width: 80px;
                padding: 4px 8px;
                font-size: 13px;
            }
            
            .btn-status-action {
                font-size: 10px;
                padding: 2px 8px;
            }
        }

        @media (max-width: 576px) {
            .btn-aksi-container {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .btn-aksi-group {
                width: 100%;
                justify-content: center;
            }
            
            .btn-aksi {
                min-width: 55px;
                font-size: 11px;
                padding: 4px 6px;
            }
            
            .tabel-kesehatan thead th:last-child,
            .tabel-kesehatan tbody td:last-child {
                min-width: 120px;
            }
            
            .badge-status {
                min-width: 70px;
                font-size: 12px;
            }
        }
    </style>

    <div class="data-kesehatan-container">
        <h4 class="text-center judul-kesehatan">Data Kesehatan</h4>

        <div class="header-actions">
            <div class="info-box">
                Total Data: <span class="fw-bold"><?= count($kesehatan) ?></span>
                <?php if(!empty($kesehatan)): ?>
                    <?php 
                    $penyakit_serius = ['flu burung', 'newcastle', 'gumboro', 'tetelo'];
                    $total_urgent = 0;
                    $total_sakit = 0;
                    $total_sembuh = 0;
                    
                    foreach($kesehatan as $k) {
                        $penyakit_lower = strtolower($k->penyakit);
                        foreach($penyakit_serius as $p) {
                            if (strpos($penyakit_lower, $p) !== false) {
                                $total_urgent++;
                                break;
                            }
                        }
                        
                        // Hitung status
                        if(isset($k->status) && $k->status == 'sembuh') {
                            $total_sembuh++;
                        } else {
                            $total_sakit++;
                        }
                    }
                    ?>
                    <?php if($total_urgent > 0): ?>
                        | Kasus Serius: <span class="fw-bold text-danger"><?= $total_urgent ?></span>
                    <?php endif; ?>
                    | Sakit: <span class="fw-bold text-danger"><?= $total_sakit ?></span>
                    | Sembuh: <span class="fw-bold text-success"><?= $total_sembuh ?></span>
                <?php endif; ?>
            </div>
            
            <div>
                <a href="<?= base_url('kesehatan/tambah') ?>" class="btn btn-primary btn-tambah">
                    <i class="fas fa-plus-circle me-2"></i> Tambah Data
                </a>
            </div>
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

        <div class="table-responsive-custom">
            <table class="table table-bordered tabel-kesehatan">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Jenis</th>
                        <th>Tanggal Pemeriksaan</th>
                        <th>Penyakit</th>
                        <th>Gejala</th>
                        <th>Tindakan</th>
                        <th>Status</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($kesehatan)): ?>
                        <?php 
                        $penyakit_serius = ['flu burung', 'newcastle', 'gumboro', 'tetelo'];
                        $no=1; 
                        foreach($kesehatan as $k): 
                            $is_urgent = false;
                            $penyakit_lower = strtolower($k->penyakit);
                            foreach($penyakit_serius as $p) {
                                if (strpos($penyakit_lower, $p) !== false) {
                                    $is_urgent = true;
                                    break;
                                }
                            }
                            
                            // Default status jika tidak ada
                            $status = isset($k->status) ? $k->status : 'sakit';
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <span class="badge-jenis"><?= $k->jenis_ayam ?></span>
                            </td>
                            <td>
                                <span class="badge-tanggal"><?= date('d F Y', strtotime($k->tanggal_pemeriksaan)) ?></span>
                            </td>
                            <td class="<?= $is_urgent ? 'status-urgent' : '' ?>">
                                <span class="badge-penyakit"><?= $k->penyakit ?></span>
                            </td>
                            <td>
                                <div class="text-gejala" title="<?= $k->gejala ?>">
                                    <span class="badge-gejala"><?= $k->gejala ?></span>
                                </div>
                            </td>
                            <td>
                                <div class="text-tindakan" title="<?= $k->tindakan ?>">
                                    <span class="badge-tindakan"><?= $k->tindakan ?></span>
                                </div>
                            </td>
                            <td>
                                <span class="badge-status badge-status-<?= $status ?>">
                                    <?= ucfirst($status) ?>
                                </span>
                                <?php if($status == 'sakit'): ?>
                                <a href="<?= base_url('kesehatan/update_status/'.$k->id_kesehatan.'/sembuh') ?>" 
                                   class="btn-status-action"
                                   onclick="return confirm('Tandai sebagai sembuh?')"
                                   title="Klik untuk menandai sembuh">
                                    <i class="fas fa-check"></i>Sembuh
                                </a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-aksi-container">
                                    <div class="btn-aksi-group">
                                        <a href="<?= base_url('kesehatan/edit/'.$k->id_kesehatan) ?>" class="btn btn-aksi btn-warning">
                                            <i class="fas fa-edit"></i>Edit
                                        </a>
                                        
                                        <form action="<?= base_url('kesehatan/hapus/'.$k->id_kesehatan) ?>" 
                                            method="post" 
                                            class="btn-form"
                                            onsubmit="return confirm('Yakin mau menghapus data kesehatan ini?')">
                                            <input type="hidden" name="hapus" value="1">
                                            <button type="submit" class="btn btn-aksi btn-danger">
                                                <i class="fas fa-trash"></i>Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="no-data">
                                <i class="fas fa-heartbeat fa-2x mb-3 d-block"></i>
                                Belum ada data kesehatan. Silakan tambah data terlebih dahulu.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <br>
        <?php if(!empty($kesehatan)): ?>
        <div class="mt-4 d-flex justify-content-between align-items-center">
            <div class="small">
                <div class="d-flex gap-2 flex-wrap">
                    <span class="badge bg-light text-dark p-2">
                        <i class="fas fa-info-circle me-1"></i>
                        Titik merah = Penyakit serius
                    </span><br>
                    <span class="badge bg-success text-white p-2">
                        <i class="fas fa-check-circle me-1"></i>
                        Klik tombol "Sembuh" untuk menandai ayam telah sembuh
                    </span>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Tambahkan Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">