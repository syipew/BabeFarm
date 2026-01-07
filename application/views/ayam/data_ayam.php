<div class="container mt-5">
    <style>
        body {
            background: url("<?= base_url('assets/ayam.png') ?>") no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            padding-bottom: 30px;
        }

        .data-ayam-container {
            background-color: rgba(255, 255, 255, 0.45);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .judul-ayam {
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 25px;
            color: #10375C;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }

        .judul-ayam:after {
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
            justify-content: flex-end;
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

        .tabel-ayam {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 0 1px rgba(0,0,0,0.05);
            width: 100%;
            margin-bottom: 0;
        }

        .tabel-ayam thead th {
            background: linear-gradient(to right, #10375C, #1a4d7c);
            color: #fff;
            text-align: center;
            vertical-align: middle;
            padding: 16px 12px;
            font-weight: 600;
            border: none;
            white-space: nowrap;
        }

        .tabel-ayam tbody td {
            vertical-align: middle;
            text-align: center;
            padding: 14px 12px;
            border-top: 1px solid #eaeaea;
        }

        .tabel-ayam tbody tr {
            transition: all 0.2s ease;
        }

        .tabel-ayam tbody tr:nth-child(even) {
            background-color: #f9fafc;
        }

        .tabel-ayam tbody tr:hover {
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

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .data-ayam-container {
                padding: 15px;
            }

            
            .tabel-ayam thead th,
            .tabel-ayam tbody td {
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

    <div class="data-ayam-container">
        <h4 class="text-center judul-ayam">Data Ayam</h4>

        <div class="header-actions">   
            <div>
                <a href="<?= base_url('ayam/tambah') ?>" class="btn btn-primary btn-tambah">
                    <i class="fas fa-plus-circle me-2"></i>  Tambah Data
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
            <table class="table table-bordered tabel-ayam">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Jenis</th>
                        <th>Tanggal Masuk</th>
                        <th>Jumlah Tambah</th>
                        <th>Umur Awal</th>
                        <th>Jumlah Mati</th>
                        <th>Jumlah Ayam</th>
                        <th width="22%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($ayam)): ?>
                        <?php $no=1; foreach($ayam as $a): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <span class="badge-jenis"><?= $a->jenis_ayam ?></span>
                            </td>
                            <td>
                                <span class="badge-tanggal"><?= date('d F Y', strtotime($a->tanggal_masuk)) ?></span>
                            </td>
                            <td><?= $a->jumlah_tambah ?></td>
                            <td><?= $a->umur_awal ?> bulan</td>
                            <td>
                                <?php if($a->jumlah_mati > 0): ?>
                                    <span class="text-danger fw-bold"><?= $a->jumlah_mati ?></span>
                                <?php else: ?>
                                    <span class="text-success"><?= $a->jumlah_mati ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="jumlah-ayam-cell"><?= $a->jumlah_ayam ?></td>
                            <td>
                                <div class="btn-aksi">
                                    <a href="<?= base_url('ayam/edit/'.$a->id_kandang) ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <form action="<?= base_url('ayam/hapus/'.$a->id_kandang) ?>" 
                                        method="post" 
                                        style="display:inline;"
                                        onsubmit="return confirm('Yakin mau menghapus data ayam ini?')">

                                        <input type="hidden" name="hapus" value="1">

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash me-1"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="no-data">
                                <i class="fas fa-database fa-2x mb-3 d-block"></i>
                                Belum ada data ayam. Silakan tambah data terlebih dahulu.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        
    </div>
</div>

<!-- Tambahkan Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">