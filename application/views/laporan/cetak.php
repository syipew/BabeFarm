<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan BabeFarm - <?= date('d F Y') ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .header h1 {
            color: #10375C;
            margin: 0;
        }
        .header p {
            color: #666;
            margin: 5px 0;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }
        .stat-box {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
        }
        .stat-label {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
        }
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #10375C;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .table th {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .table td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN USAHA BABEFARM</h1>
        <p>Tanggal Cetak: <?= date('d F Y') ?></p>
    </div>
    
    <div class="stats">
        <div class="stat-box">
            <div class="stat-label">Total Ayam</div>
            <div class="stat-value"><?= number_format($ringkasan['total_ayam'] ?? 0, 0, ',', '.') ?> ekor</div>
        </div>
        <div class="stat-box">
            <div class="stat-label">Stok Pakan</div>
            <div class="stat-value"><?= number_format($ringkasan['total_pakan'] ?? 0, 0, ',', '.') ?> kg</div>
        </div>
        <div class="stat-box">
            <div class="stat-label">Produksi Bulan Ini</div>
            <div class="stat-value"><?= number_format($ringkasan['produksi_bulan_ini'] ?? 0, 0, ',', '.') ?> butir</div>
        </div>
        <div class="stat-box">
            <div class="stat-label">Saldo Keuangan</div>
            <div class="stat-value">Rp <?= number_format($ringkasan['saldo_keuangan'] ?? 0, 0, ',', '.') ?></div>
        </div>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Indikator</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $indicators = [
                ['Jumlah Ayam Aktif', number_format($ringkasan['total_ayam'] ?? 0, 0, ',', '.') . ' ekor'],
                ['Stok Pakan Tersedia', number_format($ringkasan['total_pakan'] ?? 0, 0, ',', '.') . ' kg'],
                ['Produksi Bulan Ini', number_format($ringkasan['produksi_bulan_ini'] ?? 0, 0, ',', '.') . ' butir'],
                ['Rata-rata Produksi/Hari', number_format($ringkasan['rata_produksi_harian'] ?? 0, 1, ',', '.') . ' butir'],
                ['Total Pemasukan', 'Rp ' . number_format($ringkasan['total_pemasukan'] ?? 0, 0, ',', '.')],
                ['Total Pengeluaran', 'Rp ' . number_format($ringkasan['total_pengeluaran'] ?? 0, 0, ',', '.')],
                ['Saldo Keuangan', 'Rp ' . number_format($ringkasan['saldo_keuangan'] ?? 0, 0, ',', '.')],
                ['Efisiensi Pakan', number_format($ringkasan['efisiensi_pakan'] ?? 0, 2, ',', '.') . ' telur/kg']
            ];
            
            foreach ($indicators as $indicator):
            ?>
            <tr>
                <td><?= $indicator[0] ?></td>
                <td><?= $indicator[1] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <div class="footer">
        <p>Dicetak oleh: <?= $this->session->userdata('nama') ?? 'Administrator' ?></p>
        <p>© <?= date('Y') ?> BabeFarm Management System</p>
    </div>
    
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>