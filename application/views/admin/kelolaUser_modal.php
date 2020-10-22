    <!-- Tambah Modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah User</h5>
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
                        <form action="" id="formTambah" method="post">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>NIP :</label>
                                        <input type="text" id="nip" name="nip" class="form-control" placeholder="NIP" required autofocus>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nama Guru :</label>
                                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama guru" required autofocus>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin :</label>
                                        <div class="mt-2">
                                            <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Laki-laki" required> Laki-Laki
                                            <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Perempuan" required> Perempuan
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Password :</label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" autofocus>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="icon-click">
                                                    <i class="fa fa-eye" id="icon"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- <input type="password" id="password" name="password" class="form-control" placeholder="Password" autofocus> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Alamat :</label>
                                        <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" required autofocus>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Bagian :</label>
                                        <select id="jabatan" name="jabatan" class="form-control" required>
                                            <option value="" selected disabled> Pilih Bagian: </option>
                                            <option value="admin">Admin</option>
                                            <option value="kesiswaan">Kesiswaan</option>
                                            <option value="guru bk">Guru BK</option>
                                        </select>
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
    <?php if (isset($result) && $this->session->userdata("nip") == "admin") { ?>
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Edit User</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <?php if (validation_errors()){ ?>
                    <div class="alert alert-warning" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                    <?php }?>
                    <div class="modal-body">
                        <div class="container">
                            <form id="formEdit" method="post">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>NIP :</label>
                                            <input type="text" id="nip" name="nip" class="form-control" placeholder="NIP" value="<?php if(isset($result)) echo $result->nip?>" <?php if(isset($result)) echo "disabled" ?> required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Nama Guru :</label>
                                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama guru" value="<?php if(isset($result)) echo $result->nama?>" required autofocus>
                                        </div>
                                    </div>                                
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Alamat :</label>
                                            <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" value="<?php if(isset($result)) echo $result->alamat?>" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Bagian :</label>
                                            <select id="jabatan" name="jabatan" class="form-control" required>
                                                <option value="" selected disabled> Pilih Bagian: </option>
                                                <option value="admin" <?php if(isset($result) && $result->jabatan == "admin") echo "selected"?>>Admin</option>
                                                <option value="kesiswaan" <?php if(isset($result) && $result->jabatan == "kesiswaan") echo "selected"?>>Kesiswaan</option>
                                                <option value="guru bk" <?php if(isset($result) && $result->jabatan == "guru bk") echo "selected"?>>Guru BK</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Jenis Kelamin :</label>
                                            <div class="mt-2">
                                                <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Laki-laki" <?php if(isset($result) && $result->jenis_kelamin == "Laki-laki") echo "checked"?> required> Laki-Laki
                                                <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Perempuan" <?php if(isset($result) && $result->jenis_kelamin == "Perempuan") echo "checked"?> required> Perempuan
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-6">
                                        <div class="form-group">
                                            <label>Password :</label>
                                            <div class="input-group">
                                                <input type="password" name="password_edit" id="password_edit" class="form-control" placeholder="Password" required autofocus>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="icon-click-edit">
                                                        <i class="fa fa-eye" id="icon-edit"></i>
                                                    </span>
                                                </div>
                                            </div> -->
                                            <!-- <input type="password" id="password" name="password" class="form-control" placeholder="Password" autofocus> -->
                                        <!-- </div>
                                    </div> -->
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
    <?php if (isset($changePassword) && $this->session->userdata("nip") == "admin") { ?>
    <!-- Edit Modal -->
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Edit User</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <?php if ($this->session->flashdata('error')){ ?>
                    <div class="alert alert-warning" role="alert">
                        Konfirmasi 
                    </div>
                    <?php }?>
                    <div class="modal-body">
                        <div class="container">
                            <form id="formEditPassword" method="post">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>NIP :</label>
                                            <input type="text" id="nip" name="nip" class="form-control" placeholder="NIP" value="<?php if(isset($changePassword)) echo $changePassword->nip?>" <?php if(isset($changePassword)) echo "disabled" ?> required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Nama Guru :</label>
                                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama guru" value="<?php if(isset($changePassword)) echo $changePassword->nama?>" readonly>
                                        </div>
                                    </div>                                
                                </div>                              
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Ganti Password :</label>
                                            <div class="input-group">
                                                <input type="password" name="password_edit" id="password_edit" class="form-control" placeholder="Ganti Password" required autofocus>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="icon-click-edit">
                                                        <i class="fa fa-eye" id="icon-edit"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <!-- <input type="password" id="password" name="password" class="form-control" placeholder="Password" autofocus> -->
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Konfirmasi Password :</label>
                                            <div class="input-group">
                                                <input type="password" name="konfirmasi_password" id="konfirmasi_password" class="form-control" placeholder="Konfirmasi Password" required autofocus>
                                                <!-- <div class="input-group-append">
                                                    <span class="input-group-text" id="icon-click-edit">
                                                        <i class="fa fa-eye" id="icon-edit"></i>
                                                    </span>
                                                </div> -->
                                            </div>
                                            <!-- <input type="password" id="password" name="password" class="form-control" placeholder="Password" autofocus> -->
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="jenis_kelamin" name="jenis_kelamin" class="form-control" value="<?php if(isset($changePassword)) echo $changePassword->jenis_kelamin?>">
                                <input type="hidden" id="jabatan" name="jabatan" class="form-control" value="<?php if(isset($changePassword)) echo $changePassword->jabatan?>">
                                <input type="hidden" id="alamat" name="alamat" class="form-control" value="<?php if(isset($changePassword)) echo $changePassword->alamat?>">
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="submit" value="editPassword" form="formEditPassword" class="btn btn-success">Simpan <i class="fas fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>