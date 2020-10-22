    <!-- Tambah Modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kelola Penempatan Kelas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?php if (validation_errors()){ ?>
                    <div class="alert alert-warning" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php } ?>
                <div class="modal-body">
                    <div class="container">
                        <form id="formTambah" method="post">
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label>Pilih Semester :</label>
                                        <input list="semester" autocomplete="off" id="id_semester" name="id_semester" placeholder="Ketikkan Semester" class="form-control" required>
                                        <datalist id="semester">
    <?php foreach($semester->result() as $row){?>
                            <option data-id="<?= $row->id_semester?>" value="<?= $row->tanggal_mulai.' s/d '.$row->tanggal_selesai?>"></option>
    <?php } ?>
                                        </datalist> 
										<!-- <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Kelas" required autofocus> -->
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label>Pilih NIS/Nama Siswa :</label>
                                        <input list="nis" autocomplete="off" name="nis_siswa" id="nis_siswa" placeholder="Ketikkan NIS/Nama Siswa" class="form-control nis" required>
                                        <datalist id="nis">
    <?php foreach($siswa->result() as $row){?>
                            <option data-id="<?= $row->nis?>" value="<?= $row->nis.' - '.$row->nama?>"></option>
    <?php } ?>
                                        </datalist>
										<!-- <input type="text" id="ruang" name="ruang" class="form-control" placeholder="Ruang Kelas" required autofocus> -->
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-12">
									<div class="form-group">
										<label>Pilih Kelas :</label>
                                        <input list="kelas" autocomplete="off" id="id_kelas" name="id_kelas" placeholder="Ketikkan NIS/Nama Siswa" class="form-control" required>
                                        <datalist id="kelas">
    <?php foreach($kelas->result() as $row){?>
                            <option data-id="<?= $row->id_kelas?>" value="<?= $row->kelas.' '.$row->ruang?>"></option>
    <?php } ?>
                                        </datalist>
										<!-- <input type="text" id="ruang" name="ruang" class="form-control" placeholder="Ruang Kelas" required autofocus> -->
									</div>
								</div>
							</div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="submit" value="tambah" form="formTambah" class="btn btn-success">Simpan <i class="fas fa-save"></i></button>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($penempatan_kelas)) { ?>
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <?php if (validation_errors()){ ?>
                    <div class="alert alert-warning" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                    <?php } ?>
                    <div class="modal-body">
                        <div class="container">
                            <form id="formEdit" method="post">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Pilih Semester :</label>
                                            <?php foreach($semester->result() as $row){?>
                                                <?php if(isset($penempatan_kelas) && $penempatan_kelas->id_semester == $row->id_semester) {?>
                                                    <input list="semester" value="<?= $row->tanggal_mulai." s/d ".$row->tanggal_selesai?>" autocomplete="off" id="id_semester2" name="id_semester" placeholder="Ketikkan NIS/Nama Siswa" class="form-control" required>
                                                <?php } ?>
                                            <?php } ?> 
                                            <!-- <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Kelas" required autofocus> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Pilih NIS/Nama Siswa :</label>
                                            <?php foreach($siswa->result() as $row){?>
                                                <?php if(isset($penempatan_kelas) && $penempatan_kelas->nis == $row->nis) {?>
                                                    <input list="nis" value="<?= $row->nis." - ".$row->nama?>" autocomplete="off" id="nis_siswa2" name="nis_siswa" placeholder="Ketikkan NIS/Nama Siswa" class="form-control" required>
                                                <?php } ?>
                                            <?php } ?>     
                                            <!-- <input type="text" id="ruang" name="ruang" class="form-control" placeholder="Ruang Kelas" required autofocus> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Pilih Kelas :</label>
                                            <?php foreach($kelas->result() as $row){?>
                                                <?php if(isset($penempatan_kelas) && $penempatan_kelas->id_kelas == $row->id_kelas) {?>
                                                    <input list="kelas" value="<?= $row->kelas." ".$row->ruang?>" autocomplete="off" id="id_kelas2" name="id_kelas" placeholder="Ketikkan NIS/Nama Siswa" class="form-control" required>
                                                <?php } ?>
                                            <?php } ?>
                                            <!-- <input type="text" id="ruang" name="ruang" class="form-control" placeholder="Ruang Kelas" required autofocus> -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="submit" value="edit" form="formEdit" class="btn btn-success">Simpan <i class="fas fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>