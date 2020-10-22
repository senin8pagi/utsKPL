<?php
class Catat extends CI_Controller{
    public function check_login(){
        if(!$this->session->has_userdata("nip")) redirect(base_url("login"));
    }
    
    public function pencatatanPrestasi($id = NULL){
        $this->check_login();
        $data["modal"] = $id;
        $data["pencatatan"] = $this->PencatatanPrestasi_model->pencatatan_prestasi($id)->row();
        $data["prestasi_jenis_prestasi"] = $this->PencatatanPrestasi_model->prestasi_jenis_prestasi($id)->row();
        $data["prestasi"] = $this->Prestasi_model->tampilkanDaftarPrestasi();
        $data["siswa"] = $this->Siswa_model->tampilkanSemuaSiswa();
        $data["guru"] = $this->Guru_model->tampilkanSemuaGuru();
        $data["semester"] = $this->Semester_model->tampilkanSemuaSemester();
        $data["kelas"] = $this->Kelas_model->tampilkanSemuaKelas();
        $data["jenis_prestasi"] = $this->Prestasi_model->tampilkanJenisPrestasi();
        $data["title"] = "Pencatatan Prestasi";
        $data["js"] = "User/pencatatanPrestasi_js";

        $this->form_validation->set_rules('nis_prestasi', 'Siswa', 'required');
        $this->form_validation->set_rules('semester_prestasi', 'Tahun Ajar', 'required');
        $this->form_validation->set_rules('id_jenis_prestasi', 'Jenis Prestasi', 'required');
        $this->form_validation->set_rules('kode_prestasi', 'Prestasi', 'required');
        if ($this->form_validation->run() == FALSE)
        {       
            $this->load->view("template/header", $data);
            $this->load->view("User/pencatatanPrestasi", $data);
            $this->load->view("User/pencatatanPrestasi_modal", $data);
            $this->load->view("template/footer", $data);
        }
        else
        {
            if($this->input->method() == "post"){
                // $id_semester_prestasi = $this->input->post("id_semester_prestasi");
                $kode_prestasi = $this->input->post("kode_prestasi");
                $nip_prestasi = $this->session->userdata("nip");
                $nis_prestasi = $this->input->post("nis_prestasi");
                $skor_prestasi = $this->PencatatanPrestasi_model->ambilSkorPrestasi($kode_prestasi);
                $semester_prestasi = $this->input->post("semester_prestasi");
                $tanggal = Date("Y-m-d h:i:s", now("+7"));
                if($this->input->post("submit") == "tambah"){
                    $this->PencatatanPrestasi_model->tambahPencatatanPrestasi($kode_prestasi, $nip_prestasi, $nis_prestasi, $skor_prestasi,$tanggal, $semester_prestasi);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Ditambahkan');
                    else $this->session->set_flashdata('error','Tidak Disimpan');
                }else if($this->input->post("submit") == "edit"){
                    $this->PencatatanPrestasi_model->editPencatatanPrestasi($id, $kode_prestasi, $nip_prestasi, $nis_prestasi, $skor_prestasi, $tanggal, $semester_prestasi);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Diperbarui');
                    else $this->session->set_flashdata('error','Tidak Diperbarui');
                }
                redirect(base_url('catat/pencatatanPrestasi'));
            }
        }   
    }


    public function PencatatanPelanggaran($id = NULL){
        // $this->output->set_header("Last-Modified : " . gmdate("D, d M Y H:i:s") . ' GMT'); 
        // ('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        // $this->output->set_header('Pragma: no-chace');
        // $this->output->set_header('Expires: Mon, 26 Jul 1997 05:00 GMT');
        // $data = array();
        $this->check_login();
        $data["modal"] = $id;
        $data["pencatatan"] = $this->PencatatanPelanggaran_model->pencatatan_pelanggaran($id)->row();
        $data["pelanggaran_jenis_pelanggaran"] = $this->PencatatanPelanggaran_model->pelanggaran_jenis_pelanggaran($id)->row();
        $data["pelanggaran"] = $this->Pelanggaran_model->tampilkanDaftarPelanggaran();
        $data["siswa"] = $this->Siswa_model->tampilkanSemuaSiswa();
        $data["guru"] = $this->Guru_model->tampilkanSemuaGuru();
        $data["semester"] = $this->Semester_model->tampilkanSemuaSemester();
        $data["kelas"] = $this->Kelas_model->tampilkanSemuaKelas();
        $data["jenis_pelanggaran"] = $this->Pelanggaran_model->tampilkanJenisPelanggaran();
        $data["title"] = "Pencatatan Pelanggaran";
        $data["js"] = "User/pencatatanPelanggaran_js";
        $this->form_validation->set_rules('nis_pelanggaran', 'Siswa', 'required');
        $this->form_validation->set_rules('semester_pelanggaran', 'Tahun Ajar', 'required');
        $this->form_validation->set_rules('id_jenis_pelanggaran', 'Jenis Pelanggaran', 'required');
        $this->form_validation->set_rules('kode_pelanggaran', 'Pelanggaran', 'required');
        if ($this->form_validation->run() == FALSE)
        {       
            $this->load->view("template/header", $data);
            $this->load->view("User/pencatatanPelanggaran", $data);
            $this->load->view("User/pencatatanPelanggaran_modal", $data);
            $this->load->view("template/footer", $data);
        }
        else
        {
            if($this->input->method() == "post"){
                $kode_pelanggaran = $this->input->post("kode_pelanggaran");
                $nip_pelanggaran = $this->session->userdata("nip");
                $nis_pelanggaran = $this->input->post("nis_pelanggaran");
                $skor_pelanggaran = $this->PencatatanPelanggaran_model->ambilSkorPelanggaran($kode_pelanggaran);
                $tanggal = Date("Y-m-d h:i:s", now("+7"));
                $semester_pelanggaran = $this->input->post("semester_pelanggaran");
                if($this->input->post("submit") == "tambah"){
                    $this->PencatatanPelanggaran_model->tambahPencatatanPelanggaran($kode_pelanggaran, $nip_pelanggaran, $nis_pelanggaran, $skor_pelanggaran, $tanggal, $semester_pelanggaran);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Ditambahkan');
                    else $this->session->set_flashdata('error','Tidak Disimpan');
                }else if($this->input->post("submit") == "edit"){
                    $this->PencatatanPelanggaran_model->editPencatatanPelanggaran($id, $kode_pelanggaran, $nip_pelanggaran, $nis_pelanggaran, $skor_pelanggaran, $tanggal, $semester_pelanggaran);
                    if($this->db->affected_rows()) $this->session->set_flashdata('success','Berhasil Diperbarui');
                    else $this->session->set_flashdata('error','Tidak Diperbarui');
                }
                redirect(base_url('catat/pencatatanPelanggaran'));
            }
        }
    }

}
?>