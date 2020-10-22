<?php
class Sanksi_model extends CI_Model{

    public function sanksi($id_sanksi = NULL){
        return $this->db->get_where("sanksi", "id_sanksi='{$id_sanksi}'");
    }

    public function tampilkanSemuaSanksi(){
        return $this->db->get("sanksi");
    }

    public function tambahSanksi($batas_bawah_poin, $batas_atas_poin, $tindak_lanjut, $sanksi){
        $this->db->insert("sanksi", array(
            "batas_bawah_poin" => $batas_bawah_poin,
            "batas_atas_poin" => $batas_atas_poin,
            "tindak_lanjut" => $tindak_lanjut,
            "sanksi" => $sanksi 
        ));
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function editSanksi($id_sanksi, $batas_bawah_poin, $batas_atas_poin, $tindak_lanjut, $sanksi){
        $data = array(
            "batas_bawah_poin" => $batas_bawah_poin,
            "batas_atas_poin" => $batas_atas_poin,
            "tindak_lanjut" => $tindak_lanjut,
            "sanksi" => $sanksi 
        );
        $this->db->update("sanksi", $data, "id_sanksi='{$id_sanksi}'");
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function hapusSanksi($id_sanksi){
        //$this->db->delete("sanksi", array("id_sanksi" => $id_sanksi));
        $this->db->where("id_sanksi", $id_sanksi);
        $this->db->delete("sanksi");
        if($this->db->affected_rows()) return true;
        else return false;
    }
}