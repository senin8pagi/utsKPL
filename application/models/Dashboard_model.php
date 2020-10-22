<?php
class Dashboard_model extends CI_Model{

    public function dataSkor(){
        //Hari ini
        $this->db->select("sum(pelanggaran.skor) as skor");
        $this->db->from("pencatatan");
        $this->db->join("pelanggaran", "pencatatan.kode_pelanggaran=pelanggaran.kode_pelanggaran");
        $this->db->where("pencatatan.tanggal='".Date("Y-m-d")."'");
        $data["total_pelanggaran_hari_ini"] = $this->db->get()->row()->skor;

        $this->db->select("sum(prestasi.skor) as skor");
        $this->db->from("pencatatan");
        $this->db->join("prestasi", "pencatatan.kode_prestasi=prestasi.kode_prestasi");
        $this->db->where("pencatatan.tanggal='".Date("Y-m-d")."'");
        $data["total_prestasi_hari_ini"] = $this->db->get()->row()->skor;

        //KELAS X
        $this->db->select("sum(pelanggaran.skor) as skor");
        $this->db->from("pencatatan");
        $this->db->join("pelanggaran", "pencatatan.kode_pelanggaran=pelanggaran.kode_pelanggaran");
        $this->db->join("siswa", "pencatatan.nis=siswa.nis");
        $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
        $this->db->join("kelas", "kelas.id_kelas=penempatan_kelas.id_kelas");
        $this->db->where("pencatatan.tanggal='".Date("Y-m-d")."' AND kelas.kelas='X'");
        $data["total_pelanggaran_X_hari_ini"] = $this->db->get()->row()->skor;

        $this->db->select("sum(prestasi.skor) as skor");
        $this->db->from("pencatatan");
        $this->db->join("prestasi", "pencatatan.kode_prestasi=prestasi.kode_prestasi");
        $this->db->join("siswa", "pencatatan.nis=siswa.nis");
        $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
        $this->db->join("kelas", "kelas.id_kelas=penempatan_kelas.id_kelas");
        $this->db->where("pencatatan.tanggal='".Date("Y-m-d")."' AND kelas.kelas='X'");
        $data["total_prestasi_X_hari_ini"] = $this->db->get()->row()->skor;

        //KKELAS XI
        $this->db->select("sum(pelanggaran.skor) as skor");
        $this->db->from("pencatatan");
        $this->db->join("pelanggaran", "pencatatan.kode_pelanggaran=pelanggaran.kode_pelanggaran");
        $this->db->join("siswa", "pencatatan.nis=siswa.nis");
        $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
        $this->db->join("kelas", "kelas.id_kelas=penempatan_kelas.id_kelas");
        $this->db->where("pencatatan.tanggal='".Date("Y-m-d")."' AND kelas.kelas='XI'");
        $data["total_pelanggaran_XI_hari_ini"] = $this->db->get()->row()->skor;

        $this->db->select("sum(prestasi.skor) as skor");
        $this->db->from("pencatatan");
        $this->db->join("prestasi", "pencatatan.kode_prestasi=prestasi.kode_prestasi");
        $this->db->join("siswa", "pencatatan.nis=siswa.nis");
        $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
        $this->db->join("kelas", "kelas.id_kelas=penempatan_kelas.id_kelas");
        $this->db->where("pencatatan.tanggal='".Date("Y-m-d")."' AND kelas.kelas='XI'");
        $data["total_prestasi_XI_hari_ini"] = $this->db->get()->row()->skor;

        //KELAS XII
        $this->db->select("sum(pelanggaran.skor) as skor");
        $this->db->from("pencatatan");
        $this->db->join("pelanggaran", "pencatatan.kode_pelanggaran=pelanggaran.kode_pelanggaran");
        $this->db->join("siswa", "pencatatan.nis=siswa.nis");
        $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
        $this->db->join("kelas", "kelas.id_kelas=penempatan_kelas.id_kelas");
        $this->db->where("pencatatan.tanggal='".Date("Y-m-d")."' AND kelas.kelas='XII'");
        $data["total_pelanggaran_XII_hari_ini"] = $this->db->get()->row()->skor;

        $this->db->select("sum(prestasi.skor) as skor");
        $this->db->from("pencatatan");
        $this->db->join("prestasi", "pencatatan.kode_prestasi=prestasi.kode_prestasi");
        $this->db->join("siswa", "pencatatan.nis=siswa.nis");
        $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
        $this->db->join("kelas", "kelas.id_kelas=penempatan_kelas.id_kelas");
        $this->db->where("pencatatan.tanggal='".Date("Y-m-d")."' AND kelas.kelas='XII'");
        $data["total_prestasi_XII_hari_ini"] = $this->db->get()->row()->skor;
        
        //SEMESTER INI
        // $semester = $this->Semester_model->tampilkanRecordTerakhir()->row()->id_semester;
        // $this->db->select("sum(pelanggaran.skor) as skor");
        // $this->db->from("pencatatan");
        // $this->db->join("pelanggaran", "pencatatan.kode_pelanggaran=pelanggaran.kode_pelanggaran");
        // $this->db->where("pencatatan.id_semester='".$semester."'");
        // $data["total_pelanggaran_semester_ini"] = $this->db->get()->row()->skor;

        // $this->db->select("sum(prestasi.skor) as skor");
        // $this->db->from("pencatatan");
        // $this->db->join("prestasi", "pencatatan.kode_prestasi=prestasi.kode_prestasi");
        // $this->db->where("pencatatan.id_semester='".$semester."'");
        // $data["total_prestasi_semester_ini"] = $this->db->get()->row()->skor;

        // //KELAS X
        // $this->db->select("sum(pelanggaran.skor) as skor");
        // $this->db->from("pencatatan");
        // $this->db->join("pelanggaran", "pencatatan.kode_pelanggaran=pelanggaran.kode_pelanggaran");
        // $this->db->join("siswa", "pencatatan.nis=siswa.nis");
        // $this->db->join("kelas", "siswa.id_kelas=kelas.id_kelas");
        // $this->db->where("kelas.kelas='X' AND pencatatan.id_semester='".$semester."'");
        // $data["total_pelanggaran_X_semester_ini"] = $this->db->get()->row()->skor;

        // $this->db->select("sum(prestasi.skor) as skor");
        // $this->db->from("pencatatan");
        // $this->db->join("prestasi", "pencatatan.kode_prestasi=prestasi.kode_prestasi");
        // $this->db->join("siswa", "pencatatan.nis=siswa.nis");
        // $this->db->join("kelas", "siswa.id_kelas=kelas.id_kelas");
        // $this->db->where("kelas.kelas='X' AND pencatatan.id_semester='".$semester."'");
        // $data["total_prestasi_X_semester_ini"] = $this->db->get()->row()->skor;

        // //KKELAS XI
        // $this->db->select("sum(pelanggaran.skor) as skor");
        // $this->db->from("pencatatan");
        // $this->db->join("pelanggaran", "pencatatan.kode_pelanggaran=pelanggaran.kode_pelanggaran");
        // $this->db->join("siswa", "pencatatan.nis=siswa.nis");
        // $this->db->join("kelas", "siswa.id_kelas=kelas.id_kelas");
        // $this->db->where("kelas.kelas='XI' AND pencatatan.id_semester='".$semester."'");
        // $data["total_pelanggaran_XI_semester_ini"] = $this->db->get()->row()->skor;

        // $this->db->select("sum(prestasi.skor) as skor");
        // $this->db->from("pencatatan");
        // $this->db->join("prestasi", "pencatatan.kode_prestasi=prestasi.kode_prestasi");
        // $this->db->join("siswa", "pencatatan.nis=siswa.nis");
        // $this->db->join("kelas", "siswa.id_kelas=kelas.id_kelas");
        // $this->db->where("kelas.kelas='XI' AND pencatatan.id_semester='".$semester."'");
        // $data["total_prestasi_XI_semester_ini"] = $this->db->get()->row()->skor;

        // //KELAS XII
        // $this->db->select("sum(pelanggaran.skor) as skor");
        // $this->db->from("pencatatan");
        // $this->db->join("pelanggaran", "pencatatan.kode_pelanggaran=pelanggaran.kode_pelanggaran");
        // $this->db->join("siswa", "pencatatan.nis=siswa.nis");
        // $this->db->join("kelas", "siswa.id_kelas=kelas.id_kelas");
        // $this->db->where("kelas.kelas='XII' AND pencatatan.id_semester='".$semester."'");
        // $data["total_pelanggaran_XII_semester_ini"] = $this->db->get()->row()->skor;

        // $this->db->select("sum(prestasi.skor) as skor");
        // $this->db->from("pencatatan");
        // $this->db->join("prestasi", "pencatatan.kode_prestasi=prestasi.kode_prestasi");
        // $this->db->join("siswa", "pencatatan.nis=siswa.nis");
        // $this->db->join("kelas", "siswa.id_kelas=kelas.id_kelas");
        // $this->db->where("kelas.kelas='XII' AND pencatatan.id_semester='".$semester."'");
        // $data["total_prestasi_XII_semester_ini"] = $this->db->get()->row()->skor;

        //TAHUN INI
        $this->db->select("sum(pelanggaran.skor) as skor");
        $this->db->from("pencatatan");
        $this->db->join("pelanggaran", "pencatatan.kode_pelanggaran=pelanggaran.kode_pelanggaran");
        $this->db->where("YEAR(pencatatan.tanggal)='"
        . Date("Y")."'");
        $data["total_pelanggaran_tahun_ini"] = $this->db->get()->row()->skor;

        $this->db->select("sum(prestasi.skor) as skor");
        $this->db->from("pencatatan");
        $this->db->join("prestasi", "pencatatan.kode_prestasi=prestasi.kode_prestasi");
        $this->db->where("YEAR(pencatatan.tanggal)='"
        . Date("Y")."'");
        $data["total_prestasi_tahun_ini"] = $this->db->get()->row()->skor;

        //KELAS X
        $this->db->select("sum(pelanggaran.skor) as skor");
        $this->db->from("pencatatan");
        $this->db->join("pelanggaran", "pencatatan.kode_pelanggaran=pelanggaran.kode_pelanggaran");
        $this->db->join("siswa", "pencatatan.nis=siswa.nis");
        $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
        $this->db->join("kelas", "kelas.id_kelas=penempatan_kelas.id_kelas");
        $this->db->where("kelas.kelas='X' AND YEAR(pencatatan.tanggal)='"
        . Date("Y")."'");
        $data["total_pelanggaran_X_tahun_ini"] = $this->db->get()->row()->skor;

        $this->db->select("sum(prestasi.skor) as skor");
        $this->db->from("pencatatan");
        $this->db->join("prestasi", "pencatatan.kode_prestasi=prestasi.kode_prestasi");
        $this->db->join("siswa", "pencatatan.nis=siswa.nis");
        $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
        $this->db->join("kelas", "kelas.id_kelas=penempatan_kelas.id_kelas");
        $this->db->where("kelas.kelas='X' AND YEAR(pencatatan.tanggal)='"
        . Date("Y")."'");
        $data["total_prestasi_X_tahun_ini"] = $this->db->get()->row()->skor;

        //KKELAS XI
        $this->db->select("sum(pelanggaran.skor) as skor");
        $this->db->from("pencatatan");
        $this->db->join("pelanggaran", "pencatatan.kode_pelanggaran=pelanggaran.kode_pelanggaran");
        $this->db->join("siswa", "pencatatan.nis=siswa.nis");
        $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
        $this->db->join("kelas", "kelas.id_kelas=penempatan_kelas.id_kelas");
        $this->db->where("kelas.kelas='XI' AND YEAR(pencatatan.tanggal)='"
        . Date("Y")."'");
        $data["total_pelanggaran_XI_tahun_ini"] = $this->db->get()->row()->skor;

        $this->db->select("sum(prestasi.skor) as skor");
        $this->db->from("pencatatan");
        $this->db->join("prestasi", "pencatatan.kode_prestasi=prestasi.kode_prestasi");
        $this->db->join("siswa", "pencatatan.nis=siswa.nis");
        $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
        $this->db->join("kelas", "kelas.id_kelas=penempatan_kelas.id_kelas");
        $this->db->where("kelas.kelas='XI' AND YEAR(pencatatan.tanggal)='"
        . Date("Y")."'");
        $data["total_prestasi_XI_tahun_ini"] = $this->db->get()->row()->skor;

        //KELAS XII
        $this->db->select("sum(pelanggaran.skor) as skor");
        $this->db->from("pencatatan");
        $this->db->join("pelanggaran", "pencatatan.kode_pelanggaran=pelanggaran.kode_pelanggaran");
        $this->db->join("siswa", "pencatatan.nis=siswa.nis");
        $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
        $this->db->join("kelas", "kelas.id_kelas=penempatan_kelas.id_kelas");
        $this->db->where("kelas.kelas='XII' AND YEAR(pencatatan.tanggal)='"
        . Date("Y")."'");
        $data["total_pelanggaran_XII_tahun_ini"] = $this->db->get()->row()->skor;

        $this->db->select("sum(prestasi.skor) as skor");
        $this->db->from("pencatatan");
        $this->db->join("prestasi", "pencatatan.kode_prestasi=prestasi.kode_prestasi");
        $this->db->join("siswa", "pencatatan.nis=siswa.nis");
        $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
        $this->db->join("kelas", "kelas.id_kelas=penempatan_kelas.id_kelas");
        $this->db->where("kelas.kelas='XII' AND YEAR(pencatatan.tanggal)='"
        . Date("Y")."'");
        $data["total_prestasi_XII_tahun_ini"] = $this->db->get()->row()->skor;
        return $data;
    }

    public function skorTertinggi(){
        $this->db->select("siswa.nama as nama_siswa, siswa.nis as nis, (sum(pencatatan.skor_prestasi)-sum(pencatatan.skor_pelanggaran)) as total_skor");
        $this->db->from("pencatatan");
        $this->db->join("siswa", "siswa.nis=pencatatan.nis");
        $this->db->group_by('pencatatan.nis');
        $this->db->order_by('total_skor',"DESC");
        $this->db->limit(3);
        return $this->db->get();
    }

    public function skorTerendah(){
        $this->db->select("siswa.nama as nama_siswa, siswa.nis as nis, (sum(pencatatan.skor_prestasi)-sum(pencatatan.skor_pelanggaran)) as total_skor");
        $this->db->from("pencatatan");
        $this->db->join("siswa", "siswa.nis=pencatatan.nis");
        $this->db->group_by('pencatatan.nis');
        $this->db->order_by('total_skor',"ASC");
        $this->db->limit(3);
        return $this->db->get();
    }

    public function totalPrestasiPerBulan($bulan,$thn_ini){
        $total = $this->db->query("select sum(skor_prestasi) as skor from pencatatan where month(tanggal)='$bulan' and year(tanggal)='$thn_ini'");
        return $total->row()->skor;
    }


    
    public function totalPelanggaranPerBulan($bulan,$thn_ini){
        $total = $this->db->query("select sum(skor_pelanggaran) as skor from pencatatan where month(tanggal)='$bulan' and year(tanggal)='$thn_ini'");
        return $total->row()->skor;
    }

    public function totalPelanggaran(){
        $total = $this->db->query("select sum(skor_pelanggaran) as skor from pencatatan");
        return $total->row()->skor;
    }

    public function totalPrestasi(){
        $total = $this->db->query("select sum(skor_prestasi) as skor from pencatatan");
        return $total->row()->skor;
    }

    public function totalPencatatan(){
        $total = $this->db->query("select (sum(skor_prestasi + skor_pelanggaran)) as skor from pencatatan");
        return $total->row()->skor;
    }
    
    // month(transaksi_tanggal)='$bulan' and year(transaksi_tanggal)='$thn_ini'

}