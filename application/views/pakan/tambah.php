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
        background: url("<?= base_url('assets/pakan.jpg') ?>") no-repeat center center;
        background-size: cover;
        min-height: 100vh;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
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
        border-radius: 20px;
        padding: 40px;
        width: 100%;
        position: relative;
        z-index: 999;
        max-width: 600px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
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
    }

    .form-label i {
        color: var(--secondary-color);
        font-size: 16px;
        width: 20px;
    }

    .form-control {
        border: 2px solid #e0e6ef;
        border-radius: 10px;
        padding: 14px 16px;
        font-size: 16px;
        width: 100%;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.9);
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(16, 55, 92, 0.15);
        background: white;
    }

    .form-control:disabled {
        background: #f8f9fa;
        cursor: not-allowed;
    }

    .input-group {
        position: relative;
        width: 100%;
    }

    .input-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #666;
    }

    .form-text {
        font-size: 10px;
        color: #666;
        margin-top: 6px;
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

    /* Validation States */
    .is-valid {
        border-color: #28a745 !important;
    }

    .is-invalid {
        border-color: #dc3545 !important;
    }

    .valid-feedback {
        color: #28a745;
        font-size: 14px;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 14px;
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
            padding: 30px 20px;
            margin: 20px;
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
</style>

<body>
    <div class="overlay"></div>
    
    <div class="form-container">
        <div class="form-card">
            <!-- Form Header -->
            <div class="form-header">
                <h2>Tambah Data Pakan</h2>
                <p>Tambahkan data pakan baru ke dalam sistem BabeFarm</p>
            </div>

            <!-- Form -->
            <form action="<?= base_url('pakan/tambah') ?>" method="post" id="formTambahPakan">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-seedling"></i>
                            Nama Pakan
                        </label>
                        <div class="input-group">
                            <input type="text" 
                                   name="nama_pakan" 
                                   class="form-control" 
                                   placeholder="Cth: Pakan Grower"
                                   required>
                            <span class="input-icon">
                                <i class="fas fa-edit"></i>
                            </span>
                        </div>
                        <div class="form-text">Masukkan nama pakan yang akan ditambahkan</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-weight-hanging"></i>
                            Satuan
                        </label>
                        <div class="input-group">
                            <input type="text" 
                                   name="satuan" 
                                   class="form-control" 
                                   placeholder="Kg / Sak / Ton"
                                   required>
                            <span class="input-icon">
                                <i class="fas fa-balance-scale"></i>
                            </span>
                        </div>
                        <div class="form-text">Satuan pakan (Kg, Sak, Ton, dll)</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-boxes"></i>
                            Stok Awal
                        </label>
                        <div class="input-group">
                            <input type="number" 
                                   name="stok_awal" 
                                   id="stok_awal"
                                   class="form-control" 
                                   placeholder="0"
                                   min="0"
                                   required>
                            <span class="input-icon">unit</span>
                        </div>
                        <div class="form-text">Stok awal pakan saat ditambahkan</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-box"></i>
                            Stok Sisa
                        </label>
                        <div class="input-group">
                            <input type="number" 
                                   name="stok_sisa" 
                                   id="stok_sisa"
                                   class="form-control" 
                                   placeholder="0"
                                   min="0"
                                   required>
                            <span class="input-icon">unit</span>
                        </div>
                        <div class="form-text">Stok sisa pakan saat ini</div>
                    </div>
                </div>

                <!-- Form Helper -->
                <div class="form-helper">
                    <h6><i class="fas fa-lightbulb"></i>Tips Pengisian</h6>
                    <p>
                        • Pastikan data yang dimasukkan sudah sesuai dengan kondisi pakan yang sebenarnya.<br>
                        • Stok sisa tidak boleh lebih besar dari stok awal.<br>
                        • Satuan harus konsisten untuk memudahkan pelaporan.<br>
                        • Data yang sudah disimpan dapat diedit melalui menu edit.
                    </p>
                </div>

                <!-- Button Container -->
                <div class="btn-container">
                    <a href="<?= base_url('pakan') ?>" class="btn btn-back">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('formTambahPakan');
            const stokAwalInput = document.getElementById('stok_awal');
            const stokSisaInput = document.getElementById('stok_sisa');
            const submitBtn = form.querySelector('button[type="submit"]');
            
            // Validasi stok sisa tidak boleh lebih besar dari stok awal
            function validateStok() {
                const stokAwal = parseInt(stokAwalInput.value) || 0;
                const stokSisa = parseInt(stokSisaInput.value) || 0;
                
                if (stokSisa > stokAwal) {
                    stokSisaInput.classList.add('is-invalid');
                    stokSisaInput.classList.remove('is-valid');
                    return false;
                } else {
                    stokSisaInput.classList.remove('is-invalid');
                    stokSisaInput.classList.add('is-valid');
                    return true;
                }
            }
            
            // Event listeners untuk validasi real-time
            stokAwalInput.addEventListener('input', validateStok);
            stokSisaInput.addEventListener('input', validateStok);
            
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
                
                // Validasi khusus stok
                if (!validateStok()) {
                    isValid = false;
                    showToast('Stok sisa tidak boleh lebih besar dari stok awal!', 'danger');
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
                    showToast('Harap isi semua field dengan benar!', 'danger');
                } else {
                    // Show loading
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
                    submitBtn.disabled = true;
                    
                    // Simulasi delay untuk demo (dalam implementasi nyata, hapus timeout ini)
                    setTimeout(() => {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                        showToast('Data berhasil disimpan!', 'success');
                    }, 1500);
                }
            });
            
            // Reset border color saat input diisi
            const inputs = form.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.value.trim()) {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    }
                });
            });
        });
        
        // Toast notification function
        function showToast(message, type = 'info') {
            const toast = document.createElement('div');
            toast.className = `toast align-items-center text-white bg-${type === 'danger' ? 'danger' : type === 'success' ? 'success' : 'info'} border-0`;
            toast.setAttribute('role', 'alert');
            toast.setAttribute('aria-live', 'assertive');
            toast.setAttribute('aria-atomic', 'true');
            toast.style.position = 'fixed';
            toast.style.top = '20px';
            toast.style.right = '20px';
            toast.style.zIndex = '9999';
            
            toast.innerHTML = `
                <div class="d-flex">
                    <div class="toast-body">
                        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-2"></i>
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            `;
            
            document.body.appendChild(toast);
            
            // Bootstrap Toast initialization
            const bsToast = new bootstrap.Toast(toast, { delay: 3000 });
            bsToast.show();
            
            toast.addEventListener('hidden.bs.toast', function () {
                document.body.removeChild(toast);
            });
        }
    </script>
</body>