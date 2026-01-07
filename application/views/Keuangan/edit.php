<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
<style>
    :root {
        --primary-color: #10375C;
        --secondary-color: #f1c40f;
        --light-bg: #f8f9fa;
    }
    
    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: url("<?= base_url('assets/keuangan.jpg') ?>") no-repeat center center;
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
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 14px;
        padding: 35px 40px;
        width: 100%;
        position: relative;
        z-index: 999;
        max-width: 500px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .form-header {
        text-align: center;
        margin-bottom: 30px;
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
        font-size: 14px;
    }

    .form-label i {
        color: var(--secondary-color);
        font-size: 14px;
        width: 20px;
    }

    .form-control {
        border: 1.5px solid #e0e6ef;
        border-radius: 8px;
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

    .form-select {
        border: 1.5px solid #e0e6ef;
        border-radius: 8px;
        padding: 10px 12px;
        font-size: 14px;
        width: 100%;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.95);
        color: #333;
        cursor: pointer;
    }

    .form-select:focus {
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
        background: linear-gradient(135deg, #0b2c4d, var(--primary-color));
        color: white;
        box-shadow: 0 4px 12px rgba(16, 55, 92, 0.25);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, var(--primary-color), #0b2c4d);
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
</style>

<body>
    <div class="form-container">
        <div class="form-card">
            <!-- Form Header -->
            <div class="form-header">
                <h2>Edit Data Keuangan</h2>
                <p>Perbarui transaksi keuangan di sistem BabeFarm</p>
            </div>

            <!-- Form -->
            <form action="<?= base_url('keuangan/update') ?>" method="post" id="formEditKeuangan">
                <input type="hidden" name="id_keuangan" value="<?= $keuangan->id_keuangan ?>">

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-calendar-day"></i>
                        Tanggal Transaksi
                    </label>
                    <input type="date" 
                           name="tanggal_transaksi" 
                           class="form-control"
                           value="<?= $keuangan->tanggal_transaksi ?>"
                           max="<?= date('Y-m-d') ?>"
                           required>
                    <span class="form-text">Pilih tanggal transaksi</span>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-exchange-alt"></i>
                            Jenis Transaksi
                        </label>
                        <select name="jenis" class="form-select" required>
                            <option value="pemasukan" <?= $keuangan->jenis == 'pemasukan' ? 'selected' : '' ?>>
                                Pendapatan
                            </option>
                            <option value="pengeluaran" <?= $keuangan->jenis == 'pengeluaran' ? 'selected' : '' ?>>
                                Pengeluaran
                            </option>
                        </select>
                        <span class="form-text">Pilih jenis transaksi</span>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-tags"></i>
                            Kategori
                        </label>
                        <input type="text" 
                               name="kategori" 
                               class="form-control" 
                               placeholder="Cth: Penjualan Ayam, Pakan, dll"
                               value="<?= htmlspecialchars($keuangan->kategori) ?>"
                               required>
                        <span class="form-text">Masukkan kategori transaksi</span>
                    </div>
                </div>

                <div class="form-group amount-input">
                    <label class="form-label">
                        <i class="fas fa-money-bill-wave"></i>
                        Jumlah
                    </label>
                    <div class="input-group">
                        <span class="amount-prefix">Rp</span>
                        <input type="text" 
                               name="jumlah" 
                               id="jumlah"
                               class="form-control" 
                               placeholder="0"
                               value="<?= number_format($keuangan->jumlah, 0, ',', '.') ?>"
                               required>
                    </div>
                    <span class="form-text">Masukkan jumlah transaksi dalam Rupiah</span>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-sticky-note"></i>
                        Keterangan (Opsional)
                    </label>
                    <textarea name="keterangan" 
                              class="form-control" 
                              rows="3" 
                              placeholder="Tambahkan keterangan tentang transaksi ini..."><?= htmlspecialchars($keuangan->keterangan ?? '') ?></textarea>
                    <span class="form-text">Deskripsi tambahan tentang transaksi</span>
                </div>

                <!-- Form Helper -->
                <div class="form-helper">
                    <h6><i class="fas fa-info-circle"></i>Informasi Penting</h6>
                    <p>
                        • Pastikan data keuangan diperbarui dengan akurat.<br>
                        • Kategori bisa diisi bebas sesuai kebutuhan.<br>
                        • Perubahan data akan langsung mempengaruhi laporan keuangan.
                    </p>
                </div>

                <!-- Button Container -->
                <div class="btn-container">
                    <a href="<?= base_url('keuangan') ?>" class="btn btn-back">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('formEditKeuangan');
            const submitBtn = form.querySelector('button[type="submit"]');
            const jumlahInput = document.getElementById('jumlah');
            
            // Fungsi: Format angka jadi Rupiah (pakai titik)
            function formatCurrency(input) {
                // Hapus karakter selain angka
                let value = input.value.replace(/[^\d]/g, '');
                if (value) {
                    // Tambahkan titik setiap 3 angka
                    value = parseInt(value).toLocaleString('id-ID');
                    input.value = value;
                }
            }
            
            // Fungsi: Kembalikan ke angka murni (hapus titik)
            function parseCurrency(value) {
                return parseInt(value.replace(/\./g, '')) || 0;
            }
            
            // Event: Saat user mengetik atau meninggalkan kolom (Blur)
            // Format ulang agar ada titiknya (supaya enak dibaca user)
            jumlahInput.addEventListener('blur', function() {
                formatCurrency(this);
            });
            
            // Event: Saat user klik kolom untuk edit (Focus)
            // Hapus titik sementara agar user mudah mengedit angka
            jumlahInput.addEventListener('focus', function() {
                this.value = this.value.replace(/\./g, '');
            });
            
            // PENTING: Format otomatis saat halaman pertama kali dibuka
            // Agar data dari database (misal: 1000000) langsung tampil sebagai 1.000.000
            setTimeout(() => {
                formatCurrency(jumlahInput);
            }, 100);
            
            // Event: Saat Tombol Simpan ditekan
            form.addEventListener('submit', function(e) {
                // Cegah submit otomatis dulu untuk validasi & pembersihan data
                e.preventDefault();
                
                let isValid = true;
                const requiredInputs = [
                    form.querySelector('input[name="tanggal_transaksi"]'),
                    form.querySelector('select[name="jenis"]'),
                    form.querySelector('input[name="kategori"]'),
                    jumlahInput
                ];
                
                // Reset validasi visual
                requiredInputs.forEach(input => {
                    input.classList.remove('is-invalid');
                });
                
                // Cek field kosong
                requiredInputs.forEach(input => {
                    if (!input.value.trim()) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    }
                });
                
                // Cek Validasi Angka (Harus > 0)
                const jumlahValue = parseCurrency(jumlahInput.value);
                if (jumlahValue <= 0) {
                    jumlahInput.classList.add('is-invalid');
                    isValid = false;
                    showToast('Jumlah transaksi harus lebih dari 0!', 'danger');
                }
                
                if (!isValid) {
                    showToast('Harap isi semua field dengan benar!', 'danger');
                    return; // Stop di sini jika tidak valid
                }

                // --- PROSES SUBMIT ASLI ---
                
                // 1. Ubah tombol jadi loading
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
                submitBtn.disabled = true;

                // 2. KUNCI UTAMA: Hapus semua titik pada input Jumlah sebelum dikirim
                // Database butuh "1000000", bukan "1.000.000"
                jumlahInput.value = parseCurrency(jumlahInput.value);
                
                // 3. Submit Form secara manual ke Controller
                form.submit();
            });
        });
        
        // Fungsi Toast (Pesan Notifikasi)
        function showToast(message, type = 'info') {
            const existingToasts = document.querySelectorAll('.toast');
            existingToasts.forEach(toast => toast.remove());
            
            const toast = document.createElement('div');
            toast.className = `toast align-items-center text-white bg-${type} border-0`;
            toast.style.position = 'fixed';
            toast.style.top = '20px';
            toast.style.right = '20px';
            toast.style.zIndex = '9999';
            toast.style.minWidth = '250px';
            toast.innerHTML = `
                <div class="d-flex align-items-center p-3">
                    <div class="toast-body d-flex align-items-center">
                        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-3 fs-5"></i>
                        <span class="me-3">${message}</span>
                    </div>
                </div>
            `;
            document.body.appendChild(toast);
            setTimeout(() => { if (toast.parentElement) toast.remove(); }, 3000);
        }
    </script>
</body>