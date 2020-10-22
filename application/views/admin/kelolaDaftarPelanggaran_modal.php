    <!-- Tambah Modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Daftar Pelanggaran</h5>
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
										<label>Jenis Pelanggaran :</label>
                                            <select id="id_jenis_pelanggaran" name="id_jenis_pelanggaran" class="form-control" required>
                                                <option value="" selected disabled>--  Pilih Jenis Pelanggaran --</option>
                                                <?php foreach($jenis_pelanggaran->result() as $row){?>
                                                <option value="<?= $row->id_jenis_pelanggaran?>"><?= $row->jenis_pelanggaran?></option>
                                                <?php } ?>
                                            </select>
                                    </div>
								</div>
							</div>
                            <div class="row">
								<div class="col-12">
									<div class="form-group">
										<label>Kode Pelanggaran :</label>
                                        <div id="kode_pelanggaran">
										<input type="text" name="kode_pelanggaran" class="form-control" placeholder="Masukkan kode pelanggaran" required autofocus>
                                        </div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label>Pelanggaran :</label>
										<input type="text" id="pelanggaran" name="pelanggaran" class="form-control" placeholder="Pelanggaran baru" required autofocus>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>Skor Pelanggaran :</label>
										<input type="text" id="skor_pelanggaran" name="skor_pelanggaran" class="form-control" placeholder="Skor pelanggaran" required autofocus>
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

    <?php if (isset($pelanggaran)) { ?>
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Edit Daftar Pelanggaran</h5>
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
                                            <label>Kode Pelanggaran :</label>
                                            <input type="text" id="kode_pelanggaran2" name="kode_pelanggaran" class="form-control" placeholder="Masukkan kode pelanggaran" value="<?php if(isset($pelanggaran)) echo $pelanggaran->kode_pelanggaran?>" disabled required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Jenis Pelanggaran :</label>
                                            <select id="id_jenis_pelanggaran2" name="id_jenis_pelanggaran" class="form-control" readonly required>
                                                <option value="" selected disabled>-- Pilih Jenis Pelanggaran --</option>
                                                <?php foreach($jenis_pelanggaran->result() as $row){?>
                                                <option value="<?= $row->id_jenis_pelanggaran?>" <?php if(isset($pelanggaran) && $pelanggaran->id_jenis_pelanggaran == $row->id_jenis_pelanggaran) echo "selected"; else echo "disabled"?>><?= $row->jenis_pelanggaran?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label>Pelanggaran :</label>
											<input type="text" id="pelanggaran" name="pelanggaran" class="form-control" placeholder="Pelanggaran baru" value="<?php if(isset($pelanggaran)) echo $pelanggaran->pelanggaran?>" required autofocus>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label>Skor Pelanggaran :</label>
											<input type="text" id="skor_pelanggaran" name="skor_pelanggaran" class="form-control" placeholder="Skor pelanggaran" value="<?php if(isset($pelanggaran)) echo $pelanggaran->skor?>" required autofocus>
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