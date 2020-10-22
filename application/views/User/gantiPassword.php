
    <!--  -->
    <?php if (!isset($changePasswordUser)) { ?>
        <div class="container-fluid bg-red text-center">
            <h3>Note! Tidak Ada User Dipilih !!!</h3>
        </div>
        <a href="<?=base_url('kelola/user')?>" class="btn btn-danger ml-3">Kembali</a>
    <?php } ?>
    <?php if (isset($changePasswordUser)) { ?>
    <!-- Edit Modal -->
                <div class="container-fluid">
                <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                        <!-- $this->load->view("template/login", $data); -->
                            <a href="<?= base_url("dashboard")?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Ganti Password</li>
                    </ol>
                    <!--Notifikasi Pengguna-->
                    <div class="row">
                    <div id='message'></div>
                    <?php if ($this->session->flashdata('success')){ ?>
                        <div class="alert alert-success alert-dismissible fade show col-6" role="alert">
                            <strong>Note! </strong><?= $this->session->flashdata('success') ?>
                        </div>
                    <?php }else if ($this->session->flashdata('error')){?>
                        <div class="alert alert-danger alert-dismissible fade show col-6" role="alert">
                            <strong>Note! </strong><?= $this->session->flashdata('error') ?>
                        </div>
                    <?php } ?>
                    </div>
                        <form id="formEditPassword" method="post" class="ml-3 mt-2">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>NIP :</label>
                                        <input type="text" id="nip" name="nip" class="form-control" placeholder="NIP" value="<?php if(isset($changePasswordUser)) echo $changePasswordUser->nip?>" <?php if(isset($changePasswordUser)) echo "disabled" ?> required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nama Guru :</label>
                                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama guru" value="<?php if(isset($changePasswordUser)) echo $changePasswordUser->nama?>" readonly>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Masukkan Password Sekarang:</label>
                                        <div class="input-group">
                                            <input type="password" name="password_sekarang" id="password_sekarang" class="form-control" placeholder="Password Saat Ini" required autofocus>
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
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Konfirmasi Password :</label>
                                        <div class="input-group">
                                            <input type="password" name="konfirmasi_password" id="konfirmasi_password" class="form-control" placeholder="Konfirmasi Password" required autofocus>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="icon-click-edit2">
                                                    <i class="fa fa-eye" id="icon-edit2"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- <input type="password" id="password" name="password" class="form-control" placeholder="Password" autofocus> -->
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="jenis_kelamin" name="jenis_kelamin" class="form-control" value="<?php if(isset($changePasswordUser)) echo $changePasswordUser->jenis_kelamin?>">
                            <input type="hidden" id="jabatan" name="jabatan" class="form-control" value="<?php if(isset($changePasswordUser)) echo $changePasswordUser->jabatan?>">
                            <input type="hidden" id="alamat" name="alamat" class="form-control" value="<?php if(isset($changePasswordUser)) echo $changePasswordUser->alamat?>">
                        </form>
                        <div class="ml-3">
                            <a href="<?=base_url('kelola/user')?>" class="btn btn-danger">Batal</a>
                            <button type="submit" name="submit" value="editPassword" form="formEditPassword" class="btn btn-success">Simpan <i class="fas fa-save"></i></button>
                        </div>
                    </div>
                       
        <?php } ?>

