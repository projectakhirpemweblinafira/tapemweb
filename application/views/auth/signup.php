<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?= base_url('assets/'); ?>css/styles_signup.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <form action="<?= base_url('auth/signup'); ?>" method="post">
            <div class="row" style="margin-top:100px;">

                <div class="col">
                    <h2>Buat Akun</h2>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="email" placeholder="Alamat e-mail" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="full_name" placeholder="Nama Lengkap" value="<?= set_value('full_name'); ?>">
                        <?= form_error('full_name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Nama Pengguna" value="<?= set_value('username'); ?>">
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Kata sandi">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password2" placeholder="Masukkan ulang kata sandi">
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <input type="submit" value="Daftar">
                    <p class="signup"> Sudah punya akun? <a href="<?= base_url('auth'); ?>" style="color: aliceblue">Masuk</a></p>
                </div>
            </div>
        </form>
    </div>
</body>

</html>