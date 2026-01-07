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
        background: url("<?= base_url('assets/kesehatan.jpg') ?>") no-repeat center center;
        background-size: cover;
        min-height: 100vh;
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
        box-sizing: border-box;
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
</style>

<body>
    <div class="form-container">
        <div class="form-card">
            <!-- Form Header -->
            <div class="form-header">
                <h2>Edit Data Kesehatan Ayam</h2>
                <p>Perbarui data pemeriksaan kesehatan ayam di sistem BabeFarm</p>
            </div>

            <!-- Form -->
            <form action="<?= site_url('kesehatan/update') ?>" method="post" id="formEditKesehatan">
                <input type="hidden" name="id_kesehatan" value="<?= $kesehatan->id_kesehatan ?? '' ?>">
                
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
                                        // LOGIKA SELECT OTOMATIS:
                                        // Cek apakah ID kandang di database ($kesehatan->id_kandang)
                                        // sama dengan ID di loop ($a->id_kandang)?
                                        // Jika ya, tambahkan atribut 'selected'.
                                        $selected = ($kesehatan->id_kandang == $a->id_kandang) ? 'selected' : '';
                                    ?>
                                    <option value="<?= $a->id_kandang ?>" <?= $selected ?>>
                                        <?= $a->jenis_ayam ?> (Stok: <?= $a->jumlah_ayam ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-text">Ubah kandang jika diperlukan</div>
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
                                value="<?= $kesehatan->tanggal_pemeriksaan ?? date('Y-m-d') ?>"
                                max="<?= date('Y-m-d') ?>"
                                required>
                        </div>
                        <div class="form-text">Tanggal pemeriksaan kesehatan ayam</div>
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
                                   value="<?= htmlspecialchars($kesehatan->penyakit ?? '') ?>"
                                   required>
                        </div>
                        <div class="form-text">Jenis penyakit yang ditemukan</div>
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
                                   value="<?= htmlspecialchars($kesehatan->gejala ?? '') ?>"
                                   required>
                        </div>
                        <div class="form-text">Gejala yang terlihat pada ayam</div>
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
                                   placeholder="Cth: Pemberian obat, Isolasi, Vaksinasi, Perawatan khusus"
                                   value="<?= htmlspecialchars($kesehatan->tindakan ?? '') ?>"
                                   required>
                        </div>
                        <div class="form-text">Tindakan yang dilakukan untuk penanganan penyakit</div>
                    </div>
                </div>

                <!-- Form Helper -->
                <div class="form-helper">
                    <h6><i class="fas fa-lightbulb"></i>Tips Pengeditan</h6>
                    <p>
                        • Pastikan data pemeriksaan kesehatan diperbarui dengan akurat dan detail.<br>
                        • Catat semua gejala yang terlihat untuk diagnosa yang tepat.<br>
                        • Tindakan penanganan harus sesuai dengan standar kesehatan unggas.<br>
                        • Perubahan data akan langsung mempengaruhi laporan dan statistik.
                    </p>
                </div>

                <!-- Button Container -->
                <div class="btn-container">
                    <a href="<?= base_url('kesehatan') ?>" class="btn btn-back">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-save">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('formEditKesehatan');
            const submitBtn = form.querySelector('button[type="submit"]');
            
            // Set maximum date to today for tanggal_pemeriksaan
            const today = new Date();
            today.setMinutes(today.getMinutes() - today.getTimezoneOffset());
            const localDate = today.toISOString().split('T')[0];
            
            const dateInput = form.querySelector('input[name="tanggal_pemeriksaan"]');
            if (dateInput && !dateInput.value) {
                dateInput.setAttribute('max', localDate);
            }
            
            // Form validation
            form.addEventListener('submit', function(e) {
                let isValid = true;
                const inputs = form.querySelectorAll('input[required]');
                
                // Reset validation styles
                inputs.forEach(input => {
                    input.classList.remove('is-invalid', 'is-valid');
                });
                
                // Validate required fields
                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        input.classList.remove('is-invalid');
                        input.classList.add('is-valid');
                    }
                });
                
                // Validate tanggal tidak melebihi hari ini
                const selectedDate = new Date(dateInput.value);
                if (selectedDate > today) {
                    dateInput.classList.add('is-invalid');
                    isValid = false;
                    showToast('Tanggal pemeriksaan tidak boleh melebihi hari ini!', 'danger');
                }
                
                if (!isValid) {
                    e.preventDefault();
                    showToast('Harap isi semua field dengan benar!', 'danger');
                } else {
                    // Show loading
                    const submitBtn = form.querySelector('button[type="submit"]');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memperbarui...';
                    submitBtn.disabled = true;
                    
                    // Simulasi pengiriman data (dalam implementasi nyata, hapus timeout ini)
                    setTimeout(() => {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                        showToast('Data kesehatan berhasil diperbarui!', 'success');
                    }, 1500);
                }
            });
        });
        
        // Toast notification function
        function showToast(message, type = 'info') {
            // Remove existing toasts
            const existingToasts = document.querySelectorAll('.toast');
            existingToasts.forEach(toast => toast.remove());
            
            const toast = document.createElement('div');
            toast.className = `toast align-items-center text-white bg-${type} border-0`;
            toast.setAttribute('role', 'alert');
            toast.setAttribute('aria-live', 'assertive');
            toast.setAttribute('aria-atomic', 'true');
            toast.style.position = 'fixed';
            toast.style.top = '20px';
            toast.style.right = '20px';
            toast.style.zIndex = '9999';
            toast.style.minWidth = '250px';
            
            toast.innerHTML = `
                <div class="d-flex align-items-center p-3">
                    <div class="toast-body d-flex align-items-center">
                        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'danger' ? 'exclamation-circle' : 'info-circle'} me-3 fs-5"></i>
                        <span class="me-3">${message}</span>
                    </div>
                    <button type="button" class="btn-close btn-close-white ms-auto" onclick="this.parentElement.parentElement.remove()"></button>
                </div>
            `;
            
            document.body.appendChild(toast);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                if (toast.parentElement) {
                    toast.remove();
                }
            }, 5000);
        }
    </script>
</body>