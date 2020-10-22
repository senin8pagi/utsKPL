<?php
class PenempatanKelas_model extends CI_Model{

    public function login($nip, $password){
        $result = $this->db->get_where("guru", "nip='{$nip}' and password='{$password}'");
        if ($result->num_rows() > 0) return 1;
        else return 0;
    }

    public function penempatanKelas($id_penempatan_kelas){
        return $this->db->get_where("penempatan_kelas", "id_penempatan_kelas='{$id_penempatan_kelas}'");
    }

    public function tampilkanSemuaKelas(){
        return $this->db->get("kelas");
    }

    public function tampilkanSemuaSemester(){
        return $this->db->get("semester");
    }

    public function tampilkanSemuaSiswa(){
        return $this->db->get("siswa");
    }

    public function tampilkanSemuaPenempatanKelas(){
        //return $this->db->get("siswa");
        $this->db->select("penempatan_kelas.*, kelas.kelas as kelas, kelas.ruang as ruang, siswa.nama as nama_siswa, semester.tanggal_mulai as tanggal_mulai, semester.tanggal_selesai as tanggal_selesai");
        $this->db->from("penempatan_kelas");
        $this->db->join("kelas", "penempatan_kelas.id_kelas=kelas.id_kelas");
        $this->db->join("siswa", "penempatan_kelas.nis=siswa.nis");
        $this->db->join("semester", "penempatan_kelas.id_semester=semester.id_semester");
        return $this->db->get();
    }

    public function tambahPenempatanKelas($id_semester, $nis, $id_kelas){
        $this->db->insert(
            "penempatan_kelas", array(
            "id_semester" => $id_semester,
            "nis" => $nis,
            "id_kelas" => $id_kelas
        ));    
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function editPenempatanKelas($id_penempatan_kelas, $id_semester, $nis, $id_kelas){
        $this->db->update(
            "penempatan_kelas", array(
            "id_penempatan_kelas" => $id_penempatan_kelas,
            "id_semester" => $id_semester,
            "nis" => $nis,
            "id_kelas" => $id_kelas
        ), "id_penempatan_kelas='{$id_penempatan_kelas}'");
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function hapusPenempatanKelas($id_penempatan_kelas){
        $this->db->delete("penempatan_kelas", array("id_penempatan_kelas" => $id_penempatan_kelas));
        if($this->db->affected_rows()) return true;
        else return false;
    }
}