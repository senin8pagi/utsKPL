<?php
class Login extends CI_Controller{

    public function index(){
        $data = array();
        if($this->session->has_userdata("nip")) redirect(base_url("dashboard"));
        if($this->input->method() == "post"){
            $nip = $this->input->post("nip");
            $password = md5($this->input->post("password"));
            if($this->Guru_model->login($nip, $password)){
                $guru = $this->Guru_model->guru($nip)->row(0);
                $this->session->set_userdata(array(
                    "nip" => $nip,
                    "nama_guru" => $guru->nama,
                    "jabatan" => $guru->jabatan,
                    "password" => $guru->password
                ));
                redirect(base_url("dashboard"));
            }else{
                $data["message"] = "Username atau password salah";
            }
        }
        $data['title'] = "Halaman Login";
        $this->load->view("template/login", $data);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}