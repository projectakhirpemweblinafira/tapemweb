<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="styles.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
  </div>

  <div class="Main-menu">
    <div class="container">

      <h1>Ubah Profil</h1>
      <hr>
      <div class="row">

        <!-- left column -->
        <div class="col-md-3">
          <div class="text-center">
            <img src="<?= base_url('assets/') . $foto_profil['foto_profil']; ?>profile/potret.png" class="avatar img-circle" alt="avatar">
            <h6>Upload foto baru ...</h6>

            <input type="file" class="form-control">
          </div>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">
          <div class="alert alert-info alert-dismissable">
            <a class="panel-close close" data-dismiss="alert">×</a>
            <i class="fa fa-coffee"></i>
            <strong></strong> Silakan ubah kolom dibawah ini.
          </div>
          <?= $this->session->flashdata('message'); ?>

          <h3>Informasi Pribadi</h3>

          <form action="<?= base_url('user/edit'); ?>" method="post" class="form-horizontal" role="form">
            <div class="form-group">
              <?= form_open_multipart('user/edit'); ?>
              <label class="col-lg-3 control-label">Username:</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" id="username" name="username" value="<?= $username['username']; ?>" readonly>
                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Email:</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" id="email" name="email" value="<?= $email['email']; ?>" readonly>
              </div>
            </div>

            <div action="<?= base_url('user/edit'); ?>" method="post" class="form-group">
              <label class="col-md-3 control-label">Nama Lengkap:</label>
              <div class="col-md-8">
                <input class="form-control" type="text" id="full_name" name="full_name" value="<?= $full_name['full_name']; ?>">
                <?= form_error('full_name', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-8">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <span></span>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <hr>
  </div>
</body>

</html>