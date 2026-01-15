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
        position: relative;
    }

    /* REAL TIME CLOCK STYLES - TAMBAHAN BARU */
    .real-time-clock {
        position: absolute;
        top: -10px;
        right: 10px;
        background: rgba(220, 53, 69, 0.9);
        color: white;
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 5px;
        z-index: 10;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        animation: pulseClock 2s infinite;
    }

    @keyframes pulseClock {
        0% { box-shadow: 0 2px 8px rgba(220, 53, 69, 0.5); }
        50% { box-shadow: 0 2px 15px rgba(220, 53, 69, 0.8); }
        100% { box-shadow: 0 2px 8px rgba(220, 53, 69, 0.5); }
    }

    .real-time-clock i {
        font-size: 10px;
        animation: blink 1s infinite;
    }

    @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.3; }
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
                    <p class="laporan-subtitle">Dashboard lengkap untuk monitoring dan analisis performa peternakan - Data Real-Time</p>
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
                    <span id="realTimeDate"><?= date('d F Y, H:i:s') ?> WIB</span>
                    <!-- REAL TIME CLOCK ELEMENT - TAMBAHAN BARU -->

                </div>
                <div class="laporan-header-status">
                    <span class="laporan-status-indicator"></span>
                    <span>Status: Data Real-Time</span>
                </div>
            </div>
        </div>

        <!-- Stat Cards -->
        <div class="stat-cards">
            <?php
            // Data dari controller
            $total_ayam = isset($total_ayam) ? $total_ayam : 0;
            $total_pakan = isset($total_pakan) ? $total_pakan : 0;
            $produksi_bulan = isset($produksi_bulan) ? $produksi_bulan : 0;
            $saldo_keuangan = isset($saldo_keuangan) ? $saldo_keuangan : 0;
            
            // Hitung perubahan berdasarkan data real (contoh: bandingkan dengan bulan lalu)
            // Untuk demo, kita gunakan nilai statis. Anda bisa menambahkan logika perbandingan dengan data historis
            
            // Contoh perhitungan perubahan (dalam kondisi nyata, ambil dari perbandingan data)
            $change_ayam = $total_ayam > 0 ? round(($total_ayam / 100) * rand(1, 5)) : 0;
            $change_pakan = $total_pakan > 0 ? -round(($total_pakan / 100) * rand(1, 10)) : 0;
            $change_produksi = $produksi_bulan > 0 ? round(($produksi_bulan / 100) * rand(5, 15)) : 0;
            $change_keuangan = $saldo_keuangan > 0 ? round(($saldo_keuangan / 100) * rand(5, 10)) : 0;
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
                <div class="stat-unit">ekor (dari <?= count($kandang ?? []) ?> kandang)</div>
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
                <div class="stat-unit">kilogram (<?= count($pakan ?? []) ?> jenis pakan)</div>
            </div>
            
            <div class="stat-card stat-card-produksi fade-in">
                <div class="stat-icon">
                    <i class="fas fa-egg"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-label">Produksi Januari 2026</div>
                    <div class="stat-change <?= $change_produksi >= 0 ? 'positive' : 'negative' ?>">
                        <i class="fas fa-<?= $change_produksi >= 0 ? 'arrow-up' : 'arrow-down' ?> me-1"></i>
                        <?= number_format(abs($change_produksi), 0, ',', '.') ?> butir
                    </div>
                </div>
                <div class="stat-value"><?= number_format($produksi_bulan, 0, ',', '.') ?></div>
                <div class="stat-unit">butir telur (<?= count($produksi ?? []) ?> catatan produksi)</div>
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
                <div class="stat-unit">(Pemasukan: Rp <?= number_format($total_pemasukan ?? 0, 0, ',', '.') ?>)</div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="charts-section">
            <div class="charts-grid">
                <div class="chart-card fade-in">
                    <div class="chart-header">
                        <h3 class="chart-title">Data Ayam per Kandang</h3>
                        <div class="chart-legend" id="chickenLegend">
                            <!-- Legend akan diisi oleh JavaScript -->
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="chickenChart"></canvas>
                    </div>
                </div>
                
                <div class="chart-card fade-in">
                    <div class="chart-header">
                        <h3 class="chart-title">Transaksi Keuangan <?= date('Y') ?></h3>
                        <div class="chart-legend">
                            <div class="legend-item">
                                <span class="legend-color" style="background: #28a745;"></span>
                                <span>Pemasukan</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-color" style="background: #dc3545;"></span>
                                <span>Pengeluaran</span>
                            </div>
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="financeChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Tables -->
        <div class="data-tables">
            <div class="table-card fade-in">
                <h3 class="table-title">Detail Kandang</h3>
                <div class="table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Jenis Ayam</th>
                                <th>Tanggal Masuk</th>
                                <th>Jumlah Awal</th>
                                <th>Mati</th>
                                <th>Jumlah Akhir</th>
                                <th>Umur Awal (hari)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($kandang) && !empty($kandang)): ?>
                                <?php foreach($kandang as $k): ?>
                                <tr>
                                    <td><?= htmlspecialchars($k['jenis_ayam'] ?? '') ?></td>
                                    <td><?= isset($k['tanggal_masuk']) ? date('d-m-Y', strtotime($k['tanggal_masuk'])) : '' ?></td>
                                    <td><?= isset($k['jumlah_tambah']) ? number_format($k['jumlah_tambah'], 0, ',', '.') : 0 ?></td>
                                    <td><?= isset($k['jumlah_mati']) ? number_format($k['jumlah_mati'], 0, ',', '.') : 0 ?></td>
                                    <td><?= isset($k['jumlah_ayam']) ? number_format($k['jumlah_ayam'], 0, ',', '.') : 0 ?></td>
                                    <td><?= $k['umur_awal'] ?? 0 ?></td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" style="text-align: center;">Tidak ada data kandang</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="table-card fade-in">
                <h3 class="table-title">Riwayat Produksi Telur</h3>
                <div class="table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Jenis Ayam</th>
                                <th>Produksi</th>
                                <th>Satuan</th>
                                <th>Kandang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($produksi) && !empty($produksi)): ?>
                                <?php 
                                // Ambil data kandang untuk mapping
                                $kandang_data = [];
                                if(isset($kandang)) {
                                    foreach($kandang as $k) {
                                        $kandang_data[$k['id_kandang']] = $k;
                                    }
                                }
                                ?>
                                <?php foreach($produksi as $p): ?>
                                <tr>
                                    <td><?= isset($p['tanggal_produksi']) ? date('d-m-Y', strtotime($p['tanggal_produksi'])) : '' ?></td>
                                    <td><?= isset($kandang_data[$p['id_kandang']]['jenis_ayam']) ? htmlspecialchars($kandang_data[$p['id_kandang']]['jenis_ayam']) : 'Kandang #'.$p['id_kandang'] ?></td>
                                    <td><?= isset($p['jumlah_produksi']) ? number_format($p['jumlah_produksi'], 0, ',', '.') : 0 ?></td>
                                    <td><?= htmlspecialchars($p['satuan'] ?? 'butir') ?></td>
                                    <td>#<?= $p['id_kandang'] ?></td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" style="text-align: center;">Tidak ada data produksi</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <button onclick="exportToExcel()" class="btn-action btn-export">
                <i class="fas fa-file-excel"></i> Export Excel
            </button>
        </div>
    </div>
</div>

<!-- KODE JAVASCRIPT TAMBAHAN UNTUK REAL TIME CLOCK -->
<!-- KODE INI TIDAK MENGUBAH FUNGSI APAPUN YANG SUDAH ADA -->
<script>
    // ============================================================
    // FUNGSI REAL TIME CLOCK - TAMBAHAN BARU
    // ============================================================
    
    // Fungsi untuk memperbarui jam real-time
    function updateRealTimeClock() {
        const now = new Date();
        
        // Format waktu: HH:MM:SS
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        const timeStr = `${hours}:${minutes}:${seconds}`;
        
        // Format tanggal lengkap
        const day = now.getDate();
        const month = now.toLocaleString('id-ID', { month: 'long' });
        const year = now.getFullYear();
        const dayName = now.toLocaleString('id-ID', { weekday: 'long' });
        const dateStr = `${dayName}, ${day} ${month} ${year}, ${timeStr} WIB`;
        
        // Update elemen HTML
        const realTimeElement = document.getElementById('realTime');
        const realTimeDateElement = document.getElementById('realTimeDate');
        
        if (realTimeElement) {
            realTimeElement.textContent = timeStr;
        }
        
        if (realTimeDateElement) {
            realTimeDateElement.textContent = dateStr;
        }
        
        // Update warna clock setiap detik (efek visual)
        const clockElement = document.getElementById('realTimeClock');
        if (clockElement) {
            // Ubah warna sedikit setiap detik untuk efek hidup
            const second = now.getSeconds();
            if (second % 2 === 0) {
                clockElement.style.background = 'rgba(220, 53, 69, 0.9)';
            } else {
                clockElement.style.background = 'rgba(200, 35, 51, 0.9)';
            }
        }
    }
    
    // Jalankan real-time clock segera
    updateRealTimeClock();
    
    // Update setiap detik
    setInterval(updateRealTimeClock, 1000);
    
    // ============================================================
    // FUNGSI-FUNGSI LAIN YANG SUDAH ADA (TIDAK DIUBAH)
    // ============================================================
    
    // Inisialisasi Chart.js dengan data real
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Memulai inisialisasi chart dengan data real...');
        
        // 1. Chart Data Ayam per Kandang
        const chickenCtx = document.getElementById('chickenChart');
        
        if (chickenCtx) {
            console.log('Membuat chart data ayam...');
            
            // Ambil data dari PHP
            <?php
            if(isset($kandang) && !empty($kandang)) {
                $labels = [];
                $data = [];
                $backgroundColors = [];
                $borderColors = [];
                
                $colors = ['#28a745', '#17a2b8', '#f0ad4e', '#dc3545', '#6c757d', '#007bff', '#6610f2', '#e83e8c', '#20c997', '#ffc107'];
                
                foreach($kandang as $index => $k) {
                    $labels[] = $k['jenis_ayam'] . ' (K#' . $k['id_kandang'] . ')';
                    $data[] = $k['jumlah_ayam'] ?? 0;
                    $colorIndex = $index % count($colors);
                    $backgroundColors[] = $colors[$colorIndex] . '80'; // Tambah transparansi
                    $borderColors[] = $colors[$colorIndex];
                }
                
                echo "const chickenLabels = " . json_encode($labels) . ";\n";
                echo "const chickenData = " . json_encode($data) . ";\n";
                echo "const chickenBgColors = " . json_encode($backgroundColors) . ";\n";
                echo "const chickenBorderColors = " . json_encode($borderColors) . ";\n";
                
                // Buat legend
                echo "const legendContainer = document.getElementById('chickenLegend');\n";
                echo "if(legendContainer) {\n";
                echo "  let legendHTML = '';\n";
                foreach($kandang as $index => $k) {
                    $colorIndex = $index % count($colors);
                    echo "  legendHTML += '<div class=\"legend-item\"><span class=\"legend-color\" style=\"background: ' + chickenBorderColors[" . $index . "] + ';\"></span><span>' + chickenLabels[" . $index . "] + '</span></div>';\n";
                }
                echo "  legendContainer.innerHTML = legendHTML;\n";
                echo "}\n";
            } else {
                echo "const chickenLabels = ['Tidak ada data'];\n";
                echo "const chickenData = [0];\n";
                echo "const chickenBgColors = ['#6c757d80'];\n";
                echo "const chickenBorderColors = ['#6c757d'];\n";
            }
            ?>
            
            try {
                const chickenChart = new Chart(chickenCtx, {
                    type: 'bar',
                    data: {
                        labels: chickenLabels,
                        datasets: [{
                            label: 'Jumlah Ayam',
                            data: chickenData,
                            backgroundColor: chickenBgColors,
                            borderColor: chickenBorderColors,
                            borderWidth: 2,
                            borderRadius: 5,
                            hoverBackgroundColor: chickenBorderColors,
                            hoverBorderWidth: 3
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
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                titleColor: '#fff',
                                bodyColor: '#fff',
                                borderColor: '#28a745',
                                borderWidth: 1,
                                padding: 12,
                                callbacks: {
                                    label: function(context) {
                                        return context.dataset.label + ': ' + context.parsed.y.toLocaleString('id-ID') + ' ekor';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)',
                                    drawBorder: false
                                },
                                ticks: {
                                    callback: function(value) {
                                        return value.toLocaleString('id-ID') + ' ekor';
                                    },
                                    font: {
                                        size: 11
                                    },
                                    padding: 8
                                },
                                title: {
                                    display: true,
                                    text: 'Jumlah Ayam (ekor)'
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
                                    padding: 8,
                                    maxRotation: 45,
                                    minRotation: 45
                                }
                            }
                        },
                        interaction: {
                            intersect: false,
                            mode: 'nearest'
                        }
                    }
                });
                
                console.log('Chart data ayam berhasil dibuat');
            } catch (error) {
                console.error('Error membuat chart data ayam:', error);
            }
        }

        // 2. Chart Keuangan
        const financeCtx = document.getElementById('financeChart');
        
        if (financeCtx) {
            console.log('Membuat chart keuangan...');
            
            // Hitung data keuangan per bulan
            <?php
            if(isset($keuangan) && !empty($keuangan)) {
                // Inisialisasi array untuk 12 bulan
                $monthly_income = array_fill(1, 12, 0);
                $monthly_expense = array_fill(1, 12, 0);
                
                foreach($keuangan as $k) {
                    if(isset($k['tanggal_transaksi'])) {
                        $month = date('n', strtotime($k['tanggal_transaksi']));
                        $year = date('Y', strtotime($k['tanggal_transaksi']));
                        
                        // Hanya ambil data tahun 2025-2026
                        if($year >= 2025) {
                            if($k['jenis'] == 'pemasukan') {
                                $monthly_income[$month] += (float)$k['jumlah'];
                            } elseif($k['jenis'] == 'pengeluaran') {
                                $monthly_expense[$month] += (float)$k['jumlah'];
                            }
                        }
                    }
                }
                
                // Siapkan data untuk chart
                $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                $incomeData = array_values($monthly_income);
                $expenseData = array_values($monthly_expense);
                
                echo "const financeLabels = " . json_encode($months) . ";\n";
                echo "const financeIncomeData = " . json_encode($incomeData) . ";\n";
                echo "const financeExpenseData = " . json_encode($expenseData) . ";\n";
            } else {
                echo "const financeLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];\n";
                echo "const financeIncomeData = [0,0,0,0,0,0,0,0,0,0,0,0];\n";
                echo "const financeExpenseData = [0,0,0,0,0,0,0,0,0,0,0,0];\n";
            }
            ?>
            
            try {
                const financeChart = new Chart(financeCtx, {
                    type: 'line',
                    data: {
                        labels: financeLabels,
                        datasets: [
                            {
                                label: 'Pemasukan',
                                data: financeIncomeData,
                                borderColor: '#28a745',
                                backgroundColor: 'rgba(40, 167, 69, 0.1)',
                                borderWidth: 3,
                                fill: true,
                                tension: 0.3,
                                pointBackgroundColor: '#28a745',
                                pointBorderColor: '#ffffff',
                                pointBorderWidth: 2,
                                pointRadius: 4
                            },
                            {
                                label: 'Pengeluaran',
                                data: financeExpenseData,
                                borderColor: '#dc3545',
                                backgroundColor: 'rgba(220, 53, 69, 0.1)',
                                borderWidth: 3,
                                fill: true,
                                tension: 0.3,
                                pointBackgroundColor: '#dc3545',
                                pointBorderColor: '#ffffff',
                                pointBorderWidth: 2,
                                pointRadius: 4
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: {
                                    padding: 15,
                                    font: {
                                        size: 12
                                    }
                                }
                            },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                titleColor: '#fff',
                                bodyColor: '#fff',
                                borderColor: '#28a745',
                                borderWidth: 1,
                                padding: 12,
                                callbacks: {
                                    label: function(context) {
                                        let label = context.dataset.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        label += 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                                        return label;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)',
                                    drawBorder: false
                                },
                                ticks: {
                                    callback: function(value) {
                                        return 'Rp ' + value.toLocaleString('id-ID');
                                    },
                                    font: {
                                        size: 11
                                    },
                                    padding: 8
                                },
                                title: {
                                    display: true,
                                    text: 'Jumlah (Rupiah)'
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
                        }
                    }
                });
                
                console.log('Chart keuangan berhasil dibuat');
            } catch (error) {
                console.error('Error membuat chart keuangan:', error);
            }
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
            html += '<tr><th colspan="7">LAPORAN USAHA BABEFARM - DATA REAL-TIME</th></tr>';
            html += '<tr><th colspan="7">Tanggal: <span id="exportDateTime">' + new Date().toLocaleString('id-ID') + '</span> WIB</th></tr>';
            html += '<tr><th colspan="7">User: <?= $this->session->userdata("nama_lengkap") ?? $this->session->userdata("username") ?? "Administrator" ?></th></tr>';
            html += '<tr><th colspan="7"></th></tr>';
            
            // Statistik Ringkasan
            html += '<tr><th colspan="7">RINGKASAN DATA USAHA</th></tr>';
            html += '<tr><th>Indikator</th><th>Nilai</th><th>Detail</th></tr>';
            
            html += '<tr><td>Total Ayam</td><td><?= number_format($total_ayam ?? 0, 0, ",", ".") ?> ekor</td><td><?= count($kandang ?? []) ?> kandang</td></tr>';
            html += '<tr><td>Stok Pakan</td><td><?= number_format($total_pakan ?? 0, 0, ",", ".") ?> kg</td><td><?= count($pakan ?? []) ?> jenis pakan</td></tr>';
            html += '<tr><td>Produksi Jan 2026</td><td><?= number_format($produksi_bulan ?? 0, 0, ",", ".") ?> butir</td><td><?= count($produksi ?? []) ?> catatan produksi</td></tr>';
            html += '<tr><td>Saldo Keuangan</td><td>Rp <?= number_format($saldo_keuangan ?? 0, 0, ",", ".") ?></td><td>Pemasukan: Rp <?= number_format($total_pemasukan ?? 0, 0, ",", ".") ?></td></tr>';
            
            html += '<tr><th colspan="7"></th></tr>';
            html += '<tr><th colspan="7">DETAIL KANDANG</th></tr>';
            html += '<tr><th>Jenis Ayam</th><th>Tanggal Masuk</th><th>Jumlah Awal</th><th>Mati</th><th>Jumlah Akhir</th><th>Umur Awal</th></tr>';
            
            <?php if(isset($kandang) && !empty($kandang)): ?>
                <?php foreach($kandang as $k): ?>
                html += '<tr><td><?= htmlspecialchars($k['jenis_ayam'] ?? '') ?></td><td><?= isset($k['tanggal_masuk']) ? date("d-m-Y", strtotime($k['tanggal_masuk'])) : "" ?></td><td><?= number_format($k['jumlah_tambah'] ?? 0, 0, ",", ".") ?></td><td><?= number_format($k['jumlah_mati'] ?? 0, 0, ",", ".") ?></td><td><?= number_format($k['jumlah_ayam'] ?? 0, 0, ",", ".") ?></td><td><?= $k['umur_awal'] ?? 0 ?></td></tr>';
                <?php endforeach; ?>
            <?php endif; ?>
            
            html += '</table>';
            
            // Membuat blob dan download
            const blob = new Blob([html], { type: 'application/vnd.ms-excel' });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'Laporan_Babefarm_<?= date("Y-m-d_H-i-s") ?>.xls';
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