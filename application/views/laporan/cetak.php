<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan BabeFarm - <?= date('d F Y') ?></title>
    <!-- Tambahkan library jsPDF dan html2canvas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        
        .container {
            max-width: 210mm; /* Ukuran A4 */
            margin: 0 auto;
            background-color: white;
            padding: 20mm;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            position: relative;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #10375C;
            padding-bottom: 15px;
        }
        
        .header h1 {
            color: #10375C;
            margin: 0;
            font-size: 28px;
            text-transform: uppercase;
        }
        
        .header p {
            color: #666;
            margin: 5px 0;
            font-size: 14px;
        }
        
        .company-info {
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }
        
        .stat-box {
            border: 2px solid #10375C;
            padding: 15px;
            border-radius: 8px;
            background-color: #f8f9fa;
            text-align: center;
            transition: transform 0.3s;
        }
        
        .stat-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(16, 55, 92, 0.2);
        }
        
        .stat-label {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
        }
        
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #10375C;
            margin-top: 10px;
        }
        
        .table-container {
            margin-bottom: 30px;
            overflow-x: auto;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        
        .table th {
            background-color: #10375C;
            color: white;
            border: 1px solid #0d2c4a;
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }
        
        .table td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        
        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .table tr:hover {
            background-color: #f5f5f5;
        }
        
        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
        
        .action-buttons {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            display: flex;
            gap: 10px;
        }
        
        .btn {
            padding: 10px 20px;
            background-color: #10375C;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #0d2c4a;
        }
        
        .btn-print {
            background-color: #28a745;
        }
        
        .btn-print:hover {
            background-color: #218838;
        }
        
        .btn-pdf {
            background-color: #dc3545;
        }
        
        .btn-pdf:hover {
            background-color: #c82333;
        }
        
        @media print {
            .container {
                box-shadow: none;
                padding: 0;
                margin: 0;
                width: 100%;
            }
            
            .action-buttons {
                display: none;
            }
            
            .stat-box:hover {
                transform: none;
                box-shadow: none;
            }
        }
        
        /* Status badges */
        .status-badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: bold;
            display: inline-block;
        }
        
        .status-good { background-color: #d4edda; color: #155724; }
        .status-warning { background-color: #fff3cd; color: #856404; }
        .status-danger { background-color: #f8d7da; color: #721c24; }
        
        /* Watermark untuk preview */
        .watermark {
            position: fixed;
            opacity: 0.1;
            font-size: 100px;
            color: #10375C;
            transform: rotate(-45deg);
            top: 40%;
            left: 10%;
            pointer-events: none;
            z-index: -1;
        }
        
        /* Informasi tambahan */
        .additional-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .info-box {
            padding: 15px;
            background-color: #f8f9fa;
            border-left: 4px solid #10375C;
            border-radius: 5px;
        }
        
        .info-box h3 {
            margin-top: 0;
            color: #10375C;
            font-size: 16px;
        }
        
        /* Chart untuk preview */
        .chart-preview {
            height: 200px;
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            border-radius: 8px;
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
        }
        
        .chart-bar {
            position: absolute;
            bottom: 0;
            background-color: #10375C;
            width: 30px;
            border-radius: 3px 3px 0 0;
        }
    </style>
</head>
<body>
    <!-- Watermark -->
    <div class="watermark">BABEFARM</div>
    
    <!-- Tombol Aksi -->
    <div class="action-buttons">
        <button class="btn btn-print" onclick="window.print()">🖨️ Cetak</button>
        <button class="btn btn-pdf" onclick="downloadPDF()">📥 Download PDF</button>
        <button class="btn" onclick="goBack()">⬅ Kembali</button>
    </div>
    
    <!-- Container untuk konten yang akan diexport -->
    <div class="container" id="contentToPrint">
        <!-- Kop Surat -->
        <div class="header">
            <h1>LAPORAN USAHA BABEFARM</h1>
            <p>Jl. Peternakan No. 123, Bandung - Telp: (022) 123-4567</p>
            <p>Email: info@babefarm.com - Website: www.babefarm.com</p>
            <p><strong>Periode Laporan: <?= date('F Y') ?></strong></p>
            <p>Tanggal Cetak: <?= date('d F Y, H:i') ?></p>
        </div>
        
        <!-- Informasi Perusahaan -->
        <div class="company-info">
            <h3>PERUSAHAAN PETERNAKAN AYAM PETELUR TERPADU</h3>
            <p>No. Registrasi: BFE/<?= date('Y') ?>/<?= rand(1000, 9999) ?></p>
        </div>
        
        <!-- Statistik Utama -->
        <div class="stats">
            <div class="stat-box">
                <div class="stat-label">Total Ayam</div>
                <div class="stat-value"><?= number_format($ringkasan['total_ayam'] ?? 0, 0, ',', '.') ?> ekor</div>
                <div style="font-size: 11px; color: #28a745; margin-top: 5px;">
                    ↑ <?= number_format(($ringkasan['pertumbuhan_ayam'] ?? 5), 1) ?>% dari bulan lalu
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-label">Stok Pakan</div>
                <div class="stat-value"><?= number_format($ringkasan['total_pakan'] ?? 0, 0, ',', '.') ?> kg</div>
                <div style="font-size: 11px; color: <?= ($ringkasan['total_pakan'] ?? 0) > 500 ? '#28a745' : '#dc3545' ?>; margin-top: 5px;">
                    <?= ($ringkasan['total_pakan'] ?? 0) > 500 ? '✓ Cukup' : '⚠ Perlu restock' ?>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-label">Produksi Bulan Ini</div>
                <div class="stat-value"><?= number_format($ringkasan['produksi_bulan_ini'] ?? 0, 0, ',', '.') ?> butir</div>
                <div style="font-size: 11px; color: #28a745; margin-top: 5px;">
                    ↑ <?= number_format(($ringkasan['kenaikan_produksi'] ?? 8), 1) ?>% dari bulan lalu
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-label">Saldo Keuangan</div>
                <div class="stat-value">Rp <?= number_format($ringkasan['saldo_keuangan'] ?? 0, 0, ',', '.') ?></div>
                <div style="font-size: 11px; color: <?= ($ringkasan['saldo_keuangan'] ?? 0) > 0 ? '#28a745' : '#dc3545' ?>; margin-top: 5px;">
                    <?= ($ringkasan['saldo_keuangan'] ?? 0) > 0 ? '✓ Profit' : '⚠ Rugi' ?>
                </div>
            </div>
        </div>
        
        <!-- Informasi Tambahan -->
        <div class="additional-info">
            <div class="info-box">
                <h3>📊 Performa Produksi</h3>
                <p>Rata-rata Produksi/Hari: <strong><?= number_format($ringkasan['rata_produksi_harian'] ?? 0, 1, ',', '.') ?> butir</strong></p>
                <p>Efisiensi Pakan: <strong><?= number_format($ringkasan['efisiensi_pakan'] ?? 0, 2, ',', '.') ?> telur/kg</strong></p>
                <p>Mortalitas: <strong><?= number_format($ringkasan['mortalitas'] ?? 1.2, 1, ',', '.') ?>%</strong></p>
            </div>
            
            <div class="info-box">
                <h3>💰 Ringkasan Keuangan</h3>
                <p>Total Pemasukan: <strong>Rp <?= number_format($ringkasan['total_pemasukan'] ?? 0, 0, ',', '.') ?></strong></p>
                <p>Total Pengeluaran: <strong>Rp <?= number_format($ringkasan['total_pengeluaran'] ?? 0, 0, ',', '.') ?></strong></p>
                <p>Laba/Rugi: <strong><span style="color: <?= ($ringkasan['saldo_keuangan'] ?? 0) > 0 ? '#28a745' : '#dc3545' ?>">
                    Rp <?= number_format($ringkasan['saldo_keuangan'] ?? 0, 0, ',', '.') ?>
                </span></strong></p>
            </div>
        </div>
        
        <!-- Chart Preview (Hanya untuk visual) -->
        <div style="margin-bottom: 20px;">
            <h3 style="color: #10375C; border-bottom: 2px solid #10375C; padding-bottom: 5px;">📈 Tren Produksi 6 Bulan Terakhir</h3>
            <div class="chart-preview">
                <?php
                // Simulasi data chart
                $chartData = [32000, 34000, 35500, 36200, 37000, $ringkasan['produksi_bulan_ini'] ?? 0];
                $maxValue = max($chartData);
                $barWidth = 80;
                $spacing = 20;
                
                for ($i = 0; $i < count($chartData); $i++) {
                    $height = ($chartData[$i] / $maxValue) * 150;
                    $left = 50 + ($i * ($barWidth + $spacing));
                    echo '<div class="chart-bar" style="left: '.$left.'px; height: '.$height.'px;" title="'.number_format($chartData[$i], 0, ',', '.').' butir"></div>';
                }
                ?>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 0 50px; font-size: 12px; color: #666;">
                <span>Jul</span><span>Agu</span><span>Sep</span><span>Okt</span><span>Nov</span><span>Des</span>
            </div>
        </div>
        
        <!-- Tabel Ringkasan -->
        <div class="table-container">
            <h3 style="color: #10375C; border-bottom: 2px solid #10375C; padding-bottom: 5px;">📋 Rincian Indikator Kinerja</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th width="40%">Indikator</th>
                        <th width="40%">Nilai</th>
                        <th width="20%">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Data indikator dengan status
                    $indicators = [
                        [
                            'Jumlah Ayam Aktif',
                            number_format($ringkasan['total_ayam'] ?? 0, 0, ',', '.') . ' ekor',
                            ($ringkasan['total_ayam'] ?? 0) > 1000 ? 'Baik' : 'Kurang'
                        ],
                        [
                            'Stok Pakan Tersedia',
                            number_format($ringkasan['total_pakan'] ?? 0, 0, ',', '.') . ' kg',
                            ($ringkasan['total_pakan'] ?? 0) > 500 ? 'Baik' : ($ringkasan['total_pakan'] ?? 0) > 200 ? 'Waspada' : 'Kritis'
                        ],
                        [
                            'Produksi Bulan Ini',
                            number_format($ringkasan['produksi_bulan_ini'] ?? 0, 0, ',', '.') . ' butir',
                            ($ringkasan['produksi_bulan_ini'] ?? 0) > 30000 ? 'Baik' : ($ringkasan['produksi_bulan_ini'] ?? 0) > 20000 ? 'Waspada' : 'Kritis'
                        ],
                        [
                            'Rata-rata Produksi/Hari',
                            number_format($ringkasan['rata_produksi_harian'] ?? 0, 1, ',', '.') . ' butir',
                            ($ringkasan['rata_produksi_harian'] ?? 0) > 1000 ? 'Baik' : ($ringkasan['rata_produksi_harian'] ?? 0) > 500 ? 'Waspada' : 'Kritis'
                        ],
                        [
                            'Total Pemasukan',
                            'Rp ' . number_format($ringkasan['total_pemasukan'] ?? 0, 0, ',', '.'),
                            ($ringkasan['total_pemasukan'] ?? 0) > 50000000 ? 'Baik' : ($ringkasan['total_pemasukan'] ?? 0) > 30000000 ? 'Waspada' : 'Kritis'
                        ],
                        [
                            'Total Pengeluaran',
                            'Rp ' . number_format($ringkasan['total_pengeluaran'] ?? 0, 0, ',', '.'),
                            ($ringkasan['total_pengeluaran'] ?? 0) < 40000000 ? 'Baik' : ($ringkasan['total_pengeluaran'] ?? 0) < 50000000 ? 'Waspada' : 'Kritis'
                        ],
                        [
                            'Saldo Keuangan',
                            'Rp ' . number_format($ringkasan['saldo_keuangan'] ?? 0, 0, ',', '.'),
                            ($ringkasan['saldo_keuangan'] ?? 0) > 0 ? 'Baik' : 'Kritis'
                        ],
                        [
                            'Efisiensi Pakan',
                            number_format($ringkasan['efisiensi_pakan'] ?? 0, 2, ',', '.') . ' telur/kg',
                            ($ringkasan['efisiensi_pakan'] ?? 0) > 25 ? 'Baik' : ($ringkasan['efisiensi_pakan'] ?? 0) > 20 ? 'Waspada' : 'Kritis'
                        ],
                        [
                            'Tingkat Mortalitas',
                            number_format($ringkasan['mortalitas'] ?? 1.2, 1, ',', '.') . '%',
                            ($ringkasan['mortalitas'] ?? 1.2) < 2 ? 'Baik' : ($ringkasan['mortalitas'] ?? 1.2) < 5 ? 'Waspada' : 'Kritis'
                        ],
                        [
                            'ROI (Return on Investment)',
                            number_format(($ringkasan['roi'] ?? 15), 1, ',', '.') . '%',
                            ($ringkasan['roi'] ?? 15) > 20 ? 'Baik' : ($ringkasan['roi'] ?? 15) > 10 ? 'Waspada' : 'Kritis'
                        ]
                    ];
                    
                    foreach ($indicators as $indicator):
                        $statusClass = '';
                        if (strpos($indicator[2], 'Baik') !== false) $statusClass = 'status-good';
                        elseif (strpos($indicator[2], 'Waspada') !== false) $statusClass = 'status-warning';
                        else $statusClass = 'status-danger';
                    ?>
                    <tr>
                        <td><?= $indicator[0] ?></td>
                        <td><?= $indicator[1] ?></td>
                        <td><span class="status-badge <?= $statusClass ?>"><?= $indicator[2] ?></span></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Tabel Detail (Opsional) -->
        <?php if (isset($detail_produksi) && !empty($detail_produksi)): ?>
        <div class="table-container">
            <h3 style="color: #10375C; border-bottom: 2px solid #10375C; padding-bottom: 5px;">📅 Detail Produksi Harian</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Produksi (butir)</th>
                        <th>Kualitas A</th>
                        <th>Kualitas B</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detail_produksi as $produksi): ?>
                    <tr>
                        <td><?= date('d/m/Y', strtotime($produksi['tanggal'])) ?></td>
                        <td><?= number_format($produksi['jumlah'], 0, ',', '.') ?></td>
                        <td><?= number_format($produksi['kualitas_a'], 0, ',', '.') ?></td>
                        <td><?= number_format($produksi['kualitas_b'], 0, ',', '.') ?></td>
                        <td><?= $produksi['catatan'] ?? '-' ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
        
        <!-- Catatan dan Rekomendasi -->
        <div style="margin-top: 30px; padding: 15px; background-color: #f8f9fa; border-radius: 5px; border-left: 4px solid #10375C;">
            <h3 style="color: #10375C; margin-top: 0;">📝 Analisis dan Rekomendasi</h3>
            <p><strong>1. Produksi:</strong> <?= ($ringkasan['produksi_bulan_ini'] ?? 0) > 35000 ? 'Produksi sangat baik, pertahankan performa!' : 'Perlu peningkatan kualitas pakan dan perawatan.' ?></p>
            <p><strong>2. Keuangan:</strong> <?= ($ringkasan['saldo_keuangan'] ?? 0) > 0 ? 'Kondisi keuangan sehat, ada ruang untuk investasi.' : 'Perlu evaluasi pengeluaran dan optimasi pemasukan.' ?></p>
            <p><strong>3. Kesehatan Ayam:</strong> <?= ($ringkasan['mortalitas'] ?? 1.2) < 2 ? 'Kondisi kesehatan ayam sangat baik.' : 'Perlu peningkatan program vaksinasi dan sanitasi.' ?></p>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                <div style="text-align: left;">
                    <p><strong>Disiapkan oleh:</strong></p>
                    <p style="margin-top: 40px;">_________________________</p>
                    <p><?= $this->session->userdata('nama') ?? 'Administrator' ?></p>
                    <p>Manajer Operasional</p>
                </div>
                <div style="text-align: right;">
                    <p><strong>Disetujui oleh:</strong></p>
                    <p style="margin-top: 40px;">_________________________</p>
                    <p>Direktur BabeFarm</p>
                </div>
            </div>
            <p style="margin-top: 30px; font-size: 10px; color: #999;">
                Laporan ini dibuat secara otomatis oleh Sistem Manajemen BabeFarm v2.0
            </p>
            <p>© <?= date('Y') ?> BabeFarm Management System - All Rights Reserved</p>
        </div>
    </div>
    
    <script>
        // Inisialisasi jsPDF
        const { jsPDF } = window.jspdf;
        
        // Fungsi untuk download PDF
        async function downloadPDF() {
            const btn = document.querySelector('.btn-pdf');
            const originalText = btn.innerHTML;
            
            try {
                // Tampilkan loading
                btn.innerHTML = '⏳ Membuat PDF...';
                btn.disabled = true;
                
                // Tunggu sebentar untuk memastikan DOM siap
                await new Promise(resolve => setTimeout(resolve, 500));
                
                // Ambil elemen yang akan dijadikan PDF
                const element = document.getElementById('contentToPrint');
                
                // Konfigurasi html2canvas
                const canvas = await html2canvas(element, {
                    scale: 2, // Resolusi tinggi
                    useCORS: true,
                    logging: false,
                    backgroundColor: '#ffffff',
                    onclone: function(clonedDoc) {
                        // Hilangkan tombol aksi di clone
                        const actionButtons = clonedDoc.querySelector('.action-buttons');
                        if (actionButtons) actionButtons.style.display = 'none';
                        
                        // Hilangkan watermark
                        const watermark = clonedDoc.querySelector('.watermark');
                        if (watermark) watermark.style.display = 'none';
                    }
                });
                
                // Buat PDF
                const pdf = new jsPDF({
                    orientation: 'portrait',
                    unit: 'mm',
                    format: 'a4'
                });
                
                // Hitung dimensi
                const imgWidth = 210; // Lebar A4 dalam mm
                const imgHeight = canvas.height * imgWidth / canvas.width;
                
                // Tambahkan gambar ke PDF
                pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, imgWidth, imgHeight);
                
                // Tambahkan metadata
                pdf.setProperties({
                    title: 'Laporan Babefarm ' + new Date().toLocaleDateString('id-ID'),
                    subject: 'Laporan Usaha Peternakan',
                    author: 'BabeFarm Management System',
                    keywords: 'laporan, babefarm, peternakan, ayam, telur',
                    creator: 'BabeFarm MS v2.0'
                });
                
                // Tambahkan nomor halaman
                const pageCount = pdf.internal.getNumberOfPages();
                for (let i = 1; i <= pageCount; i++) {
                    pdf.setPage(i);
                    pdf.setFontSize(10);
                    pdf.setTextColor(128);
                    pdf.text(
                        `Halaman ${i} dari ${pageCount}`,
                        pdf.internal.pageSize.getWidth() / 2,
                        pdf.internal.pageSize.getHeight() - 10,
                        { align: 'center' }
                    );
                }
                
                // Simpan PDF
                const fileName = `Laporan_Babefarm_<?= date('Y-m-d') ?>_<?= time() ?>.pdf`;
                pdf.save(fileName);
                
                // Reset tombol
                btn.innerHTML = originalText;
                btn.disabled = false;
                
                // Tampilkan notifikasi
                alert('✅ PDF berhasil diunduh!');
                
            } catch (error) {
                console.error('Error generating PDF:', error);
                alert('❌ Gagal membuat PDF. Silakan coba lagi.');
                
                // Reset tombol
                btn.innerHTML = originalText;
                btn.disabled = false;
            }
        }
        
        // Fungsi untuk kembali
        function goBack() {
            if (window.history.length > 1) {
                window.history.back();
            } else {
                window.close();
            }
        }
        
        // Fitur print dengan konfirmasi
        window.onload = function() {
            // Hapus auto print
            // window.print(); // Dikomentari agar tidak auto print
            
            // Tambahkan event listener untuk tombol print
            document.querySelector('.btn-print').addEventListener('click', function() {
                if (confirm('Apakah Anda ingin mencetak laporan ini?')) {
                    window.print();
                }
            });
            
            // Tambahkan tooltip
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(btn => {
                btn.addEventListener('mouseover', function() {
                    this.style.transform = 'translateY(-2px)';
                    this.style.boxShadow = '0 4px 8px rgba(0,0,0,0.2)';
                });
                
                btn.addEventListener('mouseout', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = 'none';
                });
            });
        };
        
        // Fitur untuk preview print (CSS khusus print)
        const style = document.createElement('style');
        style.innerHTML = `
            @media print {
                @page {
                    margin: 15mm;
                    size: A4 portrait;
                }
                
                body {
                    margin: 0;
                    background: white !important;
                }
                
                .container {
                    max-width: 100% !important;
                    padding: 0 !important;
                    box-shadow: none !important;
                    margin: 0 !important;
                }
                
                .action-buttons, .watermark {
                    display: none !important;
                }
                
                .stat-box {
                    break-inside: avoid;
                }
                
                .table {
                    break-inside: avoid;
                }
                
                h1, h2, h3 {
                    break-after: avoid;
                }
                
                .footer {
                    break-before: always;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>