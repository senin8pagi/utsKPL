<?php
class Kelas_model extends CI_Model{

    public function kelas($id_kelas = NULL){
        return $this->db->get_where("kelas", "id_kelas='{$id_kelas}'");
    }

    public function tampilkanSemuaKelas(){
        return $this->db->get("kelas");
    }

    public function tambahKelas($kelas, $ruang){
        $this->db->insert("kelas", array(
            "kelas" => $kelas,
            "ruang" => $ruang 
        ));
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function editKelas($id_kelas, $kelas, $ruang){
        $data = array(
            "kelas" => $kelas,
            "ruang" => $ruang
        );
        $this->db->update("kelas", $data, "id_kelas='{$id_kelas}'");
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function hapusKelas($id_kelas){
        //$this->db->delete("kelas", array("id_kelas" => $id_kelas));
        $this->db->where("id_kelas", $id_kelas);
        $this->db->delete("kelas");
        if($this->db->affected_rows()) return true;
        else return false;
    }
}