

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
            background: url("<?= base_url('assets/ayam.png') ?>") no-repeat center center;
            background-size: cover;
            min-height: 100vh;
        }

        .overlay {
            pointer-events: none;
        }

        .form-container {
            position: relative;
            z-index: 999;
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

        input[type="date"].form-control {
            width: 100%;
            min-width: 100%;
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
            padding: 10px;
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
    </style>
<body>
    <div class="overlay"></div>
    
    <div class="form-container">
        <div class="form-card">
            <!-- Form Header -->
            <div class="form-header">
                <h2>Tambah Data Ayam</h2>
                <p>Tambahkan data ayam baru ke dalam sistem BabeFarm</p>
            </div>

            <!-- Form -->
            <form action="<?= site_url('ayam/simpan') ?>" method="post" id="formTambahAyam">
                <div class="form-row">
                   <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-kiwi-bird"></i>
                            Jenis Ayam
                        </label>
                        <div class="input-group">
                            <input type="text" 
                                name="jenis_ayam" 
                                list="list_ayam" 
                                class="form-control" 
                                placeholder="Pilih atau ketik jenis baru..."
                                required>
                            <datalist id="list_ayam">
                                <?php foreach($semua_ayam as $row): ?>
                                    <option value="<?= $row->jenis_ayam ?>">
                                <?php endforeach; ?>
                            </datalist>
                            <span class="input-icon">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <div class="form-text">Pilih jenis dari daftar atau ketik baru jika belum ada.</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-calendar-alt"></i>
                            Tanggal Masuk
                        </label>
                        <div class="input-group">
                           <input type="date" 
                                name="tanggal_masuk"
                                class="form-control"
                                max="<?= date('Y-m-d') ?>"
                            required>
                        </div>
                        <div class="form-text">Tanggal ayam masuk ke kandang</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-plus-circle"></i>
                            Jumlah Tambah
                        </label>
                        <div class="input-group">
                            <input type="number" 
                                   name="jumlah_tambah" 
                                   class="form-control" 
                                   placeholder="0"
                                   min="0"
                                   required>
                            <span class="input-icon">ekor</span>
                        </div>
                        <div class="form-text">Jumlah ayam yang ditambahkan</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-baby"></i>
                            Umur Awal
                        </label>
                        <div class="input-group">
                            <input type="number" 
                                   name="umur_awal" 
                                   class="form-control" 
                                   placeholder="0"
                                   min="0"
                                   required>
                            <span class="input-icon">bulan</span>
                        </div>
                        <div class="form-text">Umur ayam saat masuk (dalam bulan)</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-skull-crossbones"></i>
                            Jumlah Mati
                        </label>
                        <div class="input-group">
                            <input type="number" 
                                   name="jumlah_mati" 
                                   class="form-control" 
                                   placeholder="0"
                                   min="0"
                                   value="0">
                            <span class="input-icon">ekor</span>
                        </div>
                        <div class="form-text">Jumlah ayam yang mati (jika ada)</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-calculator"></i>
                            Jumlah Ayam
                        </label>
                        <div class="input-group">
                            <input type="number" 
                                   name="jumlah_ayam" 
                                   class="form-control"
                                   placeholder="0"
                                   readonly
                                   required>
                            <span class="input-icon">ekor</span>
                        </div>
                        <div class="form-text">Otomatis terhitung: Jumlah Tambah - Jumlah Mati</div>
                    </div>
                </div>

                <!-- Form Helper -->
                <div class="form-helper">
                    <h6><i class="fas fa-lightbulb"></i>Tips Pengisian</h6>
                    <p>
                        • Pastikan data yang dimasukkan sudah sesuai dengan kondisi ayam yang sebenarnya.<br>
                        • Jumlah ayam akan otomatis terhitung berdasarkan jumlah tambah dikurangi jumlah mati.<br>
                        • Data yang sudah disimpan tidak dapat diubah kecuali melalui menu edit.
                    </p>
                </div>

                <!-- Button Container -->
                <div class="btn-container">
                    <a href="<?= base_url('ayam') ?>" class="btn btn-back">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // Auto-calculate jumlah ayam
        document.addEventListener('DOMContentLoaded', function() {
            const jumlahTambah = document.querySelector('input[name="jumlah_tambah"]');
            const jumlahMati = document.querySelector('input[name="jumlah_mati"]');
            const jumlahAyam = document.querySelector('input[name="jumlah_ayam"]');
            
            function calculateTotal() {
                const tambah = parseInt(jumlahTambah.value) || 0;
                const mati = parseInt(jumlahMati.value) || 0;
                const total = tambah - mati;
                
                if (total < 0) {
                    jumlahAyam.value = 0;
                    jumlahAyam.classList.add('is-invalid');
                    jumlahAyam.classList.remove('is-valid');
                } else {
                    jumlahAyam.value = total;
                    jumlahAyam.classList.add('is-valid');
                    jumlahAyam.classList.remove('is-invalid');
                }
            }
            
            jumlahTambah.addEventListener('input', calculateTotal);
            jumlahMati.addEventListener('input', calculateTotal);
            
            // Initial calculation
            calculateTotal();
            
            // Form validation
            const form = document.getElementById('formTambahAyam');
            form.addEventListener('submit', function(e) {
                let isValid = true;
                const inputs = form.querySelectorAll('input[required]');
                
                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        input.classList.remove('is-invalid');
                        input.classList.add('is-valid');
                    }
                });
                
                // Validate jumlah ayam
                const jumlahAyamValue = parseInt(jumlahAyam.value) || 0;
                if (jumlahAyamValue <= 0) {
                    jumlahAyam.classList.add('is-invalid');
                    isValid = false;
                }
                
                if (!isValid) {
                    e.preventDefault();
                    showToast('Harap isi semua field dengan benar!', 'danger');
                } else {
                    // Show loading
                    const submitBtn = form.querySelector('button[type="submit"]');
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
                    submitBtn.disabled = true;

                }
            });
        });
        
        // Toast notification function
        function showToast(message, type = 'info') {
            const toast = document.createElement('div');
            toast.className = `toast align-items-center text-white bg-${type} border-0`;
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
            
            const bsToast = new bootstrap.Toast(toast);
            bsToast.show();
            
            toast.addEventListener('hidden.bs.toast', function () {
                document.body.removeChild(toast);
            });
        }
        
        // Set minimum date to today for tanggal_masuk
        const today = new Date();
        today.setMinutes(today.getMinutes() - today.getTimezoneOffset());
        const localDate = today.toISOString().split('T')[0];

        document.querySelector('input[name="tanggal_masuk"]').setAttribute('max', localDate);

    </script>
    