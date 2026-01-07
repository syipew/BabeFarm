<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
<style>
    :root {
        --primary-color: #10375C;
        --secondary-color: #f0ad4e;
        --light-bg: #f8f9fa;
    }
    
    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: url("<?= base_url('assets/keuangan.jpg') ?>") no-repeat center center;
        background-size: cover;
        min-height: 100vh;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.45);
        z-index: 1;
        pointer-events: none;
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
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 35px 40px;
        width: 100%;
        position: relative;
        z-index: 999;
        max-width: 700px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.2);
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

    .form-control:disabled {
        background: #f8f9fa;
        cursor: not-allowed;
    }

    .form-select {
        border: 2px solid #e0e6ef;
        border-radius: 10px;
        padding: 12px 16px;
        font-size: 16px;
        width: 100%;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.9);
        color: #333;
        cursor: pointer;
    }

    .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(16, 55, 92, 0.15);
        background: white;
        outline: none;
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
        margin-top: 35px;
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
        box-shadow: 0 5px 15px rgba(16, 55, 92, 0.25);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #0b2c4d, var(--primary-color));
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(16, 55, 92, 0.4);
    }

    .btn-warning {
        background: linear-gradient(135deg, var(--secondary-color), #ec971f);
        color: #333;
        box-shadow: 0 5px 15px rgba(240, 173, 78, 0.25);
    }

    .btn-warning:hover {
        background: linear-gradient(135deg, #ec971f, var(--secondary-color));
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(240, 173, 78, 0.4);
    }

    .btn:disabled {
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
        margin-top: 25px;
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

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-card {
        animation: fadeIn 0.6s ease-out;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .form-card {
            padding: 25px 20px;
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
    }

    /* Category badges */
    .badge-category {
        display: inline-block;
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
        margin-right: 5px;
    }

    .badge-pemasukan {
        background-color: rgba(40, 167, 69, 0.15);
        color: #28a745;
        border: 1px solid rgba(40, 167, 69, 0.3);
    }

    .badge-pengeluaran {
        background-color: rgba(220, 53, 69, 0.15);
        color: #dc3545;
        border: 1px solid rgba(220, 53, 69, 0.3);
    }

    /* Amount input styling */
    .amount-input {
        position: relative;
    }

    .amount-prefix {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #666;
        font-weight: 500;
    }

    .amount-input .form-control {
        padding-left: 40px;
    }
</style>

<body>

    <div class="form-container">
        <div class="form-card">
            <!-- Form Header -->
            <div class="form-header">
                <h2>Tambah Data Keuangan</h2>
                <p>Tambahkan transaksi keuangan baru ke dalam sistem BabeFarm</p>
            </div>

            <!-- Form -->
            <form action="<?= base_url('keuangan/simpan') ?>" method="post" id="formTambahKeuangan">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-calendar-alt"></i>
                            Tanggal Transaksi
                        </label>
                        <div class="input-group">
                           <input type="date" 
                                name="tanggal_transaksi"
                                class="form-control"
                                max="<?= date('Y-m-d') ?>"
                                required>
                        </div>
                        <div class="form-text">Tanggal terjadinya transaksi</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-exchange-alt"></i>
                            Jenis Transaksi
                        </label>
                        <select name="jenis" class="form-select" required>
                            <option value="">Pilih Jenis...</option>
                            <option value="pemasukan">
                                <span class="badge-category badge-pemasukan">Pendapatan</span>
                            </option>
                            <option value="pengeluaran">
                                <span class="badge-category badge-pengeluaran">Pengeluaran</span>
                            </option>
                        </select>
                        <div class="form-text">Pilih jenis transaksi keuangan</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-tags"></i>
                            Kategori
                        </label>
                        <input type="text" 
                               name="kategori" 
                               class="form-control" 
                               placeholder="Cth: Penjualan Ayam, Pakan, Obat-obatan, dll"
                               required>
                        <div class="form-text">Masukkan kategori transaksi</div>
                    </div>

                    <div class="form-group amount-input">
                        <label class="form-label">
                            <i class="fas fa-money-bill-wave"></i>
                            Jumlah
                        </label>
                        <div class="input-group">
                            <span class="amount-prefix">Rp</span>
                            <input type="number" 
                                   name="jumlah" 
                                   id="jumlah"
                                   class="form-control" 
                                   placeholder="0"
                                   min="0"
                                   required>
                        </div>
                        <div class="form-text">Masukkan jumlah transaksi dalam Rupiah</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-sticky-note"></i>
                        Keterangan (Opsional)
                    </label>
                    <textarea name="keterangan" 
                              class="form-control" 
                              rows="3" 
                              placeholder="Tambahkan keterangan atau catatan tentang transaksi ini..."></textarea>
                    <div class="form-text">Deskripsi tambahan tentang transaksi</div>
                </div>

                <!-- Form Helper -->
                <div class="form-helper">
                    <h6><i class="fas fa-lightbulb"></i>Tips Pengisian</h6>
                    <p>
                        • Pastikan tanggal transaksi sesuai dengan tanggal sebenarnya.<br>
                        • Pilih jenis transaksi dengan tepat (Pendapatan atau Pengeluaran).<br>
                        • Kategori bisa diisi bebas sesuai kebutuhan (cth: Penjualan Ayam, Pakan, dll).<br>
                        • Untuk transaksi besar (> Rp 1.000.000), sistem akan menandai dengan ikon khusus.<br>
                        • Data yang sudah disimpan dapat diedit melalui menu edit.
                    </p>
                </div>

                <!-- Button Container -->
                <div class="btn-container">
                    <a href="<?= base_url('keuangan') ?>" class="btn btn-back">
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
            const form = document.getElementById('formTambahKeuangan');
            const submitBtn = form.querySelector('button[type="submit"]');
            const jumlahInput = document.getElementById('jumlah');
            
            // Set maximum date to today for tanggal_transaksi
            const today = new Date();
            today.setMinutes(today.getMinutes() - today.getTimezoneOffset());
            const localDate = today.toISOString().split('T')[0];
            
            const dateInput = form.querySelector('input[name="tanggal_transaksi"]');
            dateInput.setAttribute('max', localDate);
            
            // Format number as currency
            function formatCurrency(input) {
                // Format the value with dots as thousand separators
                let value = input.value.replace(/[^\d]/g, '');
                if (value) {
                    value = parseInt(value).toLocaleString('id-ID');
                    input.value = value;
                }
            }
            
            // Parse currency to number
            function parseCurrency(value) {
                return parseInt(value.replace(/\./g, '')) || 0;
            }
            
            // Format jumlah input on blur
            jumlahInput.addEventListener('blur', function() {
                formatCurrency(this);
            });
            
            // Remove formatting on focus
            jumlahInput.addEventListener('focus', function() {
                this.value = this.value.replace(/\./g, '');
            });
            
            // Form validation
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                let isValid = true;
                const requiredInputs = [
                    form.querySelector('input[name="tanggal_transaksi"]'),
                    form.querySelector('select[name="jenis"]'),
                    form.querySelector('input[name="kategori"]'),
                    document.getElementById('jumlah')
                ];
                
                // Reset validation styles
                requiredInputs.forEach(input => {
                    input.classList.remove('is-invalid');
                });
                
                // Validate required fields
                requiredInputs.forEach(input => {
                    if (!input.value.trim()) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    }
                });
                
                // Validate tanggal tidak melebihi hari ini
                const selectedDate = new Date(dateInput.value);
                if (selectedDate > today) {
                    dateInput.classList.add('is-invalid');
                    isValid = false;
                    showAlert('Tanggal transaksi tidak boleh melebihi hari ini!', 'error');
                }
                
                // Validate jumlah is positive
                const jumlahValue = parseCurrency(jumlahInput.value);
                if (jumlahValue <= 0) {
                    jumlahInput.classList.add('is-invalid');
                    isValid = false;
                    showAlert('Jumlah transaksi harus lebih dari 0!', 'error');
                }
                
                if (!isValid) {
                    showAlert('Harap isi semua field dengan benar!', 'error');
                    return;
                }
                
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
                submitBtn.disabled = true;

                jumlahInput.value = parseCurrency(jumlahInput.value);

                form.submit(); 
            });
        });
        
        // Alert notification function
        function showAlert(message, type = 'info') {
            // Remove existing alerts
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
            alert.style.borderRadius = '8px';
            alert.style.zIndex = '9999';
            alert.style.minWidth = '300px';
            alert.style.boxShadow = '0 5px 15px rgba(0,0,0,0.2)';
            alert.style.display = 'flex';
            alert.style.alignItems = 'center';
            alert.style.gap = '10px';
            alert.style.animation = 'fadeIn 0.3s ease-out';
            alert.style.fontSize = '14px';
            alert.style.fontWeight = '500';
            
            // Style based on type
            if (type === 'success') {
                alert.style.backgroundColor = 'rgba(40, 167, 69, 0.15)';
                alert.style.color = '#28a745';
                alert.style.border = '1px solid rgba(40, 167, 69, 0.3)';
            } else {
                alert.style.backgroundColor = 'rgba(220, 53, 69, 0.15)';
                alert.style.color = '#dc3545';
                alert.style.border = '1px solid rgba(220, 53, 69, 0.3)';
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