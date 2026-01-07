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

    .profile-container {
        position: relative;
        z-index: 999;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 650px;
        padding: 40px 20px;
    }

    .profile-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 40px;
        width: 100%;
        max-width: 520px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .profile-header {
        text-align: center;
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 20px;
    }

    .profile-header h2 {
        font-size: 28px;
        font-weight: 700;
        color: var(--primary-color);
        margin: 0;
    }

    .profile-header::after {
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
        background: #f8f9fa;
        color: #495057;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(16, 55, 92, 0.1);
    }

    .form-control[readonly] {
        background-color: #f8f9fa;
        cursor: not-allowed;
        border-color: #e0e6ef;
        color: #6c757d;
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

    .btn-container {
        display: flex;
        gap: 15px;
        margin-top: 35px;
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
        min-width: 180px;
        cursor: pointer;
        text-decoration: none;
    }

    @media (max-width: 576px) {
        .btn {
            min-width: 100%;
        }
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
        box-shadow: 0 4px 12px rgba(240, 173, 78, 0.25);
    }

    .btn-warning:hover {
        background: linear-gradient(135deg, #e6b800, var(--secondary-color));
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(240, 173, 78, 0.35);
    }

    .info-note {
        background: rgba(16, 55, 92, 0.05);
        border-radius: 8px;
        padding: 12px 15px;
        margin-top: 25px;
        border-left: 3px solid var(--secondary-color);
        font-size: 13px;
        color: #666;
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

    .profile-card {
        animation: fadeIn 0.5s ease-out;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .profile-container {
            padding: 20px;
            min-height: 100vh;
        }
        
        .profile-card {
            padding: 30px 20px;
            max-width: 100%;
        }
        
        .btn-container {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
        }
    }
</style>

<div class="profile-container">
    <div class="profile-card">
        <!-- Profile Header -->
        <div class="profile-header">
            <h2>Data Profil</h2>
        </div>

        <!-- Profile Form -->
        <div class="form-group">
            <label class="form-label">
                <i class="fas fa-user"></i>
                Nama Lengkap
            </label>
            <input type="text" 
                   class="form-control" 
                   value="<?= htmlspecialchars($profil->nama_lengkap) ?>" 
                   readonly>
        </div>

        <div class="form-group">
            <label class="form-label">
                <i class="fas fa-user-tag"></i>
                Username
            </label>
            <input type="text" 
                   class="form-control" 
                   value="<?= htmlspecialchars($profil->username) ?>" 
                   readonly>
        </div>

        <div class="form-group">
            <label class="form-label">
                <i class="fas fa-lock"></i>
                Password
            </label>
            <div class="password-wrapper">
                <input type="password" 
                       id="passwordField"
                       class="form-control" 
                       value="********" 
                       readonly 
                       autocomplete="off">

            </div>
        </div>

        <div class="form-group">
            <label class="form-label">
                <i class="fas fa-envelope"></i>
                Email
            </label>
            <input type="email" 
                   class="form-control" 
                   value="<?= htmlspecialchars($profil->email) ?>" 
                   readonly>
        </div>

        <div class="form-group">
            <label class="form-label">
                <i class="fas fa-phone"></i>
                Nomor Telepon
            </label>
            <input type="text" 
                   class="form-control" 
                   value="<?= htmlspecialchars($profil->nomor_telepon) ?>" 
                   readonly>
        </div>

        <!-- Info Note -->
        <div class="info-note">
            <i class="fas fa-info-circle" style="color: var(--primary-color); margin-right: 8px;"></i>
            Data profil Anda tersimpan dengan aman di sistem. Untuk perubahan data, gunakan tombol di bawah.
        </div>

        <!-- Button Container -->
        <div class="btn-container">
            <a href="<?= base_url('profil/edit') ?>" class="btn btn-primary">
                <i class="fas fa-edit"></i> Edit Data Profil
            </a>
            
            <a href="<?= base_url('profil/ganti_password') ?>" class="btn btn-warning">
                <i class="fas fa-key"></i> Ganti Password
            </a>
        </div>
    </div>
</div>

<script>
    // Toggle password visibility
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('passwordField');
        const eyeIcon = togglePassword.querySelector('i');
        
        togglePassword.addEventListener('click', function() {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            
            // Toggle eye icon
            if (type === 'text') {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
        
        // Prevent password field from being edited
        passwordField.addEventListener('input', function(e) {
            e.target.value = '********';
        });
        
        passwordField.addEventListener('focus', function() {
            this.blur(); // Remove focus when clicked
        });
    });
</script>