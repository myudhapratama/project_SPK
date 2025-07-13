<?php require_once('includes/init.php'); ?>
<?php cek_login(); ?>

<?php
$errors = array();
$sukses = false;

$ada_error = false;
$result = '';

$id_user = (isset($_GET['id'])) ? trim($_GET['id']) : '';

if (isset($_POST['submit'])) :
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$role = $_POST['role'];
	$rw = $_POST['rw'];
	$rt = $_POST['rt'];

	if (!$nama) {
		$errors[] = 'Nama tidak boleh kosong';
	}

	if (!$email) {
		$errors[] = 'Email tidak boleh kosong';
	}

	if (!$role) {
		$errors[] = 'Role tidak boleh kosong';
	}

	if (!$id_user) {
		$errors[] = 'Id User salah';
	}

	if ($password && ($password != $password2)) {
		$errors[] = 'Password harus sama keduanya';
	}

	if (!$rw) {
		$errors[] = 'RW tidak boleh kosong';
	}

	if (!$rt) {
		$errors[] = 'RT tidak boleh kosong';
	}

	if (empty($errors)) :
		$update = mysqli_query($koneksi, "UPDATE user SET nama = '$nama', email = '$email', role = '$role', rw = '$rw', rt = '$rt' WHERE id_user = '$id_user'");

		if ($password) {
			$pass = sha1($password);
			$update = mysqli_query($koneksi, "UPDATE user SET nama = '$nama',  password = '$pass', email = '$email', role = '$role', rw = '$rw', rt = '$rt' WHERE id_user = '$id_user'");
		}
		if ($update) {
			redirect_to('list-user.php?status=sukses-edit');
		} else {
			$errors[] = 'Data gagal diupdate';
		}
	endif;

endif;
?>

<?php
$page = "User";
require_once('template/header.php');
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users-cog"></i> Data User</h1>

	<a href="list-user.php" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
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

<form action="edit-user.php?id=<?php echo $id_user; ?>" method="post">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-danger"><i class="fas fa-fw fa-edit"></i> Edit Data User</h6>
		</div>
		<?php
		if (!$id_user) {
		?>
			<div class="card-body">
				<div class="alert alert-danger">Data tidak ada</div>
			</div>
			<?php
		} else {
			$data = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
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
								<label class="font-weight-bold">Username</label>
								<input autocomplete="off" type="text" readonly required value="<?php echo $d['username']; ?>" class="form-control" />
							</div>

							<div class="form-group col-md-6">
								<label class="font-weight-bold">Password</sub></label>
								<input autocomplete="off" type="password" name="password" class="form-control" />
							</div>

							<div class="form-group col-md-6">
								<label class="font-weight-bold">Ulangi Password</label>
								<input autocomplete="off" type="password" name="password2" class="form-control" />
							</div>

							<div class="form-group col-md-6">
								<label class="font-weight-bold">Nama</label>
								<input autocomplete="off" type="text" name="nama" required value="<?php echo $d['nama']; ?>" class="form-control" />
							</div>

							<div class="form-group col-md-6">
								<label class="font-weight-bold">E-Mail</label>
								<input autocomplete="off" type="email" name="email" required value="<?php echo $d['email']; ?>" class="form-control" />
							</div>

							<div class="form-group col-md-6">
								<label class="font-weight-bold">Level</label>
								<select name="role" required class="form-control">
									<option value="">--Pilih--</option>
									<option value="1" <?php if ($d['role'] == 1) {
															echo "selected";
														} ?>>Administrator</option>
									<option value="2" <?php if ($d['role'] == 2) {
															echo "selected";
														} ?>>Kepala Desa</option>
									<option value="3" <?php if ($d['role'] == 3) {
															echo "selected";
														} ?>>RW</option>
									<option value="4" <?php if ($d['role'] == 4) {
															echo "selected";
														} ?>>RT</option>
								</select>
							</div>

							<div class="form-group col-md-6">
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
								</select>
							</div>

							<div class="form-group col-md-6">
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
						</div>
					</div>
					<div class="card-footer text-right">
						<button name="submit" value="submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
						<button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
					</div>
	</div>
<?php
				}
			}
		}
?>
</form>

<?php
require_once('template/footer.php');
?>