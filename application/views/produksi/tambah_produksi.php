<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
<style>
    :root {
        --primary-color: #10375C;
        --secondary-color: #f1c40f;
        --light-bg: #f4f6f6;
    }
    
    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: url("<?= base_url('assets/produksi.jpg') ?>") no-repeat center center;
        background-size: cover;
        min-height: 100vh;
    }

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
        background: rgba(244, 246, 246, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        padding: 35px 40px;
        width: 100%;
        position: relative;
        z-index: 999;
        max-width: 500px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .form-header {
        text-align: center;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 15px;
    }

    .form-header h2 {
        font-size: 24px;
        font-weight: 700;
        color: var(--primary-color);
        margin: 0;
        letter-spacing: 0.5px;
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
        width: 60px;
        height: 3px;
        background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        border-radius: 2px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
    }

    .form-label i {
        color: var(--secondary-color);
        font-size: 14px;
        width: 20px;
    }

    .form-control {
        border: 1.5px solid #bfc5c7;
        border-radius: 6px;
        padding: 10px 12px;
        font-size: 14px;
        width: 100%;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.95);
        color: #444;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(16, 55, 92, 0.1);
        background: white;
        outline: none;
    }

    .form-text {
        font-size: 11px;
        color: #666;
        margin-top: 4px;
        font-style: italic;
        display: block;
    }

    .btn-container {
        display: flex;
        gap: 14px;
        margin-top: 30px;
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

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), #1a4d7c);
        color: white;
        box-shadow: 0 4px 12px rgba(16, 55, 92, 0.25);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #0b2c4d, var(--primary-color));
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(16, 55, 92, 0.35);
    }

    .btn-warning {
        background: linear-gradient(135deg, var(--secondary-color), #e6b800);
        color: #000;
        box-shadow: 0 4px 12px rgba(241, 196, 15, 0.25);
    }

    .btn-warning:hover {
        background: linear-gradient(135deg, #e6b800, var(--secondary-color));
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(241, 196, 15, 0.35);
    }

    .btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .form-helper {
        background: rgba(16, 55, 92, 0.05);
        border-radius: 8px;
        padding: 12px 15px;
        margin-top: 25px;
        border-left: 3px solid var(--secondary-color);
    }

    .form-helper h6 {
        color: var(--primary-color);
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
    }

    .form-helper p {
        color: #666;
        font-size: 11px;
        margin: 0;
        line-height: 1.5;
    }

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-card {
        animation: fadeIn 0.5s ease-out;
    }

    /* Responsive */
    @media (max-width: 576px) {
        .form-card {
            padding: 25px 20px;
            margin: 15px;
            max-width: 100%;
        }
        
        .form-row {
            grid-template-columns: 1fr;
            gap: 12px;
        }
        
        .btn-container {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
        }
        
        .form-header h2 {
            font-size: 22px;
        }
    }

    /* Validation States */
    .is-valid {
        border-color: #28a745 !important;
    }

    .is-invalid {
        border-color: #dc3545 !important;
    }

    /* Date picker styling */
    input[type="date"]::-webkit-calendar-picker-indicator {
        cursor: pointer;
        opacity: 0.7;
    }

    input[type="date"]::-webkit-calendar-picker-indicator:hover {
        opacity: 1;
    }

    /* Number input styling */
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        opacity: 0.6;
        cursor: pointer;
    }

    input[type="number"]::-webkit-inner-spin-button:hover,
    input[type="number"]::-webkit-outer-spin-button:hover {
        opacity: 1;
    }
</style>

<body>

    <div class="form-container">
        <div class="form-card">
            <!-- Form Header -->
            <div class="form-header">
                <h2>Tambah Data Produksi</h2>
                <p>Tambahkan hasil produksi baru ke dalam sistem BabeFarm</p>
            </div>

            <!-- Form -->
            <form action="<?= site_url('produksi/simpan') ?>" method="post" id="formTambahProduksi">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-kiwi-bird"></i>
                            Pilih Kandang / Jenis Ayam
                        </label>
                        <select name="id_kandang" class="form-control" required>
                            <option value="">-- Pilih Jenis Ayam --</option>
                            
                            <?php if(isset($ayam) && !empty($ayam)) : ?>
                                <?php foreach($ayam as $a) : ?>
                                    <option value="<?= $a->id_kandang ?>">
                                        <?= $a->jenis_ayam ?> (Stok: <?= $a->jumlah_ayam ?>)
                                    </option>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <option value="" disabled>Data ayam tidak ditemukan</option>
                            <?php endif; ?>
                            
                        </select>
                        <span class="form-text">Pilih jenis ayam yang menghasilkan produksi</span>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-calendar-day"></i>
                            Tanggal Produksi
                        </label>
                        <input type="date" 
                            name="tanggal_produksi" 
                            class="form-control" 
                            required>
                        <span class="form-text">Pilih tanggal produksi</span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-layer-group"></i>
                            Jumlah Produksi
                        </label>
                        <input type="number" 
                               name="jumlah_produksi" 
                               class="form-control" 
                               placeholder="0"
                               min="0"
                               required>
                        <span class="form-text">Jumlah hasil produksi</span>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-weight"></i>
                            Satuan
                        </label>
                        <input type="text" 
                               name="satuan" 
                               class="form-control" 
                               placeholder="butir / kg / liter"
                               required>
                        <span class="form-text">Satuan produksi</span>
                    </div>
                </div>

                <!-- Form Helper -->
                <div class="form-helper">
                    <h6><i class="fas fa-info-circle"></i>Informasi Penting</h6>
                    <p>
                        • Pastikan data produksi diisi sesuai dengan hasil aktual.<br>
                        • Satuan harus konsisten untuk memudahkan pelaporan.<br>
                        • Isi jenis ayam sesuai dengan data yang ada di sistem.
                    </p>
                </div>

                <!-- Button Container -->
                <div class="btn-container">
                    <a href="<?= base_url('produksi') ?>" class="btn btn-back">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-save">
                        <i class="fas fa-save"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('formTambahProduksi');
            const submitBtn = form.querySelector('button[type="submit"]');
            
            // Set maximum date to today for tanggal_produksi
            const today = new Date();
            today.setMinutes(today.getMinutes() - today.getTimezoneOffset());
            const localDate = today.toISOString().split('T')[0];
            
            const dateInput = form.querySelector('input[name="tanggal_produksi"]');
            dateInput.setAttribute('max', localDate);
            
            // Form validation
            form.addEventListener('submit', function(e) {
                let isValid = true;
                const inputs = form.querySelectorAll('input[required]');
                
                // Reset semua validasi
                inputs.forEach(input => {
                    input.classList.remove('is-invalid', 'is-valid');
                });
                
                // Validasi field wajib
                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        input.classList.add('is-valid');
                    }
                });
                
                // Validasi tanggal tidak melebihi hari ini
                const selectedDate = new Date(dateInput.value);
                if (selectedDate > today) {
                    dateInput.classList.add('is-invalid');
                    isValid = false;
                    showAlert('Tanggal produksi tidak boleh melebihi hari ini!', 'error');
                }
                
                // Validasi angka positif
                const numberInputs = form.querySelectorAll('input[type="number"]');
                numberInputs.forEach(input => {
                    const value = parseInt(input.value) || 0;
                    if (value < 0) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    showAlert('Harap isi semua field dengan benar!', 'error');
                } else {
                    // Show loading
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
                    submitBtn.disabled = true;
                    
                    // Dalam implementasi nyata, form akan disubmit
                    // Untuk demo, kita hanya akan menunjukkan feedback
                    setTimeout(() => {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                        showAlert('Data produksi berhasil disimpan!', 'success');
                    }, 1500);
                }
            });
            
            // Real-time validation saat input
            const inputs = form.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.value.trim()) {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    }
                });
                
                // Validasi khusus untuk angka
                if (input.type === 'number') {
                    input.addEventListener('blur', function() {
                        const value = parseInt(this.value) || 0;
                        if (value < 0) {
                            this.classList.add('is-invalid');
                        }
                    });
                }
            });
        });
        
        // Alert notification function
        function showAlert(message, type = 'info') {
            // Hapus alert yang sudah ada
            const existingAlert = document.querySelector('.custom-alert');
            if (existingAlert) {
                existingAlert.remove();
            }
            
            const alert = document.createElement('div');
            alert.className = `custom-alert alert-${type}`;
            alert.style.position = 'fixed';
            alert.style.top = '20px';
            alert.style.right = '20px';
            alert.style.padding = '12px 20px';
            alert.style.borderRadius = '6px';
            alert.style.zIndex = '9999';
            alert.style.minWidth = '300px';
            alert.style.boxShadow = '0 5px 15px rgba(0,0,0,0.2)';
            alert.style.display = 'flex';
            alert.style.alignItems = 'center';
            alert.style.gap = '10px';
            alert.style.animation = 'fadeIn 0.3s ease-out';
            alert.style.fontSize = '14px';
            
            if (type === 'success') {
                alert.style.backgroundColor = '#d4edda';
                alert.style.color = '#155724';
                alert.style.border = '1px solid #c3e6cb';
            } else {
                alert.style.backgroundColor = '#f8d7da';
                alert.style.color = '#721c24';
                alert.style.border = '1px solid #f5c6cb';
            }
            
            alert.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}" 
                   style="font-size: 18px;"></i>
                <span>${message}</span>
            `;
            
            document.body.appendChild(alert);
            
            // Auto remove after 3 seconds
            setTimeout(() => {
                alert.style.opacity = '0';
                alert.style.transition = 'opacity 0.5s';
                setTimeout(() => {
                    if (alert.parentNode) {
                        document.body.removeChild(alert);
                    }
                }, 500);
            }, 3000);
        }
    </script>
</body>