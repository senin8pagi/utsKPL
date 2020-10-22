<?php
class Kelola extends CI_Controller{

    public function check_login(){
        if(!$this->session->has_userdata("nip")) redirect(base_url("login"));
    }

    public function user($nip_parameter = NULL, $idChangePassword = NULL){
        $this->check_login();
        $data["result"] = $this->Guru_model->guru($nip_parameter)->row();
        $data["changePassword"] = $this->Guru_model->guru($idChangePassword)->row();
        $data["modal"] =$nip_parameter;
        $data["errorPassword"] =NULL;
        $data["title"] = "Kelola User";
        $data["js"] = "admin/kelolaUser_js";
        $this->form_validation->set_rules('nip', 'NIP', 'numeric|min_length[5]|max_length[5]|is_unique[guru.nip]');
        $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
        // $this->form_validation->set_rules('nip', 'NIP', 'numeric|min_length[5]|is_unique[guru.nip]');
        // $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|trim|matches[ganti_password]');
        if ($this->form_validation->run() == FALSE)
        {       
            $this->load->view("template/header",$data);
            $this->load->view("admin/kelolaUser",$data);
            $this->load->view("admin/kelolaUser_modal",$data);
            $this->load->view("template/footer",$data);
        }
        else
        {
            if($this->input->method() == "post"){
                $nip = $this->input->post("nip", true);
                $nama = $this->input->post("nama", true);
                $jenis_kelamin = $this->input->post("jenis_kelamin", true);
                $password = $this->input->post("password", true);
                $password_edit = $this->input->post("password_edit", true);
                $konfirmasi_password = $this->input->post("konfirmasi_password", true);
                $alamat = $this->input->post("alamat", true);
                $jabatan = $this->input->post("jabatan", true);
                if($this->input->post("submit") == "tambah"){
                    $this->Guru_model->tambahGuru($nip, $nama, $jenis_kelamin, $password, $alamat, $jabatan);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Ditambahkan');
                    else $this->session->set_flashdata('error','Tidak Disimpan');    
                }
                else if($this->input->post("submit") == "edit"){
                    $this->Guru_model->editGuru($nip_parameter, $nama, $jenis_kelamin, $password_edit, $alamat, $jabatan);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Diperbarui');
                    else $this->session->set_flashdata('error','Tidak Diperbarui');
                }
                else if($this->input->post("submit") == "editPassword"){
                    if($password_edit == $konfirmasi_password){
                        $this->Guru_model->editGuru($idChangePassword, $nama, $jenis_kelamin, $password_edit, $alamat, $jabatan);
                        if($this->db->affected_rows()) $this->session->set_flashdata('success','Password Berhasil Diperbarui');
                        else $this->session->set_flashdata('error','Tidak Diperbarui');
                    } else  $this->session->set_flashdata('error','Tidak Diperbarui Konfirmasi Password Salah');
                }
                redirect(base_url('kelola/user'));
            }  
        }     
    }

    public function siswa($nis_parameter = NULL){
        $this->check_login();
        $data["modal"] = $nis_parameter;
        $data["siswa"] = $this->Siswa_model->siswa($nis_parameter)->row();
        // $data["kelas"] = $this->Kelas_model->tampilkanSemuaKelas();
        $data["title"] = "Kelola Siswa";
        $data["js"] = "admin/kelolaSiswa_js";

        $this->form_validation->set_rules('nis', 'NIS', 'numeric|min_length[5]|is_unique[siswa.nis]');
        if ($this->form_validation->run() == FALSE)
        {       
            $this->load->view("template/header",$data);
            $this->load->view("admin/kelolaSiswa",$data);
            $this->load->view("admin/kelolaSiswa_modal");
            $this->load->view("template/footer",$data);
        }
        else
        {
            if($this->input->method() == "post"){
                $nis = $this->input->post("nis", true);
                $nama = $this->input->post("nama", true);
                // $id_kelas = $this->input->post("id_kelas", true);
                $jenis_kelamin = $this->input->post("jenis_kelamin", true);
                if($this->input->post("submit") == "tambah"){
                    $this->Siswa_model->tambahSiswa($nis, $nama, $jenis_kelamin);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Ditambahkan');
                    else $this->session->set_flashdata('error','Tidak Disimpan');
                }
                else if($this->input->post("submit") == "edit"){
                    $this->Siswa_model->editSiswa($nis_parameter, $nama, $jenis_kelamin);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Diperbarui');
                    else $this->session->set_flashdata('error','Tidak Diperbarui');
                }
                redirect(base_url('kelola/siswa'));
            }  
        }     
    }
 
    public function jenis_prestasi($id_jenis_prestasi = NULL){
        $this->check_login();
        $data["jenis_prestasi"] = $this->Prestasi_model->jenisPrestasi($id_jenis_prestasi)->row();
        $data["terbaru"] = $this->Prestasi_model->jenisPrestasiTerbaru()->row();
        $data['modal'] = $id_jenis_prestasi;
        $data["title"] = "Kelola Jenis Prestasi";
        $data["js"] = "admin/kelolaJenisPrestasi_js";
        $this->form_validation->set_rules('jenis_prestasi', 'Kelas', 'required');
        if ($this->form_validation->run() == FALSE)
        {       
            $this->load->view("template/header",$data);
            $this->load->view("admin/kelolaJenisPrestasi",$data);
            $this->load->view("admin/kelolaJenisPrestasi_modal");
            $this->load->view("template/footer",$data);
        }
        else
        {
            if($this->input->method() == "post"){
                $jenis_prestasi = $this->input->post("jenis_prestasi", true);
                if($this->input->post("submit") == "tambah"){
                    $this->Prestasi_model->tambahJenisPrestasi($jenis_prestasi);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Ditambahkan');
                    else $this->session->set_flashdata('error','Tidak Disimpan');
                }
                else if($this->input->post("submit") == "edit"){
                    $this->Prestasi_model->editJenisPrestasi($id_jenis_prestasi, $jenis_prestasi);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Diperbarui');
                    else $this->session->set_flashdata('error','Tidak Diperbarui');
                }
                redirect(base_url('kelola/jenis_prestasi'));
            }  
        }
    }

    public function jenis_pelanggaran($id_jenis_pelanggaran = NULL){
        $this->check_login();
        $data["jenis_pelanggaran"] = $this->Pelanggaran_model->jenisPelanggaran($id_jenis_pelanggaran)->row();
        $data["terbaru"] = $this->Pelanggaran_model->jenisPelanggaranTerbaru()->row();
        $data['modal'] = $id_jenis_pelanggaran;
        $data["title"] = "Kelola Jenis Pelanggaran";
        $data["js"] = "admin/kelolaJenisPelanggaran_js";
        $this->form_validation->set_rules('jenis_pelanggaran', 'Kelas', 'required');
        if ($this->form_validation->run() == FALSE)
        {       
            $this->load->view("template/header",$data);
            $this->load->view("admin/kelolaJenisPelanggaran",$data);
            $this->load->view("admin/kelolaJenisPelanggaran_modal");
            $this->load->view("template/footer",$data);
        }
        else
        {
            if($this->input->method() == "post"){
                $jenis_pelanggaran = $this->input->post("jenis_pelanggaran", true);
                if($this->input->post("submit") == "tambah"){
                    $this->Pelanggaran_model->tambahJenisPelanggaran($jenis_pelanggaran);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Ditambahkan');
                    else $this->session->set_flashdata('error','Tidak Disimpan');
                }
                else if($this->input->post("submit") == "edit"){
                    $this->Pelanggaran_model->editJenisPelanggaran($id_jenis_pelanggaran, $jenis_pelanggaran);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Diperbarui');
                    else $this->session->set_flashdata('error','Tidak Diperbarui');
                }
                redirect(base_url('kelola/jenis_pelanggaran'));
            }  
        }
    }
    
    public function prestasi($id_prestasi = NULL){
        $this->check_login();
        $data["prestasi"] = $this->Prestasi_model->prestasi($id_prestasi)->row();
        // $data["prestasiPilihan"] = $this->Prestasi_model->prestasiPilihan();
        $data["jenis_prestasi"] = $this->Prestasi_model->tampilkanJenisPrestasi();
        $data["modal"] = $id_prestasi;
        $data["title"] = "Kelola Daftar Prestasi";
        $data["js"] = "admin/kelolaDaftarPrestasi_js";

        $this->form_validation->set_rules('skor_prestasi', 'Skor', 'numeric');
        $this->form_validation->set_rules('kode_prestasi', 'Kode Prestasi', 'is_unique[prestasi.kode_prestasi]');
        // $this->form_validation->set_rules('jenis_prestasi', 'Kode Prestasi', 'required');
        if ($this->form_validation->run() == FALSE)
        {       
            $this->load->view("template/header",$data);
            $this->load->view("admin/kelolaDaftarPrestasi",$data);
            $this->load->view("admin/kelolaDaftarPrestasi_modal");
            $this->load->view("template/footer",$data);
        }
        else
        {
            if($this->input->method() == "post"){
                $kode_prestasi = $this->input->post("kode_prestasi", true);
                $id_jenis_prestasi = $this->input->post("id_jenis_prestasi", true);
                $prestasi = $this->input->post("prestasi", true);
                $skor_prestasi = $this->input->post("skor_prestasi", true);
                if($this->input->post("submit") == "tambah"){
                    $this->Prestasi_model->tambahPrestasi($kode_prestasi, $id_jenis_prestasi, $prestasi, $skor_prestasi);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Ditambahkan');
                    else $this->session->set_flashdata('error','Tidak Disimpan');
                }
                else if($this->input->post("submit") == "edit"){
                    $this->Prestasi_model->editPrestasi($id_prestasi, $id_jenis_prestasi, $prestasi, $skor_prestasi);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Diperbarui');
                    else $this->session->set_flashdata('error','Tidak Diperbarui');
                }
                redirect(base_url('kelola/prestasi'));
            }  
        }
    }

    public function pelanggaran($id_pelanggaran = NULL){
        $this->check_login();
        $data["pelanggaran"] = $this->Pelanggaran_model->pelanggaran($id_pelanggaran)->row();
        $data["jenis_pelanggaran"] = $this->Pelanggaran_model->tampilkanJenisPelanggaran();
        $data['modal'] = $id_pelanggaran;
        $data["title"] = "Kelola Daftar Pelanggaran";
        $data["js"] = "admin/kelolaDaftarPelanggaran_js";
        $this->form_validation->set_rules('skor_pelanggaran', 'Skor', 'numeric');
        $this->form_validation->set_rules('kode_pelanggaran', 'Kode pelanggaran', 'is_unique[pelanggaran.kode_pelanggaran]');
        if ($this->form_validation->run() == FALSE)
        {       
            $this->load->view("template/header",$data);
            $this->load->view("admin/kelolaDaftarPelanggaran",$data);
            $this->load->view("admin/kelolaDaftarPelanggaran_modal");
            $this->load->view("template/footer",$data);
        }
        else
        {
            if($this->input->method() == "post"){
                $kode_pelanggaran = $this->input->post("kode_pelanggaran", true);
                $id_jenis_pelanggaran = $this->input->post("id_jenis_pelanggaran", true);
                $pelanggaran = $this->input->post("pelanggaran", true);
                $skor_pelanggaran = $this->input->post("skor_pelanggaran", true);
                if($this->input->post("submit") == "tambah"){
                    $this->Pelanggaran_model->tambahPelanggaran($kode_pelanggaran, $id_jenis_pelanggaran, $pelanggaran, $skor_pelanggaran);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Ditambahkan');
                    else $this->session->set_flashdata('error','Tidak Disimpan');
                }
                else if($this->input->post("submit") == "edit"){
                    $this->Pelanggaran_model->editPelanggaran($id_pelanggaran, $id_jenis_pelanggaran, $pelanggaran, $skor_pelanggaran);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Diperbarui');
                    else $this->session->set_flashdata('error','Tidak Diperbarui');
                }
                redirect(base_url('kelola/pelanggaran'));
            }  
        }
    }

    public function kelas($id_kelas = NULL){
        $this->check_login();
        $data["kelas"] = $this->Kelas_model->kelas($id_kelas)->row();
        $data['modal'] = $id_kelas;
        $data["title"] = "Kelola Kelas";
        $data["js"] = "admin/kelolaKelas_js";
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        if ($this->form_validation->run() == FALSE)
        {       
            $this->load->view("template/header",$data);
            $this->load->view("admin/kelolaKelas",$data);
            $this->load->view("admin/kelolaKelas_modal");
            $this->load->view("template/footer",$data);
        }
        else
        {
            if($this->input->method() == "post"){
                $kelas = $this->input->post("kelas", true);
                $ruang = $this->input->post("ruang", true);
                if($this->input->post("submit") == "tambah"){
                    $this->Kelas_model->tambahKelas($kelas, $ruang);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Ditambahkan');
                    else $this->session->set_flashdata('error','Tidak Disimpan');
                }
                else if($this->input->post("submit") == "edit"){
                    $this->Kelas_model->editKelas($id_kelas, $Kelas, $ruang);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Diperbarui');
                    else $this->session->set_flashdata('error','Tidak Diperbarui');
                }
                redirect(base_url('kelola/kelas'));
            }  
        }
    }
    
    public function penempatan_kelas($id_penempatan_kelas = NULL){
        $this->check_login();
        $data["penempatan_kelas"] = $this->PenempatanKelas_model->penempatanKelas($id_penempatan_kelas)->row();
        $data["semester"] = $this->PenempatanKelas_model->tampilkanSemuaSemester();
        $data["siswa"] = $this->PenempatanKelas_model->tampilkanSemuaSiswa();
        $data["kelas"] = $this->PenempatanKelas_model->tampilkanSemuaKelas();
        $data['modal'] = $id_penempatan_kelas;
        $data["title"] = "Kelola Penempatan Kelas";
        $data["js"] = "admin/kelolaPenempatanKelas_js";
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('id_semester', 'Semester', 'required');
        $this->form_validation->set_rules('nis_siswa', 'Siswa', 'required');
        if ($this->form_validation->run() == FALSE)
        {       
            $this->load->view("template/header",$data);
            $this->load->view("admin/kelolaPenempatanKelas",$data);
            $this->load->view("admin/kelolaPenempatanKelas_modal");
            $this->load->view("template/footer",$data);
        }
        else
        {
            if($this->input->method() == "post"){
                $id_semester = $this->input->post("id_semester", true);
                $nis = $this->input->post("nis_siswa", true);
                $id_kelas = $this->input->post("id_kelas", true);
                if($this->input->post("submit") == "tambah"){
                    $this->PenempatanKelas_model->tambahPenempatanKelas($id_semester, $nis, $id_kelas);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Ditambahkan');
                    else $this->session->set_flashdata('error','Tidak Disimpan');
                }
                else if($this->input->post("submit") == "edit"){
                    $this->PenempatanKelas_model->editPenempatanKelas($id_penempatan_kelas, $id_semester, $nis, $id_kelas);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Diperbarui');
                    else $this->session->set_flashdata('error','Tidak Diperbarui');
                }
                redirect(base_url('kelola/penempatan_kelas'));
            }  
        }
    }

    public function semester($id_semester = NULL){
        $this->check_login();
        $data["semester"] = $this->Semester_model->semester($id_semester)->row();
        $data["semester_terbaru"] = $this->Semester_model->semesterTerbaru()->row();
        $data['modal'] = $id_semester;
        $data['modal'] = $id_semester;
        $data["title"] = "Kelola Semester";
        $data["js"] = "admin/kelolaSemester_js";
        $this->form_validation->set_rules('tanggal_mulai', 'Semester', 'required');
        if ($this->form_validation->run() == FALSE)
        {       
            $this->load->view("template/header",$data);
            $this->load->view("admin/kelolaSemester",$data);
            $this->load->view("admin/kelolaSemester_modal");
            $this->load->view("template/footer",$data);
        }
        else
        {
            if($this->input->method() == "post"){
                $tanggal_mulai = $this->input->post("tanggal_mulai", true);
                $tanggal_selesai = $this->input->post("tanggal_selesai", true);
                if($this->input->post("submit") == "tambah"){
                    $this->Semester_model->tambahSemester($tanggal_mulai, $tanggal_selesai);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Ditambahkan');
                    else $this->session->set_flashdata('error','Tidak Disimpan');
                }
                else if($this->input->post("submit") == "edit"){
                    $this->Semester_model->editSemester($id_semester, $tanggal_mulai, $tanggal_selesai);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Diperbarui');
                    else $this->session->set_flashdata('error','Tidak Diperbarui');
                }
                redirect(base_url('kelola/semester'));
            }  
        }
    }

    public function sanksi($id_sanksi = NULL){
        $this->check_login();
        $data["sanksi"] = $this->Sanksi_model->sanksi($id_sanksi)->row();
        $data['modal'] = $id_sanksi;
        $data["title"] = "Kelola Sanksi";
        $data["js"] = "admin/kelolaSanksi_js";
        $this->form_validation->set_rules('batas_bawah_poin', 'sanksi', 'numeric');
        $this->form_validation->set_rules('batas_atas_poin', 'sanksi', 'numeric');
        if ($this->form_validation->run() == FALSE)
        {       
            $this->load->view("template/header",$data);
            $this->load->view("admin/kelolaSanksi",$data);
            $this->load->view("admin/kelolaSanksi_modal");
            $this->load->view("template/footer",$data);
        }
        else
        {
            if($this->input->method() == "post"){
                $batas_bawah_poin = $this->input->post("batas_bawah_poin", true);
                $batas_atas_poin = $this->input->post("batas_atas_poin", true);
                $sanksi = $this->input->post("sanksi", true);
                $tindak_lanjut = $this->input->post("tindak_lanjut", true);
                if($this->input->post("submit") == "tambah"){
                    $this->Sanksi_model->tambahSanksi($batas_bawah_poin, $batas_atas_poin, $tindak_lanjut, $sanksi);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Ditambahkan');
                    else $this->session->set_flashdata('error','Tidak Disimpan');
                }
                else if($this->input->post("submit") == "edit"){
                    $this->Sanksi_model->editSanksi($id_sanksi, $batas_bawah_poin, $batas_atas_poin, $tindak_lanjut, $sanksi);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Diperbarui');
                    else $this->session->set_flashdata('error','Tidak Diperbarui');
                }
                redirect(base_url('kelola/sanksi'));
            }  
        }
    }

}
?>