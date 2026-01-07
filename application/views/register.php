<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - BabeFarm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #10375C;
            --secondary-color: #f0ad4e;
            --light-bg: #f8f9fa;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('<?= base_url("assets/register.jpg"); ?>') no-repeat center center;
            background-size: cover;
            min-height: 100vh;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
            pointer-events: none;
        }
        .register-container {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .register-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 35px 40px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        /* Logo Container */
        .logo-container {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }
        .logo-wrapper {
            display: inline-block;
            position: relative;
            margin-bottom: 15px;
        }
        .logo-frame {
            width: 120px;
            height: 70px;
            background: linear-gradient(135deg, #ffffffff, #ffffffff);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 10px rgba(0, 23, 125, 0);
            margin: 0 auto 15px;
            overflow: hidden;
            padding: 10px;
        }
        .logo {
            width: 250%;
            height: 250%;
            object-fit: contain;
            filter: brightness(1.1);
        }
        .brand-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-color);
            line-height: 1.2;
            margin-bottom: 5px;
            letter-spacing: -0.5px;
        }
        .brand-subtitle {
            font-size: 14px;
            font-weight: 500;
            color: #666;
            margin-bottom: 10px;
        }
        .system-badge {
            display: inline-block;
            padding: 6px 20px;
            font-size: 12px;
            background: rgba(16, 55, 92, 0.1);
            color: var(--primary-color);
            border-radius: 20px;
            font-weight: 600;
            letter-spacing: 0.5px;
            border: 1px solid rgba(16, 55, 92, 0.2);
        }
        
        /* Form Styles */
        .form-group {
            margin-bottom: 18px;
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
        .btn-register {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #f0ad4e, #e4b216);
            color: #10375C;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 4px 12px rgba(240, 173, 78, 0.25);
            margin-top: 10px;
        }
        .btn-register:hover {
            background: linear-gradient(135deg, #e4b216, #f0ad4e);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(240, 173, 78, 0.35);
        }
        .btn-register:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }
        .login-link {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e0e6ef;
            color: #666;
            font-size: 14px;
        }
        .login-link a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .login-link a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }
        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: fadeIn 0.3s ease-out;
        }
        .alert-error {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.2);
        }
        .alert-success {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
            border: 1px solid rgba(40, 167, 69, 0.2);
        }
        .alert i {
            font-size: 16px;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .register-card {
            animation: fadeIn 0.5s ease-out;
        }
        
        /* Form Layout */
        .form-row {
            display: flex;
            gap: 15px;
        }
        .form-row .form-group {
            flex: 1;
        }
        
        @media (max-width: 576px) {
            .register-container {
                padding: 15px;
            }
            .register-card {
                padding: 25px 20px;
                max-width: 100%;
            }
            .logo-frame {
                width: 100px;
                height: 60px;
            }
            .brand-title {
                font-size: 24px;
            }
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
        
        /* Additional Styles */
        .input-hint {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
            margin-left: 28px;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <div class="register-card">
            <!-- Logo Container -->
            <div class="logo-container">
                <div class="logo-wrapper">
                    <div class="logo-frame">
                        <img src="<?= base_url('assets/logo.png'); ?>" class="logo" alt="Babe Farm Logo">
                    </div>
                </div>
                <div class="brand-title">BabeFarm</div>
                <div class="brand-subtitle">Manajemen Peternakan Ayam</div>
                <span class="system-badge">Registration</span>
            </div>

            <?php if($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <?= $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <?php if(validation_errors()): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= site_url('register'); ?>" id="registerForm">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-user"></i>
                            Nama Lengkap
                        </label>
                        <input type="text" 
                               name="nama" 
                               class="form-control" 
                               placeholder="Masukkan nama lengkap"
                               value="<?= set_value('nama'); ?>"
                               required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-at"></i>
                            Username
                        </label>
                        <input type="text" 
                               name="username" 
                               class="form-control" 
                               placeholder="Masukkan username"
                               value="<?= set_value('username'); ?>"
                               required>
                        <div class="input-hint">Minimal 4 karakter</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-envelope"></i>
                        Email
                    </label>
                    <input type="email" 
                           name="email" 
                           class="form-control" 
                           placeholder="Masukkan alamat email"
                           value="<?= set_value('email'); ?>"
                           required>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-phone"></i>
                        Nomor Telepon
                    </label>
                    <input type="text" 
                           name="telepon" 
                           class="form-control" 
                           placeholder="Masukkan nomor telepon"
                           value="<?= set_value('telepon'); ?>"
                           required>
                    <div class="input-hint">Contoh: 081234567890</div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-lock"></i>
                            Password
                        </label>
                        <div class="password-wrapper">
                            <input type="password" 
                                   name="password" 
                                   id="password"
                                   class="form-control" 
                                   placeholder="Masukkan password"
                                   required>
                            <button type="button" class="password-toggle" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="input-hint">Minimal 6 karakter</div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-lock"></i>
                            Konfirmasi Password
                        </label>
                        <div class="password-wrapper">
                            <input type="password" 
                                   name="confirm_password" 
                                   id="confirmPassword"
                                   class="form-control" 
                                   placeholder="Konfirmasi password"
                                   required>
                            <button type="button" class="password-toggle" id="toggleConfirmPassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-register" id="submitBtn">
                    <i class="fas fa-user-plus"></i>
                    Daftar
                </button>
            </form>
            
            <div class="login-link">
                Sudah punya akun? 
                <a href="<?= site_url('login'); ?>">
                    <i class="fas fa-sign-in-alt"></i> Masuk
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('registerForm');
            const submitBtn = document.getElementById('submitBtn');
            const togglePassword = document.getElementById('togglePassword');
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('confirmPassword');
            
            // Toggle password visibility
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                const eyeIcon = this.querySelector('i');
                if (type === 'text') {
                    eyeIcon.classList.remove('fa-eye');
                    eyeIcon.classList.add('fa-eye-slash');
                } else {
                    eyeIcon.classList.remove('fa-eye-slash');
                    eyeIcon.classList.add('fa-eye');
                }
            });
            
            toggleConfirmPassword.addEventListener('click', function() {
                const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPasswordInput.setAttribute('type', type);
                const eyeIcon = this.querySelector('i');
                if (type === 'text') {
                    eyeIcon.classList.remove('fa-eye');
                    eyeIcon.classList.add('fa-eye-slash');
                } else {
                    eyeIcon.classList.remove('fa-eye-slash');
                    eyeIcon.classList.add('fa-eye');
                }
            });
            
            // Form validation
            form.addEventListener('submit', function(e) {
                let isValid = true;
                const inputs = form.querySelectorAll('input[required]');
                
                // Remove previous error states
                inputs.forEach(input => {
                    input.classList.remove('is-invalid');
                });
                
                // Check required fields
                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    }
                });
                
                // Check password match
                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;
                
                if (password !== confirmPassword) {
                    passwordInput.classList.add('is-invalid');
                    confirmPasswordInput.classList.add('is-invalid');
                    showToast('Password dan konfirmasi password tidak cocok!', 'error');
                    isValid = false;
                }
                
                // Check password length
                if (password.length < 6) {
                    passwordInput.classList.add('is-invalid');
                    showToast('Password minimal 6 karakter!', 'error');
                    isValid = false;
                }
                
                if (!isValid) {
                    e.preventDefault();
                } else {
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
                    submitBtn.disabled = true;
                    const alerts = document.querySelectorAll('.alert');
                    alerts.forEach(alert => alert.style.display = 'none');
                }
            });
            
            // Real-time validation
            const inputs = form.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.value.trim()) {
                        this.classList.remove('is-invalid');
                    }
                    
                    // Password confirmation real-time check
                    if (this.name === 'password' || this.name === 'confirm_password') {
                        const password = passwordInput.value;
                        const confirmPassword = confirmPasswordInput.value;
                        
                        if (confirmPassword && password !== confirmPassword) {
                            passwordInput.classList.add('is-invalid');
                            confirmPasswordInput.classList.add('is-invalid');
                        } else {
                            passwordInput.classList.remove('is-invalid');
                            confirmPasswordInput.classList.remove('is-invalid');
                        }
                    }
                });
            });
        });
        
        function showToast(message, type = 'info') {
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
            toast.style.animation = 'fadeIn 0.3s ease-out';
            
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
            
            setTimeout(() => {
                if (toast.parentElement) {
                    toast.remove();
                }
            }, 5000);
        }
    </script>
</body>
</html>