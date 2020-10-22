<?php
class Siswa_model extends CI_Model{

    public function login($nip, $password){
        $result = $this->db->get_where("guru", "nip='{$nip}' and password='{$password}'");
        if ($result->num_rows() > 0) return 1;
        else return 0;
    }

    public function siswa($nis){
        return $this->db->get_where("siswa", "nis='{$nis}'");
        // $this->db->select("siswa.*, kelas.kelas as kelas, kelas.ruang as ruang");
        // $this->db->from("siswa");
        // $this->db->join("kelas", "siswa.id_kelas=kelas.id_kelas");
        // $this->db->where("siswa.nis='{$nis}'");
        // return $this->db->get();
    }

    public function tampilkanSemuaKelas(){
        return $this->db->get("kelas");
    }

    public function tampilkanSemuaSiswa(){
        //return $this->db->get("siswa");
        $this->db->select("siswa.*");
        $this->db->from("siswa");
        return $this->db->get();
    }

    public function tambahSiswa($nis, $nama, $jenis_kelamin){
        $this->db->insert(
            "siswa", array(
            "nis" => $nis,
            "nama" => $nama,
            "jenis_kelamin" => $jenis_kelamin
        ));    
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function editSiswa($nis, $nama, $jenis_kelamin){
        $this->db->update(
            "siswa", array(
            "nis" => $nis,
            "nama" => $nama,
            "jenis_kelamin" => $jenis_kelamin
        ), "nis='{$nis}'");
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function hapusSiswa($nis){
        $this->db->delete("siswa", array("nis" => $nis));
        if($this->db->affected_rows()) return true;
        else return false;
    }
}