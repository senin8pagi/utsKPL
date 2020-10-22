    <!-- Tambah Modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Daftar Prestasi</h5>
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
										<label>Jenis prestasi :</label>
                                        <select id="id_jenis_prestasi" name="id_jenis_prestasi" class="form-control" required>
                                            <option value="" selected disabled>-- Pilih Jenis Prestasi --</option>
                                            <?php foreach($jenis_prestasi->result() as $row){?>
                                            <option value="<?= $row->id_jenis_prestasi?>"><?= $row->jenis_prestasi?></option>
                                            <?php } ?>
                                        </select>
										
                                        <!-- <input list="jenis_prestasi" autocomplete="off" id="id_jenis_prestasi" name="id_jenis_prestasi" placeholder="Pilih Jenis Prestasi" class="form-control" required>
                                        <datalist id="jenis_prestasi">
    <?php foreach($jenis_prestasi->result() as $row){?>
                            <option data-id="<?= $row->id_jenis_prestasi?>" value="<?= $row->id_jenis_prestasi?>"></option>
    <?php } ?>
                                        </datalist>  -->
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-12">
									<div class="form-group">       
										<label>Kode prestasi :</label>
                                        <!-- <select id="kode_prestasi" name="kode_prestasi" class="form-control" required>
                                            <option value="" selected disabled>-- Pilih Jenis Prestasi --</option>
                                           
                                        </select> -->
                                        <div id="kode_prestasi">
										<input type="text" value="" name="kode_prestasi" class="form-control" placeholder="Masukkan kode prestasi" required autofocus>
                                        </div>
                                    </div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label>Prestasi :</label>
										<input type="text" id="prestasi" name="prestasi" class="form-control" placeholder="Prestasi baru" required autofocus>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>Skor Prestasi :</label>
										<input type="text" id="skor_prestasi" name="skor_prestasi" class="form-control" placeholder="Skor prestasi" required autofocus>
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

    <?php if (isset($prestasi)) { ?>
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Edit Daftar Prestasi</h5>
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
                                            <label>Kode prestasi :</label>
                                            <input type="text" id="kode_prestasi" name="kode_prestasi" class="form-control" placeholder="Masukkan kode prestasi" value="<?php if(isset($prestasi)) echo $prestasi->kode_prestasi?>" disabled required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Jenis prestasi :</label>
                                            <select id="id_jenis_prestasi" name="id_jenis_prestasi" class="form-control" readonly required>
                                                <option value="" selected disabled>-- Pilih Jenis Prestasi --</option>
                                                <?php foreach($jenis_prestasi->result() as $row){?>
                                                <option value="<?= $row->id_jenis_prestasi?>" <?php if(isset($prestasi) && $prestasi->id_jenis_prestasi == $row->id_jenis_prestasi) echo "selected"; else echo "disabled"?>><?= $row->jenis_prestasi?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Prestasi :</label>
                                            <input type="text" id="prestasi" name="prestasi" class="form-control" placeholder="Prestasi baru" value="<?php if(isset($prestasi)) echo $prestasi->prestasi?>" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Skor Prestasi :</label>
                                            <input type="text" id="skor_prestasi" name="skor_prestasi" class="form-control" placeholder="Skor prestasi" value="<?php if(isset($prestasi)) echo $prestasi->skor?>" required autofocus>
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