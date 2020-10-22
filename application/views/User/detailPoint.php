<div class='container-fluid'>
				<!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url("dashboard")?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?= base_url("cetak/laporan")?>">Cetak</a>
                    </li>
                    <li class="breadcrumb-item active">Detail Skor Siswa</li>
                </ol>
				<!--Notifikasi Pengguna-->
				<!-- <div id='message'><strong id="note"></strong></div>
				<?php if ($this->session->flashdata('success')){ ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Note! </strong><?= $this->session->flashdata('success') ?>
					</div>
				<?php }else if ($this->session->flashdata('error')){?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Note! </strong><?= $this->session->flashdata('error') ?>
					</div>
				<?php } ?> -->
                <!-- DataTables Example -->
                <?php if($title == "Detail Pelanggaran") {?>
                <div class="card mb-3">
                    <div class="card-header"><i class="fas fa-table"></i> Tabel Detail Pelanggaran Siswa</div>
                    <div class="card-body">
						<button onclick="goBack()" class="btn btn-success mb-3"><i class="fas fa-arrow-left"></i>&nbsp; Kembali</button>
                        <div class="table-responsive">
                            <div style="background-color:#edebeb"><p class="ml-2 pt-2 pb-2">
                                NAMA : <?= strtoupper($siswa->nama)?>
                                </br>NIS &emsp;: <?= $siswa->nis?></p>
                            </div>
							<table id="table" class="table table-bordered" id="tabel" width="100%" cellspacing="0">
								<!-- edited table-->
                                <tr>
                                    <th style="font-weight:bold;font-size: 16px;background: lightgrey; text-align:center;" colspan="5">Riwayat Pelanggaran Siswa</th>
                                </tr>
								<tr>
                                    <th>No</th>
                                        <!-- <th>Kelas</th>
                                        <th>Nama Siswa</th> -->
										<th>Pelanggaran</th>
										<th>Skor</th>
                                        <th>Pencatat</th>
										<!-- <th>Semester</th> -->
										<th>Tanggal Catat</th>
                                </tr>
                                <?php if($pelanggaran_siswa->result() == NULL){?>
                                    <tr style="font-size: 16px;">
                                        <td colspan="5" style="text-align:center">--Tidak Ada Prestasi--</td>	
                                    </tr>
                                <?php }?>
                                <?php $i = 1; ?>
                                <?php foreach($pelanggaran_siswa->result() as $row){?>
                                <tr style="font-size: 16px;">
                                    <td><?php echo $i++ ?></td>	
                                    <!-- <td><?php echo $row->kelas." ".$row->ruang ?></td>
                                    <td><?php echo $row->nama_siswa ?></td>	 -->
                                    <td><?php echo $row->pelanggaran ?></td>
                                    <td><?php echo $row->skor ?></td>	
                                    <td><?php echo $row->pencatat ?></td>	
                                    <td><?php echo $row->tanggal ?></td>		
                                </tr>
                                <?php }?>
							</table>
						</div>
					</div>
					<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
				</div>

                <?php }else if($title == "Detail Prestasi") {?>
                <div class="card mb-3">
                    <div class="card-header"><i class="fas fa-table"></i> Tabel Detail Prestasi Siswa</div>
                    <div class="card-body">
						<button onclick="goBack()" class="btn btn-success mb-3"><i class="fas fa-arrow-left"></i>&nbsp; Kembali</button>
                        <div class="table-responsive">
                            <div style="background-color:#edebeb"><p class="ml-2 pt-2 pb-2">
                                NAMA : <?= strtoupper($siswa->nama)?>
                                </br>NIS &emsp;: <?= $siswa->nis?></p>
                            </div>
							<table id="table" class="table table-bordered" id="tabel" width="100%" cellspacing="0">
								<!-- edited table-->
                                <tr>
                                    <th style="font-weight:bold;font-size: 16px;background: lightgrey; text-align:center;" colspan="5">Riwayat Prestasi Siswa</th>
                                </tr>
								<tr>
                                    <th>No</th>
                                        <!-- <th>Kelas</th>
                                        <th>Nama Siswa</th> -->
										<th>Prestasi</th>
										<th>Skor</th>
                                        <th>Pencatat</th>
										<!-- <th>Semester</th> -->
										<th>Tanggal Catat</th>
                                </tr>
                                <?php if($prestasi_siswa->result() == NULL){?>
                                    <tr style="font-size: 16px;">
                                        <td colspan="5" style="text-align:center">--Tidak Ada Prestasi--</td>	
                                    </tr>
                                <?php }?>
                                <?php $i = 1; ?>
                                <?php foreach($prestasi_siswa->result() as $row){?>
                                <tr style="font-size: 16px;">
                                    <td><?php echo $i++ ?></td>	
                                    <!-- <td><?php echo $row->kelas." ".$row->ruang ?></td>
                                    <td><?php echo $row->nama_siswa ?></td>	 -->
                                    <td><?php echo $row->prestasi ?></td>
                                    <td><?php echo $row->skor ?></td>	
                                    <td><?php echo $row->pencatat ?></td>	
                                    <td><?php echo $row->tanggal ?></td>		
                                </tr>
                                <?php }?>
							</table>
						</div>
					</div>
					<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
				</div>

                <?php }else if($title == "Detail Skor Siswa") {?>
                <div class="card mb-3">
                    <div class="card-header"><i class="fas fa-table"></i> Tabel Detail Skor Siswa</div>
                    <div class="card-body">
						<button onclick="goBack()" class="btn btn-success mb-3"><i class="fas fa-arrow-left"></i>&nbsp; Kembali</button>
                        <a href="<?=base_url('cetak/cetakDetailSkorSiswa/'.$id_siswa)?>" target="_blank" class="btn btn-success mb-3"><i class="fas fa-arrow-left"></i>&nbsp; Print</a>
                        <div class="table-responsive">
							<table id="table" class="table table-bordered" id="tabel" width="100%" cellspacing="0">
								<!-- edited table-->
                                <div style="background-color:#edebeb"><p class="ml-2 pt-2 pb-2">
                                    NAMA : <?= strtoupper($siswa->nama)?>
                                    </br>NIS &emsp;: <?= $siswa->nis?></p>
                                </div>
                                <tr>
                                    <th style="font-weight:bold;font-size: 16px;background: lightgrey; text-align:center;" colspan="5">Riwayat Prestasi Siswa </th>
                                </tr>
								<tr>
                                    <th>No</th>
                                        <!-- <th>Kelas</th>
                                        <th>Nama Siswa</th> -->
										<!-- <th>Pelanggaran</th> -->
                                        <th>Prestasi</th>
										<th>Skor</th>
                                        <th>Pencatat</th>
										<!-- <th>Semester</th> -->
										<th>Tanggal Catat</th>
                                </tr>
                                <?php if($prestasi_siswa->result() == NULL){?>
                                    <tr style="font-size: 16px;">
                                        <td colspan="5" style="text-align:center">--Tidak Ada Prestasi--</td>	
                                    </tr>
                                <?php }?>
                                <?php $i = 1; ?>
                                <?php foreach($prestasi_siswa->result() as $row){?>
                                <tr style="font-size: 16px;">
                                    <td><?php echo $i++ ?></td>	
                                    <!-- <td><?php echo $row->kelas." ".$row->ruang ?></td>
                                    <td><?php echo $row->nama_siswa ?></td>	 -->
                                    <td><?php echo $row->prestasi ?></td>
                                    <td><?php echo $row->skor ?></td>	
                                    <td><?php echo $row->pencatat ?></td>	
                                    <td><?php echo $row->tanggal ?></td>		
                                </tr>
                                <?php }?>
                                <tr>
                                    <th style="font-weight:bold;font-size: 16px;background: lightgrey; text-align:center;" colspan="5">Riwayat Pelanggaran Siswa</th>
                                </tr>
								<tr>
                                    <th>No</th>
                                        <!-- <th>Kelas</th>
                                        <th>Nama Siswa</th> -->
										<!-- <th>Pelanggaran</th> -->
                                        <th>Pelanggaran</th>
										<th>Skor</th>
                                        <th>Pencatat</th>
										<!-- <th>Semester</th> -->
										<th>Tanggal Catat</th>
                                </tr>
                                <?php if($pelanggaran_siswa->result() == NULL){?>
                                    <tr style="font-size: 16px;">
                                        <td colspan="5" style="text-align:center">--Tidak Ada Prestasi--</td>	
                                    </tr>
                                <?php }?>
                                <?php $i = 1; ?>
                                <?php foreach($pelanggaran_siswa->result() as $row){?>
                                <tr style="font-size: 16px;">
                                    <td><?php echo $i++ ?></td>	
                                    <!-- <td><?php echo $row->kelas." ".$row->ruang ?></td>
                                    <td><?php echo $row->nama_siswa ?></td>	 -->
                                    <td><?php echo $row->pelanggaran ?></td>
                                    <td><?php echo $row->skor ?></td>	
                                    <td><?php echo $row->pencatat ?></td>	
                                    <td><?php echo $row->tanggal ?></td>		
                                </tr>
                                <?php }?>
							</table>
                            <div>
                                <b>Jumlah Total Kredit Poin Siswa :</b> <?php if($detailSkor_siswa->total_skor > 0) echo $detailSkor_siswa->total_skor; else echo 0 ?><br>
                                <b>Penanganan Pelanggaran:</b> 
                                <?php foreach($sanksi->result() as $row){
                                    if($row->batas_bawah_poin <= $detailSkor_siswa->total_skor && $row->batas_atas_poin >= $detailSkor_siswa->total_skor) echo $row->sanksi;
                                } 
                                if($detailSkor_siswa->total_skor <= 0) echo "Tidak Ada" ?>
                                
                            </div>
						</div>
					</div>
				</div>
                <?php }?>
            </div>
            <script>
function goBack() {
  window.history.back('cetak/laporan/prestasi');
}
</script>