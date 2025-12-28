<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>BABEFARM</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: url('<?= base_url('assets/img/bg-ayam.jpg') ?>') no-repeat center center fixed;
    background-size: cover;
}

/* ===== NAVBAR ===== */
.navbar {
    background-color: #f1c40f;
    padding: 14px 40px;
}

/* ===== LOGO ===== */
.navbar-brand img {
    height: 58px;
    width: auto;
}

/* ===== CENTER MENU ===== */
.navbar-collapse {
    justify-content: center;
}

/* ===== NAV LINK ===== */
.navbar-nav .nav-link {
    color: #1f1f1f;
    font-weight: 500;
    margin: 0 10px;
    position: relative;
    transition: color 0.25s ease;
}

/* HOVER EFFECT (GARIS BAWAH HALUS) */
.navbar-nav .nav-link::after {
    content: "";
    position: absolute;
    width: 0;
    height: 2px;
    background-color: #000;
    left: 0;
    bottom: -6px;
    transition: width 0.25s ease;
}

.navbar-nav .nav-link:hover {
    color: #000;
}

.navbar-nav .nav-link:hover::after {
    width: 100%;
}

/* ===== BUTTON RIGHT ===== */
.navbar .btn {
    font-size: 14px;
    padding: 6px 14px;
    border-radius: 6px;
}
</style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">

        <!-- LOGO -->
        <a class="navbar-brand" href="<?= base_url('home') ?>">
            <img src="<?= base_url('assets/logo.png') ?>" alt="BabeFarm Logo">
        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- NAV -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('home') ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('ayam') ?>">Data Ayam</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('pakan') ?>">Pakan</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('kesehatan') ?>">Kesehatan</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('produksi') ?>">Produksi</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('keuangan') ?>">Keuangan</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('laporan') ?>">Laporan</a></li>
            </ul>

            <!-- RIGHT ACTION -->
            <div class="d-flex">
                <a href="<?= base_url('profil') ?>" class="btn btn-outline-dark btn-sm me-2">Profil</a>
                <a href="<?= base_url('auth/logout') ?>" class="btn btn-dark btn-sm">Logout</a>
            </div>
        </div>

    </div>
</nav>

<div class="container mt-4">
