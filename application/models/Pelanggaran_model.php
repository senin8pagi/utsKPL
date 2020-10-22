<?php
class Pelanggaran_model extends CI_Model{

    public function login($nip, $password){
        $result = $this->db->get_where("guru", "nip='{$nip}' and password='{$password}'");
        if ($result->num_rows() > 0) return 1;
        else return 0;
    }

    public function tampilkanJenisPelanggaran(){
        $this->db->select("jenis_pelanggaran.*");
        $this->db->from("jenis_pelanggaran");
        $this->db->order_by("jenis_pelanggaran","ASC");
        return $this->db->get();
    }

    public function tampilkanDaftarPelanggaran(){
        $this->db->select("pelanggaran.*, jenis_pelanggaran.jenis_pelanggaran as jenis_pelanggaran");
        $this->db->from("pelanggaran");
        $this->db->join("jenis_pelanggaran", "pelanggaran.id_jenis_pelanggaran=jenis_pelanggaran.id_jenis_pelanggaran");
        return $this->db->get();
    }

    public function jenisPelanggaran($id_jenis_pelanggaran){
        return $this->db->get_where("jenis_pelanggaran", "id_jenis_pelanggaran='{$id_jenis_pelanggaran}'");
    }

    public function pelanggaranPilihan($id_jenis_pelanggaran){
        $this->db->select("pelanggaran.*");
        $this->db->from("pelanggaran");
        $this->db->where("id_jenis_pelanggaran", $id_jenis_pelanggaran);
        $this->db->order_by("kode_pelanggaran","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        $output = '<div></div>';
        $row = $query->row();
        if(isset($row))
        {
            $output .= '<input type="text" value="'.$row->kode_pelanggaran[0].''.$row->kode_pelanggaran[1].''.intval($row->kode_pelanggaran[2]+1).'" name="kode_pelanggaran" class="form-control" placeholder="Masukkan kode pelanggaran" required autofocus>';
        }else
        {
            $this->db->select("jenis_pelanggaran.*");
            $this->db->from("jenis_pelanggaran");
            $this->db->where("id_jenis_pelanggaran", $id_jenis_pelanggaran);
            $query1 = $this->db->get();

            $row1 = $query1->row();
            $output .= '<input type="text" value="'.$row1->jenis_pelanggaran[0].''.$row1->jenis_pelanggaran[1].'1'.'" name="kode_pelanggaran" class="form-control" placeholder="Masukkan kode pelanggaran" required autofocus>';
        }
       
        return $output;
    }
    
    public function jenisPelanggaranTerbaru(){
        $this->db->select("jenis_pelanggaran.*");
        $this->db->from("jenis_pelanggaran");
        $this->db->order_by("jenis_pelanggaran","DESC");
        $this->db->limit(1);
        return $this->db->get();
    }

    public function pelanggaran($id_pelanggaran){
        return $this->db->get_where("pelanggaran", "kode_pelanggaran='{$id_pelanggaran}'");
    }

    public function tambahJenisPelanggaran($jenis_pelanggaran){
        $this->db->insert("jenis_pelanggaran", array(
            "jenis_pelanggaran" => $jenis_pelanggaran,
        ));    
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function tambahPelanggaran($kode_pelanggaran,$id_jenis_pelanggaran,$pelanggaran, $skor){
        $this->db->insert("pelanggaran", array(
            "kode_pelanggaran" => $kode_pelanggaran,
            "id_jenis_pelanggaran" => $id_jenis_pelanggaran,
            "pelanggaran" => $pelanggaran,
            "skor" => $skor,
        ));    
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function editJenisPelanggaran($id_jenis_pelanggaran, $jenis_pelanggaran){
        $this->db->update("jenis_pelanggaran", array(
            "jenis_pelanggaran" => $jenis_pelanggaran,
        ), "id_jenis_pelanggaran='{$id_jenis_pelanggaran}'");
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function editPelanggaran($kode_pelanggaran, $id_jenis_pelanggaran, $pelanggaran, $skor){
        $this->db->update("pelanggaran", array(
            "kode_pelanggaran" => $kode_pelanggaran,
            "id_jenis_pelanggaran" => $id_jenis_pelanggaran,
            "pelanggaran" => $pelanggaran,
            "skor" => $skor,
        ), "kode_pelanggaran='{$kode_pelanggaran}'");
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function hapusJenisPelanggaran($id_jenis_pelanggaran){
        $this->db->delete("jenis_pelanggaran", array("id_jenis_pelanggaran" => $id_jenis_pelanggaran));
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function hapusPelanggaran($kode_pelanggaran){
        $this->db->delete("pelanggaran", array("kode_pelanggaran" => $kode_pelanggaran));
        if($this->db->affected_rows()) return true;
        else return false;
    }
}