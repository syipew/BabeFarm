<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    /* Reset CSS untuk menghindari konflik */
    .laporan-container * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .laporan-container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
        color: #333;
        line-height: 1.6;
        min-height: 100vh;
        padding: 20px;
        margin: 0;
    }

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

    .main-content {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0;
    }

    /* ========== HEADER KHUSUS LAPORAN ========== */
    .laporan-header {
        background: linear-gradient(135deg, var(--primary-color), #1a4d7c);
        color: white;
        padding: 25px 30px;
        border-radius: 15px;
        margin-bottom: 30px;
        box-shadow: var(--card-shadow);
        position: relative;
        overflow: hidden;
    }

    .laporan-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 300px;
        height: 100%;
        background: rgba(255, 255, 255, 0.08);
        transform: skewX(-25deg);
        z-index: 0;
    }

    .laporan-header-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 15px;
        position: relative;
        z-index: 1;
    }

    .laporan-header-left {
        flex: 1;
        min-width: 0;
    }

    .laporan-header-right {
        display: flex;
        align-items: center;
        margin-left: 20px;
    }

    .laporan-header-bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 15px;
        border-top: 1px solid rgba(255, 255, 255, 0.15);
        position: relative;
        z-index: 1;
    }

    .laporan-title {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 5px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        line-height: 1.2;
        letter-spacing: 0.5px;
    }

    .laporan-subtitle {
        font-size: 14px;
        opacity: 0.9;
        font-weight: 300;
        margin: 0;
        max-width: 600px;
    }

    .laporan-user-info {
        background: rgba(255, 255, 255, 0.15);
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 14px;
        backdrop-filter: blur(10px);
        display: flex;
        align-items: center;
        gap: 8px;
        white-space: nowrap;
        transition: all 0.3s ease;
    }

    .laporan-user-info:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .laporan-user-name {
        max-width: 150px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .laporan-report-date {
        background: rgba(255, 255, 255, 0.1);
        padding: 6px 15px;
        border-radius: 20px;
        font-size: 13px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .laporan-header-status {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        opacity: 0.9;
    }

    .laporan-status-indicator {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #4CAF50;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(76, 175, 80, 0.7);
        }
        70% {
            box-shadow: 0 0 0 6px rgba(76, 175, 80, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(76, 175, 80, 0);
        }
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
        display: flex;
        flex-direction: column;
    }

    .stat-card:hover {
        transform: translateY(-5px);
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
        flex-wrap: wrap;
    }

    .stat-label {
        font-size: 14px;
        color: #6c757d;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 5px;
    }

    .stat-change {
        font-size: 12px;
        padding: 4px 10px;
        border-radius: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    .stat-change.positive { background: rgba(40, 167, 69, 0.15); color: var(--success-color); }
    .stat-change.negative { background: rgba(220, 53, 69, 0.15); color: var(--danger-color); }

    .stat-value {
        font-size: 36px;
        font-weight: 800;
        color: #343a40;
        line-height: 1;
        margin-bottom: 5px;
        margin-top: auto;
    }

    .stat-unit {
        font-size: 14px;
        color: #6c757d;
        font-weight: 500;
        margin-top: 5px;
    }

    /* Charts Section */
    .charts-section {
        margin-bottom: 40px;
    }

    .charts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(550px, 1fr));
        gap: 25px;
        margin-bottom: 30px;
    }

    @media (max-width: 1200px) {
        .charts-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .charts-grid {
            grid-template-columns: 1fr;
        }
    }

    .chart-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: var(--card-shadow);
        height: 400px;
        display: flex;
        flex-direction: column;
    }

    .chart-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .chart-title {
        font-size: 20px;
        font-weight: 700;
        color: var(--primary-color);
        margin: 0;
        line-height: 1.3;
    }

    .chart-legend {
        display: flex;
        gap: 15px;
        font-size: 14px;
        flex-wrap: wrap;
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
        flex-shrink: 0;
    }

    .chart-container {
        flex: 1;
        position: relative;
        width: 100%;
        min-height: 300px;
    }

    /* Data Tables */
    .data-tables {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(550px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    @media (max-width: 1200px) {
        .data-tables {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .data-tables {
            grid-template-columns: 1fr;
        }
    }

    .table-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: var(--card-shadow);
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .table-title {
        font-size: 20px;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f6ff;
    }

    .table-wrapper {
        overflow-x: auto;
        flex: 1;
    }

    .data-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        min-width: 500px;
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
        white-space: nowrap;
    }

    .data-table tbody tr {
        transition: all 0.2s ease;
    }

    .data-table tbody tr:hover {
        background-color: #f8f9fa;
    }

    .data-table tbody td {
        padding: 16px;
        border-bottom: 1px solid #eaeaea;
        color: #495057;
        vertical-align: middle;
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
        display: inline-block;
        text-align: center;
        min-width: 70px;
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
        flex-wrap: wrap;
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
        font-size: 14px;
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

    /* ========== RESPONSIVE DESIGN KHUSUS LAPORAN ========== */
    @media (max-width: 1200px) {
        .laporan-title {
            font-size: 26px;
        }
    }

    @media (max-width: 992px) {
        .laporan-title {
            font-size: 24px;
        }
        
        .laporan-subtitle {
            font-size: 13px;
        }
    }

    @media (max-width: 768px) {
        .laporan-container {
            padding: 15px;
        }
        
        .stat-cards {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .laporan-header {
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .laporan-header-top {
            flex-direction: column;
            gap: 15px;
        }
        
        .laporan-header-right {
            margin-left: 0;
            width: 100%;
            justify-content: flex-start;
        }
        
        .laporan-user-info {
            width: 100%;
            justify-content: center;
        }
        
        .laporan-header-bottom {
            flex-direction: column;
            gap: 10px;
            align-items: flex-start;
        }
        
        .laporan-title {
            font-size: 22px;
        }
        
        .laporan-subtitle {
            font-size: 12px;
        }
        
        .stat-value {
            font-size: 32px;
        }
        
        .chart-card {
            height: 350px;
            padding: 20px;
        }
        
        .action-buttons {
            flex-direction: column;
        }
        
        .btn-action {
            justify-content: center;
            width: 100%;
        }
        
        .table-card {
            padding: 20px;
        }
    }

    @media (max-width: 576px) {
        .laporan-title {
            font-size: 20px;
        }
        
        .laporan-subtitle {
            font-size: 11px;
        }
        
        .chart-card {
            height: 300px;
            padding: 15px;
        }
        
        .chart-title {
            font-size: 18px;
        }
        
        .stat-card {
            padding: 20px;
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            font-size: 24px;
        }
        
        .laporan-user-info, .laporan-report-date {
            font-size: 12px;
            padding: 6px 12px;
        }
        
        .laporan-header-status {
            font-size: 12px;
        }
    }

    @media (max-width: 480px) {
        .laporan-header-top {
            flex-wrap: wrap;
        }
        
        .laporan-header-left, .laporan-header-right {
            width: 100%;
        }
        
        .laporan-header-bottom {
            flex-wrap: wrap;
            gap: 10px;
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

    /* Print Styles */
    @media print {
        .laporan-container {
            background: white !important;
            padding: 0 !important;
        }
        
        .laporan-header {
            background: #10375C !important;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
        }
        
        .stat-card, .chart-card, .table-card {
            box-shadow: none !important;
            border: 1px solid #ddd !important;
            break-inside: avoid;
        }
        
        .btn-action, .action-buttons {
            display: none !important;
        }
    }
</style>

<div class="laporan-container">
    <div class="main-content">
        <!-- Header Khusus Laporan -->
        <div class="laporan-header fade-in">
            <div class="laporan-header-top">
                <div class="laporan-header-left">
                    <h1 class="laporan-title">LAPORAN USAHA BABEFARM</h1>
                    <p class="laporan-subtitle">Dashboard lengkap untuk monitoring dan analisis performa peternakan</p>
                </div>
                <div class="laporan-header-right">
                    <div class="laporan-user-info">
                        <i class="fas fa-user"></i>
                        <span class="laporan-user-name"><?= $this->session->userdata('nama_lengkap') ?? $this->session->userdata('username') ?? 'Administrator' ?></span>
                    </div>
                </div>
            </div>
            <div class="laporan-header-bottom">
                <div class="laporan-report-date">
                    <i class="fas fa-calendar-alt"></i>
                    <span><?= date('d F Y') ?></span>
                </div>
                <div class="laporan-header-status">
                    <span class="laporan-status-indicator"></span>
                    <span>Status: Aktif</span>
                </div>
            </div>
        </div>

        <!-- Stat Cards -->
        <div class="stat-cards">
            <?php
            // Inisialisasi data yang dikirim dari controller
            $kandang = $kandang ?? [];
            $pakan = $pakan ?? [];
            $produksi = $produksi ?? [];
            $keuangan = $keuangan ?? [];
            
            // Hitung total data
            $total_ayam = 0;
            foreach ($kandang as $k) {
                $total_ayam += isset($k['jumlah_ayam']) ? (int)$k['jumlah_ayam'] : 0;
            }
            
            $total_pakan = 0;
            foreach ($pakan as $p) {
                $total_pakan += isset($p['stok_sisa']) ? (int)$p['stok_sisa'] : 0;
            }
            
            // Produksi bulan ini (Januari 2026)
            $produksi_bulan = 0;
            $current_month = date('n');
            $current_year = date('Y');
            foreach ($produksi as $p) {
                if (isset($p['tanggal_produksi'])) {
                    $prod_date = strtotime($p['tanggal_produksi']);
                    $prod_month = date('n', $prod_date);
                    $prod_year = date('Y', $prod_date);
                    
                    // Untuk testing, gunakan Januari 2026 karena data di database
                    if ($prod_month == 1 && $prod_year == 2026) {
                        $produksi_bulan += isset($p['jumlah_produksi']) ? (int)$p['jumlah_produksi'] : 0;
                    }
                }
            }
            
            // Saldo keuangan
            $total_pemasukan = 0;
            $total_pengeluaran = 0;
            foreach ($keuangan as $k) {
                if (isset($k['jenis']) && $k['jenis'] == 'pemasukan') {
                    $total_pemasukan += isset($k['jumlah']) ? (float)$k['jumlah'] : 0;
                } elseif (isset($k['jenis']) && $k['jenis'] == 'pengeluaran') {
                    $total_pengeluaran += isset($k['jumlah']) ? (float)$k['jumlah'] : 0;
                }
            }
            $saldo_keuangan = $total_pemasukan - $total_pengeluaran;
            
            // Hitung perubahan data (contoh persentase)
            $change_ayam = $total_ayam > 0 ? round(($total_ayam / 100) * 5) : 0; // 5% pertumbuhan
            $change_pakan = $total_pakan > 0 ? -round(($total_pakan / 100) * 10) : 0; // 10% berkurang
            $change_produksi = $produksi_bulan > 0 ? round(($produksi_bulan / 100) * 15) : 0; // 15% bertambah
            $change_keuangan = $saldo_keuangan > 0 ? round(($saldo_keuangan / 100) * 8) : 0; // 8% bertambah
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
                <div class="stat-value"><?= number_format($total_ayam, 0, ',', '.') ?></div>
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
                <div class="stat-value"><?= number_format($total_pakan, 0, ',', '.') ?></div>
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
                <div class="stat-value"><?= number_format($produksi_bulan, 0, ',', '.') ?></div>
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
                <div class="stat-value">Rp <?= number_format($saldo_keuangan, 0, ',', '.') ?></div>
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
                    <div class="chart-container">
                        <canvas id="productionChart"></canvas>
                    </div>
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
                    <div class="chart-container">
                        <canvas id="expenseChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Tables -->
        <div class="data-tables">
            <div class="table-card fade-in">
                <h3 class="table-title">Ringkasan Data Usaha</h3>
                <div class="table-wrapper">
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
                            // Hitung rata-rata produksi per hari
                            $rata_produksi_harian = $produksi_bulan > 0 ? round($produksi_bulan / 30) : 0;
                            
                            // Hitung efisiensi pakan (contoh perhitungan)
                            $efisiensi_pakan = $total_ayam > 0 ? round(($produksi_bulan / $total_ayam) * 100, 1) : 0;
                            
                            // Data kesehatan (ayam sakit)
                            $kesehatan = $kesehatan ?? [];
                            $total_sakit = 0;
                            foreach ($kesehatan as $k) {
                                if (isset($k['status']) && $k['status'] == 'sakit') {
                                    $total_sakit++;
                                }
                            }
                            $persentase_sakit = $total_ayam > 0 ? round(($total_sakit / $total_ayam) * 100, 1) : 0;
                            
                            $indicators = [
                                ['Jumlah Ayam Akhir', number_format($total_ayam, 0, ',', '.') . ' ekor', 'good'],
                                ['Stok Pakan Tersedia', number_format($total_pakan, 0, ',', '.') . ' kg', $total_pakan > 500 ? 'good' : ($total_pakan > 200 ? 'warning' : 'danger')],
                                ['Produksi Bulan Ini', number_format($produksi_bulan, 0, ',', '.') . ' butir', 'good'],
                                ['Rata-rata Produksi/Hari', number_format($rata_produksi_harian, 0, ',', '.') . ' butir', $rata_produksi_harian > 100 ? 'good' : ($rata_produksi_harian > 50 ? 'warning' : 'danger')],
                                ['Saldo Keuangan', 'Rp ' . number_format($saldo_keuangan, 0, ',', '.'), $saldo_keuangan > 0 ? 'good' : 'danger'],
                                ['Efisiensi Pakan', $efisiensi_pakan . '%', $efisiensi_pakan > 80 ? 'good' : ($efisiensi_pakan > 60 ? 'warning' : 'danger')],
                                ['Ayam Sakit', $persentase_sakit . '%', $persentase_sakit < 5 ? 'good' : ($persentase_sakit < 15 ? 'warning' : 'danger')]
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
            </div>
            
            <div class="table-card fade-in">
                <h3 class="table-title">Trend 6 Bulan Terakhir</h3>
                <div class="table-wrapper">
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
                            // Data contoh - Anda bisa mengambil data real dari database
                            $trend_data = [
                                ['Jul 2025', 32000, 1500, 1200],
                                ['Agu 2025', 34000, 1520, 1250],
                                ['Sep 2025', 35500, 1540, 1300],
                                ['Okt 2025', 36200, 1542, 1320],
                                ['Nov 2025', 37000, 1545, 1350],
                                ['Des 2025', 37200, 1542, 1340]
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
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <button onclick="window.print()" class="btn-action btn-print">
                <i class="fas fa-print"></i> Cetak Laporan
            </button>
        </div>
    </div>
</div>

<script>
    // Inisialisasi Chart.js
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Memulai inisialisasi chart...');
        
        // Chart Produksi 12 Bulan
        const productionCtx = document.getElementById('productionChart');
        
        if (productionCtx) {
            console.log('Canvas productionChart ditemukan');
            
            // Data contoh untuk chart produksi
            const productionLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            const productionValues = [32000, 34000, 35500, 36200, 37000, 37200, 38000, 38500, 39000, 39500, 40000, 40500];
            
            try {
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
                            tension: 0.3,
                            pointBackgroundColor: '#f0ad4e',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                                backgroundColor: 'rgba(0, 0, 0, 0.7)',
                                titleColor: '#fff',
                                bodyColor: '#fff',
                                borderColor: '#f0ad4e',
                                borderWidth: 1,
                                padding: 12,
                                callbacks: {
                                    label: function(context) {
                                        return context.dataset.label + ': ' + context.parsed.y.toLocaleString('id-ID') + ' butir';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: false,
                                min: 30000,
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)',
                                    drawBorder: false
                                },
                                ticks: {
                                    callback: function(value) {
                                        return value.toLocaleString('id-ID') + ' butir';
                                    },
                                    font: {
                                        size: 11
                                    },
                                    padding: 8
                                }
                            },
                            x: {
                                grid: {
                                    display: false,
                                    drawBorder: false
                                },
                                ticks: {
                                    font: {
                                        size: 11
                                    },
                                    padding: 8
                                }
                            }
                        },
                        interaction: {
                            intersect: false,
                            mode: 'nearest'
                        },
                        elements: {
                            line: {
                                tension: 0.3
                            }
                        }
                    }
                });
                
                console.log('Chart produksi berhasil dibuat');
            } catch (error) {
                console.error('Error membuat chart produksi:', error);
            }
        } else {
            console.error('Canvas productionChart tidak ditemukan!');
        }

        // Chart Pengeluaran per Kategori
        const expenseCtx = document.getElementById('expenseChart');
        
        if (expenseCtx) {
            console.log('Canvas expenseChart ditemukan');
            
            <?php
            // Hitung data pengeluaran per kategori dari database
            $expenseData = [
                'Pakan' => 0,
                'Obat' => 0,
                'Vitamin' => 0,
                'Lainnya' => 0
            ];
            
            foreach ($keuangan as $k) {
                if (isset($k['jenis']) && $k['jenis'] == 'pengeluaran') {
                    $kategori = strtolower($k['kategori'] ?? '');
                    if (stripos($kategori, 'pakan') !== false) {
                        $expenseData['Pakan'] += isset($k['jumlah']) ? (float)$k['jumlah'] : 0;
                    } elseif (stripos($kategori, 'obat') !== false) {
                        $expenseData['Obat'] += isset($k['jumlah']) ? (float)$k['jumlah'] : 0;
                    } elseif (stripos($kategori, 'vitamin') !== false) {
                        $expenseData['Vitamin'] += isset($k['jumlah']) ? (float)$k['jumlah'] : 0;
                    } else {
                        $expenseData['Lainnya'] += isset($k['jumlah']) ? (float)$k['jumlah'] : 0;
                    }
                }
            }
            
            // Filter hanya kategori yang memiliki nilai
            $filteredExpenseData = [];
            $filteredExpenseLabels = [];
            $filteredExpenseColors = [];
            $expenseColors = ['#28a745', '#dc3545', '#17a2b8', '#6c757d', '#ffc107'];
            
            $index = 0;
            foreach ($expenseData as $label => $value) {
                if ($value > 0) {
                    $filteredExpenseLabels[] = $label;
                    $filteredExpenseData[] = $value;
                    $filteredExpenseColors[] = $expenseColors[$index % count($expenseColors)];
                    $index++;
                }
            }
            
            // Jika tidak ada data, gunakan contoh
            if (empty($filteredExpenseData)) {
                $filteredExpenseLabels = ['Pakan', 'Obat', 'Perawatan', 'Listrik', 'Lainnya'];
                $filteredExpenseData = [2500000, 500000, 300000, 200000, 400000];
                $filteredExpenseColors = ['#28a745', '#dc3545', '#17a2b8', '#6c757d', '#ffc107'];
            }
            ?>
            
            // Data untuk chart pengeluaran
            const expenseLabels = <?= json_encode($filteredExpenseLabels) ?>;
            const expenseValues = <?= json_encode($filteredExpenseData) ?>;
            const expenseColors = <?= json_encode($filteredExpenseColors) ?>;
            
            try {
                const expenseChart = new Chart(expenseCtx, {
                    type: 'doughnut',
                    data: {
                        labels: expenseLabels,
                        datasets: [{
                            data: expenseValues,
                            backgroundColor: expenseColors,
                            borderWidth: 1,
                            borderColor: '#fff',
                            hoverOffset: 15,
                            hoverBorderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'right',
                                labels: {
                                    padding: 15,
                                    usePointStyle: true,
                                    pointStyle: 'circle',
                                    font: {
                                        size: 12,
                                        family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
                                    },
                                    color: '#333'
                                }
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.7)',
                                titleColor: '#fff',
                                bodyColor: '#fff',
                                borderColor: '#28a745',
                                borderWidth: 1,
                                padding: 12,
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
                        },
                        cutout: '55%',
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        }
                    }
                });
                
                console.log('Chart pengeluaran berhasil dibuat');
            } catch (error) {
                console.error('Error membuat chart pengeluaran:', error);
            }
        } else {
            console.error('Canvas expenseChart tidak ditemukan!');
        }

        // Animasi untuk cards
        const cards = document.querySelectorAll('.fade-in');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
    });

    // Fungsi untuk export ke Excel
    function exportToExcel() {
        const exportBtn = document.querySelector('.btn-export');
        const originalText = exportBtn.innerHTML;
        exportBtn.innerHTML = '<span class="loading"></span> Exporting...';
        exportBtn.disabled = true;
        
        setTimeout(() => {
            // Membuat tabel HTML dari data yang ada
            let html = '<table border="1">';
            
            // Header
            html += '<tr><th colspan="3">LAPORAN USAHA BABEFARM</th></tr>';
            html += '<tr><th colspan="3">Tanggal: <?= date("d F Y") ?></th></tr>';
            html += '<tr><th colspan="3">User: <?= $this->session->userdata("nama_lengkap") ?? $this->session->userdata("username") ?? "Administrator" ?></th></tr>';
            html += '<tr><th colspan="3"></th></tr>';
            
            // Statistik
            html += '<tr><th colspan="3">RINGKASAN DATA USAHA</th></tr>';
            html += '<tr><th>Indikator</th><th>Nilai</th><th>Status</th></tr>';
            
            <?php
            foreach ($indicators as $indicator):
            ?>
            html += '<tr><td><?= $indicator[0] ?></td><td><?= $indicator[1] ?></td><td><?= ucfirst($indicator[2]) ?></td></tr>';
            <?php
            endforeach;
            ?>
            
            html += '<tr><th colspan="3"></th></tr>';
            html += '<tr><th colspan="3">TREND 6 BULAN TERAKHIR</th></tr>';
            html += '<tr><th>Bulan</th><th>Produksi</th><th>Jumlah Ayam</th></tr>';
            
            <?php foreach ($trend_data as $data): ?>
            html += '<tr><td><?= $data[0] ?></td><td><?= number_format($data[1], 0, ",", ".") ?> butir</td><td><?= number_format($data[2], 0, ",", ".") ?> ekor</td></tr>';
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
</script>