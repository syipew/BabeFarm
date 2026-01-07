<!-- application/views/laporan/index.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?> - Babefarm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary-color: #10375C;
            --secondary-color: #f0ad4e;
            --success-color: #28a745;
            --info-color: #17a2b8;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --light-bg: #f8f9fa;
            --dark-bg: #002b5c;
            --card-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
            padding-bottom: 30px;
        }

        .main-content {
            max-width: 1400px;
            margin: 20px auto;
            padding: 0 20px;
        }

        /* Header Section */
        .page-header {
            background: linear-gradient(135deg, var(--primary-color), #1a4d7c);
            color: white;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: var(--card-shadow);
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 200px;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            transform: skewX(-20deg);
        }

        .page-title {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .page-subtitle {
            font-size: 16px;
            opacity: 0.9;
            font-weight: 300;
        }

        .report-date {
            position: absolute;
            bottom: 20px;
            right: 25px;
            background: rgba(255, 255, 255, 0.15);
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 14px;
            backdrop-filter: blur(10px);
        }

        .user-info {
            position: absolute;
            top: 20px;
            right: 25px;
            background: rgba(255, 255, 255, 0.15);
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 14px;
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Stat Cards */
        .stat-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            border: none;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
        }

        .stat-card-ayam::before { background: linear-gradient(to right, var(--success-color), #20c997); }
        .stat-card-pakan::before { background: linear-gradient(to right, var(--info-color), #20c997); }
        .stat-card-produksi::before { background: linear-gradient(to right, var(--secondary-color), #ec971f); }
        .stat-card-keuangan::before { background: linear-gradient(to right, var(--primary-color), #1a4d7c); }

        .stat-icon {
            width: 70px;
            height: 70px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .stat-card-ayam .stat-icon { background: rgba(40, 167, 69, 0.15); color: var(--success-color); }
        .stat-card-pakan .stat-icon { background: rgba(23, 162, 184, 0.15); color: var(--info-color); }
        .stat-card-produksi .stat-icon { background: rgba(240, 173, 78, 0.15); color: var(--secondary-color); }
        .stat-card-keuangan .stat-icon { background: rgba(16, 55, 92, 0.15); color: var(--primary-color); }

        .stat-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 14px;
            color: #6c757d;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-change {
            font-size: 12px;
            padding: 4px 10px;
            border-radius: 12px;
            font-weight: 600;
        }

        .stat-change.positive { background: rgba(40, 167, 69, 0.15); color: var(--success-color); }
        .stat-change.negative { background: rgba(220, 53, 69, 0.15); color: var(--danger-color); }

        .stat-value {
            font-size: 36px;
            font-weight: 800;
            color: #343a40;
            line-height: 1;
            margin-bottom: 5px;
        }

        .stat-unit {
            font-size: 14px;
            color: #6c757d;
            font-weight: 500;
        }

        /* Charts Section */
        .charts-section {
            margin-bottom: 40px;
        }

        .charts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .chart-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: var(--card-shadow);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .chart-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary-color);
            margin: 0;
        }

        .chart-legend {
            display: flex;
            gap: 15px;
            font-size: 14px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .legend-color {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        /* Data Tables */
        .data-tables {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(550px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .table-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .table-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f6ff;
        }

        .data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .data-table thead th {
            background: linear-gradient(to right, #f8f9fa, #f0f6ff);
            color: var(--primary-color);
            font-weight: 600;
            padding: 16px;
            border-bottom: 2px solid #dee2e6;
            text-align: left;
            position: sticky;
            top: 0;
        }

        .data-table tbody tr {
            transition: all 0.2s ease;
        }

        .data-table tbody tr:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }

        .data-table tbody td {
            padding: 16px;
            border-bottom: 1px solid #eaeaea;
            color: #495057;
        }

        .data-table tbody td:first-child {
            font-weight: 600;
            color: var(--primary-color);
        }

        .data-table tbody td:last-child {
            font-weight: 600;
            color: #343a40;
        }

        .data-table tbody tr:last-child td {
            border-bottom: none;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-good { background: rgba(40, 167, 69, 0.15); color: var(--success-color); }
        .status-warning { background: rgba(255, 193, 7, 0.15); color: var(--warning-color); }
        .status-danger { background: rgba(220, 53, 69, 0.15); color: var(--danger-color); }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .btn-action {
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn-print {
            background: linear-gradient(135deg, var(--primary-color), #1a4d7c);
            color: white;
            box-shadow: 0 4px 15px rgba(16, 55, 92, 0.25);
        }

        .btn-print:hover {
            background: linear-gradient(135deg, #0b2c4d, var(--primary-color));
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(16, 55, 92, 0.35);
            color: white;
        }

        .btn-export {
            background: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-export:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-3px);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .charts-grid,
            .data-tables {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 0 15px;
            }
            
            .stat-cards {
                grid-template-columns: 1fr;
            }
            
            .page-title {
                font-size: 26px;
            }
            
            .stat-value {
                font-size: 32px;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn-action {
                justify-content: center;
            }
            
            .user-info {
                position: relative;
                top: auto;
                right: auto;
                margin-top: 15px;
                justify-content: center;
                width: fit-content;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Loading State */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(16, 55, 92, 0.3);
            border-radius: 50%;
            border-top-color: var(--primary-color);
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="main-content">
        <!-- Page Header -->
        <div class="page-header fade-in">
            <div>
                <h1 class="page-title">LAPORAN USAHA BABEFARM</h1>
                <p class="page-subtitle">Dashboard lengkap untuk monitoring dan analisis performa peternakan</p>
            </div>
            <div class="report-date">
                <i class="fas fa-calendar-alt me-2"></i>
                <?= date('d F Y') ?>
            </div>
            <div class="user-info">
                <i class="fas fa-user"></i>
                <?= $user_name ?>
            </div>
        </div>

        <!-- Stat Cards -->
        <div class="stat-cards">
            <?php
            // Hitung perubahan data (contoh - Anda perlu menyesuaikan dengan data real)
            $change_ayam = isset($total_ayam) && $total_ayam > 0 ? round(($total_ayam / 100) * 5) : 0; // Contoh: 5% pertumbuhan
            $change_pakan = isset($total_pakan) && $total_pakan > 0 ? -round(($total_pakan / 100) * 10) : 0; // Contoh: 10% berkurang
            $change_produksi = isset($produksi_bulan) && $produksi_bulan > 0 ? round(($produksi_bulan / 100) * 15) : 0; // Contoh: 15% bertambah
            $change_keuangan = isset($saldo_keuangan) && $saldo_keuangan > 0 ? round(($saldo_keuangan / 100) * 8) : 0; // Contoh: 8% bertambah
            ?>
            
            <div class="stat-card stat-card-ayam fade-in">
                <div class="stat-icon">
                    <i class="fas fa-kiwi-bird"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-label">Total Ayam</div>
                    <div class="stat-change <?= $change_ayam >= 0 ? 'positive' : 'negative' ?>">
                        <i class="fas fa-<?= $change_ayam >= 0 ? 'arrow-up' : 'arrow-down' ?> me-1"></i>
                        <?= abs($change_ayam) ?> ekor
                    </div>
                </div>
                <div class="stat-value"><?= isset($total_ayam) ? number_format($total_ayam, 0, ',', '.') : '0' ?></div>
                <div class="stat-unit">ekor</div>
            </div>
            
            <div class="stat-card stat-card-pakan fade-in">
                <div class="stat-icon">
                    <i class="fas fa-seedling"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-label">Stok Pakan</div>
                    <div class="stat-change <?= $change_pakan >= 0 ? 'positive' : 'negative' ?>">
                        <i class="fas fa-<?= $change_pakan >= 0 ? 'arrow-up' : 'arrow-down' ?> me-1"></i>
                        <?= abs($change_pakan) ?> kg
                    </div>
                </div>
                <div class="stat-value"><?= isset($total_pakan) ? number_format($total_pakan, 0, ',', '.') : '0' ?></div>
                <div class="stat-unit">kilogram</div>
            </div>
            
            <div class="stat-card stat-card-produksi fade-in">
                <div class="stat-icon">
                    <i class="fas fa-egg"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-label">Produksi Bulan Ini</div>
                    <div class="stat-change <?= $change_produksi >= 0 ? 'positive' : 'negative' ?>">
                        <i class="fas fa-<?= $change_produksi >= 0 ? 'arrow-up' : 'arrow-down' ?> me-1"></i>
                        <?= number_format(abs($change_produksi), 0, ',', '.') ?> butir
                    </div>
                </div>
                <div class="stat-value"><?= isset($produksi_bulan) ? number_format($produksi_bulan, 0, ',', '.') : '0' ?></div>
                <div class="stat-unit">butir telur</div>
            </div>
            
            <div class="stat-card stat-card-keuangan fade-in">
                <div class="stat-icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-label">Saldo Keuangan</div>
                    <div class="stat-change <?= $change_keuangan >= 0 ? 'positive' : 'negative' ?>">
                        <i class="fas fa-<?= $change_keuangan >= 0 ? 'arrow-up' : 'arrow-down' ?> me-1"></i>
                        Rp <?= number_format(abs($change_keuangan), 0, ',', '.') ?>
                    </div>
                </div>
                <div class="stat-value">Rp <?= isset($saldo_keuangan) ? number_format($saldo_keuangan, 0, ',', '.') : '0' ?></div>
                <div class="stat-unit">saldo terkini</div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="charts-section">
            <div class="charts-grid">
                <div class="chart-card fade-in">
                    <div class="chart-header">
                        <h3 class="chart-title">Produksi 12 Bulan Terakhir</h3>
                        <div class="chart-legend">
                            <div class="legend-item">
                                <span class="legend-color" style="background: #f0ad4e;"></span>
                                <span>Telur</span>
                            </div>
                        </div>
                    </div>
                    <canvas id="productionChart" height="250"></canvas>
                </div>
                
                <div class="chart-card fade-in">
                    <div class="chart-header">
                        <h3 class="chart-title">Pengeluaran per Kategori</h3>
                        <div class="chart-legend">
                            <div class="legend-item">
                                <span class="legend-color" style="background: #28a745;"></span>
                                <span>Pakan</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-color" style="background: #dc3545;"></span>
                                <span>Obat</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-color" style="background: #17a2b8;"></span>
                                <span>Lainnya</span>
                            </div>
                        </div>
                    </div>
                    <canvas id="expenseChart" height="250"></canvas>
                </div>
            </div>
        </div>

        <!-- Data Tables -->
        <div class="data-tables">
            <div class="table-card fade-in">
                <h3 class="table-title">Ringkasan Data Usaha</h3>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Indikator</th>
                            <th>Nilai</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Data dari controller
                        $total_ayam_display = isset($jumlah_ayam_akhir) ? $jumlah_ayam_akhir : (isset($total_ayam) ? $total_ayam : 0);
                        $total_pakan_display = isset($stok_pakan) ? $stok_pakan : (isset($total_pakan) ? $total_pakan : 0);
                        $produksi_bulan_display = isset($produksi_bulan_ini) ? $produksi_bulan_ini : (isset($produksi_bulan) ? $produksi_bulan : 0);
                        $saldo_keuangan_display = isset($saldo_keuangan_akhir) ? $saldo_keuangan_akhir : (isset($saldo_keuangan) ? $saldo_keuangan : 0);
                        
                        // Hitung rata-rata produksi per hari
                        $rata_produksi_harian = $produksi_bulan_display > 0 ? round($produksi_bulan_display / 30) : 0;
                        
                        // Hitung efisiensi pakan (contoh perhitungan)
                        $efisiensi_pakan = $total_ayam_display > 0 ? round(($produksi_bulan_display / $total_ayam_display) * 100, 1) : 0;
                        
                        $indicators = [
                            ['Jumlah Ayam Akhir', number_format($total_ayam_display, 0, ',', '.') . ' ekor', 'good'],
                            ['Stok Pakan Tersedia', number_format($total_pakan_display, 0, ',', '.') . ' kg', $total_pakan_display > 500 ? 'good' : ($total_pakan_display > 200 ? 'warning' : 'danger')],
                            ['Produksi Bulan Ini', number_format($produksi_bulan_display, 0, ',', '.') . ' butir', 'good'],
                            ['Rata-rata Produksi/Hari', number_format($rata_produksi_harian, 0, ',', '.') . ' butir', $rata_produksi_harian > 1000 ? 'good' : ($rata_produksi_harian > 500 ? 'warning' : 'danger')],
                            ['Saldo Keuangan', 'Rp ' . number_format($saldo_keuangan_display, 0, ',', '.'), $saldo_keuangan_display > 0 ? 'good' : 'danger'],
                            ['Efisiensi Pakan', $efisiensi_pakan . '%', $efisiensi_pakan > 80 ? 'good' : ($efisiensi_pakan > 60 ? 'warning' : 'danger')]
                        ];
                        
                        foreach ($indicators as $indicator):
                        ?>
                        <tr>
                            <td><?= $indicator[0] ?></td>
                            <td><?= $indicator[1] ?></td>
                            <td>
                                <span class="status-badge status-<?= $indicator[2] ?>">
                                    <?= ucfirst($indicator[2]) ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <div class="table-card fade-in">
                <h3 class="table-title">Trend 6 Bulan Terakhir</h3>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Bulan</th>
                            <th>Produksi</th>
                            <th>Jumlah Ayam</th>
                            <th>Penggunaan Pakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Data contoh - Anda perlu mengambil data real dari database melalui model
                        // Disini saya berikan contoh data statis, tapi sebaiknya ambil dari controller
                        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'];
                        $trend_data = [
                            ['Jan 2024', 32000, 1500, 1200],
                            ['Feb 2024', 34000, 1520, 1250],
                            ['Mar 2024', 35500, 1540, 1300],
                            ['Apr 2024', 36200, 1542, 1320],
                            ['Mei 2024', 37000, 1545, 1350],
                            ['Jun 2024', 37200, 1542, 1340]
                        ];
                        
                        foreach ($trend_data as $data):
                        ?>
                        <tr>
                            <td><?= $data[0] ?></td>
                            <td><?= number_format($data[1], 0, ',', '.') ?> butir</td>
                            <td><?= number_format($data[2], 0, ',', '.') ?> ekor</td>
                            <td><?= number_format($data[3], 0, ',', '.') ?> kg</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="<?= site_url('laporan/cetak') ?>" target="_blank" class="btn-action btn-print">
                <i class="fas fa-print"></i> Cetak Laporan
            </a>
            <button onclick="exportToExcel()" class="btn-action btn-export">
                <i class="fas fa-file-excel"></i> Export Excel
            </button>
        </div>
    </div>

    <script>
        // Inisialisasi Chart.js
        document.addEventListener('DOMContentLoaded', function() {
            // Chart Produksi 12 Bulan
            const productionCtx = document.getElementById('productionChart').getContext('2d');
            
            // Data dari PHP (jika ada)
            const chartData = <?= isset($chart_produksi) ? json_encode($chart_produksi) : '[]' ?>;
            
            // Jika data tidak ada dari controller, gunakan data contoh
            let productionLabels = [];
            let productionValues = [];
            
            if (chartData.length > 0) {
                // Format data dari controller
                chartData.forEach(item => {
                    productionLabels.push(item.bulan);
                    productionValues.push(item.total_produksi);
                });
            } else {
                // Data contoh
                productionLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                productionValues = [32000, 34000, 35500, 36200, 37000, 37200, 38000, 38500, 39000, 39500, 40000, 40500];
            }
            
            const productionChart = new Chart(productionCtx, {
                type: 'line',
                data: {
                    labels: productionLabels,
                    datasets: [{
                        label: 'Produksi Telur',
                        data: productionValues,
                        borderColor: '#f0ad4e',
                        backgroundColor: 'rgba(240, 173, 78, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            ticks: {
                                callback: function(value) {
                                    return value.toLocaleString('id-ID') + ' butir';
                                }
                            }
                        }
                    }
                }
            });

            // Chart Pengeluaran per Kategori
            const expenseCtx = document.getElementById('expenseChart').getContext('2d');
            
            // Data dari PHP (jika ada)
            const expenseData = <?= isset($chart_pengeluaran) ? json_encode($chart_pengeluaran) : '[]' ?>;
            
            let expenseLabels = [];
            let expenseValues = [];
            let expenseColors = [];
            
            if (expenseData.length > 0) {
                // Format data dari controller
                expenseData.forEach(item => {
                    expenseLabels.push(item.kategori);
                    expenseValues.push(item.total);
                    // Beri warna berdasarkan kategori
                    if (item.kategori.toLowerCase().includes('pakan')) {
                        expenseColors.push('#28a745');
                    } else if (item.kategori.toLowerCase().includes('obat')) {
                        expenseColors.push('#dc3545');
                    } else {
                        expenseColors.push('#17a2b8');
                    }
                });
            } else {
                // Data contoh
                expenseLabels = ['Pakan', 'Obat', 'Perawatan', 'Listrik', 'Lainnya'];
                expenseValues = [2500000, 500000, 300000, 200000, 400000];
                expenseColors = ['#28a745', '#dc3545', '#17a2b8', '#6c757d', '#ffc107'];
            }
            
            const expenseChart = new Chart(expenseCtx, {
                type: 'pie',
                data: {
                    labels: expenseLabels,
                    datasets: [{
                        data: expenseValues,
                        backgroundColor: expenseColors,
                        borderWidth: 1,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.raw || 0;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = Math.round((value / total) * 100);
                                    return `${label}: Rp ${value.toLocaleString('id-ID')} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });

            // Animasi untuk cards
            const cards = document.querySelectorAll('.fade-in');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                
                setTimeout(() => {
                    card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });

        // Fungsi untuk export ke Excel
        function exportToExcel() {
            // Tampilkan loading
            const exportBtn = document.querySelector('.btn-export');
            const originalText = exportBtn.innerHTML;
            exportBtn.innerHTML = '<span class="loading"></span> Exporting...';
            exportBtn.disabled = true;
            
            setTimeout(() => {
                // Membuat tabel HTML dari data yang ada
                let html = '<table border="1">';
                
                // Header
                html += '<tr><th colspan="4">LAPORAN USAHA BABEFARM</th></tr>';
                html += '<tr><th colspan="4">Tanggal: <?= date("d F Y") ?></th></tr>';
                html += '<tr><th colspan="4">User: <?= $user_name ?></th></tr>';
                html += '<tr><th colspan="4"></th></tr>';
                
                // Statistik
                html += '<tr><th colspan="4">STATISTIK UTAMA</th></tr>';
                html += '<tr><th>Indikator</th><th>Nilai</th><th>Status</th></tr>';
                
                <?php
                foreach ($indicators as $indicator):
                ?>
                html += '<tr><td><?= $indicator[0] ?></td><td><?= $indicator[1] ?></td><td><?= ucfirst($indicator[2]) ?></td></tr>';
                <?php
                endforeach;
                ?>
                
                html += '<tr><th colspan="4"></th></tr>';
                html += '<tr><th colspan="4">TREND 6 BULAN TERAKHIR</th></tr>';
                html += '<tr><th>Bulan</th><th>Produksi</th><th>Jumlah Ayam</th><th>Penggunaan Pakan</th></tr>';
                
                <?php foreach ($trend_data as $data): ?>
                html += '<tr><td><?= $data[0] ?></td><td><?= number_format($data[1], 0, ",", ".") ?> butir</td><td><?= number_format($data[2], 0, ",", ".") ?> ekor</td><td><?= number_format($data[3], 0, ",", ".") ?> kg</td></tr>';
                <?php endforeach; ?>
                
                html += '</table>';
                
                // Membuat blob dan download
                const blob = new Blob([html], { type: 'application/vnd.ms-excel' });
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = 'Laporan_Babefarm_<?= date("Y-m-d") ?>.xls';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                window.URL.revokeObjectURL(url);
                
                // Kembalikan tombol ke semula
                exportBtn.innerHTML = originalText;
                exportBtn.disabled = false;
                
                alert('Data berhasil diexport ke Excel!');
            }, 1000);
        }

        // Refresh data setiap 5 menit
        setInterval(() => {
            console.log('Memperbarui data laporan...');
            // Di sini Anda bisa menambahkan AJAX call untuk update data real-time
            // Contoh: location.reload(); atau fetch data via AJAX
        }, 300000);
    </script>
</body>
</html>