<?php
class Cetak_model extends CI_Model{

    public function tampilkanInfoPelanggaran($kelas) {
        if($kelas==NULL){
            $this->db->select("kelas.kelas as kelas, kelas.ruang as ruang, siswa.nama as nama_siswa, siswa.nis as nis, sum(pelanggaran.skor) as total_skor");
            //$this->db->select("pencatatan.*, siswa.nama as nama_siswa, pelanggaran.pelanggaran as pelanggaran,
            //guru.nama as pencatat, semester.semester as semester, kelas.kelas as kelas, kelas.ruang as ruang");
            $this->db->from("pencatatan");
            // $this->db->join("semester", "semester.id_semester=pencatatan.id_semester");
            $this->db->join("pelanggaran", "pelanggaran.kode_pelanggaran=pencatatan.kode_pelanggaran");
            $this->db->join("siswa", "siswa.nis=pencatatan.nis");
            $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
            $this->db->join("kelas", "kelas.id_kelas=penempatan_kelas.id_kelas");
            // $this->db->join("guru", "guru.nip=pencatatan.nip");
            $this->db->group_by('pencatatan.nis');
        }else{
            $this->db->select("kelas.kelas as kelas,kelas.id_kelas, kelas.ruang as ruang, siswa.nama as nama_siswa, siswa.nis as nis, sum(pelanggaran.skor) as total_skor");
            //$this->db->select("pencatatan.*, siswa.nama as nama_siswa, pelanggaran.pelanggaran as pelanggaran,
            //guru.nama as pencatat, semester.semester as semester, kelas.kelas as kelas, kelas.ruang as ruang");
            $this->db->from("pencatatan");
            // $this->db->join("semester", "semester.id_semester=pencatatan.id_semester");
            $this->db->join("pelanggaran", "pelanggaran.kode_pelanggaran=pencatatan.kode_pelanggaran");
            $this->db->join("siswa", "siswa.nis=pencatatan.nis");
            $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
            $this->db->join("kelas", "kelas.id_kelas=penempatan_kelas.id_kelas");
            $this->db->where("kelas.id_kelas", $kelas);
            // $this->db->join("guru", "guru.nip=pencatatan.nip");
            $this->db->group_by('pencatatan.nis');
        }
        return $this->db->get();
    }

    public function tampilkanInfoPrestasi($kelas){
        if($kelas==NULL){
            //return $this->db->get("pencatatan");
            $this->db->select("kelas.kelas as kelas, kelas.ruang as ruang, siswa.nama as nama_siswa, siswa.nis as nis, sum(prestasi.skor) as total_skor");
            //$this->db->select("pencatatan.*, siswa.nama as nama_siswa, prestasi.prestasi as prestasi,
            //guru.nama as pencatat, semester.semester as semester, kelas.kelas as kelas, kelas.ruang as ruang");
            $this->db->from("pencatatan");
            // $this->db->join("semester", "semester.id_semester=pencatatan.id_semester");
            $this->db->join("prestasi", "prestasi.kode_prestasi=pencatatan.kode_prestasi");
            $this->db->join("siswa", "siswa.nis=pencatatan.nis");
            $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
            $this->db->join("kelas", "kelas.id_kelas=penempatan_kelas.id_kelas");
            // $this->db->join("guru", "guru.nip=pencatatan.nip");
            $this->db->group_by('pencatatan.nis');
        }else{
            //return $this->db->get("pencatatan");
            $this->db->select("kelas.kelas as kelas, kelas.ruang as ruang, siswa.nama as nama_siswa, siswa.nis as nis, sum(prestasi.skor) as total_skor");
            //$this->db->select("pencatatan.*, siswa.nama as nama_siswa, prestasi.prestasi as prestasi,
            //guru.nama as pencatat, semester.semester as semester, kelas.kelas as kelas, kelas.ruang as ruang");
            $this->db->from("pencatatan");
            // $this->db->join("semester", "semester.id_semester=pencatatan.id_semester");
            $this->db->join("prestasi", "prestasi.kode_prestasi=pencatatan.kode_prestasi");
            $this->db->join("siswa", "siswa.nis=pencatatan.nis");
             $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
            $this->db->join("kelas", "kelas.id_kelas=penempatan_kelas.id_kelas");
            $this->db->where("kelas.id_kelas", $kelas);
            // $this->db->join("guru", "guru.nip=pencatatan.nip");
            $this->db->group_by('pencatatan.nis');    
        }
        return $this->db->get();
    }

    public function tampilkanInfoTotalSkor($kelas) {
        if($kelas==NULL){
            $this->db->select("kelas.kelas as kelas, kelas.ruang as ruang, siswa.nama as nama_siswa, siswa.nis as nis, (sum(pencatatan.skor_prestasi)-sum(pencatatan.skor_pelanggaran)) as total_skor");
            $this->db->from("pencatatan");
            $this->db->join("siswa", "siswa.nis=pencatatan.nis");
            $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
            $this->db->join("kelas", "kelas.id_kelas=penempatan_kelas.id_kelas");
            $this->db->group_by('pencatatan.nis');
            $this->db->order_by("total_skor","ASC");
        }else{
            $this->db->select("kelas.kelas as kelas, kelas.ruang as ruang, siswa.nama as nama_siswa, siswa.nis as nis, (sum(pencatatan.skor_prestasi)-sum(pencatatan.skor_pelanggaran)) as total_skor");
            $this->db->from("pencatatan");
            $this->db->join("siswa", "siswa.nis=pencatatan.nis");
            $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
            $this->db->join("kelas", "kelas.id_kelas=penempatan_kelas.id_kelas");
            $this->db->where("kelas.id_kelas", $kelas);
            $this->db->group_by('pencatatan.nis');
            $this->db->order_by("total_skor","ASC");
        }
        return $this->db->get();
    }
    public function tampilkanPelanggaranSiswa($nis) {
        $this->db->select("pencatatan.*, siswa.nama as nama_siswa, pelanggaran.pelanggaran as pelanggaran, pencatatan.skor_pelanggaran as skor, 
        guru.nama as pencatat, kelas.kelas as kelas, kelas.ruang as ruang, pencatatan.tanggal as tanggal");
        $this->db->from("pencatatan");
        // $this->db->join("semester", "semester.id_semester=pencatatan.id_semester");
        $this->db->join("pelanggaran", "pelanggaran.kode_pelanggaran=pencatatan.kode_pelanggaran");
        $this->db->join("siswa", "siswa.nis=pencatatan.nis");
        $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
        $this->db->join("kelas", "penempatan_kelas.id_kelas=kelas.id_kelas");
        $this->db->join("guru", "guru.nip=pencatatan.nip");
        $this->db->where("pencatatan.nis", $nis);
        $this->db->group_by('pencatatan.id_pencatatan');
        return $this->db->get();
    }

    public function tampilkanPrestasiSiswa($nis) {
        $this->db->select("pencatatan.*, siswa.nama as nama_siswa, prestasi.prestasi as prestasi, pencatatan.skor_prestasi as skor, 
        guru.nama as pencatat, kelas.kelas as kelas, kelas.ruang as ruang, pencatatan.tanggal as tanggal");
        $this->db->from("pencatatan");
        // $this->db->join("semester", "semester.id_semester=pencatatan.id_semester");
        $this->db->join("prestasi", "prestasi.kode_prestasi=pencatatan.kode_prestasi");
        $this->db->join("siswa", "siswa.nis=pencatatan.nis");
        $this->db->join("penempatan_kelas", "penempatan_kelas.nis=pencatatan.nis");
        $this->db->join("kelas", "penempatan_kelas.id_kelas=kelas.id_kelas");
        $this->db->join("guru", "guru.nip=pencatatan.nip");
        $this->db->where("pencatatan.nis", $nis);
        $this->db->group_by('pencatatan.id_pencatatan');
        return $this->db->get();
    }

    public function tampilkanDetailTotalSkor($nis) {
        $this->db->select("(sum(pencatatan.skor_pelanggaran)-sum(pencatatan.skor_prestasi)) as total_skor");
        $this->db->from("pencatatan");
        $this->db->where("pencatatan.nis", $nis);
        // $this->db->join("guru", "guru.nip=pencatatan.nip");
        $this->db->group_by('pencatatan.nis');
        return $this->db->get();
    }

    public function cari($cari_nama, $id_kelas){
        $this->db->select("pencatatan.*, siswa.nama as nama_siswa, siswa.nis as nis, sum(prestasi.skor) as total_skor");
        //$this->db->select("pencatatan.*, siswa.nama as nama_siswa, prestasi.prestasi as prestasi,
        //guru.nama as pencatat, semester.semester as semester, kelas.kelas as kelas, kelas.ruang as ruang");
        $this->db->from("pencatatan");
        // $this->db->join("semester", "semester.id_semester=pencatatan.id_semester");
        $this->db->join("prestasi", "prestasi.kode_prestasi=pencatatan.kode_prestasi");
        $this->db->join("siswa", "siswa.nis=pencatatan.nis");
        $this->db->join("kelas", "siswa.id_kelas=kelas.id_kelas AND siswa.nis = pencatatan.nis");
        $this->db->join("guru", "guru.nip=pencatatan.nip");
        $this->db->group_by('pencatatan.nis');
        if($cari_nama != "") $this->db->where("nama_siswa like '%{$cari_nama}%'");
        if($id_kelas != "") $this->db->where("siswa.id_kelas='{$id_kelas}'");
        return $this->db->get();
    }
}