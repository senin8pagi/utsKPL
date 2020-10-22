<?php
class Cetak extends CI_Controller{

    public function check_login(){
        if(!$this->session->has_userdata("nip")) redirect(base_url("login"));
    }
    
    public function laporan($pencatatan = NULL){
        // if(isset($pencatatan) && $pencatatan == "prestasi") $data["info_prestasi"] = $this->Cetak_model->tampilkanInfoPrestasi();
        // if(isset($pencatatan) && $pencatatan == "pelanggaran") $data["info_pelanggaran"] = $this->Cetak_model->tampilkanInfoPelanggaran();
        // if(isset($pencatatan) && $pencatatan == "pelanggaran") 
        $this->check_login();
        $data["info_total"] = $this->Cetak_model->tampilkanInfoTotalSkor($pencatatan);
        $data["tabPil"] = $pencatatan;
        $data["info_prestasi"] = $this->Cetak_model->tampilkanInfoPrestasi($pencatatan);
        $data["info_pelanggaran"] = $this->Cetak_model->tampilkanInfoPelanggaran($pencatatan);
        if($this->input->method() == "post"){
            $kelasPil = $this->input->post("id_kelas");
            $kelasPil2 = $this->input->post("id_kelas2");
            $kelasPil3 = $this->input->post("id_kelas3");        
            if($this->input->post("submit") == "cetakPelanggaran"){
                $data["tabPil"] = "pelanggaran";
                $data["info_pelanggaran"] = $this->Cetak_model->tampilkanInfoPelanggaran($kelasPil);
            }else if($this->input->post("submit") == "cetakPrestasi"){
                $data["tabPil"] = "prestasi";
                $data["info_prestasi"] = $this->Cetak_model->tampilkanInfoPrestasi($kelasPil2);
            }else if($this->input->post("submit") == "cetakTotalSkor"){
                $data["tabPil"] = "total";
                $data["info_total"] = $this->Cetak_model->tampilkanInfoTotalSkor($kelasPil3);
            }
        }
        $data["kelas"] = $this->Siswa_model->tampilkanSemuaKelas();
        $data["title"] = "Pencetakan Laporan";
        $data["js"] = "User/cetak_js";
        $this->load->view("template/header", $data);
        $this->load->view("User/cetak", $data);
        $this->load->view("template/footer", $data);
    }

    public function detailPrestasi($id = NULL){
        $this->check_login();
        $data["siswa"] = $this->Siswa_model->siswa($id)->row();
        $data["prestasi_siswa"] = $this->Cetak_model->tampilkanPrestasiSiswa($id);
        $data["title"] = "Detail Prestasi";
        $this->load->view("template/header", $data);
        $this->load->view("User/detailPoint", $data);
        $this->load->view("template/footer", $data);
    }

    public function detailPelanggaran($id = NULL){
        $this->check_login();
        $data["siswa"] = $this->Siswa_model->siswa($id)->row();
        $data["pelanggaran_siswa"] = $this->Cetak_model->tampilkanPelanggaranSiswa($id);
        $data["title"] = "Detail Pelanggaran";
        $this->load->view("template/header", $data);
        $this->load->view("User/detailPoint", $data);
        $this->load->view("template/footer", $data);
    }

    public function detailTotalSkor($id = NULL){
        $this->check_login();
        $data["id_siswa"] = $id;
        $data["siswa"] = $this->Siswa_model->siswa($id)->row();
        $data["detailSkor_siswa"] = $this->Cetak_model->tampilkanDetailTotalSkor($id)->row();
        $data["prestasi_siswa"] = $this->Cetak_model->tampilkanPrestasiSiswa($id);
        $data["pelanggaran_siswa"] = $this->Cetak_model->tampilkanPelanggaranSiswa($id);
        $data["sanksi"] = $this->Sanksi_model->tampilkanSemuaSanksi();
        $data["title"] = "Detail Skor Siswa";
        $this->load->view("template/header", $data);
        $this->load->view("User/detailPoint", $data);
        $this->load->view("template/footer", $data);
    }

    public function cetakPelanggaran($id_kelas = NULL){
        $this->check_login();
        $data["info_kelas"] = $this->Kelas_model->kelas($id_kelas)->row(); 
        $data["info_pelanggaran"] = $this->Cetak_model->tampilkanInfoPelanggaran($id_kelas);
        $data["title"] = "Cetak Pelanggaran";
        $this->load->library('mypdf');
        $this->mypdf->generate('user/cetakPelanggaran', $data);
    }

    public function cetakPrestasi($id_kelas = NULL){
        $this->check_login();
        $data["info_prestasi"] = $this->Cetak_model->tampilkanInfoPrestasi($id_kelas);
        $data["info_kelas"] = $this->Kelas_model->kelas($id_kelas)->row(); 
        $data["title"] = "Cetak Prestasi";
        $this->load->library('mypdf');
        $this->mypdf->generate('user/cetakPrestasi', $data);
    }

    public function cetakTotalSkor($id_kelas = NULL){
        $this->check_login();
        $data["info_total"] = $this->Cetak_model->tampilkanInfoTotalSkor($id_kelas);
        $data["info_kelas"] = $this->Kelas_model->kelas($id_kelas)->row(); 
        $data["title"] = "Cetak Total";
        $this->load->library('mypdf');
        $this->mypdf->generate('user/cetakTotalSkor', $data);
    }

    public function cetakDetailSkorSiswa($id= NULL){
        $this->check_login();
        $data["siswa"] = $this->Siswa_model->siswa($id)->row();
        $data["detailSkor_siswa"] = $this->Cetak_model->tampilkanDetailTotalSkor($id)->row();
        $data["prestasi_siswa"] = $this->Cetak_model->tampilkanPrestasiSiswa($id);
        $data["pelanggaran_siswa"] = $this->Cetak_model->tampilkanPelanggaranSiswa($id);
        $data["sanksi"] = $this->Sanksi_model->tampilkanSemuaSanksi(); 
        $data["title"] = "Cetak Total Per Siswa";
        $this->load->library('mypdf');
        $this->mypdf->generate('user/cetakDetailSkorSiswa', $data);
    }
}
?>