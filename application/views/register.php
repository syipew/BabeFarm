<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #eef1f7;
            overflow-x: hidden; 
        }

        .bg-container {
            width: 100%;
            min-height: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('<?= base_url("assets/register.jpg") ?>') no-repeat center center;
            background-size: cover;
            padding: 20px;
            box-sizing: border-box;
        }

        .card {
            background: white;
            width: 350px;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
            animation: fadeIn .5s ease;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 10px;
        }

        .logo {
            width: 100px; 
            height: auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #444;
        }

        input {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        button {
            width: 100%;
            background: #f4c430;
            padding: 12px;
            border: none;
            font-size: 15px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.2s;
        }

        button:hover {
            background: #e0b020;
        }

        .footer-text {
            margin-top: 12px;
            text-align: center;
            font-size: 14px;
        }

        .footer-text a {
            color: #007bff;
            text-decoration: none;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>

<div class="bg-container">

    <div class="card">

        <div class="logo-container">
            <img src="<?= base_url('assets/logo.png'); ?>" class="logo">
        </div>



        <?= validation_errors('<div style="color:red; margin-bottom:10px;">','</div>'); ?>
        <?= $this->session->flashdata('success'); ?>

        <form method="post" action="<?= base_url('register/register'); ?>">

            <label>Nama Lengkap</label>
            <input type="text" name="nama" required>

            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Nomor Telepon</label>
            <input type="text" name="telepon" required>

            <button type="submit">Daftar</button>
        </form>

        <p class="footer-text">
            Sudah punya akun?
            <a href="<?= base_url('register/login'); ?>">Masuk</a>
        </p>

    </div>

</div>

</body>
</html>
