<?php
class Semester_model extends CI_Model{

    public function semester($id_semester){
        return $this->db->get_where("semester", "id_semester='{$id_semester}'");
    }

    public function tampilkanSemuaSemester(){
        return $this->db->get("semester");
    }

    public function semesterTerbaru(){
        $this->db->select("semester.*");
        $this->db->from("semester");
        $this->db->order_by("tanggal_selesai","DESC");
        $this->db->limit(1);
        return $this->db->get();
    }

    public function tambahSemester($tanggal_mulai, $tanggal_selesai){
        $this->db->insert("semester", array(
            "tanggal_mulai" => $tanggal_mulai,
            "tanggal_selesai" => $tanggal_selesai 
        ));
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function editSemester($id_semester, $tanggal_mulai, $tanggal_selesai){
        $data = array(
            "tanggal_mulai" => $tanggal_mulai,
            "tanggal_selesai" => $tanggal_selesai
        );
        $this->db->update("semester", $data, "id_semester='{$id_semester}'");
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function hapusSemester($id_semester){
        //$this->db->delete("semester", array("id_semester" => $id_semester));
        $this->db->where("id_semester", $id_semester);
        $this->db->delete("semester");
        if($this->db->affected_rows()) return true;
        else return false;
    }
}