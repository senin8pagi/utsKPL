<div class='container-fluid'>
				<!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
					<!-- $this->load->view("template/login", $data); -->
                        <a href="<?= base_url("dashboard")?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Kelola kelas</li>
                </ol>
                <!--Notifikasi Pengguna-->
				<div id='message'></div>
				<?php if ($this->session->flashdata('success')){ ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Note! </strong><?= $this->session->flashdata('success') ?>
					</div>
				<?php }else if ($this->session->flashdata('error')){?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Note! </strong><?= $this->session->flashdata('error') ?>
					</div>
				<?php } ?>
                <!-- DataTables Example -->
                <div class="card mb-3">
                    <div class="card-header"><i class="fas fa-table"></i> Tabel Kelas</div>
                    <div class="card-body">
						<a href="<?=base_url('kelola/kelas/tambah')?>" class="btn btn-success mb-3">Tambah <i class="fas fa-pen"></i></a>
                        <div class="table-responsive">
							<table id="table" class="table table-bordered" id="tabel" width="100%" cellspacing="0">
								<!-- edited table-->
								<thead class="text-center">
									<tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
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