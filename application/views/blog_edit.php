<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Post</title>
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
			<h1>Edit Post</h1>
			<hr>
			<div class="row">
				<?php foreach ($posts as $post) : ?>
					<form action="<?php echo base_url('blog/edit_process') ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $post->id_post; ?>" />
						<div class="form-group">
							<label>Nama Restoran<span class="require">*</span></label>
							<input type="text" class="form-control <?php echo form_error('nama_restoran') ? 'is-invalid' : '' ?>" name="nama_restoran" value="<?php echo $post->nama_restoran; ?>" />
							<div class="invalid-feedback">
								<?php echo form_error('nama_restoran') ?>
							</div>
						</div>
						<div class="form-group">
							<label>Lokasi<span class="require">*</span></label>
							<input type="text" class="form-control" name="alamat" value="<?php echo $post->alamat; ?>" />
						</div>
						<div class="form-group">
							<label for="title">Kota<span class="require">*</span></label>
							<select name="id_lokasi_alamat" class="form-control" value="<?php echo $post->id_lokasi_alamat; ?>">
								<option value="001">Kota Malang</option>
								<option value="002">Kab. Malang</option>
								<option value="003">Batu</option>
							</select>
						</div>
						<div class="form-group">
							<label for="title">Hari Buka<span class="require">*</span></label>
							<input type="text" class="form-control" name="hari_buka" value="<?php echo $post->hari_buka; ?>" />
						</div>
						<div class="form-group">
							<label for="title">Hari Tutup<span class="require">*</span></label>
							<input type="text" class="form-control" name="hari_tutup" value="<?php echo $post->hari_tutup; ?>" />
						</div>
						<div class="form-group">
							<label for="title">Jam Buka<span class="require">*</span></label>
							<input type="time" class="form-control" name="jam_buka" value="<?php echo $post->jam_buka; ?>" />
						</div>
						<div class="form-group">
							<label for="title">Jam Tutup<span class="require">*</span></label>
							<input type="time" class="form-control" name="jam_tutup" value="<?php echo $post->jam_tutup; ?>" />
						</div>
						<div class="form-group">
							<label for="title">Kisaran Harga<span class="require">*</span></label>
							<input type="text" class="form-control" name="kisaran_harga" value="<?php echo $post->kisaran_harga; ?>" />
						</div>
						<div class="form-group">
							<label for="title">Kontak<span class="require">*</span></label>
							<input type="text" class="form-control" name="kontak" value="<?php echo $post->kontak; ?>" />
						</div>
						<div class="form-group">
							<input type="file" class="form-control" name="foto" value="<?php echo $post->foto; ?>">
						</div>
						<div class="form-group">
							<label for="description">Description<span class="require">*</span></label>
							<textarea class="form-control" name="deskripsi"><?php echo $post->deskripsi; ?></textarea>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" name="edit" Value="Update" />
							<button class="btn btn-danger"><a href="<?= base_url('blog/my_post'); ?>">Cancel</a>
						</div>
					</form>
				<?php endforeach; ?>
			</div>
			<hr>
		</div>
	</div>
</body>

</html>