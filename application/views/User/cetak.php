<section id="halaman_pencetakan" class="halaman_pencetakan">
	<!-- membuat halaman pencetakan -->
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?= base_url("dashboard")?>">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Cetak Laporan</li>
		</ol>

		<div class="container-fluid bg-light pt-3 pb-3 rounded-lg">
			<div class="row">
				<div class="col text-center mt-2">
					<h2><b>Informasi Skor Siswa</b></h2>
				</div>
			</div>
		</div>
	<!--Navigation tabs-->
	<div class="container-fluid pt-3 pb-3 mt-3 mb-4 bg-light rounded-lg">
		<div class="row">
			<div class="container-fluid col-sm-12">
				<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
					<a class="nav-item nav-link <?php if($tabPil=="pelanggaran" || $tabPil==NULL) echo "active"?>" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Pelanggaran</a>
					<a class="nav-item nav-link <?php if($tabPil=="prestasi") echo "active"?>" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Prestasi</a>
					<a class="nav-item nav-link <?php if($tabPil=="total") echo "active"?>" id="nav-profile-tab2" data-toggle="tab" href="#nav-profile2" role="tab" aria-controls="nav-profile2" aria-selected="false">Total Skor</a>
					</div>
				</nav>
				
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade <?php if($tabPil=="pelanggaran" || $tabPil==NULL) echo "show active"?>" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					<!-- Isi Kelola User -->
					
						<!--Membuat form kelola -->
						<!-- DataTables Example -->
						<div class="card mb-3">
							<div class="card-header"><i class="fas fa-table"></i> Tabel Skor Pelanggaran</div>
								<div class="card-body">
									<?php $kelasPil = $this->input->post("id_kelas"); ?>
									<div class="row">
										<div class="col-2">
											<a class="btn btn-primary mb-3" href="<?= base_url("cetak/cetakPelanggaran/$kelasPil") ?>" target="_blank">Cetak Laporan<i class="fa fa-print ml-2"></i></a>
										</div>
										<div class="col-2">
											<form action="" id="cetakPelanggaran" method="post"> 
												<div class="form-group">				                                    
													<select id="id_kelas" name="id_kelas" class="form-control" required>
														<option value="" selected disabled>Pilih Kelas</option>
														<option value="<?= NULL?>">Semua Kelas</option>
							<?php foreach($kelas->result() as $row){?>
														<option value="<?= $row->id_kelas?>" <?php if(isset($siswa) && $siswa->id_kelas == $row->id_kelas) echo "selected"?>><?= $row->kelas." ".$row->ruang?></option>
							<?php } ?>
													</select>
												</div>
											</form>
										</div>
										<div class="col-1">
											<button type="submit" name="submit" value="cetakPelanggaran" form="cetakPelanggaran" class="btn btn-success"><i class="fas fa-search"></i></button>
										</div>										
									</div>
									
									
									<div class="table-responsive">
										<table class="table table-bordered" id="tabel_cetak_pelanggaran" name="tabel_cetak_pelanggaran" width="100%" cellspacing="0">
										<!-- edited table-->
											<thead>
											<th>No</th>
												<th>NIS</th>
												<th>Kelas</th>
												<th>Nama Siswa</th>
												<th>Total Skor Pelanggaran</th>
												<th>Keterangan</th>
											</thead>
											<tbody>
												<?php $i = 1; ?>
													<?php foreach($info_pelanggaran->result() as $row){?>	
														<tr>
															<td><?php echo $i++ ?></td>	
															<td><?php echo $row->nis ?></td>
															<td><?php echo $row->kelas." ".$row->ruang ?></td>
															<td><?php echo $row->nama_siswa ?></td>	
															<td><?php echo $row->total_skor ?></td>	
															<td>
																<a class="btn btn-primary" href="<?= base_url("cetak/detailPelanggaran/$row->nis") ?>">Rekap Data<i class="fa fa-print ml-2"></i></a>
															</td>
														</tr>
												<?php } ?>	
											</tbody>
										</table>
									</div>
								</div>
								<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
							</div>
						</div>
					
					<div class="tab-pane fade <?php if($tabPil=="prestasi") echo "show active"?>" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
					<!-- Isi Kelola User -->
					
					<!--Membuat form kelola -->
					<!-- DataTables Example -->
					<div class="card mb-3">
						<div class="card-header"><i class="fas fa-table"></i> Tabel Skor Prestasi</div>
							<div class="card-body">
								<?php $kelasPil2 = $this->input->post("id_kelas2");?>
									<div class="row">
										<div class="col-2">
											<a class="btn btn-primary mb-3" href="<?= base_url("cetak/cetakPrestasi/$kelasPil2") ?>" target="_blank">Cetak Laporan<i class="fa fa-print ml-2"></i></a>
										</div>
										<div class="col-2">
											<form action="" id="cetakPrestasi" method="post"> 
												<div class="form-group">				                                    
													<select id="id_kelas2" name="id_kelas2" class="form-control" required>
														<option value="" selected disabled>Pilih Kelas</option>
														<option value="<?= NULL?>">Semua Kelas</option>
							<?php foreach($kelas->result() as $row){?>
														<option value="<?= $row->id_kelas?>" <?php if(isset($siswa) && $siswa->id_kelas == $row->id_kelas) echo "selected"?>><?= $row->kelas." ".$row->ruang?></option>								
							<?php } ?>
													</select>
												</div>
											</form>
										</div>
										<div class="col-2">
											<button type="submit" name="submit" value="cetakPrestasi" form="cetakPrestasi" class="btn btn-success"><i class="fas fa-search"></i></button>
										</div>																	
									</div>
								<div class="table-responsive">
									<table class="table table-bordered" id="tabel_cetak_prestasi" width="100%" cellspacing="0">
									<!-- edited table-->
										<thead>
											<th>No</th>
											<th>NIS</th>
											<th>Kelas</th>
											<th>Nama Siswa</th>
											<th>Total Skor Prestasi</th>
											<th>Keterangan</th>
										</thead>
										<tbody>
											<?php $i = 1; ?>
											<?php foreach($info_prestasi->result() as $row){?>	
											<tr>
												<td><?php echo $i++ ?></td>	
												<td><?php echo $row->nis ?></td>
												<td><?php echo $row->kelas." ".$row->ruang ?></td>
												<td><?php echo $row->nama_siswa ?></td>	
												<td><?php echo $row->total_skor ?></td>	
												<td>
													<a class="btn btn-primary" href="<?= base_url("cetak/detailPrestasi/$row->nis") ?>">Rekap Data<i class="fa fa-print ml-2"></i></a>
												</td>
											</tr>
											<?php } ?>	
										</tbody>
									</table>
								</div>
							</div>
							<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
						</div>
					</div>
					
					<div class="tab-pane fade <?php if($tabPil=="total") echo "show active"?>" id="nav-profile2" role="tabpanel" aria-labelledby="nav-profile-tab2">
					<!-- Isi Kelola User -->
					<!--Membuat form kelola -->
					<!-- DataTables Example -->
					<div class="card mb-3">
						<div class="card-header"><i class="fas fa-table"></i> Tabel Total Skor</div>
						<div class="card-body">
							<?php $kelasPil3 = $this->input->post("id_kelas3");?>
							<div class="row">
								<div class="col-2">
									<a class="btn btn-primary mb-3" href="<?= base_url("cetak/cetakTotalSkor/$kelasPil3") ?>" target="_blank">Cetak Laporan<i class="fa fa-print ml-2"></i></a>
								</div>
								<div class="col-2">
									<form action="" id="cetakTotalSkor" method="post"> 
										<div class="form-group">				                                    
											<select id="id_kelas3" name="id_kelas3" class="form-control" required>
												<option value="" selected disabled>Pilih Kelas</option>
												<option value="<?= NULL?>">Semua Kelas</option>
					<?php foreach($kelas->result() as $row){?>
												<option value="<?= $row->id_kelas?>" <?php if(isset($siswa) && $siswa->id_kelas == $row->id_kelas) echo "selected"?>><?= $row->kelas." ".$row->ruang?></option>								
					<?php } ?>
											</select>
										</div>
									</form>
								</div>
								<div class="col-2">
									<button type="submit" name="submit" value="cetakTotalSkor" form="cetakTotalSkor" class="btn btn-success"><i class="fas fa-search"></i></button>
								</div>																	
							</div>
							<div class="table-responsive">
								<table class="table table-bordered" id="tabel_cetak_total" width="100%" cellspacing="0">
								<!-- edited table-->
									<thead>
										<th>No</th>
										<th>NIS</th>
										<th>Kelas</th>
										<th>Nama Siswa</th>
										<th>Total Skor Siswa</th>
										<th>Keterangan</th>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach($info_total->result() as $row){?>	
										<tr>
											<td><?php echo $i++ ?></td>	
											<td><?php echo $row->nis ?></td>
											<td><?php echo $row->kelas." ".$row->ruang ?></td>
											<td><?php echo $row->nama_siswa ?></td>	
											<td><?php echo $row->total_skor ?></td>	
											<td>
												<a class="btn btn-primary" href="<?= base_url("cetak/detailTotalSkor/$row->nis") ?>">Rekap Data<i class="fa fa-print ml-2"></i></a>
											</td>
										</tr>
										<?php } ?>	
									</tbody>
								</table>
							</div>
						</div>
						<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
					</div>
					<div class="pl-3 pt-3 pb-3">
						<h6><strong>Note!</strong><span> Total Skor Siswa = Total Skor Prestasi - Total Skor Pelanggaran </span></h6>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	<!-- /.container-fluid -->
</section>