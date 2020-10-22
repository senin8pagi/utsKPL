    <!-- Tambah Modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Data Siswa</h5>
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
                                        <label>NIS :</label>
                                        <input type="text" id="nis" name="nis" class="form-control" placeholder="NIS" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Nama Siswa :</label>
                                        <input type="nama" id="nama"name="nama" class="form-control" placeholder="Nama siswa" required autofocus>		
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class = "col-6 mt-2">
                                    <label>Jenis Kelamin :</label>
                                    <div class="mt-1 mb-4">
                                        <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Laki-laki" required> Laki-Laki
                                        <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Perempuan" required> Perempuan
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

    <?php if (isset($siswa)) { ?>
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Edit Siswa</h5>
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
                                            <label>NIS :</label>
                                            <input type="text" id="nis" name="nis" class="form-control" placeholder="NIS" value="<?php if(isset($siswa)) echo $siswa->nis?>" <?php if(isset($siswa)) echo "disabled" ?> required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Nama Siswa :</label>
                                            <input type="nama" id="nama"name="nama" class="form-control" placeholder="nama siswa" value="<?php if(isset($siswa)) echo $siswa->nama?>" required autofocus>		
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class = "col-6 mt-2">
                                        <label>Jenis Kelamin :</label>
                                        <div class="mt-1 mb-4">
                                            <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Laki-laki" <?php if(isset($siswa) && $siswa->jenis_kelamin == "Laki-laki") echo "checked"?> required> Laki-Laki
                                            <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Perempuan" <?php if(isset($siswa) && $siswa->jenis_kelamin == "Perempuan") echo "checked"?> required> Perempuan
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