    <!-- Tambah Modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kelola Sanksi</h5>
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
										<label>Batas Bawah Poin :</label>
                                        <input type="text" id="batas_bawah_poin" name="batas_bawah_poin" placeholder="Tuliskan Batas Bawah Poin" class="form-control" required>
										<!-- <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Kelas" required autofocus> -->
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-12">
									<div class="form-group">
										<label>Batas Atas Poin :</label>
                                        <input type="text" id="batas_atas_poin" name="batas_atas_poin" placeholder="Tuliskan Batas Atas Poin" class="form-control" required>
										<!-- <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Kelas" required autofocus> -->
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label>Tindak Lanjut :</label>
                                        <input type="text" id="tindak_lanjut"name="tindak_lanjut" class="form-control" placeholder="Tuliskan Tindak Lanjut" required autofocus>
										<!-- <input type="text" id="ruang" name="ruang" class="form-control" placeholder="Ruang Kelas" required autofocus> -->
									</div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Sanksi :</label>
                                        <input type="sanksi" id="sanksi"name="sanksi" class="form-control" placeholder="Tuliskan Sanksi" required autofocus>		
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

    <?php if (isset($sanksi)) { ?>
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
                                            <label>Batas Bawah Poin :</label>
                                            <input type="text" id="batas_bawah_poin" name="batas_bawah_poin" placeholder="Tuliskan Batas Bawah Poin" class="form-control" value="<?php if(isset($sanksi)) echo $sanksi->batas_bawah_poin?>" required>
                                            <!-- <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Kelas" required autofocus> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Batas Atas Poin :</label>
                                            <input type="text" id="batas_atas_poin" name="batas_atas_poin" placeholder="Tuliskan Batas Atas Poin" class="form-control" value="<?php if(isset($sanksi)) echo $sanksi->batas_atas_poin?>" required>
                                            <!-- <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Kelas" required autofocus> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Tindak Lanjut :</label>
                                            <input type="text" id="tindak_lanjut"name="tindak_lanjut" class="form-control" placeholder="Tuliskan Tindak Lanjut" value="<?php if(isset($sanksi)) echo $sanksi->tindak_lanjut?>" required autofocus>
                                            <!-- <input type="text" id="ruang" name="ruang" class="form-control" placeholder="Ruang Kelas" required autofocus> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Sanksi :</label>
                                            <input type="sanksi" id="sanksi"name="sanksi" class="form-control" placeholder="Tuliskan Sanksi" value="<?php if(isset($sanksi)) echo $sanksi->sanksi?>" required autofocus>		
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