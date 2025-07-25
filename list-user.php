<?php require_once('includes/init.php'); ?>
<?php cek_login($role = array(1)); ?>

<?php
$page = "User";
require_once('template/header.php');
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users-cog"></i> Data User</h1>

	<a href="tambah-user.php" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Data </a>
</div>

<?php
$status = isset($_GET['status']) ? $_GET['status'] : '';
$msg = '';
switch ($status):
	case 'sukses-baru':
		$msg = 'Data berhasil disimpan';
		break;
	case 'sukses-hapus':
		$msg = 'Data behasil dihapus';
		break;
	case 'sukses-edit':
		$msg = 'Data behasil diupdate';
		break;
endswitch;

if ($msg) :
	echo '<div class="alert alert-info">' . $msg . '</div>';
endif;
?>

<div class="card shadow mb-4">
	<!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold"><i class="fa fa-table"></i> Daftar Data User</h6>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Username</th>
						<th>Nama</th>
						<th>Level</th>
						<th>RT/RW</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 0;
					$query = mysqli_query($koneksi, "SELECT * FROM user");
					while ($data = mysqli_fetch_array($query)) :
						$no++;
					?>
						<tr align="center">
							<td><?php echo $no; ?></td>
							<td><?php echo $data['username']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td>
								<?php
								if ($data['role'] == 1) {
									echo 'Administrator';
								} elseif ($data['role'] == 2) {
									echo 'Kepala Desa';
								} elseif ($data['role'] == 3) {
									echo 'RW';
								} elseif ($data['role'] == 4) {
									echo 'RT';
								}
								?>
							</td>
							<td><?php echo $data['rt'] . '/' . $data['rw']; ?></td>
							<td>
								<div class="btn-group" role="group">
									<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="edit-user.php?id=<?php echo $data['id_user']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
									<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="hapus-user.php?id=<?php echo $data['id_user']; ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
								</div>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
require_once('template/footer.php');
?>