<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BabeFarm</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* NAVBAR */
        .navbar {
            background: #e4b216;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
        }

        .nav-links a {
            margin-right: 25px;
            text-decoration: none;
            color: black;
            font-size: 16px;
            font-weight: normal;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        .nav-actions a {
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 4px;
            font-weight: bold;
            margin-left: 6px;
        }

        .btn-profil {
            background: #e4b216;
            color: black;
            font-size: 13px;   
        }
        
        .btn-logout {
            background: #002b5c;
            color: white;
            font-size: 12px;   
        }

        /* FORM */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: white;        
            box-sizing: border-box;   
        }
    </style>
</head>
<body>

<div class="navbar">
    <div style="font-size: 22px; font-weight: bold;">
        BABEFARM
    </div>

    <div class="nav-links">
        <a href="<?= base_url('home') ?>">Home</a>
        <a href="<?= base_url('ayam') ?>">Data Ayam</a>
        <a href="<?= base_url('pakan') ?>">Pakan</a>
        <a href="<?= base_url('kesehatan') ?>">Kesehatan</a>
        <a href="<?= base_url('produksi') ?>">Produksi</a>
        <a href="<?= base_url('keuangan') ?>">Keuangan</a>
        <a href="<?= base_url('laporan') ?>">Laporan</a>
    </div>

    <div class="nav-actions">
        <a href="<?= base_url('profil') ?>" class="btn-profil">PROFIL</a>
        <a href="<?= base_url('register/logout') ?>" class="btn-logout">LOGOUT</a>
    </div>
</div>
