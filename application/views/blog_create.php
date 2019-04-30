<!doctype html>
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
	<div class="Main-menu">
		<div class="container">
			<h1><?= $title; ?></h1>
			<?= $this->session->flashdata('message'); ?>
			<hr>
			<div class="row">
				<form action="<?php echo base_url('blog/create_process'); ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="title2">Nama Restoran<span class="require">*</span></label>
						<input type="text" class="form-control" name="nama_restoran" />
					</div>
					<div class="form-group">
						<label for="slug2">Lokasi<span class="require">*</span></label>
						<input type="text" class="form-control" name="alamat" />
					</div>
					<div class="form-group">
						<label for="title">Kota<span class="require">*</span></label>
						<select name="id_lokasi_alamat" class="form-control">
							<option value="001">Kota Malang</option>
							<option value="002">Kab. Malang</option>
							<option value="003">Batu</option>
						</select>
					</div>
					<div class="form-group">
						<label for="title">Hari Buka<span class="require">*</span></label>
						<input type="text" class="form-control" name="hari_buka" />
					</div>
					<div class="form-group">
						<label for="title">Hari Tutup<span class="require">*</span></label>
						<input type="text" class="form-control" name="hari_tutup" />
					</div>
					<div class="form-group">
						<label for="title">Jam Buka<span class="require">*</span></label>
						<input type="time" class="form-control" name="jam_buka" />
					</div>
					<div class="form-group">
						<label for="title">Jam Tutup<span class="require">*</span></label>
						<input type="time" class="form-control" name="jam_tutup" />
					</div>
					<div class="form-group">
						<label for="title">Kisaran Harga<span class="require">*</span></label>
						<input type="text" class="form-control" name="kisaran_harga" />
					</div>
					<div class="form-group">
						<label for="title">Kontak<span class="require">*</span></label>
						<input type="text" class="form-control" name="kontak" />
					</div>
					<div class="form-group">
						<input name="foto" type="file" class="form-control" />
					</div>
					<div class="form-group">
						<label for="description">Description<span class="require">*</span></label>
						<textarea rows="" class="form-control" name="deskripsi"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" name="create" Value="Create" />
						<button class="btn btn-danger"><a href="<?= base_url('home'); ?>">Cancel</a></button>
					</div>
				</form>
			</div>
			<hr>
		</div>
	</div>
</body>

</html>