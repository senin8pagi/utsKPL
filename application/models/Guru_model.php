<?php
class Guru_model extends CI_Model{

    public function login($nip, $password){
        $result = $this->db->get_where("guru", "nip='{$nip}' and password='{$password}'");
        if ($result->num_rows() > 0) return 1;
        else return 0;
    }

    public function guru($nip){
        return $this->db->get_where("guru", "nip='{$nip}'");
    }

    // public function gantiPassword($nip, $password){
    //     $this->db->update("guru", array("password" => $password), "nip='{$nip}'");
    //     if($this->db->affected_rows()) return true;
    //     else return false;
    // }

    public function tampilkanSemuaGuru(){
        return $this->db->get("guru");
    }

    public function tambahGuru($nip, $nama, $jenis_kelamin, $password, $alamat, $jabatan){
        $this->db->insert(
            "guru", array(
            "nip" => $nip,
            "nama" => $nama,
            "jenis_kelamin" => $jenis_kelamin,
            "password" => md5($password),
            "alamat" => $alamat,
            "jabatan" => $jabatan
        ));    
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function editGuru($nip, $nama, $jenis_kelamin, $password_edit, $alamat, $jabatan){
        $data = array(
            "nip" => $nip,
            "nama" => $nama,
            "jenis_kelamin" => $jenis_kelamin,
            "alamat" => $alamat,
            "jabatan" => $jabatan);
        if($password_edit !="") $data["password"] = md5($password_edit);
        $this->db->update("guru", $data, "nip='{$nip}'");
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function hapusGuru($nip){
        $this->db->delete("guru", array("nip" => $nip));
        if($this->db->affected_rows()) return true;
        else return false;
    }

}