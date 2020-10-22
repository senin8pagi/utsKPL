<?php
class PencatatanPelanggaran_model extends CI_Model{

    public function login($nip, $password){
        $result = $this->db->get_where("guru", "nip='{$nip}' and password='{$password}'");
        if ($result->num_rows() > 0) return 1;
        else return 0;
    }

    public function tampilkanPencatatanPelanggaran(){
        // $this->db->select("semester.*");
        // $this->db->from("semester");
        // $this->db->order_by("tanggal_selesai","DESC");
        // $this->db->limit(1);
        // $query = $this->db->get();
        // $row =  $query->row();
        $this->db->select("pencatatan.*, siswa.nama as nama_siswa, pelanggaran.pelanggaran as pelanggaran, pencatatan.skor_pelanggaran as skor, 
        guru.nama as pencatat, kelas.kelas as kelas, kelas.ruang as ruang, pencatatan.tanggal as tanggal");
        $this->db->from("pencatatan");
        // $this->db->join("semester", "semester.id_semester=pencatatan.id_semester");
        $this->db->join("pelanggaran", "pelanggaran.kode_pelanggaran=pencatatan.kode_pelanggaran");
        $this->db->join("siswa", "siswa.nis=pencatatan.nis");
        $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
        $this->db->join("kelas", "penempatan_kelas.id_kelas=kelas.id_kelas");
        $this->db->join("guru", "guru.nip=pencatatan.nip");
        // $this->db->where("pencatatan.semester", $row->id_semester);
        $this->db->group_by('pencatatan.id_pencatatan');
      
        return $this->db->get();
    }

    public function pencatatan_pelanggaran($id_pencatatan){
        return $this->db->get_where("pencatatan", "id_pencatatan='{$id_pencatatan}'");
    }

    public function pelanggaran_jenis_pelanggaran($id_pencatatan){
        $this->db->select("pelanggaran.*, jenis_pelanggaran.jenis_pelanggaran as jenis");
        $this->db->from("pelanggaran");
        $this->db->join("pencatatan", "pelanggaran.kode_pelanggaran=pencatatan.kode_pelanggaran");
        $this->db->join("jenis_pelanggaran", "pelanggaran.id_jenis_pelanggaran=jenis_pelanggaran.id_jenis_pelanggaran");
        $this->db->where("pencatatan.id_pencatatan", $id_pencatatan);
        $this->db->limit(1);
        // $query = $this->db->get();
        // $output = '';
        // $row = $query->row();

        // $output .= '<input list="id_jenis_pelanggaran" value="'.$row->jenis.'" id="'.$row->jenis_id.'" name="id_jenis_pelanggaran" autocomplete="off" placeholder="Masukkan pelanggaran" class="form-control" required>';
        return $this->db->get();
    }

    public function penempatan_kelas_tahun($semester_id){
        $this->db->select("penempatan_kelas.*, siswa.nama as nama");
        $this->db->from("penempatan_kelas");
        $this->db->join("siswa", "penempatan_kelas.nis=siswa.nis");
        $this->db->where("penempatan_kelas.id_semester", $semester_id);
        // $this->db->where("penempatan_kelas.id_kelas", $kelas_id);
        $query = $this->db->get();
        $output = '';
        if($query->result() != NULL)
        {
            foreach($query->result() as $row)
            {
                $output .= '<option data-id="'.$row->nis.'" value="'.$row->nis.' - '.$row->nama.'"></option>';
            }
        }else
        {
            $output .= '<option data-id="" value="Data Kosong Silahkan Hubungi Admin Untuk Info Lebih Lanjut"></option>';
        } 
        return $output;
    }

    public function jenis_pelanggaran($id_jenis_pelanggaran){
        $this->db->select("pelanggaran.*");
        $this->db->from("pelanggaran");
        $this->db->where("id_jenis_pelanggaran", $id_jenis_pelanggaran);
        $this->db->order_by("pelanggaran","ASC");
        $query = $this->db->get();
        $output = '';
        if($query->result() != NULL)
        {
            foreach($query->result() as $row)
            {
                $output .= '<option data-id="'.$row->kode_pelanggaran.'" value="'.$row->pelanggaran.'"></option>';
            }
        }
        else
        {
            $output .= '<option data-id="" value="Pelanggaran Tidak Ada"></option>';
        }
        
       
        return $output;
    }

    public function ambilSkorPelanggaran($id){
        $this->db->select("skor");
        $this->db->from("pelanggaran");
        $this->db->where("kode_pelanggaran", $id);
        $result = $this->db->get()->row();
        return $result->skor;
    }

    public function tambahPencatatanPelanggaran($kode_pelanggaran, $nip, $nis, $skor_pelanggaran, $tanggal, $semester){
        $this->db->insert("pencatatan", array(
            "id_pencatatan" => $this->db->insert_id(),
            // "id_semester" => $id_semester,
            "kode_pelanggaran" => $kode_pelanggaran,
            "kode_prestasi" => NULL,
            "nip" => $nip,
            "nis" => $nis,
            "skor_prestasi" => 0,
            "skor_pelanggaran" => $skor_pelanggaran,
            "tanggal" => $tanggal,
            "semester" => $semester,
        ));    
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function editPencatatanPelanggaran($id_pencatatan, $kode_pelanggaran, $nip, $nis, $skor_pelanggaran, $tanggal, $semester){
        $this->db->update("pencatatan", array(
            "kode_pelanggaran" => $kode_pelanggaran,
            "kode_prestasi" => NULL,
            "nip" => $nip,
            "nis" => $nis,
            "skor_prestasi" => 0,
            "skor_pelanggaran" => $skor_pelanggaran,
            "tanggal" => $tanggal,
            "semester" => $semester,
        ), "id_pencatatan='{$id_pencatatan}'");
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function hapusPencatatanPelanggaran($id_pencatatan){
        $this->db->delete("pencatatan", array("id_pencatatan" => $id_pencatatan));
        if($this->db->affected_rows()) return true;
        else return false;
    }
}