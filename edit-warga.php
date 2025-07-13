<?php require_once('includes/init.php'); ?>
<?php cek_login(); ?>

<?php
$errors = array();
$sukses = false;

$ada_error = false;
$result = '';

$id_warga = (isset($_GET['id'])) ? trim($_GET['id']) : '';

if (isset($_POST['submit'])) :

	$usia = $_POST['usia'];
	$nama = $_POST['nama'];
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
		$update = mysqli_query($koneksi, "UPDATE warga SET usia= '$usia', nama = '$nama', rt = '$rt', rw = '$rw', penyakit_kronis = '$pk', penerima_bantuan = '$pb', disabilitas = '$dis', surat_sakit = '$surat' WHERE id_warga = '$id_warga'");

		if ($update) {
			redirect_to('list-warga.php?status=sukses-edit');
		} else {
			$errors[] = 'Data gagal diupdate';
		}
	endif;

endif;
?>

<?php
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

<?php if ($sukses) : ?>
	<div class="alert alert-success">
		Data berhasil disimpan
	</div>
<?php elseif ($ada_error) : ?>
	<div class="alert alert-info">
		<?php echo $ada_error; ?>
	</div>
<?php else : ?>

	<form action="edit-warga.php?id=<?php echo $id_warga; ?>" method="post" enctype="multipart/form-data">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-danger"><i class="fas fa-fw fa-edit"></i> Edit Data Warga</h6>
			</div>
			<?php
			if (!$id_warga) {
			?>
				<div class="card-body">
					<div class="alert alert-danger">Data tidak ada</div>
				</div>
				<?php
			} else {
				$data = mysqli_query($koneksi, "SELECT * FROM warga WHERE id_warga='$id_warga'");
				$cek = mysqli_num_rows($data);
				if ($cek <= 0) {
				?>
					<div class="card-body">
						<div class="alert alert-danger">Data tidak ada</div>
					</div>
					<?php
				} else {
					while ($d = mysqli_fetch_array($data)) {
					?>
						<div class="card-body">
							<div class="row">
								<div class="form-group col-md-6">
									<label class="font-weight-bold">Nama Warga</label>
									<input autocomplete="off" type="text" name="nama" value="<?php echo $d['nama']; ?>" class="form-control" />
								</div>
								<div class="form-group col-md-3">
									<label class="font-weight-bold">Usia</label>
									<input autocomplete="off" type="number" name="usia" required value="<?php echo $d['usia']; ?>" class="form-control" />
								</div>
								<div class="form-group col-md-3">
									<label class="font-weight-bold">RT</label>
									<select name="rt" required class="form-control">
										<option value="">--Pilih RT--</option>
										<option value="001" <?php if ($d['rt'] == '001') {
																echo "selected";
															} ?>>001</option>
										<option value="002" <?php if ($d['rt'] == '002') {
																echo "selected";
															} ?>>002</option>
										<option value="003" <?php if ($d['rt'] == '003') {
																echo "selected";
															} ?>>003</option>
										<option value="004" <?php if ($d['rt'] == '004') {
																echo "selected";
															} ?>>004</option>
										<option value="005" <?php if ($d['rt'] == '005') {
																echo "selected";
															} ?>>005</option>
										<option value="006" <?php if ($d['rt'] == '006') {
																echo "selected";
															} ?>>006</option>
										<option value="007" <?php if ($d['rt'] == '007') {
																echo "selected";
															} ?>>007</option>
										<option value="008" <?php if ($d['rt'] == '008') {
																echo "selected";
															} ?>>008</option>
										<option value="009" <?php if ($d['rt'] == '009') {
																echo "selected";
															} ?>>009</option>
										<option value="010" <?php if ($d['rt'] == '010') {
																echo "selected";
															} ?>>010</option>
									</select>
								</div>

								<div class="form-group col-md-6">
									<label class="font-weight-bold">Penyakit Kronis</label>
									<input autocomplete="off" type="text" name="penyakit_kronis" value="<?php echo $d['penyakit_kronis']; ?>" class="form-control" />
								</div>
								<div class="form-group col-md-3">
									<label class="font-weight-bold">RW</label>
									<select name="rw" required class="form-control">
										<option value="">--Pilih RW--</option>
										<option value="001" <?php if ($d['rw'] == '001') {
																echo "selected";
															} ?>>001</option>
										<option value="002" <?php if ($d['rw'] == '002') {
																echo "selected";
															} ?>>002</option>
										<option value="003" <?php if ($d['rw'] == '003') {
																echo "selected";
															} ?>>003</option>
										<option value="004" <?php if ($d['rw'] == '004') {
																echo "selected";
															} ?>>004</option>
										<option value="005" <?php if ($d['rw'] == '005') {
																echo "selected";
															} ?>>005</option>
										<option value="006" <?php if ($d['rw'] == '006') {
																echo "selected";
															} ?>>006</option>
										<option value="007" <?php if ($d['rw'] == '007') {
																echo "selected";
															} ?>>007</option>
										<option value="008" <?php if ($d['rw'] == '008') {
																echo "selected";
															} ?>>008</option>
										<option value="009" <?php if ($d['rw'] == '009') {
																echo "selected";
															} ?>>009</option>
									</select>
								</div>
								<div class="form-group col-md-3">
									<label class="font-weight-bold">Penyandang Disabilitas</label>
									<select name="dis" required class="form-control">
										<option value="Tidak" <?php if ($d['disabilitas'] == 'Tidak') {
																	echo "selected";
																} ?>>Tidak</option>
										<option value="Ya" <?php if ($d['disabilitas'] == 'Ya') {
																echo "selected";
															} ?>>Ya</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label class="font-weight-bold">Penerima Bantuan</label>
									<input autocomplete="off" type="text" name="penerima_bantuan" value="<?php echo $d['penerima_bantuan']; ?>" class="form-control" />
								</div>
								<div class="form-group col-md-6">
									<label for="surat" class="font-weight-bold">Upload Surat Sakit</label>
									<input type="file" accept=" .jpg, .jpeg, .png" id="surat" name="surat" class=" form-control" />
								</div>
							</div>
						</div>

						<div class="card-footer text-right">
							<button name="submit" value="submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
							<button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
						</div>
			<?php
					}
				}
			}
			?>
		</div>
	</form>

<?php
endif;
require_once('template/footer.php');
?>