<?php
class Dashboard extends CI_Controller{

    public function check_login(){
        if(!$this->session->has_userdata("nip")) redirect(base_url("login"));
    }

    public function index(){
        $this->check_login();
        $data["title"] = "Dashboard";
        $data["totalSiswa"] = $this->Siswa_model->tampilkanSemuaSiswa()->num_rows();
        $data["dataSkor"] = $this->Dashboard_model->dataSkor();
        $data["skorTertinggi"] = $this->Dashboard_model->skorTertinggi()->result();
        $data["skorTerendah"] = $this->Dashboard_model->skorTerendah()->result();
        $data["js"] = "dashboard_js";
        $this->load->view("template/header", $data);
        $this->load->view("dashboard", $data);
        $this->load->view("template/footer",$data);
    }
}