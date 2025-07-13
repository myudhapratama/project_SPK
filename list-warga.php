<?php require_once('includes/init.php'); ?>
<?php cek_login(); ?>

<?php
$page = "Warga";
require_once('template/header.php');

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Warga</h1>

	<?php if ($_SESSION['role'] == 4) { ?>
		<a href="tambah-warga.php" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Data </a>
	<?php } ?>
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


if (isset($_POST['validasi'])) :
	$id_warga = $_POST['id_warga'];

	if (empty($errors)) :
		$simpan = mysqli_query($koneksi, "UPDATE warga SET validasi = '1' WHERE id_warga = '$id_warga'");

		if ($simpan) {
			$sts[] = 'Berhasil memvalidasi data';
		} else {
			$sts[] = 'Data gagal divalidasi';
		}
	endif;
endif;

if (isset($_POST['tolakValidasi'])) :
	$id_warga = $_POST['id_warga'];

	if (empty($errors)) :
		$simpan = mysqli_query($koneksi, "UPDATE warga SET validasi = '2' WHERE id_warga = '$id_warga'");

		if ($simpan) {
			$sts[] = 'Berhasil memvalidasi data';
		} else {
			$sts[] = 'Data gagal divalidasi';
		}
	endif;
endif;

if (isset($_POST['batalkanAksi'])) :
	$id_warga = $_POST['id_warga'];

	if (empty($errors)) :
		$simpan = mysqli_query($koneksi, "UPDATE warga SET validasi = '0' WHERE id_warga = '$id_warga'");

		if ($simpan) {
			$sts[] = 'Berhasil memvalidasi data';
		} else {
			$sts[] = 'Data gagal divalidasi';
		}
	endif;
endif;

if (isset($_POST['hapusData'])) :
	$id_warga = $_POST['id_warga'];

	if (empty($errors)) :
		$simpan = mysqli_query($koneksi, "DELETE FROM warga WHERE `warga`.`id_warga` = '$id_warga'");

		if ($simpan) {
			$sts[] = 'Berhasil memvalidasi data';
		} else {
			$sts[] = 'Data gagal divalidasi';
		}
	endif;
endif;
?>




<div class="card shadow mb-4">
	<!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold"><i class="fa fa-table"></i> Daftar Data Warga</h6>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Nama</th>
						<th>Usia</th>
						<th>RT/RW</th>
						<th>Penyakit Kronis</th>
						<th>Penerima Bantuan</th>
						<th>Disabilitas</th>
						<th>Surat Sakit</th>
						<?php if ($_SESSION['role'] > 1) { ?>
							<th width="15%">Aksi</th>
						<?php } ?>
						<?php if ($_SESSION['role'] == 3) { ?>
							<th width="15%">Status</th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 0;
					$query_admin = mysqli_query($koneksi, "SELECT * FROM warga WHERE validasi = 1");
					while ($data_admin = mysqli_fetch_array($query_admin)) :
						$no++;
					?>
						<?php if ($_SESSION['role'] == 1) { ?>
							<tr align="center">
								<td><?php echo $no; ?></td>
								<td align="left"><?php echo $data_admin['nama']; ?></td>
								<td align="left"><?php echo $data_admin['usia']; ?></td>
								<td align="left"><?php echo $data_admin['rt'] . '/' . $data_admin['rw']; ?></td>
								<td align="left"><?php echo $data_admin['penyakit_kronis']; ?></td>
								<td align="left"><?php echo $data_admin['penerima_bantuan']; ?></td>
								<td align="left"><?php echo $data_admin['disabilitas']; ?></td>
								<td align="center"><a target="_blank" class="btn btn-primary btn-sm" href="<?php echo $data_admin['surat_sakit']; ?>"> <i class="fa fa-eye"></i></a></td>
							<?php } ?>
						<?php endwhile; ?>

						<?php
						$no = 0;
						$query = mysqli_query($koneksi, "SELECT * FROM warga");
						while ($data = mysqli_fetch_array($query)) :
							$no++;
						?>

							<?php if ($_SESSION['role'] > 1) { ?>
							<tr align="center">
								<td><?php echo $no; ?></td>
								<td align="left"><?php echo $data['nama']; ?></td>
								<td align="left"><?php echo $data['usia']; ?></td>
								<td align="left"><?php echo $data['rt'] . '/' . $data['rw']; ?></td>
								<td align="left"><?php echo $data['penyakit_kronis']; ?></td>
								<td align="left"><?php echo $data['penerima_bantuan']; ?></td>
								<td align="left"><?php echo $data['disabilitas']; ?></td>
								<td align="left"><a target="_blank" class="btn btn-primary btn-sm" href="<?php echo $data['surat_sakit']; ?>"> <i class="fa fa-eye"></i></a></td>
								<td>
									<?php if ($_SESSION['role'] == 4) { ?>
										<div class="btn-group" role="group">
											<a type="submit" data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="edit-warga.php?id=<?php echo $data['id_warga']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
											<span type="submit" data-toggle="modal" data-target="#hapusData<?= $data['id_warga'] ?>" class="btn btn-danger btn-sm" title="Validasi Data"><i class="fa fa-trash"></i></span>
										</div>
									<?php } else if ($_SESSION['role'] == 3) { ?>
										<?php if ($_SESSION['rw'] == $data['rw']){ ?>
											<?php if ($data['validasi'] == 0){ ?>
												<span type="submit" name="status" data-toggle="modal" data-target="#valid<?= $data['id_warga'] ?>" class="btn btn-primary btn-sm" title="Validasi Data"><i class="fa fa-check-circle"></i> Ya</span>
												<span type="submit" name="status" data-toggle="modal" data-target="#tolakValid<?= $data['id_warga'] ?>" class="btn btn-danger btn-sm" title="Validasi Data"><i class="fa fa-ban"></i> Tidak</span>
											<?php } else { ?>
											<span type="submit" class="badge badge-success">Sudah Melakukan Aksi</span>
											<span type="submit" data-toggle="modal" data-target="#batalkanAksi<?= $data['id_warga'] ?>" class="badge badge-danger" title="Validasi Data">Batalkan Aksi</span>
										<?php }} else {
											echo 'Bukan Wilayah Wewenang';
										} ?>
									<?php } ?>
								</td>
							<?php } ?>

							<?php if ($_SESSION['role'] == 3) {
								echo '<td>';
								// if ($_SESSION['role'] == 3) {
								
								if ($data['validasi'] == 1) {
									echo '<span class="badge badge-success">Data divalidasi</span>';
								} else if ($data['validasi'] == 0) {
									echo '<span class="badge badge-warning">Data belum divalidasi</span>';
								} else {
									echo '<span class="badge badge-danger">Data ditolak</span>';
								}
								// }
							}
							echo '</td>';
							?>
							</tr>

							<!-- Modal Terima-->
							<div class="modal fade" id="valid<?= $data['id_warga'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-xl">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-check-circle"></i> Validasi Data</h5>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<form action="" method="post">
											<div class="modal-body">
												<div class="row">
													<input type="text" id="_warga" name="id_warga" value="<?= $data['id_warga'] ?>" hidden>
													<div class="form-group col-md-6">
														<label class="font-weight-bold">Nama Warga</label>
														<input autocomplete="off" type="text" name="nama" required value="<?php echo $data['nama']; ?>" class="form-control" />
													</div>
													<div class="form-group col-md-3">
														<label class="font-weight-bold">Usia</label>
														<input autocomplete="off" type="number" name="usia" required value="<?php echo $data['usia']; ?>" class="form-control" />
													</div>
													<div class="form-group col-md-3">
														<label class="font-weight-bold">RT</label>
														<select name="rt" required class="form-control">
															<option value="">--Pilih RT--</option>
															<option value="001" <?php if ($data['rt'] == '001') {
																					echo "selected";
																				} ?>>001</option>
															<option value="002" <?php if ($data['rt'] == '002') {
																					echo "selected";
																				} ?>>002</option>
															<option value="003" <?php if ($data['rt'] == '003') {
																					echo "selected";
																				} ?>>003</option>
															<option value="004" <?php if ($data['rt'] == '004') {
																					echo "selected";
																				} ?>>004</option>
															<option value="005" <?php if ($data['rt'] == '005') {
																					echo "selected";
																				} ?>>005</option>
															<option value="006" <?php if ($data['rt'] == '006') {
																					echo "selected";
																				} ?>>006</option>
															<option value="007" <?php if ($data['rt'] == '007') {
																					echo "selected";
																				} ?>>007</option>
															<option value="008" <?php if ($data['rt'] == '008') {
																					echo "selected";
																				} ?>>008</option>
															<option value="009" <?php if ($data['rt'] == '009') {
																					echo "selected";
																				} ?>>009</option>
															<option value="010" <?php if ($data['rt'] == '010') {
																					echo "selected";
																				} ?>>010</option>
														</select>
													</div>
													<div class="form-group col-md-6">
														<label class="font-weight-bold">Penyakit Kronis</label>
														<input autocomplete="off" type="text" name="penyakit_kronis" value="<?php echo $data['penyakit_kronis']; ?>" class="form-control" />
													</div>
													<div class="form-group col-md-3">
														<label class="font-weight-bold">RW</label>
														<select name="rw" required class="form-control">
															<option value="">--Pilih RW--</option>
															<option value="001" <?php if ($data['rw'] == '001') {
																					echo "selected";
																				} ?>>001</option>
															<option value="002" <?php if ($data['rw'] == '002') {
																					echo "selected";
																				} ?>>002</option>
															<option value="003" <?php if ($data['rw'] == '003') {
																					echo "selected";
																				} ?>>003</option>
															<option value="004" <?php if ($data['rw'] == '004') {
																					echo "selected";
																				} ?>>004</option>
															<option value="005" <?php if ($data['rw'] == '005') {
																					echo "selected";
																				} ?>>005</option>
															<option value="006" <?php if ($data['rw'] == '006') {
																					echo "selected";
																				} ?>>006</option>
															<option value="007" <?php if ($data['rw'] == '007') {
																					echo "selected";
																				} ?>>007</option>
															<option value="008" <?php if ($data['rw'] == '008') {
																					echo "selected";
																				} ?>>008</option>
															<option value="009" <?php if ($data['rw'] == '009') {
																					echo "selected";
																				} ?>>009</option>
														</select>
													</div>
													<div class="form-group col-md-3">
														<label class="font-weight-bold">Penyandang Disabilitas</label>
														<select name="dis" required class="form-control">
															<option value="Tidak" <?php if ($data['disabilitas'] == 'Tidak') {
																						echo "selected";
																					} ?>>Tidak</option>
															<option value="Ya" <?php if ($data['disabilitas'] == 'Ya') {
																					echo "selected";
																				} ?>>Ya</option>
														</select>
													</div>
													<div class="form-group col-md-6">
														<label class="font-weight-bold">Penerima Bantuan</label>
														<input autocomplete="off" type="text" name="penerima_bantuan" value="<?php echo $data['penerima_bantuan']; ?>" class="form-control" />
													</div>
													<div class="form-group col-md-6">
														<label class="font-weight-bold">Surat Sakit</label>
														<a target="_blank" class="form-control" href="<?php echo $data['surat_sakit']; ?>"> <i class="fa fa-eye"></i> Lihat Surat</a>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="submit" name="validasi" class="btn btn-success"><i class="fa fa-check-circle"></i> Validasi</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- END Modal Terima -->
							<!-- Modal Tolak-->
							<div class="modal fade" id="tolakValid<?= $data['id_warga'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-check-circle"></i> Validasi Data</h5>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<form action="" method="post">
											<div class="modal-body">
												<!-- <div class="row"> -->
												<input type="text" id="_warga" name="id_warga" value="<?= $data['id_warga'] ?>" hidden>
												<button type="submit" name="tolakValidasi" class="btn btn-danger"><i class="fa fa-ban"></i> Tolak Validasi</button>
											</div>
									</div>
								</div>
								</form>
							</div>
							<!-- END Modal Tolak -->
							<!-- Batalkan Aksi Modal-->
							<div class="modal fade" id="batalkanAksi<?= $data['id_warga'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="myModalLabel3">Validasi Data</h5>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<form action="" method="post">
											<div class="modal-body">
												<!-- <div class="row"> -->
												<input type="text" id="_warga" name="id_warga" value="<?= $data['id_warga'] ?>" hidden>
												<button type="submit" name="batalkanAksi" class="btn btn-danger"><i class="fa fa-ban"></i> Batalkan Aksi</button>
											</div>
									</div>
								</div>
								</form>
							</div>
							<!-- END Modal Batalkan Aksi -->
							<!-- Hapus Warga Modal-->
							<div class="modal fade" id="hapusData<?= $data['id_warga'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="myModalLabel3">Validasi Data</h5>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<form action="" method="post">
											<div class="modal-body">
												<!-- <div class="row"> -->
												<input type="text" id="_warga" name="id_warga" value="<?= $data['id_warga'] ?>" hidden>
												<button type="submit" name="hapusData" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Warga</button>
											</div>
									</div>
								</div>
								</form>
							</div>
							<!-- END Modal Hapus Warga -->
		</div>
	</div>
<?php endwhile; ?>
</tbody>
</table>
</div>
</div>
</div>

<?php
require_once('template/footer.php');
?>