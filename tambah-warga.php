<?php require_once('includes/init.php'); ?>
<?php cek_login($role = array(1)); ?>

<?php
$errors = array();
$sukses = false;

$nama = (isset($_POST['nama'])) ? trim($_POST['nama']) : '';

if (isset($_POST['submit'])) :

	$nama = $_POST['nama'];
	$usia = $_POST['usia'];
	$rt = $_POST['rt'];
	$rw = $_POST['rw'];
	$pk = $_POST['penyakit_kronis'];
	$pb = $_POST['penerima_bantuan'];
	$dis = $_POST['dis'];

	$target_dir = "uploads/"; // Direktori tempat file akan diunggah
	$target_file = $target_dir . basename($_FILES["surat"]["name"]);
	$uploadOk = 1;
	$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	// Periksa apakah file adalah gambar atau bukan
	if (isset($_POST["submit"])) {
		$check = getimagesize($_FILES["surat"]["tmp_name"]);
		if ($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}

	// Periksa apakah file sudah ada
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}

	// Batasi ukuran file (contoh: maksimum 500KB)
	if ($_FILES["surat"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}

	// Batasi tipe file yang diizinkan
	if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}

	// Periksa apakah $uploadOk adalah 0 karena ada error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		// Jika semuanya ok, coba unggah file
	} else {
		if (move_uploaded_file($_FILES["surat"]["tmp_name"], $target_file)) {
			echo "The file " . htmlspecialchars(basename($_FILES["surat"]["name"])) . " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	$surat = $target_file;

	// Validasi
	if (!$nama) {
		$errors[] = 'Nama tidak boleh kosong';
	}

	// Jika lolos validasi lakukan hal di bawah ini
	if (empty($errors)) :
		$simpan = mysqli_query($koneksi, "INSERT INTO warga (id_warga, usia ,nama, rt, rw, penyakit_kronis, penerima_bantuan, disabilitas, surat_sakit, validasi) VALUES ('', '$usia', '$nama', '$rt', '$rw', '$pk', '$pb', '$dis', '$surat' , '0')");
		if ($simpan) {
			redirect_to('list-warga.php?status=sukses-baru');
		} else {
			$errors[] = 'Data gagal disimpan';
		}
	endif;

endif;

$page = "Warga";
require_once('template/header.php');
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Warga</h1>

	<a href="list-warga.php" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<?php if (!empty($errors)) : ?>
	<div class="alert alert-info">
		<?php foreach ($errors as $error) : ?>
			<?php echo $error; ?>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

<form action="tambah-warga.php" method="post" enctype="multipart/form-data">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-danger"><i class="fas fa-fw fa-plus"></i> Tambah Data Warga</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Warga</label>
					<input autocomplete="off" type="text" name="nama" required value="" class="form-control" />
				</div>
				<div class="form-group col-md-3">
					<label class="font-weight-bold">Usia</label>
					<input autocomplete="off" type="number" name="usia" required class="form-control" />
				</div>
				<div class="form-group col-md-3">
					<label class="font-weight-bold">RT</label>
					<select name="rt" required class="form-control">
						<option value="">--Pilih RT--</option>
						<option value="001">001</option>
						<option value="002">002</option>
						<option value="003">003</option>
						<option value="004">004</option>
						<option value="005">005</option>
						<option value="006">006</option>
						<option value="007">007</option>
						<option value="008">008</option>
						<option value="009">009</option>
						<option value="010">010</option>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Penyakit Kronis</label>
					<input autocomplete="off" type="text" name="penyakit_kronis" value="" class="form-control" />
				</div>
				<div class="form-group col-md-3">
					<label class="font-weight-bold">RW</label>
					<select name="rw" required class="form-control">
						<option value="">--Pilih RW--</option>
						<option value="001">001</option>
						<option value="002">002</option>
						<option value="003">003</option>
						<option value="004">004</option>
						<option value="005">005</option>
						<option value="006">006</option>
						<option value="007">007</option>
						<option value="008">008</option>
						<option value="009">009</option>
					</select>
				</div>
				<div class="form-group col-md-3">
					<label class="font-weight-bold">Penyandang Disabilitas</label>
					<select name="dis" required class="form-control">
						<option value="Tidak">Tidak</option>
						<option value="Ya">Ya</option>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Peneria Bantuan Lainnya</label>
					<input autocomplete="off" type="text" name="penerima_bantuan" value="" class="form-control" />
				</div>
				<div class="form-group col-md-3">
					<label class="font-weight-bold">Upload Surat Sakit</label>
					<input type="file" accept=".jpg, .jpeg, .png" name="surat" value="" class="form-control" required />
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
			<button name="submit" value="submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
			<button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
		</div>
	</div>
</form>

<?php
require_once('template/footer.php');
?>