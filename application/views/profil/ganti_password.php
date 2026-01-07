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
        background: url("<?= base_url('assets/profil.png') ?>") no-repeat center center;
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
        border-radius: 15px;
        padding: 40px;
        width: 100%;
        max-width: 500px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
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
        margin-bottom: 20px;
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
        border-radius: 8px;
        padding: 12px 16px;
        font-size: 15px;
        width: 100%;
        transition: all 0.3s ease;
        background: white;
        color: #333;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(16, 55, 92, 0.1);
        outline: none;
        background: white;
    }

    .password-wrapper {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #666;
        cursor: pointer;
        font-size: 14px;
    }

    .password-toggle:hover {
        color: var(--primary-color);
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
        margin-top: 30px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn {
        padding: 12px 28px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        border: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-width: 150px;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-primary {
        background: linear-gradient(135deg, #1e2a3d, #2c3e50);
        color: white;
        box-shadow: 0 4px 12px rgba(30, 42, 61, 0.25);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #16202b, #1e2a3d);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(30, 42, 61, 0.35);
    }

    .btn-warning {
        background: linear-gradient(135deg, var(--secondary-color), #e6b800);
        color: #000;
        box-shadow: 0 4px 12px rgba(240, 173, 78, 0.25);
    }

    .btn-warning:hover {
        background: linear-gradient(135deg, #e6b800, var(--secondary-color));
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(240, 173, 78, 0.35);
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

    /* Password strength indicator */
    .password-strength {
        margin-top: 5px;
        height: 4px;
        border-radius: 2px;
        background: #e0e6ef;
        overflow: hidden;
    }

    .password-strength-fill {
        height: 100%;
        width: 0%;
        transition: width 0.3s ease, background-color 0.3s ease;
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
            padding: 30px 20px;
            margin: 15px;
            max-width: 100%;
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

<div class="form-container">
    <div class="form-card">
        <!-- Form Header -->
        <div class="form-header">
            <h2>Ganti Password</h2>
            <p>Buat password baru untuk akun Anda</p>
        </div>

        <!-- Form -->
        <form action="<?= base_url('profil/update_password') ?>" method="post" id="formGantiPassword">
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-lock"></i>
                    Password Baru
                </label>
                <div class="password-wrapper">
                    <input type="password" 
                           name="password_baru" 
                           id="passwordBaru"
                           class="form-control" 
                           placeholder="Masukkan password baru"
                           required
                           minlength="6">
                    <button type="button" class="password-toggle" id="togglePasswordBaru">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <div class="password-strength">
                    <div class="password-strength-fill" id="passwordStrength"></div>
                </div>
                <span class="form-text">Minimal 6 karakter dengan kombinasi huruf dan angka</span>
            </div>

            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-lock"></i>
                    Konfirmasi Password
                </label>
                <div class="password-wrapper">
                    <input type="password" 
                           name="konfirmasi" 
                           id="konfirmasiPassword"
                           class="form-control" 
                           placeholder="Konfirmasi password baru"
                           required
                           minlength="6">
                    <button type="button" class="password-toggle" id="toggleKonfirmasi">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <span class="form-text">Masukkan kembali password baru untuk konfirmasi</span>
            </div>

            <!-- Form Helper -->
            <div class="form-helper">
                <h6><i class="fas fa-lightbulb"></i>Tips Keamanan Password</h6>
                <p>
                    • Gunakan kombinasi huruf besar, kecil, angka, dan simbol.<br>
                    • Jangan gunakan informasi pribadi seperti nama atau tanggal lahir.<br>
                    • Pastikan password minimal 6 karakter untuk keamanan optimal.
                </p>
            </div>

            <!-- Button Container -->
            <div class="btn-container">
                <a href="<?= base_url('profil') ?>" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-key"></i> Ganti Password
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('formGantiPassword');
        const submitBtn = form.querySelector('button[type="submit"]');
        const passwordBaruInput = document.getElementById('passwordBaru');
        const konfirmasiPasswordInput = document.getElementById('konfirmasiPassword');
        const passwordStrength = document.getElementById('passwordStrength');
        const togglePasswordBaru = document.getElementById('togglePasswordBaru');
        const toggleKonfirmasi = document.getElementById('toggleKonfirmasi');
        
        // Toggle password visibility
        function setupPasswordToggle(toggleBtn, inputField) {
            toggleBtn.addEventListener('click', function() {
                const type = inputField.getAttribute('type') === 'password' ? 'text' : 'password';
                inputField.setAttribute('type', type);
                
                // Toggle eye icon
                const eyeIcon = this.querySelector('i');
                if (type === 'text') {
                    eyeIcon.classList.remove('fa-eye');
                    eyeIcon.classList.add('fa-eye-slash');
                } else {
                    eyeIcon.classList.remove('fa-eye-slash');
                    eyeIcon.classList.add('fa-eye');
                }
            });
        }
        
        setupPasswordToggle(togglePasswordBaru, passwordBaruInput);
        setupPasswordToggle(toggleKonfirmasi, konfirmasiPasswordInput);
        
        // Password strength indicator
        function checkPasswordStrength(password) {
            let strength = 0;
            
            // Length check
            if (password.length >= 6) strength += 20;
            if (password.length >= 8) strength += 20;
            
            // Character variety
            if (/[a-z]/.test(password)) strength += 20;
            if (/[A-Z]/.test(password)) strength += 20;
            if (/[0-9]/.test(password)) strength += 20;
            if (/[^A-Za-z0-9]/.test(password)) strength += 20;
            
            // Cap at 100
            strength = Math.min(strength, 100);
            
            // Update visual indicator
            passwordStrength.style.width = strength + '%';
            
            // Update color based on strength
            if (strength < 40) {
                passwordStrength.style.backgroundColor = '#dc3545'; // Red
            } else if (strength < 70) {
                passwordStrength.style.backgroundColor = '#fd7e14'; // Orange
            } else {
                passwordStrength.style.backgroundColor = '#28a745'; // Green
            }
        }
        
        // Check password strength on input
        passwordBaruInput.addEventListener('input', function() {
            checkPasswordStrength(this.value);
            
            // Clear konfirmasi if password changes
            if (konfirmasiPasswordInput.value) {
                konfirmasiPasswordInput.classList.remove('is-valid', 'is-invalid');
            }
        });
        
        // Real-time confirmation check
        konfirmasiPasswordInput.addEventListener('input', function() {
            const password = passwordBaruInput.value;
            const konfirmasi = this.value;
            
            if (konfirmasi && password) {
                if (konfirmasi === password) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                } else {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                }
            } else {
                this.classList.remove('is-valid', 'is-invalid');
            }
        });
        
        // Form validation
        form.addEventListener('submit', function(e) {
            let isValid = true;
            const inputs = form.querySelectorAll('input[required]');
            
            // Reset validation
            inputs.forEach(input => {
                input.classList.remove('is-invalid');
            });
            
            // Validate required fields
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    isValid = false;
                }
            });
            
            // Validate password length
            if (passwordBaruInput.value.length < 6) {
                passwordBaruInput.classList.add('is-invalid');
                isValid = false;
            }
            
            // Validate password match
            if (passwordBaruInput.value !== konfirmasiPasswordInput.value) {
                konfirmasiPasswordInput.classList.add('is-invalid');
                isValid = false;
                showToast('Password dan konfirmasi password tidak cocok!', 'error');
            }
            
            if (!isValid) {
                e.preventDefault();
                showToast('Harap isi semua field dengan benar!', 'error');
            } else {
                // Show loading
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengganti...';
                submitBtn.disabled = true;
                
                // Simulate form submission
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    showToast('Password berhasil diganti!', 'success');
                }, 1500);
            }
        });
        
        // Initial password strength check
        checkPasswordStrength(passwordBaruInput.value);
    });
    
    // Toast notification function
    function showToast(message, type = 'info') {
        // Remove existing toasts
        const existingToasts = document.querySelectorAll('.toast');
        existingToasts.forEach(toast => toast.remove());
        
        const toast = document.createElement('div');
        toast.className = `toast align-items-center text-white bg-${type === 'error' ? 'danger' : 'success'} border-0`;
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
                    <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-3 fs-5"></i>
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