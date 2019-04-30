<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?= base_url('assets/css/'); ?>styles_login.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <form action="<?= base_url('auth'); ?>" method="post">
            <div class="row" style="margin-top:100px;">
                <div class="col">
                    <?= $this->session->flashdata('message'); ?>
                    <h2>Masuk</h2>
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Nama Pengguna" value="<?= set_value('username'); ?>">
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Kata sandi">
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <input type="submit" name="login" value="Masuk">
                    <p class="signup"> Belum punya akun? <a href="<?= base_url('auth/signup'); ?>" style="color: aliceblue">Daftar</a></p>
                </div>
            </div>
        </form>
    </div>
</body>

</html>