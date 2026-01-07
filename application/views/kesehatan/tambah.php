<?php 
    $old = $this->session->flashdata('old_input'); 
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
<style>
    :root {
        --primary-color: #10375C;
        --secondary-color: #f0ad4e;
        --light-bg: #f8f9fa;
        --success-color: #28a745;
        --danger-color: #dc3545;
        --info-color: #17a2b8;
        --warning-color: #ffc107;
    }
    
    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: url("<?= base_url('assets/kesehatan.jpg') ?>") no-repeat center center;
        background-size: cover;
        min-height: 100vh;
    }

    /* Alert Notification Styles - SIMPLIFIED */
    .custom-alert {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 99999;
        min-width: 320px;
        max-width: 380px;
        border-radius: 10px;
        padding: 16px;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        animation: slideIn 0.3s ease-out;
        border: none;
        backdrop-filter: blur(10px);
    }

    .custom-alert.success {
        background: linear-gradient(135deg, #d4edda, #c3e6cb);
        color: #155724;
        border-left: 4px solid var(--success-color);
    }

    .custom-alert.error {
        background: linear-gradient(135deg, #f8d7da, #f5c6cb);
        color: #721c24;
        border-left: 4px solid var(--danger-color);
    }

    .custom-alert.info {
        background: linear-gradient(135deg, #d1ecf1, #bee5eb);
        color: #0c5460;
        border-left: 4px solid var(--info-color);
    }

    .custom-alert.warning {
        background: linear-gradient(135deg, #fff3cd, #ffeaa7);
        color: #856404;
        border-left: 4px solid var(--warning-color);
    }

    .alert-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        flex-shrink: 0;
        background-color: rgba(255, 255, 255, 0.3);
    }

    .alert-icon.success {
        background-color: rgba(40, 167, 69, 0.2);
        color: var(--success-color);
    }

    .alert-icon.error {
        background-color: rgba(220, 53, 69, 0.2);
        color: var(--danger-color);
    }

    .alert-icon.info {
        background-color: rgba(23, 162, 184, 0.2);
        color: var(--info-color);
    }

    .alert-icon.warning {
        background-color: rgba(255, 193, 7, 0.2);
        color: var(--warning-color);
    }

    .alert-content {
        flex: 1;
        min-width: 0; /* Untuk ellipsis */
    }

    .alert-title {
        font-weight: 700;
        font-size: 14px;
        margin-bottom: 2px;
    }

    .alert-message {
        font-size: 13px;
        line-height: 1.3;
        opacity: 0.9;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 250px;
    }

    .alert-close {
        background: none;
        border: none;
        color: inherit;
        opacity: 0.6;
        cursor: pointer;
        font-size: 14px;
        padding: 4px;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.2s ease;
        flex-shrink: 0;
    }

    .alert-close:hover {
        opacity: 1;
        background-color: rgba(0, 0, 0, 0.1);
    }

    .progress-bar {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 2px;
        background: currentColor;
        opacity: 0.3;
        animation: progress 3s linear forwards;
        border-radius: 0;
    }

    @keyframes slideIn {
        0% {
            opacity: 0;
            transform: translateX(100%) translateY(-10px);
        }
        100% {
            opacity: 1;
            transform: translateX(0) translateY(0);
        }
    }

    @keyframes slideOut {
        0% {
            opacity: 1;
            transform: translateX(0) translateY(0);
        }
        100% {
            opacity: 0;
            transform: translateX(100%) translateY(-10px);
        }
    }

    @keyframes progress {
        0% {
            width: 100%;
        }
        100% {
            width: 0%;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Form Styles (existing) */
    .form-container {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
    }

    .form-card {
        background: rgba(248, 248, 248, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 40px;
        width: 100%;
        position: relative;
        z-index: 999;
        max-width: 700px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.2);
        animation: fadeIn 0.6s ease-out;
    }

    .form-header {
        text-align: center;
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 20px;
    }

    .form-header h2 {
        font-size: 28px;
        font-weight: 700;
        color: var(--primary-color);
        margin: 0;
    }

    .form-header p {
        color: #666;
        font-size: 16px;
        margin-top: 8px;
    }

    .form-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        border-radius: 2px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-label {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }

    .form-label i {
        color: var(--secondary-color);
        font-size: 16px;
        width: 20px;
    }

    .form-control {
        border: 2px solid #e0e6ef;
        border-radius: 10px;
        padding: 12px 16px;
        font-size: 16px;
        width: 100%;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.9);
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(16, 55, 92, 0.15);
        background: white;
        outline: none;
    }

    .input-group {
        position: relative;
        width: 100%;
    }

    input[type="date"].form-control {
        width: 100%;
        min-width: 100%;
    }

    .form-text {
        font-size: 12px;
        color: #666;
        margin-top: 6px;
        font-style: italic;
    }

    .btn-container {
        display: flex;
        gap: 15px;
        margin-top: 40px;
        justify-content: center;
    }

    .btn {
        padding: 14px 32px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 14px;
        border: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        min-width: 150px;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-back {
        background: #f8f9fa;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
    }

    .btn-back:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(16, 55, 92, 0.3);
    }

    .btn-save {
        background: linear-gradient(135deg, var(--primary-color), #1a4d7c);
        color: white;
        box-shadow: 0 5px 15px rgba(16, 55, 92, 0.3);
    }

    .btn-save:hover {
        background: linear-gradient(135deg, #0b2c4d, var(--primary-color));
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(16, 55, 92, 0.4);
    }

    .btn-save:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-helper {
        background: rgba(16, 55, 92, 0.05);
        border-radius: 10px;
        padding: 15px;
        margin-top: 30px;
        border-left: 4px solid var(--secondary-color);
    }

    .form-helper h6 {
        color: var(--primary-color);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-helper p {
        color: #666;
        font-size: 12px;
        margin: 0;
        line-height: 1.6;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .form-card {
            padding: 30px 20px;
            margin: 20px;
            max-width: 100%;
        }
        
        .form-row {
            grid-template-columns: 1fr;
            gap: 15px;
        }
        
        .btn-container {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
        }
        
        .form-header h2 {
            font-size: 24px;
        }
        
        .custom-alert {
            min-width: 280px;
            max-width: 320px;
            right: 10px;
            left: 10px;
            margin: 0 auto;
        }
        
        .alert-message {
            max-width: 200px;
        }
    }

    @media (max-width: 480px) {
        .custom-alert {
            min-width: 250px;
            max-width: 280px;
            padding: 12px;
        }
        
        .alert-icon {
            width: 28px;
            height: 28px;
            font-size: 14px;
        }
        
        .alert-title {
            font-size: 13px;
        }
        
        .alert-message {
            font-size: 12px;
            max-width: 170px;
        }
    }
</style>

<body>
    
    <div class="form-container">
        <div class="form-card">
            <!-- Form Header -->
            <div class="form-header">
                <h2>Tambah Data Kesehatan Ayam</h2>
                <p>Catat pemeriksaan kesehatan ayam ke dalam sistem BabeFarm</p>
            </div>

            <!-- Form -->
            <form action="<?= base_url('kesehatan/simpan') ?>" method="post" id="formTambahKesehatan">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-kiwi-bird"></i>
                            Pilih Kandang / Jenis Ayam
                        </label>
                        <div class="input-group">
                            <select name="id_kandang" class="form-control" required>
                                <option value="">-- Pilih Kandang --</option>
                                <?php foreach($ayam as $a) : ?>
                                    <?php 
                                        // Cek apakah ini pilihan user sebelumnya?
                                        $selected = '';
                                        // 1. Cek dari data redirect (kasus "masih sakit")
                                        if (isset($old['id_kandang']) && $old['id_kandang'] == $a->id_kandang) {
                                            $selected = 'selected';
                                        }
                                        // 2. Cek dari validasi error biasa (kasus field kosong)
                                        elseif (set_select('id_kandang', $a->id_kandang)) {
                                            $selected = 'selected';
                                        }
                                    ?>
                                    <option value="<?= $a->id_kandang ?>" <?= $selected ?>>
                                        <?= $a->jenis_ayam ?> (Stok: <?= $a->jumlah_ayam ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-text">Pilih kandang ayam yang diperiksa</div>
                        <?= form_error('id_kandang', '<div class="text-danger small mt-1">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-calendar-alt"></i>
                            Tanggal Pemeriksaan
                        </label>
                        <div class="input-group">
                           <input type="date" 
                                name="tanggal_pemeriksaan"
                                class="form-control"
                                value="<?= set_value('tanggal_pemeriksaan') ?>"
                                required>
                        </div>
                        <div class="form-text">Tanggal pemeriksaan kesehatan ayam</div>
                        <?= form_error('tanggal_pemeriksaan', '<div class="text-danger small mt-1">', '</div>') ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-virus"></i>
                            Penyakit
                        </label>
                        <div class="input-group">
                            <input type="text" 
                                   name="penyakit" 
                                   class="form-control" 
                                   placeholder="Cth: Tetelo, Snot, Berak Kapur"
                                   value="<?= isset($old['penyakit']) ? $old['penyakit'] : set_value('penyakit') ?>"
                                   required>
                        </div>
                        <div class="form-text">Jenis penyakit yang ditemukan</div>
                        <?= form_error('penyakit', '<div class="text-danger small mt-1">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-stethoscope"></i>
                            Gejala
                        </label>
                        <div class="input-group">
                            <input type="text" 
                                   name="gejala" 
                                   class="form-control" 
                                   placeholder="Cth: Lemas, nafsu makan turun, diare"
                                   value="<?= isset($old['gejala']) ? $old['gejala'] : set_value('gejala') ?>"
                                   required>
                        </div>
                        <div class="form-text">Gejala yang terlihat pada ayam</div>
                        <?= form_error('gejala', '<div class="text-danger small mt-1">', '</div>') ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group" style="grid-column: span 2;">
                        <label class="form-label">
                            <i class="fas fa-briefcase-medical"></i>
                            Tindakan
                        </label>
                        <div class="input-group">
                            <input type="text" 
                                name="tindakan" 
                                class="form-control" 
                                placeholder="Cth: Pemberian obat, Isolasi, Vaksinasi"
                                value="<?= isset($old['tindakan']) ? $old['tindakan'] : set_value('tindakan') ?>"
                                required>
                        </div>
                        <div class="form-text">Tindakan yang dilakukan untuk penanganan penyakit</div>
                        <?= form_error('tindakan', '<div class="text-danger small mt-1">', '</div>') ?>
                    </div>
                </div>

                <!-- Form Helper -->
                <div class="form-helper">
                    <h6><i class="fas fa-lightbulb"></i>Tips Pengisian</h6>
                    <p>
                        • Pastikan data pemeriksaan kesehatan diisi dengan akurat dan detail.<br>
                        • Catat semua gejala yang terlihat untuk diagnosa yang tepat.<br>
                        • Tindakan penanganan harus sesuai dengan standar kesehatan unggas.<br>
                        • Data yang sudah disimpan dapat diedit melalui menu edit.
                    </p>
                </div>

                <!-- Button Container -->
                <div class="btn-container">
                    <a href="<?= base_url('kesehatan') ?>" class="btn btn-back">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-save" id="btnSubmit">
                        <i class="fas fa-save"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('formTambahKesehatan');
            const submitBtn = document.getElementById('btnSubmit');
            
            // Set minimum date to today for tanggal_pemeriksaan
            const today = new Date();
            today.setMinutes(today.getMinutes() - today.getTimezoneOffset());
            const localDate = today.toISOString().split('T')[0];
            
            const dateInput = form.querySelector('input[name="tanggal_pemeriksaan"]');
            dateInput.setAttribute('max', localDate);
            
            // Jika belum ada nilai, set default ke hari ini
            if (!dateInput.value) {
                dateInput.value = localDate;
            }
            
            // Form validation
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                let isValid = true;
                const inputs = form.querySelectorAll('input[required], select[required]');
                
                // Reset error styles
                inputs.forEach(input => {
                    input.style.borderColor = '#e0e6ef';
                });
                
                // Validasi field wajib
                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        input.style.borderColor = '#dc3545';
                        isValid = false;
                    }
                });
                
                // Validasi tanggal
                const selectedDate = new Date(dateInput.value);
                if (selectedDate > today) {
                    dateInput.style.borderColor = '#dc3545';
                    isValid = false;
                    showAlert('Tanggal tidak boleh melebihi hari ini', 'error');
                    return;
                }
                
                if (!isValid) {
                    showAlert('Harap isi semua field', 'error');
                    return;
                }
                
                // Show loading
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
                submitBtn.disabled = true;
                
                // Submit form secara programatik
                form.submit();
            });
            
            // Reset border color saat input diisi
            const inputs = form.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.value.trim()) {
                        this.style.borderColor = '#e0e6ef';
                    }
                });
            });
        });
        
        // Improved Alert Notification Function with shorter messages
        function showAlert(message, type = 'info') {
            // Remove existing alerts
            const existingAlerts = document.querySelectorAll('.custom-alert');
            existingAlerts.forEach(alert => {
                alert.style.animation = 'slideOut 0.3s ease-out';
                setTimeout(() => alert.remove(), 300);
            });
            
            // Shorten message if too long
            let shortMessage = message;
            if (message.length > 50) {
                shortMessage = message.substring(0, 47) + '...';
            }
            
            // Simplify titles based on type
            const titleMap = {
                'success': 'Berhasil',
                'error': 'Error',
                'info': 'Info',
                'warning': 'Peringatan'
            };
            
            const iconMap = {
                'success': 'check-circle',
                'error': 'exclamation-circle',
                'info': 'info-circle',
                'warning': 'exclamation-triangle'
            };
            
            const alertTitle = titleMap[type] || 'Info';
            const alertIcon = iconMap[type] || 'info-circle';
            
            // Create alert element
            const alert = document.createElement('div');
            alert.className = `custom-alert ${type}`;
            alert.setAttribute('role', 'alert');
            
            alert.innerHTML = `
                <div class="alert-icon ${type}">
                    <i class="fas fa-${alertIcon}"></i>
                </div>
                <div class="alert-content">
                    <div class="alert-title">${alertTitle}</div>
                    <div class="alert-message" title="${message}">${shortMessage}</div>
                </div>
                <button class="alert-close" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
                <div class="progress-bar"></div>
            `;
            
            document.body.appendChild(alert);
            
            // Close button functionality
            const closeBtn = alert.querySelector('.alert-close');
            closeBtn.addEventListener('click', () => {
                alert.style.animation = 'slideOut 0.3s ease-out';
                setTimeout(() => alert.remove(), 300);
            });
            
            // Auto remove after 4 seconds
            const autoRemove = setTimeout(() => {
                alert.style.animation = 'slideOut 0.3s ease-out';
                setTimeout(() => alert.remove(), 300);
            }, 4000);
            
            // Pause auto-remove on hover
            alert.addEventListener('mouseenter', () => {
                clearTimeout(autoRemove);
                alert.querySelector('.progress-bar').style.animationPlayState = 'paused';
            });
            
            alert.addEventListener('mouseleave', () => {
                const newAutoRemove = setTimeout(() => {
                    alert.style.animation = 'slideOut 0.3s ease-out';
                    setTimeout(() => alert.remove(), 300);
                }, 4000);
                alert.dataset.timeoutId = newAutoRemove;
                alert.querySelector('.progress-bar').style.animationPlayState = 'running';
            });
        }
    </script>
    
    <?php 
    // Function to shorten flash messages
    function shorten_message($message, $max_length = 50) {
        if (strlen($message) > $max_length) {
            return substr($message, 0, $max_length - 3) . '...';
        }
        return $message;
    }
    ?>
    
    <?php 
    // Logika Penggabungan Pesan (Agar rapi dan aman)
    $msg = '';
    $type = '';

    if($this->session->flashdata('error_msg')) {
        $msg = $this->session->flashdata('error_msg');
        $type = 'error';
    } 
    elseif($this->session->flashdata('success_msg')) {
        $msg = $this->session->flashdata('success_msg');
        $type = 'success';
    } 
    elseif($alert = $this->session->flashdata('alert')) {
        $msg = $alert['message'];
        $type = $alert['type'];
    }
    
    // Potong pesan jika terlalu panjang (Optional, sesuaikan fungsi shorten_message Anda)
    if (function_exists('shorten_message')) {
        $msg = shorten_message($msg);
    }
    ?>

    <?php if ($msg): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // json_encode otomatis menangani tanda kutip yang sering bikin error JavaScript
                var pesan = <?= json_encode($msg) ?>;
                var tipe = <?= json_encode($type) ?>;
                
                showAlert(pesan, tipe);
            });
        </script>
    <?php endif; ?>
</body>