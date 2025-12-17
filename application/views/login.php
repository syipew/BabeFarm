<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .bg-container {
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('<?= base_url("assets/register.jpg"); ?>') no-repeat center;
            background-size: cover;
        }

        .card {
            width: 350px;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }

        .logo {
            width: 90px;
            display: block;
            margin: 0 auto 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #f4c430;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<div class="bg-container">
    <div class="card">

        <img src="<?= base_url('assets/logo.png'); ?>" class="logo">

        <?= validation_errors('<div class="error">','</div>'); ?>
        <?= $this->session->flashdata('error'); ?>

        <form action="<?= site_url('login'); ?>" method="post">

            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <p style="text-align:center;margin-top:10px;">
            Belum punya akun?
            <a href="<?= site_url('Register'); ?>">Daftar</a>
        </p>

    </div>
</div>

</body>
</html>
