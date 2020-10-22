                <div class='container-fluid'>
				<!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url("admin/dashboard")?>">Dashboard</a>   <!--Belum ada Isinya,-->
                    </li>
                    <li class="breadcrumb-item active">Pencatatan Pelanggaran</li>
                </ol>
				<!--Notifikasi Pengguna-->
				<div id='message'><strong id="note"></strong></div>
				<?php if ($this->session->flashdata('success')){ ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Note! </strong><?= $this->session->flashdata('success') ?>  <!--Pesan ketika Benar-->
					</div>
				<?php }else if ($this->session->flashdata('error')){?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Note! </strong><?= $this->session->flashdata('error') ?>    <!--Pesan ketika Salah-->
					</div>
				<?php } ?>
                <!-- DataTables Example -->
                <div class="card mb-3">
                    <div class="card-header"><i class="fas fa-table"></i> Tabel Pencatatan Skor</div>
                    <div class="card-body">
						<a href="<?=base_url('catat/pencatatanPelanggaran/tambah')?>" class="btn btn-success mb-3">Tambah <i class="fas fa-pen"></i></a>
                        <div class="table-responsive">
							<table id="table" class="table table-bordered"  width="100%" cellspacing="0">
								<!-- edited table-->
								<thead class="text-center">
									<tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Nama Siswa</th>
										<th>Pelanggaran</th>
										<th>Skor</th>
                                        <th>Pencatat</th>
										<!-- <th>Semester</th> -->
										<th>Tanggal Catat</th>
										<th>Kelola</th>
									</tr>
								</thead>
								<tbody id="data">
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
				</div>
            </div>