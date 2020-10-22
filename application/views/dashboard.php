<div class="container bg-white" id="content">
	<div class="pb-3">
		<h1 class="text-center">"APLIKASI PENCATATAN SKOR PELANGGARAN DAN PRESTASI SISWA SMA MARDISISWA"<hr></h1>
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="10"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<div class="card bg-white" style="height:450px;">
						<img class="d-block w-100" src="<?= base_url("assets/images/1.jpg") ?>" class="card-img-center" max-width="100%" height="auto" alt="First slide">
					</div>
					<div class="carousel-caption d-none d-md-block">
					</div>
				</div>

				<div class="carousel-item">
					<div class="card bg-white" style="height:450px;">
						<img class="d-block w-100" src="<?= base_url("assets/images/2.jpg") ?>" class="card-img-center" max-width="100%" height="auto" alt="Second slide">	
					</div>
					<div class="carousel-caption d-none d-md-block">
					</div>
				</div>

				<div class="carousel-item">
					<div class="card bg-white" style="height:450px;">
						<img class="d-block w-100" src="<?= base_url("assets/images/3.jpg") ?>" class="card-img-center" max-width="100%" height="auto" alt="Third slide">	
					</div>
					<div class="carousel-caption d-none d-md-block">
					</div>
				</div>

				<div class="carousel-item">
					<div class="card bg-white" style="height:450px;">
						<img class="d-block w-100" src="<?= base_url("assets/images/4.jpg") ?>" class="card-img-center" max-width="100%" height="auto" alt="Fourth slide">	
					</div>
					<div class="carousel-caption d-none d-md-block">
					</div>
				</div>

				<div class="carousel-item">
					<div class="card bg-white" style="height:450px;">
						<img class="d-block w-100" src="<?= base_url("assets/images/5.jpg") ?>" class="card-img-center" max-width="100%" height="auto" alt="Second slide">	
					</div>
					<div class="carousel-caption d-none d-md-block">
					</div>
				</div>

				<div class="carousel-item">
					<div class="card bg-white" style="height:450px;">
						<img class="d-block w-100" src="<?= base_url("assets/images/6.jpg") ?>" class="card-img-center" max-width="100%" height="auto" alt="Second slide">	
					</div>
					<div class="carousel-caption d-none d-md-block">
					</div>
				</div>

				<div class="carousel-item">
					<div class="card bg-white" style="height:450px;">
						<img class="d-block w-100" src="<?= base_url("assets/images/7.jpg") ?>" class="card-img-center" max-width="100%" height="auto" alt="Second slide">	
					</div>
					<div class="carousel-caption d-none d-md-block">
					</div>
				</div>

				<div class="carousel-item">
					<div class="card bg-white" style="height:450px;">
						<img class="d-block w-100" src="<?= base_url("assets/images/8.jpg") ?>" class="card-img-center" max-width="100%" height="auto" alt="Second slide">	
					</div>
					<div class="carousel-caption d-none d-md-block">
					</div>
				</div>

				<div class="carousel-item">
					<div class="card bg-white" style="height:450px;">
						<img class="d-block w-100" src="<?= base_url("assets/images/9.jpg") ?>" class="card-img-center" max-width="100%" height="auto" alt="Second slide">	
					</div>
					<div class="carousel-caption d-none d-md-block">
					</div>
				</div>

				<div class="carousel-item">
					<div class="card bg-white" style="height:450px;">
						<img class="d-block w-100" src="<?= base_url("assets/images/10.jpg") ?>" class="card-img-center" max-width="100%" height="auto" alt="Second slide">	
					</div>
					<div class="carousel-caption d-none d-md-block">
					</div>
				</div>


				<div class="carousel-item">
					<div class="card bg-white" style="height:450px;">
						<img class="d-block w-100" src="<?= base_url("assets/images/11.jpg") ?>" class="card-img-center" max-width="100%" height="auto" alt="Second slide">	
					</div>
					<div class="carousel-caption d-none d-md-block">
						<!-- <h5 >ini adalah percobaan ketiga</h5>
						<p>Third Test</p> -->
					</div>
				</div>

			</div>

			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	<div>

	<!-- Area Chart Example-->
	<div class="pt-5">
		<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-chart-area"></i>
			Grafik Total Skor Per Bulan</div>
		<h5 class="card-title text-center pt-4" style="font-weight:bold;">Grafik Pencatatan Per Bulan</h5>
		<div class="card-body">
			<canvas id="myAreaChart" width="100%" height="30"></canvas>
		</div>
      	<div class="card-footer small text-muted"></div>
    </div>

		<!-- DataTables Example -->
		<div class="pt-5 pb-3" id="content">
		<h3 class="text-center pb-3"> Informasi Perolehan Skor Siswa </h3>
		<div class="row">
			<div class="col-6">
			<div class="card mb-3 bg-light">
				<div class="card-header"><i class="fas fa-table"></i> Siswa Dengan Skor Tertinggi</div>
				<div class="card-body">
				<div class="pl-3 pt-3 pb-3">
					<h6><strong>Note!</strong><span> Total Skor Siswa = Total Skor Prestasi - Total Skor Pelanggaran </span></h6>
				</div>
					<div class="table-responsive">
						<table class="table table-bordered" id="tabel_cetak_prestasi" name="tabel_cetak_prestasi" width="100%" cellspacing="0">
						<!-- edited table-->
							
							<tr>
								<th>No</th>
								<th>NIS</th>
								<th>Nama Siswa</th>
								<th>Total Skor Siswa</th>
							</tr>
							<?php $i = 1; ?>
							<?php foreach($skorTertinggi as $row){?>
							<tr>
								<td><?php echo $i++ ?></td>	
								<td><?php echo $row->nis ?></td>
								<td><?php echo $row->nama_siswa ?></td>	
								<td><?php echo $row->total_skor ?></td>	
							</tr>
							<?php } ?>	
							
						</table>
					</div>
				</div>
				<div class="card-footer small text-muted"></div>
			</div>
			</div>

			<div class="col-6">
			<div class="card mb-3 bg-light">
				<div class="card-header"><i class="fas fa-table"></i> Siswa Dengan Skor Terendah</div>
				<div class="card-body">
				<div class="pl-3 pt-3 pb-3">
					<h6><strong>Note!</strong><span> Total Skor Siswa = Total Skor Prestasi - Total Skor Pelanggaran </span></h6>
				</div>
					<div class="table-responsive">
						<table class="table table-bordered" id="tabel_cetak_prestasi" name="tabel_cetak_prestasi" width="100%" cellspacing="0">
						<!-- edited table-->
							<tr>
								<th>No</th>
								<th>NIS</th>
								<th>Nama Siswa</th>
								<th>Total Skor Siswa</th>
							</tr>
							<?php $i = 1; ?>
							<?php foreach($skorTerendah as $row){?>
							<tr>
								<td><?php echo $i++ ?></td>	
								<td><?php echo $row->nis ?></td>
								<td><?php echo $row->nama_siswa ?></td>	
								<td><?php echo $row->total_skor ?></td>	
							</tr>
							<?php } ?>	
							
						</table>
					</div>
				</div>
				<div class="card-footer small text-muted"></div>
			</div>
			</div>
		</div>
		</div>
<!-- ================================================================================================================================== -->
<div class="row">
            <div class="col-12">
                <div id="coba" class="card"></div>
            </div>
        </div>

<script src="<?= base_url() ?>assets/highchart/jquery-3.1.1.min.js"></script>
<script src="<?= base_url() ?>assets/highchart/highcharts.js"></script>
<script src="<?= base_url() ?>assets/highchart/exporting.js"></script>
<script src="<?= base_url() ?>assets/highchart/export-data.js"></script>
<script src="<?= base_url() ?>assets/highchart/accessibility.js"></script>

<!-- ================================================================================================================================== -->


HARUSNYA DIKASIH SAYANG~ UwU,.. Hehe
		<div class="pt-5 pb-3" id="content">
		<h3 class="text-center pb-3"> Informasi Penanganan Siswa dengan Pointnya</h3>
		<div class="row">
			<div class="col-12">
			<div class="card mb-3 bg-light">
				<div class="card-header"><i class="fas fa-table"></i> Penanganan Siswa</div>
				<div class="card-body">
				<div class="pl-3 pt-3 pb-3">
					<h6><strong>Note!</strong><span> Total Skor Siswa = Total Skor Prestasi - Total Skor Pelanggaran </span></h6>
				</div>
					<div class="table-responsive">
						<table class="table table-bordered" id="tabel_cetak_prestasi" name="tabel_cetak_prestasi" width="100%" cellspacing="0">
						<!-- edited table-->
							<tr>
								<th>No</th>
								<th>NIS</th>
								<th>Nama Siswa</th>
								<th>Total Skor Siswa</th>
								<th>Penanganan</th>
							</tr>
							<?php $i = 1; ?>
							<?php foreach($skorTerendah as $row){?>
							<tr>
								<td><?php echo $i++ ?></td>	
								<td><?php echo $row->nis ?></td>
								<td><?php echo $row->nama_siswa ?></td>	
								<td><?php echo $row->total_skor ?></td>	
							</tr>
							<?php } ?>	
							
						</table>
					</div>
				</div>
				<div class="card-footer small text-muted"></div>
			</div>
			</div>
		</div>
		</div>

<!-- ================================================================================================================================== -->
		<div class="pt-3 pb-3" id="content">
		<h3 class="text-center pb-3"> Feature Aplikasi </h3>
		<div class="row">
          <div class="col-lg-3 col-md-6 col-6">
		    <div class="card text-black bg-info mb-3" style="width: 15rem; height: 15rem;">
			    <div class="card-header text-center"><strong>Kelola</strong></div>
				<div class="card-body">
					<!-- <h5 class="card-title">Primary card title</h5> -->
					<p class="card-text text-center"><a href="#kelolaUser" class="btn btn-info">Kelola User</a></p>
					<p class="card-text text-center"><a href="#kelolaSiswa" class="btn btn-info">Kelola Siswa</a></p>
					<p class="card-text text-center"><a href="#kelolaKelas" class="btn btn-info">Kelola Kelas</a></p>
				</div>
			</div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-md-6 col-6">
		  <div class="card text-black bg-success mb	-3" style="width: 15rem; height: 15rem;">
			    <div class="card-header text-center"><strong>Daftar Skor</strong></div>
				<div class="card-body">
					<!-- <h5 class="card-title">Primary card title</h5> -->
					<p class="card-text text-center"><a href="daftarSkorPelanggaran" class="btn btn-success">Daftar Skor Pelanggaran</a></p>
					<p class="card-text text-center"><a href="daftarSkorPrestasi" class="btn btn-success">Daftar SKor Prestasi</a></p>
				</div>
			</div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-md-6 col-6">
            <div class="card text-black bg-secondary mb-3" style="width: 15rem; height: 15rem;">
				<div class="card-header text-center"><strong>Pencatatan</strong></div>
				<div class="card-body">
					<!-- <h5 class="card-title">Primary card title</h5> -->
					<p class="card-text text-center"><a href="catatPelanggaran" class="btn btn-secondary">Catat Pelanggaran</a></p>
					<p class="card-text text-center"><a href="catatPrestasi" class="btn btn-secondary">Catat Prestasi</a></p>
				</div>
			</div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-md-6 col-6">
		    <div class="card text-black bg-danger mb-3" style="width: 15rem; height: 15rem;">
			    <div class="card-header text-center"><strong>Informasi Skor & Cetak</strong></div>
				<div class="card-body">
					<!-- <h5 class="card-title">Primary card title</h5> -->
					<p class="card-text text-center"><a href="totalPelanggaranSiswa" class="btn btn-danger">Total Pelanggaran Siswa</a></p>
					<p class="card-text text-center"><a href="totalPrestasiSiswa" class="btn btn-danger">Total Prestasi Siswa</a></p>
					<p class="card-text text-center"><a href="totalSkorSiswa" class="btn btn-danger">Total Skor Siswa</a></p>
				</div>
			</div>
          </div>
          <!-- ./col -->
		</div>
	</div>	
</div>
</div>
</div>
</div>
