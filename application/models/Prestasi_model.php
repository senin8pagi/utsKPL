<?php
class Prestasi_model extends CI_Model{

    public function tampilkanJenisPrestasi(){
        return $this->db->get("jenis_prestasi");
    }

    public function tampilkanDaftarPrestasi(){
        $this->db->select("prestasi.*, jenis_prestasi.jenis_prestasi as jenis_prestasi");
        $this->db->from("prestasi");
        $this->db->join("jenis_prestasi", "prestasi.id_jenis_prestasi=jenis_prestasi.id_jenis_prestasi");
        return $this->db->get();
    }

    public function jenisPrestasi($id_jenis_prestasi){
        return $this->db->get_where("jenis_prestasi", "id_jenis_prestasi='{$id_jenis_prestasi}'");
    }

    public function prestasiPilihan($id_jenis_prestasi){
        $this->db->select("prestasi.*");
        $this->db->from("prestasi");
        $this->db->where("id_jenis_prestasi", $id_jenis_prestasi);
        $this->db->order_by("kode_prestasi","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        $output = '<div></div>';
        $row = $query->row();
        if(isset($row))
        {
            $output .= '<input type="text" value="'.$row->kode_prestasi[0].''.$row->kode_prestasi[1].''.intval($row->kode_prestasi[2]+1).'" name="kode_prestasi" class="form-control" placeholder="Masukkan kode prestasi" required autofocus>';
        }else
        {
            $this->db->select("jenis_prestasi.*");
            $this->db->from("jenis_prestasi");
            $this->db->where("id_jenis_prestasi", $id_jenis_prestasi);
            $query1 = $this->db->get();

            $row1 = $query1->row();
            $output .= '<input type="text" value="'.$row1->jenis_prestasi[0].''.$row1->jenis_prestasi[1].'1'.'" name="kode_prestasi" class="form-control" placeholder="Masukkan kode prestasi" required autofocus>';
        }
       
        return $output;
    }

    public function jenisPrestasiTerbaru(){
        $this->db->select("jenis_prestasi.*");
        $this->db->from("jenis_prestasi");
        $this->db->order_by("jenis_prestasi","DESC");
        $this->db->limit(1);
        return $this->db->get();
    }

    public function prestasi($id_prestasi){
        return $this->db->get_where("prestasi", "kode_prestasi='{$id_prestasi}'");
    }

    public function tambahJenisPrestasi($jenis_prestasi){
        $this->db->insert("jenis_prestasi", array(
            "jenis_prestasi" => $jenis_prestasi,
        ));    
        if($this->db->affected_rows()) return true;
        else return false;
    }
    
    public function tambahPrestasi($kode_prestasi, $id_jenis_prestasi, $prestasi, $skor){
        $this->db->insert("prestasi", array(
            "kode_prestasi" => $kode_prestasi,
            "id_jenis_prestasi" => $id_jenis_prestasi,
            "prestasi" => $prestasi,
            "skor" => $skor,
        ));    
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function editJenisPrestasi($id_jenis_prestasi, $jenis_prestasi){
        $this->db->update("jenis_prestasi", array(
            "jenis_prestasi" => $jenis_prestasi,
        ), "id_jenis_prestasi='{$id_jenis_prestasi}'");
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function editPrestasi($kode_prestasi, $id_jenis_prestasi, $prestasi, $skor){
        $this->db->update("prestasi", array(
            "kode_prestasi" => $kode_prestasi,
            "id_jenis_prestasi" => $id_jenis_prestasi,
            "prestasi" => $prestasi,
            "skor" => $skor,
        ), "kode_prestasi='{$kode_prestasi}'");
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function hapusJenisPrestasi($id_jenis_prestasi){
        $this->db->delete("jenis_prestasi", array("id_jenis_prestasi" => $id_jenis_prestasi));
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function hapusPrestasi($id_prestasi){
        $this->db->delete("prestasi", array("kode_prestasi" => $id_prestasi));
        if($this->db->affected_rows()) return true;
        else return false;
    }
}