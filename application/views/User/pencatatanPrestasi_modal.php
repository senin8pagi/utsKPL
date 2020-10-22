    <!-- Tambah Modal, Bagian form masih salah -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Catat Prestasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?php if (validation_errors()){ ?>
                    <div class="alert alert-warning" role="alert">  <!--Cek validasi-->
                        <?= validation_errors(); ?>
                    </div>
                <?php } ?>
                <div class="modal-body">
                    <div class="container">
                        <form action="" id="formTambah" method="post">
                                                        <!--Coba nambahin-->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <p>Tahun Ajar :</p>
                                        <input list="semester_prestasi" autocomplete="off" id="id_semester" name="semester_prestasi" placeholder="Masukkan Tahun Ajar" class="form-control" required>
                                        <datalist id="semester_prestasi">
    <?php foreach($semester->result() as $row){?>
                            <option data-id="<?= $row->id_semester?>" value="<?= $row->tanggal_mulai?> s/d <?= $row->tanggal_selesai?>"></option>
    <?php } ?>
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                            <!-- //// -->
                             <!--Coba nambahin-->
                             <!-- <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <p>Kelas :</p>
                                        <input list="kelas" autocomplete="off" name="kelas" placeholder="Masukkan Kelas Siswa" class="form-control" required>
                                        <datalist id="kelas">
    <?php foreach($kelas->result() as $row){?>
                            <option data-id="<?= $row->id_kelas?>" value="<?= $row->kelas.' '.$row->ruang?>"><?= $row->kelas?> <?= $row->ruang?></option>
    <?php } ?>
                                        </datalist>
                                    </div>
                                </div>
                            </div> -->
                            <!-- //// -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <p>NIS/Nama Siswa :</p>
                                        <input list="nis_prestasi" autocomplete="off" placeholder="Masukkan NIS/Nama Siswa Dengan Mengisi Tahun Ajar Terlebih Dahulu" id="nis" name="nis_prestasi" class="form-control" required>
                                        <datalist id="nis_prestasi">
                                                <option data_id="" value="Data Siswa Tidak Ada"></option>
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                            <label>Jenis Prestasi :</label>
                                            <input list="id_jenis_prestasi" id="id_jenis_prestasi2" name="id_jenis_prestasi" autocomplete="off" placeholder="Masukkan Prestasi" class="form-control" required>
                                            <datalist id="id_jenis_prestasi">
    <?php foreach($jenis_prestasi->result() as $row){?>
                            <option data-id="<?= $row->id_jenis_prestasi?>" value="<?= $row->jenis_prestasi?>"></option> 
    <?php } ?>
                                            </datalist>
                                            <!-- <select id="id_jenis_prestasi" name="id_jenis_prestasi" class="form-control" required>
                                            <option  value="">Select Prestasi</option>
    <?php foreach($jenis_prestasi->result() as $row){?>
                            <option value="<?= $row->id_jenis_prestasi?>"><?= $row->jenis_prestasi?></option> 
    <?php } ?>
                                            </select> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                            <label>Deskripsi Prestasi :</label>
                                            <input list="kode_prestasi"   autocomplete="off" placeholder="Masukkan Prestasi" id="kode_prestasi2" name="kode_prestasi" class="form-control" required>
                                            <datalist id="kode_prestasi">
                                                <option data_id="" value="Data Prestasi Tidak Ada"></option>
                                            </datalist>
                                            <!-- <select id="kode_prestasi" name="kode_prestasi" class="form-control" required>
                                                <option value="">Select</option>
                                            </select> -->
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
    <?php if (isset($pencatatan)) { ?>
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
                                    <div class="col-12">
                                        <div class="form-group">
                                            <p>Tahun Ajaran :</p>
                                            <?php foreach($semester->result() as $row){?>
                                                <?php if(isset($pencatatan) && $pencatatan->semester == $row->id_semester) {?>
                                                    <input list="semester_prestasi" value="<?= $row->tanggal_mulai?> s/d <?= $row->tanggal_selesai?>" autocomplete="off" id="id_semester2" name="semester_prestasi" placeholder="Masukkan Tahun Ajar" class="form-control" required>
                                                <?php } ?>
                                            <?php } ?>                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Kelas :</label>
                                                <input list="kelas" autocomplete="off" name="kelas" placeholder="Masukkan kelas" class="form-control" required>  
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <p>Nis/Nama Siswa :</p>
                                            <?php foreach($siswa->result() as $row){?>
                                                <?php if(isset($pencatatan) && $pencatatan->nis == $row->nis) {?>
                                                    <input list="nis_prestasi" value="<?= $row->nis.' - '.$row->nama?>" autocomplete="off" id="nis2" name="nis_prestasi" placeholder="Masukkan NIS/Nama Siswa" class="form-control" required>
                                                <?php } ?>
                                            <?php } ?>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                                <label>Jenis Prestasi :</label>
                                                <div id="prestasi_jenis_prestasi">
                                                <input list="id_jenis_prestasi" value="<?= $prestasi_jenis_prestasi->jenis?>" id="id_jenis_prestasi3" name="id_jenis_prestasi" autocomplete="off" placeholder="Masukkan Prestasi" class="form-control" required></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                                <label>Prestasi :</label>
                                                <?php foreach($prestasi->result() as $row){?>
                                                    <?php if(isset($pencatatan) && $pencatatan->kode_prestasi == $row->kode_prestasi) {?>
                                                        <input list="kode_prestasi" value="<?= $row->prestasi?>" autocomplete="off" id="kode_prestasi3" name="kode_prestasi" placeholder="Masukkan Prestasi" class="form-control" required>
                                                    <?php } ?>
                                                <?php } ?>                                                
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> <!--Diolah Sampai Sini yoow-->
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="submit" value="edit" form="formEdit" class="btn btn-success">Simpan <i class="fas fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>