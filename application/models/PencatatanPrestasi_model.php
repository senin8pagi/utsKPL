<?php
class PencatatanPrestasi_model extends CI_Model{

    public function login($nip, $password){
        $result = $this->db->get_where("guru", "nip='{$nip}' and password='{$password}'");
        if ($result->num_rows() > 0) return 1;
        else return 0;
    }

    public function tampilkanPencatatanPrestasi(){
        // $this->db->select("semester.*");
        // $this->db->from("semester");
        // $this->db->order_by("tanggal_selesai","DESC");
        // $this->db->limit(1);
        // $query = $this->db->get();
        // $row =  $query->row();
        //return $this->db->get("pencatatan_pelanggaran");
        $this->db->select("pencatatan.*, siswa.nama as nama_siswa, prestasi.prestasi as prestasi, pencatatan.skor_prestasi as skor, 
        guru.nama as pencatat, kelas.kelas as kelas, kelas.ruang as ruang, pencatatan.tanggal as tanggal");
        $this->db->from("pencatatan");
        // $this->db->join("semester", "semester.id_semester=pencatatan.id_semester");
        $this->db->join("prestasi", "prestasi.kode_prestasi=pencatatan.kode_prestasi");
        $this->db->join("siswa", "siswa.nis=pencatatan.nis");
        $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
        $this->db->join("kelas", "penempatan_kelas.id_kelas=kelas.id_kelas");
        $this->db->join("guru", "guru.nip=pencatatan.nip");
        // $this->db->where("pencatatan.semester", $row->id_semester);
        $this->db->group_by('pencatatan.id_pencatatan');
        return $this->db->get();;
    }

    public function pencatatan_prestasi($id_pencatatan){
        return $this->db->get_where("pencatatan", "id_pencatatan='{$id_pencatatan}'");
    }

    public function prestasi_jenis_prestasi($id_pencatatan){
        $this->db->select("prestasi.*, jenis_prestasi.jenis_prestasi as jenis");
        $this->db->from("prestasi");
        $this->db->join("pencatatan", "prestasi.kode_prestasi=pencatatan.kode_prestasi");
        $this->db->join("jenis_prestasi", "prestasi.id_jenis_prestasi=jenis_prestasi.id_jenis_prestasi");
        $this->db->where("pencatatan.id_pencatatan", $id_pencatatan);
        $this->db->limit(1);
        // $query = $this->db->get();
        // $output = '';
        // $row = $query->row();

        // $output .= '<input list="id_jenis_prestasi" value="'.$row->jenis.'" id="'.$row->jenis_id.'" name="id_jenis_prestasi" autocomplete="off" placeholder="Masukkan Prestasi" class="form-control" required>';
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

    public function ambilSkorPrestasi($id){
        $this->db->select("skor");
        $this->db->from("prestasi");
        $this->db->where("kode_prestasi", $id);
        $result = $this->db->get()->row();
        return $result->skor;
    }

    public function jenis_prestasi($id_jenis_prestasi){
        $this->db->select("prestasi.*");
        $this->db->from("prestasi");
        $this->db->where("id_jenis_prestasi", $id_jenis_prestasi);
        $this->db->order_by("prestasi","ASC");
        $query = $this->db->get();
        $output = '';
        if($query->result() != NULL)
        {
            foreach($query->result() as $row)
            {
                $output .= '<option data-id="'.$row->kode_prestasi.'" value="'.$row->prestasi.'"></option>';
            }
        }
        else
        {
            $output .= '<option data-id="" value="Prestasi Tidak Ada"></option>';
        }
        
       
        return $output;
    }
    
    public function tambahPencatatanPrestasi($kode_prestasi, $nip, $nis,$skor_prestasi, $tanggal, $semester){
        $this->db->insert("pencatatan", array(
            "id_pencatatan" => $this->db->insert_id(),
            // "id_semester" => $id_semester,
            "kode_pelanggaran" => NULL,
            "kode_prestasi" => $kode_prestasi,
            "nip" => $nip,
            "nis" => $nis,
            "skor_prestasi" => $skor_prestasi,
            "skor_pelanggaran" => 0,
            "tanggal" => $tanggal,
            "semester" => $semester,
        ));    
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function editPencatatanPrestasi($id_pencatatan, $kode_prestasi, $nip, $nis, $skor_prestasi, $tanggal, $semester){
        $this->db->update("pencatatan", array(
            "kode_pelanggaran" => NULL,
            "kode_prestasi" => $kode_prestasi,
            "nip" => $nip,
            "nis" => $nis,
            "skor_prestasi" => $skor_prestasi,
            "skor_pelanggaran" => 0,
            "tanggal" => $tanggal,
            "semester" => $semester,    
        ), "id_pencatatan='{$id_pencatatan}'");
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function hapusPencatatanPrestasi($id_pencatatan){
        $this->db->delete("pencatatan", array("id_pencatatan" => $id_pencatatan));
        if($this->db->affected_rows()) return true;
        else return false;
    }
}