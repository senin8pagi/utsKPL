    <!-- Tambah Modal, Bagian form masih salah -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Catat Pelanggaran</h5>
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
                                        <input list="semester_pelanggaran" autocomplete="off" id="id_semester" name="semester_pelanggaran" placeholder="Masukkan Tahun Ajar" class="form-control" required>
                                        <datalist id="semester_pelanggaran">
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
                                        <input list="nis_pelanggaran" autocomplete="off" placeholder="Masukkan NIS/Nama Siswa Dengan Mengisi Tahun Ajar Terlebih Dahulu" id="nis" name="nis_pelanggaran" class="form-control" required>
                                        <datalist id="nis_pelanggaran">
                                                <option data_id="" value="Data Siswa Tidak Ada"></option>
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                            <label>Jenis Pelanggaran :</label>
                                            <input list="id_jenis_pelanggaran" id="id_jenis_pelanggaran2" name="id_jenis_pelanggaran" autocomplete="off" placeholder="Masukkan Pelanggaran" class="form-control" required>
                                            <datalist id="id_jenis_pelanggaran">
    <?php foreach($jenis_pelanggaran->result() as $row){?>
                            <option data-id="<?= $row->id_jenis_pelanggaran?>" value="<?= $row->jenis_pelanggaran?>"></option> 
    <?php } ?>
                                            </datalist>
                                            <!-- <select id="id_jenis_pelanggaran" name="id_jenis_pelanggaran" class="form-control" required>
                                            <option  value="">Select pelanggaran</option>
    <?php foreach($jenis_pelanggaran->result() as $row){?>
                            <option value="<?= $row->id_jenis_pelanggaran?>"><?= $row->jenis_pelanggaran?></option> 
    <?php } ?>
                                            </select> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                            <label>Deskripsi Pelanggaran :</label>
                                            <input list="kode_pelanggaran"   autocomplete="off" placeholder="Masukkan Pelanggaran" id="kode_pelanggaran2" name="kode_pelanggaran" class="form-control" required>
                                            <datalist id="kode_pelanggaran">
                                                <option data_id="" value="Data Pelanggaran Tidak Ada"></option>
                                            </datalist>
                                            <!-- <select id="kode_pelanggaran" name="kode_pelanggaran" class="form-control" required>
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
                                                    <input list="semester_pelanggaran" value="<?= $row->tanggal_mulai?> s/d <?= $row->tanggal_selesai?>" autocomplete="off" id="id_semester2" name="semester_pelanggaran" placeholder="Masukkan Tahun Ajar" class="form-control" required>
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
                                                    <input list="nis_pelanggaran" value="<?= $row->nis.' - '.$row->nama?>" autocomplete="off" id="nis2" name="nis_pelanggaran" placeholder="Masukkan NIS/Nama Siswa" class="form-control" required>
                                                <?php } ?>
                                            <?php } ?>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                                <label>Jenis Pelanggaran :</label>
                                                <div id="pelanggaran_jenis_pelanggaran">
                                                <input list="id_jenis_pelanggaran" value="<?= $pelanggaran_jenis_pelanggaran->jenis?>" id="id_jenis_pelanggaran3" name="id_jenis_pelanggaran" autocomplete="off" placeholder="Masukkan Pelanggaran" class="form-control" required></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                                <label>Pelanggaran :</label>
                                                <?php foreach($pelanggaran->result() as $row){?>
                                                    <?php if(isset($pencatatan) && $pencatatan->kode_pelanggaran == $row->kode_pelanggaran) {?>
                                                        <input list="kode_pelanggaran" value="<?= $row->pelanggaran?>" autocomplete="off" id="kode_pelanggaran3" name="kode_pelanggaran" placeholder="Masukkan Pelanggaran" class="form-control" required>
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