 <!-- <div class='row'>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Kelas :</label>
                                                <select id="id_kelas" name="id_kelas" class="form-control" required>
                                                    <option value="" selected disabled>-- Pilih Tingkatan --</option>
                                                    <?php foreach($kelas->result() as $row){?>
                                                <option value="<?= $row->id_kelas?>" <?php if(isset($siswa) && $siswa->id_kelas == $row->id_kelas) echo "selected"?>><?= $row->kelas." ".$row->ruang?></option>
                    <?php } ?>
                                                </select>
                                        </div>
                                    </div>
                                </div> -->

                                <?php } ?>
          <?php if($this->session->userdata("jabatan") == "kesiswaan" || $this->session->userdata("jabatan") == "guru bk"){?>