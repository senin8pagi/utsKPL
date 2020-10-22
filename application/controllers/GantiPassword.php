<?php
class GantiPassword extends CI_Controller{
    public function check_login(){
        if(!$this->session->has_userdata("nip")) redirect(base_url("login"));
    }

    public function pengguna($idChangePassword = NULL){
        $this->check_login();
        $data["changePasswordUser"] = $this->Guru_model->guru($idChangePassword)->row();
        $change = $this->Guru_model->guru($idChangePassword)->row();
        $data["title"] = "Ganti Password";
        $data["js"] = "user/gantiPassword_js";
        $this->form_validation->set_rules('nip', 'NIP', 'numeric|min_length[5]|is_unique[guru.nip]');
        // $this->form_validation->set_rules('nip', 'NIP', 'numeric|min_length[5]|is_unique[guru.nip]');
        // $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|trim|matches[ganti_password]');
        if ($this->form_validation->run() == FALSE)
        {       
            $this->load->view("template/header",$data);
            $this->load->view("User/gantiPassword",$data);
            // $this->load->view("admin/kelolaUser_modal",$data);
            $this->load->view("template/footer",$data);
        }
        else
        {
            if($this->input->method() == "post"){
                $nip = $this->input->post("nip", true);
                $nama = $this->input->post("nama", true);
                $jenis_kelamin = $this->input->post("jenis_kelamin", true);
                $password_sekarang = md5($this->input->post("password_sekarang", true));
                $password_edit = $this->input->post("password_edit", true);
                $konfirmasi_password = $this->input->post("konfirmasi_password", true);
                $alamat = $this->input->post("alamat", true);
                $jabatan = $this->input->post("jabatan", true);
                if($this->input->post("submit") == "editPassword"){
                    if($password_sekarang != $change->password){
                        $this->session->set_flashdata('error','Tidak Diperbarui Password Saat Ini Salah');
                    }
                    else if($password_edit == $konfirmasi_password){
                        $this->Guru_model->editGuru($idChangePassword, $nama, $jenis_kelamin, $password_edit, $alamat, $jabatan);
                        if($this->db->affected_rows()) $this->session->set_flashdata('success','Password Berhasil Diperbarui');
                        else $this->session->set_flashdata('error','Tidak Diperbarui');
                    } else $this->session->set_flashdata('error','Tidak Diperbarui Konfirmasi Password Salah');
                }
                redirect(base_url('gantipassword/pengguna/').$this->session->userdata("nip"));
            }  
        }     
    }
}
?>