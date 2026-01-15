<div class="container mt-5">
    <style>
        body {
            background: url("<?= base_url('assets/pakan.jpg') ?>") no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            padding-bottom: 30px;
        }

        .data-pakan-container {
            background-color: rgba(255, 255, 255, 0.45);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .judul-pakan {
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 25px;
            color: #10375C;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }

        .judul-pakan:after {
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
            transform: translateY(-2px);
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

        .tabel-pakan {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 0 1px rgba(0,0,0,0.05);
            width: 100%;
            margin-bottom: 0;
        }

        .tabel-pakan thead th {
            background: linear-gradient(to right, #10375C, #1a4d7c);
            color: #fff;
            text-align: center;
            vertical-align: middle;
            padding: 16px 12px;
            font-weight: 600;
            border: none;
            white-space: nowrap;
        }

        .tabel-pakan tbody td {
            vertical-align: middle;
            text-align: center;
            padding: 14px 12px;
            border-top: 1px solid #eaeaea;
        }

        .tabel-pakan tbody tr {
            transition: all 0.2s ease;
        }

        .tabel-pakan tbody tr:nth-child(even) {
            background-color: #f9fafc;
        }

        .tabel-pakan tbody tr:hover {
            background-color: #f0f6ff;
            transform: scale(1.002);
            box-shadow: 0 3px 8px rgba(0,0,0,0.05);
        }

        .badge-nama {
            background-color: #e9f7fe;
            color: #10375C;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
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

        .stok-awal-cell {
            font-weight: 700;
            color: #28a745;
            font-size: 16px;
        }

        .stok-sisa-cell {
            font-weight: 700;
            color: #ff6b35;
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

        /* Indikator stok rendah */
        .stok-rendah {
            position: relative;
        }

        .stok-rendah::after {
            content: '!';
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #dc3545;
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

        /* [SIMPLIFIED] Log Aktivitas - Clean & Informative */
        .log-container {
            margin-top: 25px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            background: white;
        }
        
        .log-header {
            background: #f8f9fa;
            padding: 12px 16px;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .log-header h5 {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
            color: #10375C;
        }
        
        .log-header h5 i {
            margin-right: 8px;
            color: #10375C;
        }
        
        .log-count {
            background: #10375C;
            color: white;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .log-list {
            max-height: 300px;
            overflow-y: auto;
            padding: 15px;
        }
        
        .log-item {
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .log-item:last-child {
            border-bottom: none;
        }
        
        .log-item-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 8px;
        }
        
        .log-name {
            font-weight: 600;
            color: #10375C;
            font-size: 14px;
        }
        
        .log-time {
            color: #6c757d;
            font-size: 12px;
            white-space: nowrap;
        }
        
        .log-message {
            color: #495057;
            font-size: 13px;
            line-height: 1.4;
            margin-bottom: 8px;
        }
        
        .log-details {
            font-size: 12px;
            color: #6c757d;
            background: #f8f9fa;
            padding: 8px 10px;
            border-radius: 4px;
            border-left: 3px solid #10375C;
        }
        
        .log-action-badge {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 500;
            margin-right: 5px;
            margin-bottom: 3px;
        }
        
        .badge-tambah {
            background: #d4edda;
            color: #155724;
        }
        
        .badge-edit {
            background: #fff3cd;
            color: #856404;
        }
        
        .badge-hapus {
            background: #f8d7da;
            color: #721c24;
        }
        
        .empty-log {
            text-align: center;
            padding: 30px 15px;
            color: #6c757d;
        }
        
        .empty-log i {
            font-size: 36px;
            margin-bottom: 10px;
            opacity: 0.5;
        }
        
        .empty-log p {
            margin: 0;
            font-size: 14px;
        }
        
        .empty-log small {
            font-size: 12px;
            opacity: 0.8;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .data-pakan-container {
                padding: 15px;
            }
            
            .header-actions {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .tabel-pakan thead th,
            .tabel-pakan tbody td {
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
            
            .log-list {
                max-height: 250px;
                padding: 10px;
            }
        }
    </style>

    <div class="data-pakan-container">
        <h4 class="text-center judul-pakan">Data Pakan</h4>

        <div class="header-actions">
            <div class="info-box">
                <?php if(!empty($pakan)): ?>
                    <?php 
                    $total_stok_sisa = 0;
                    foreach($pakan as $row) {
                        $total_stok_sisa += $row->stok_sisa;
                    }
                    ?>
                    | Total Stok Sisa: <span class="fw-bold"><?= $total_stok_sisa ?></span>
                <?php endif; ?>
            </div>
            
            <div>
                <a href="<?= base_url('pakan/tambah') ?>" class="btn btn-primary btn-tambah">
                    <i class="fas fa-plus-circle me-2"></i> Tambah Data
                </a>
            </div>
        </div>

        <div class="table-responsive-custom">
            <table class="table table-bordered tabel-pakan">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Pakan</th>
                        <th width="15%">Stok Awal</th>
                        <th width="15%">Stok Sisa</th>
                        <th width="10%">Satuan</th>
                        <th width="22%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($pakan)): ?>
                        <?php $no=1; foreach($pakan as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <span class="badge-nama"><?= $row->nama_pakan ?></span>
                            </td>
                            <td class="stok-awal-cell">
                                <?= $row->stok_awal ?>
                            </td>
                            <td class="stok-sisa-cell <?= ($row->stok_sisa < ($row->stok_awal * 0.2)) ? 'stok-rendah' : '' ?>">
                                <?= $row->stok_sisa ?>
                            </td>
                            <td>
                                <span class="badge-satuan"><?= $row->satuan ?></span>
                            </td>
                            <td>
                                <div class="btn-aksi">
                                    <a href="<?= base_url('pakan/edit/'.$row->id_pakan) ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <form action="<?= base_url('pakan/hapus/'.$row->id_pakan) ?>" 
                                        method="post" 
                                        style="display:inline;">
                                        <input type="hidden" name="hapus" value="1">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="konfirmasiHapus('<?= $row->id_pakan ?>')">
                                            <i class="fas fa-trash me-1"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="no-data">
                                <i class="fas fa-database fa-2x mb-3 d-block"></i>
                                Belum ada data pakan. Silakan tambah data terlebih dahulu.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <br>
        
        <?php if(!empty($pakan)): ?>
        <div class="mt-4 d-flex justify-content-between align-items-center">
            <div class="small">
                <div class="d-flex gap-2">
                    <span class="badge bg-light text-dark p-2">
                        <i class="fas fa-info-circle me-1"></i>
                        Stok < 20% dari stok awal akan muncul tanda peringatan
                    </span>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- [SIMPLIFIED] Log Aktivitas -->
        <div class="log-container">
            <div class="log-header">
                <h5><i class="fas fa-clock"></i> Log Aktivitas</h5>
                <div class="d-flex align-items-center gap-2">
                    <span class="log-count"><?= isset($logs) ? count($logs) : 0 ?></span>
                    <?php if(isset($logs) && !empty($logs)): ?>
                    <button class="btn btn-sm btn-outline-danger py-0 px-2" onclick="clearTodayLog()">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="log-list">
                <?php if(isset($logs) && !empty($logs)): ?>
                    <?php foreach($logs as $index => $log): ?>
                    <div class="log-item">
                        <div class="log-item-header">
                            <div>
                                <span class="log-name"><?= $log['nama'] ?></span>
                                <?php if($log['action'] == 'tambah_baru' || $log['action'] == 'tambah_stok'): ?>
                                    <span class="log-action-badge badge-tambah">TAMBAH</span>
                                <?php elseif($log['action'] == 'edit'): ?>
                                    <span class="log-action-badge badge-edit">EDIT</span>
                                <?php elseif($log['action'] == 'hapus'): ?>
                                    <span class="log-action-badge badge-hapus">HAPUS</span>
                                <?php endif; ?>
                            </div>
                            <div class="log-time"><?= $log['time'] ?></div>
                        </div>
                        
                        <div class="log-message"><?= $log['message'] ?></div>
                        
                        <?php if(!empty($log['details'])): ?>
                            <div class="log-details">
                                <?php if(isset($log['details']['jumlah'])): ?>
                                    <div><strong>Tambah:</strong> <?= $log['details']['jumlah'] ?> <?= $log['details']['satuan'] ?? '' ?></div>
                                <?php endif; ?>
                                
                                <?php if(isset($log['details']['stok_awal_baru'])): ?>
                                    <div><strong>Stok Awal:</strong> <?= $log['details']['stok_awal_lama'] ?? 0 ?> → <?= $log['details']['stok_awal_baru'] ?>
                                        <?php if(isset($log['details']['selisih_awal']) && $log['details']['selisih_awal'] != 0): ?>
                                            <span class="<?= $log['details']['selisih_awal'] > 0 ? 'text-success' : 'text-danger' ?>">
                                                (<?= $log['details']['selisih_awal'] > 0 ? '+' : '' ?><?= $log['details']['selisih_awal'] ?>)
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if(isset($log['details']['stok_sisa_baru'])): ?>
                                    <div><strong>Stok Sisa:</strong> <?= $log['details']['stok_sisa_lama'] ?? 0 ?> → <?= $log['details']['stok_sisa_baru'] ?>
                                        <?php if(isset($log['details']['selisih_sisa']) && $log['details']['selisih_sisa'] != 0): ?>
                                            <span class="<?= $log['details']['selisih_sisa'] > 0 ? 'text-success' : 'text-danger' ?>">
                                                (<?= $log['details']['selisih_sisa'] > 0 ? '+' : '' ?><?= $log['details']['selisih_sisa'] ?>)
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if(isset($log['details']['stok_awal']) && $log['action'] == 'hapus'): ?>
                                    <div><strong>Dihapus:</strong> Stok Awal: <?= $log['details']['stok_awal'] ?>, Sisa: <?= $log['details']['stok_sisa'] ?? 0 ?></div>
                                <?php endif; ?>
                                
                                <?php if(isset($log['details']['satuan_baru']) && isset($log['details']['satuan_lama']) && $log['details']['satuan_lama'] != $log['details']['satuan_baru']): ?>
                                    <div><strong>Satuan:</strong> <?= $log['details']['satuan_lama'] ?> → <?= $log['details']['satuan_baru'] ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="empty-log">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Belum ada aktivitas hari ini</p>
                        <small>Aktivitas akan muncul di sini</small>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
    </div>
</div>

<!-- Tambahkan Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!-- Tambahkan SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Fungsi konfirmasi hapus dengan SweetAlert
function konfirmasiHapus(id) {
    Swal.fire({
        title: 'Yakin mau hapus?',
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#10375C',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit form hapus
            const form = document.createElement('form');
            form.method = 'post';
            form.action = "<?= base_url('pakan/hapus/') ?>" + id;
            
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'hapus';
            input.value = '1';
            
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    });
}

// Fungsi hapus riwayat
function clearTodayLog() {
    Swal.fire({
        title: 'Hapus log aktivitas?',
        text: "Semua riwayat aktivitas hari ini akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "<?= base_url('pakan/clear_log') ?>";
        }
    });
}

</script>