<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BabeFarm - Manajemen Peternakan Ayam</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #10375C;
            --secondary-color: #f0ad4e;
            --accent-color: #e4b216;
            --light-color: #f8f9fa;
            --dark-color: #002b5c;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            line-height: 1.6;
        }

        /* HEADER STYLES - DIKECILKAN DAN DIRAPIKAN */
        .main-header {
            background: linear-gradient(135deg, #0d2f4f 0%, #10375C 100%);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 0; /* DIKECILKAN dari 12px 0 */
        }

        /* LOGO SECTION - DIGESER DARI PINGGIR DAN DIKECILKAN */
        .logo-section {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            transition: transform 0.2s ease;
            margin-left: 15px; /* DIGESER KE KANAN */
        }

        .logo-section:hover {
            transform: translateX(-2px);
        }

        .logo-circle {
            width: 85px; /* DIKECILKAN dari 100px */
            height: 35px; /* DIKECILKAN dari 40px */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            /*background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);*/
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2); /* DIKECILKAN dari 3px 8px */
        }

        .logo-img {
            width: 160px; /* DIKECILKAN dari 150px */
            height: 160px; /* DIKECILKAN dari 150px */
            object-fit: contain;
        }

        .logo-text {
            display: flex;
            flex-direction: column;
        }

        .logo-main {
            color: white;
            font-size: 24px; /* DIKECILKAN dari 26px */
            font-weight: 800;
            letter-spacing: -0.5px;
            line-height: 1;
        }

        /* NAVIGATION - DIKECILKAN */
        .nav-container {
            flex: 1;
            margin: 0 25px; /* DIKECILKAN dari 30px */
        }

        .nav-menu {
            display: flex;
            gap: 1px; /* DIKECILKAN dari 2px */
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            padding: 5px; /* DIKECILKAN dari 6px */
            max-width: 850px;
            margin: 0 auto;
        }

        .nav-item {
            flex: 1;
            text-align: center;
        }

        .nav-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: rgba(255, 255, 255, 0.85);
            padding: 8px 6px; /* DIKECILKAN dari 10px 8px */
            border-radius: 8px;
            transition: all 0.25s ease;
            min-height: 50px; /* DIKECILKAN dari 56px */
            position: relative;
        }

        .nav-link i {
            font-size: 15px; /* DIKECILKAN dari 16px */
            margin-bottom: 3px; /* DIKECILKAN dari 4px */
            transition: all 0.25s ease;
        }

        .nav-link span {
            font-size: 11px; /* DIKECILKAN dari 12px */
            font-weight: 500;
            letter-spacing: 0.2px; /* DIKECILKAN dari 0.3px */
        }

        .nav-link:hover {
            background: rgba(240, 173, 78, 0.15);
            color: #f0ad4e;
            transform: translateY(-1px);
        }

        .nav-link:hover i {
            transform: scale(1.1);
        }

        .nav-link.active {
            background: rgba(240, 173, 78, 0.2);
            color: #f0ad4e;
            font-weight: 600;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -4px; /* DIKECILKAN dari -6px */
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 4px;
            background: #f0ad4e;
            border-radius: 50%;
        }

        /* USER SECTION - DIKECILKAN */
        .user-section {
            display: flex;
            align-items: center;
            gap: 12px; /* DIKECILKAN dari 15px */
        }

        .user-profile-link {
            display: flex;
            align-items: center;
            gap: 8px; /* DIKECILKAN dari 10px */
            padding: 6px 12px; /* DIKECILKAN dari 8px 16px */
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            transition: all 0.25s ease;
            text-decoration: none;
            color: inherit;
            cursor: pointer;
        }

        .user-profile-link:hover {
            background: rgba(255, 255, 255, 0.12);
            transform: translateY(-1px);
        }

        .user-avatar {
            width: 32px; /* DIKECILKAN dari 36px */
            height: 32px; /* DIKECILKAN dari 36px */
            background: linear-gradient(135deg, #28a745, #20c997);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 14px; /* DIKECILKAN dari 15px */
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2); /* DIKECILKAN dari 3px 8px */
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            color: white;
            font-weight: 600;
            font-size: 12px; /* DIKECILKAN dari 13px */
        }

        .user-status {
            color: rgba(255, 255, 255, 0.7);
            font-size: 10px; /* DIKECILKAN dari 11px */
            margin-top: 1px;
        }

        .logout-btn {
            background: linear-gradient(135deg, #dc3545 0%, #bd2130 100%);
            color: white;
            border: none;
            padding: 8px 14px; /* DIKECILKAN dari 10px 18px */
            border-radius: 8px;
            font-size: 12px; /* DIKECILKAN dari 13px */
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px; /* DIKECILKAN dari 6px */
            transition: all 0.25s ease;
            box-shadow: 0 2px 6px rgba(220, 53, 69, 0.3); /* DIKECILKAN dari 3px 8px */
            text-decoration: none;
        }

        .logout-btn:hover {
            background: linear-gradient(135deg, #bd2130 0%, #dc3545 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(220, 53, 69, 0.4); /* DIKECILKAN dari 5px 12px */
        }

        .logout-btn i {
            font-size: 11px; /* DIKECILKAN dari 12px */
        }

        /* MOBILE MENU TOGGLE */
        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 18px; /* DIKECILKAN dari 20px */
            cursor: pointer;
            padding: 6px; /* DIKECILKAN dari 8px */
            margin-right: 10px; /* DIGESER DARI PINGGIR */
        }

        /* RESPONSIVE DESIGN - DIKECILKAN DAN DISESUAIKAN */
        @media (max-width: 1200px) {
            .nav-container {
                margin: 0 20px;
            }
            
            .nav-menu {
                max-width: 750px;
            }
            
            .nav-link {
                padding: 6px 4px; /* DIKECILKAN dari 8px 6px */
                min-height: 46px; /* DIKECILKAN dari 52px */
            }
            
            .nav-link span {
                font-size: 10px; /* DIKECILKAN dari 11px */
            }
        }

        @media (max-width: 992px) {
            .header-content {
                flex-wrap: wrap;
                padding: 6px 0; /* DIKECILKAN dari 10px 0 */
            }
            
            .logo-section {
                order: 1;
                margin-left: 10px; /* DIPERTAHANKAN UNTUK MOBILE */
            }
            
            .mobile-toggle {
                display: block;
                order: 2;
            }
            
            .nav-container {
                order: 4;
                margin: 8px 0 0 0; /* DIKECILKAN dari 10px 0 0 0 */
                width: 100%;
                display: none;
            }
            
            .nav-container.active {
                display: block;
            }
            
            .user-section {
                order: 3;
                margin-left: auto;
                margin-right: 10px; /* DIGESER DARI PINGGIR */
            }
            
            .nav-menu {
                flex-direction: column;
                background: rgba(255, 255, 255, 0.1);
                padding: 6px; /* DIKECILKAN dari 8px */
            }
            
            .nav-link {
                flex-direction: row;
                justify-content: flex-start;
                padding: 10px 12px; /* DIKECILKAN dari 12px 15px */
                min-height: auto;
                text-align: left;
            }
            
            .nav-link i {
                margin-bottom: 0;
                margin-right: 10px; /* DIKECILKAN dari 12px */
                width: 18px; /* DIKECILKAN dari 20px */
                text-align: center;
            }
            
            .nav-link span {
                font-size: 12px; /* DIKECILKAN dari 13px */
            }
            
            .user-profile-link .user-info {
                display: block;
            }
        }

        @media (max-width: 576px) {
            .header-container {
                padding: 0 15px;
            }
            
            .logo-circle {
                width: 40px; /* DIKECILKAN dari 42px */
                height: 40px; /* DIKECILKAN dari 42px */
            }
            
            .logo-img {
                width: 100px; /* DIKECILKAN dari default */
                height: 100px; /* DIKECILKAN dari default */
            }
            
            .logo-circle i {
                font-size: 18px; /* DIKECILKAN dari 20px */
            }
            
            .logo-main {
                font-size: 20px; /* DIKECILKAN dari 22px */
            }
            
            .user-profile-link {
                padding: 4px 8px; /* DIKECILKAN dari 6px 12px */
            }
            
            .user-avatar {
                width: 28px; /* DIKECILKAN dari 32px */
                height: 28px; /* DIKECILKAN dari 32px */
                font-size: 12px; /* DIKECILKAN dari 13px */
            }
            
            .user-info {
                display: none;
            }
            
            .logout-btn {
                padding: 6px 10px; /* DIKECILKAN dari 8px 12px */
                font-size: 11px; /* DIKECILKAN dari 12px */
            }
            
            .logout-btn span {
                display: none;
            }
            
            .logout-btn i {
                font-size: 12px; /* DIKECILKAN dari 14px */
                margin: 0;
            }
            
            .mobile-toggle {
                padding: 5px; /* DIKECILKAN dari 6px */
                font-size: 16px; /* DIKECILKAN dari 18px */
            }
        }

        /* ACTIVE STATE INDICATOR */
        .nav-link.active::after {
            display: block;
        }

        /* PAGE CONTENT */
        .page-content {
            max-width: 1400px;
            margin: 25px auto; /* DIKECILKAN dari 30px auto */
            padding: 0 20px;
        }
    </style>
</head>
<body>

<header class="main-header">
    <div class="header-container">
        <div class="header-content">
            <!-- Logo -->
            <a href="<?= base_url('home') ?>" class="logo-section">
                <div class="logo-circle">
                    <img src="<?= base_url('assets/logo.png') ?>" alt="BabeFarm Logo" class="logo-img">
                </div>
            </a>

            <!-- Mobile Toggle -->
            <button class="mobile-toggle" id="mobileToggle">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Navigation -->
            <div class="nav-container" id="navContainer">
                <nav class="nav-menu">
                    <div class="nav-item">
                        <a href="<?= base_url('home') ?>" class="nav-link">
                            <i class="fas fa-home"></i>
                            <span>Home</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="<?= base_url('ayam') ?>" class="nav-link">
                            <i class="fas fa-kiwi-bird"></i>
                            <span>Data Ayam</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="<?= base_url('pakan') ?>" class="nav-link">
                            <i class="fas fa-seedling"></i>
                            <span>Pakan</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="<?= base_url('kesehatan') ?>" class="nav-link">
                            <i class="fas fa-heartbeat"></i>
                            <span>Kesehatan</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="<?= base_url('produksi') ?>" class="nav-link">
                            <i class="fas fa-industry"></i>
                            <span>Produksi</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="<?= base_url('keuangan') ?>" class="nav-link">
                            <i class="fas fa-chart-line"></i>
                            <span>Keuangan</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="<?= base_url('laporan') ?>" class="nav-link">
                            <i class="fas fa-file-alt"></i>
                            <span>Laporan</span>
                        </a>
                    </div>
                </nav>
            </div>

            <!-- User Section -->
            <div class="user-section">
                <a href="<?= base_url('profil') ?>" class="user-profile-link">
                    <div class="user-avatar">
                        <?= strtoupper(substr($this->session->userdata('nama'), 0, 1)) ?>
                    </div>
                    <div class="user-info">
                        <div class="user-name"><?= $this->session->userdata('nama') ?></div>
                        <div class="user-status">Administrator</div>
                    </div>
                </a>
                
                <a href="<?= base_url('login/logout') ?>" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Keluar</span>
                </a>
            </div>
        </div>
    </div>
</header>

<main class="page-content">
    <!-- Page content will be inserted here -->
</main>

<script>
    // Mobile menu toggle
    document.getElementById('mobileToggle').addEventListener('click', function() {
        const navContainer = document.getElementById('navContainer');
        navContainer.classList.toggle('active');
        
        // Toggle icon
        const icon = this.querySelector('i');
        if (icon.classList.contains('fa-bars')) {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times');
        } else {
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
    });

    // Set active navigation link based on current URL
    document.addEventListener('DOMContentLoaded', function() {
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav-link');
        
        navLinks.forEach(link => {
            const linkPath = new URL(link.href).pathname;
            const relativePath = linkPath.replace('<?= base_url() ?>', '');
            
            // Exact match or partial match for parent pages
            if (currentPath === linkPath || 
                (relativePath !== '/' && currentPath.includes(relativePath))) {
                link.classList.add('active');
            }
        });
        
        // Highlight profile link if on profile page
        const profileLink = document.querySelector('.user-profile-link');
        if (currentPath.includes('profil')) {
            profileLink.style.background = 'rgba(240, 173, 78, 0.2)';
        }
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const navContainer = document.getElementById('navContainer');
        const mobileToggle = document.getElementById('mobileToggle');
        
        if (!navContainer.contains(event.target) && 
            !mobileToggle.contains(event.target) &&
            window.innerWidth <= 992) {
            navContainer.classList.remove('active');
            mobileToggle.querySelector('i').classList.remove('fa-times');
            mobileToggle.querySelector('i').classList.add('fa-bars');
        }
    });
</script>

</body>
</html>