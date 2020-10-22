    <!-- Tambah Modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Kelas</h5>
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
										<label>Kelas :</label>
                                        <select id="kelas" name="kelas" class="form-control" required>
                                            <option value="" selected disabled> Pilih Kelas: </option>
                                            <option value="X">X</option>
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                        </select>
										<!-- <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Kelas" required autofocus> -->
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>Ruang :</label>
                                        <select id="ruang" name="ruang" class="form-control" required>
                                            <option value="" selected disabled> Pilih Ruangan: </option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="IPA 1">IPA 1</option>
                                            <option value="IPA 2">IPA 2</option>
                                            <option value="IPS 1">IPS 1</option>
                                            <option value="IPS 2">IPS 2</option>
                                        </select>
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

    <?php if (isset($kelas)) { ?>
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Edit Kelas</h5>
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
                                            <label>Kelas :</label>
                                            <select id="kelas" name="kelas" class="form-control" required>
                                                <option value="" selected disabled> Pilih Kelas: </option>
                                                <option value="X" <?php if(isset($kelas) && $kelas->kelas == "X") echo "selected"?>>X</option>
                                                <option value="XI" <?php if(isset($kelas) && $kelas->kelas == "XI") echo "selected"?>>XI</option>
                                                <option value="XII" <?php if(isset($kelas) && $kelas->kelas == "XII") echo "selected"?>>XII</option>
                                            </select>
                                            <!-- <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Prestasi baru" value="<?php if(isset($kelas)) echo $kelas->kelas?>" required autofocus> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Ruang :</label>
                                            <select id="ruang" name="ruang" class="form-control" required>
                                                <option value="" selected disabled> Pilih Ruangan: </option>
                                                <option value="A" <?php if(isset($kelas) && $kelas->ruang == "A") echo "selected"?>>A</option>
                                                <option value="B" <?php if(isset($kelas) && $kelas->ruang == "B") echo "selected"?>>B</option>
                                                <option value="C" <?php if(isset($kelas) && $kelas->ruang == "C") echo "selected"?>>C</option>
                                                <option value="D" <?php if(isset($kelas) && $kelas->ruang == "D") echo "selected"?>>D</option>
                                                <option value="IPA 1" <?php if(isset($kelas) && $kelas->ruang == "IPA 1") echo "selected"?>>IPA 1</option>
                                                <option value="IPA 2" <?php if(isset($kelas) && $kelas->ruang == "IPA 2") echo "selected"?>>IPA 2</option>
                                                <option value="IPS 1" <?php if(isset($kelas) && $kelas->ruang == "IPS 1") echo "selected"?>>IPS 1</option>
                                                <option value="IPS 2" <?php if(isset($kelas) && $kelas->ruang == "IPS 2") echo "selected"?>>IPS 2</option>
                                            </select>
                                            <!-- <input type="text" id="ruang" name="ruang" class="form-control" placeholder="Skor prestasi" value="<?php if(isset($kelas)) echo $kelas->ruang?>" required autofocus> -->
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