<?php
class Ajax extends CI_Controller{
    
    public function guru($parameter, $nip = null){
        $nip = urldecode($nip);
        if($parameter == "data"){
            if($nip != null) $result = $this->Guru_model->guru($nip)->row();
            else $result = $this->Guru_model->tampilkanSemuaGuru()->result();
        }else if($parameter == "hapus"){
            if($this->input->method() == "post"){
                $nip = $this->input->post("nip");
                $this->Guru_model->hapusGuru($nip);
                if($this->db->affected_rows()) $result["status"] = "success";
                else $result["status"] = "error";
            }
        }
        echo json_encode($result);
    }

    public function jenis_prestasi($parameter){
        if($parameter == "data"){
            $result = $this->Prestasi_model->tampilkanJenisPrestasi()->result();
        }else if($parameter == "hapus"){
            if($this->input->method() == "post"){
                $id_jenis_prestasi = $this->input->post("id_jenis_prestasi");
                $this->Prestasi_model->hapusJenisPrestasi($id_jenis_prestasi);
                if($this->db->affected_rows()) $result["status"] = "success";
                else $result["status"] = "error";
            }
        }
        echo json_encode($result);
    }

    public function jenis_pelanggaran($parameter){
        if($parameter == "data"){
            $result = $this->Pelanggaran_model->tampilkanJenisPelanggaran()->result();
        }else if($parameter == "hapus"){
            if($this->input->method() == "post"){
                $id_jenis_pelanggaran = $this->input->post("id_jenis_pelanggaran");
                $this->Pelanggaran_model->hapusJenisPelanggaran($id_jenis_pelanggaran);
                if($this->db->affected_rows()) $result["status"] = "success";
                else $result["status"] = "error";
            }
        }
        echo json_encode($result);
    }

    public function prestasi($parameter){
        if($parameter == "data"){
            $result = $this->Prestasi_model->tampilkanDaftarPrestasi()->result();
        }else if($parameter == "hapus"){
            if($this->input->method() == "post"){
                $id_prestasi = $this->input->post("id_prestasi");
                $this->Prestasi_model->hapusPrestasi($id_prestasi);
                if($this->db->affected_rows()) $result["status"] = "success";
                else $result["status"] = "error";
            }
        }else if($parameter == "jenis_prestasi"){
            if($this->input->method() == "post"){
                $id_jenis_prestasi = $this->input->post("id_jenis_prestasi");
                $result = $this->Prestasi_model->prestasiPilihan($id_jenis_prestasi);
            }
        }
        echo json_encode($result);
    }
    
    public function pelanggaran($parameter){
        if($parameter == "data"){
            $result = $this->Pelanggaran_model->tampilkanDaftarPelanggaran()->result();
        }else if($parameter == "hapus"){
            if($this->input->method() == "post"){
                $id_pelanggaran = $this->input->post("id_pelanggaran");
                $this->Pelanggaran_model->hapusPelanggaran($id_pelanggaran);
                if($this->db->affected_rows()) $result["status"] = "success";
                else $result["status"] = "error";
            }
        }else if($parameter == "jenis_pelanggaran"){
            if($this->input->method() == "post"){
                $id_jenis_pelanggaran = $this->input->post("id_jenis_pelanggaran");
                $result = $this->Pelanggaran_model->pelanggaranPilihan($id_jenis_pelanggaran);
            }
        }
        echo json_encode($result);
    }

    public function siswa($parameter, $nis = null){
        $nis = urldecode($nis);
        if($parameter == "data"){
            if($nis != null) $result = $this->Siswa_model->siswa($nis)->row();
            else $result = $this->Siswa_model->tampilkanSemuaSiswa()->result();
        }else if($parameter == "hapus"){
            if($this->input->method() == "post"){
                $nis = $this->input->post("nis");
                $this->Siswa_model->hapusSiswa($nis);
                if($this->db->affected_rows()) $result["status"] = "success";
                else $result["status"] = "error";
            }
        }
        echo json_encode($result);
    }

    public function kelas($parameter){
        if($parameter == "data"){
            $result = $this->Kelas_model->tampilkanSemuaKelas()->result();
        }else if($parameter == "hapus"){
            if($this->input->method() == "post"){
                $id_kelas = $this->input->post("id_kelas");
                $this->Kelas_model->hapusKelas($id_kelas);
                if($this->db->affected_rows()) $result["status"] = "success";
                else $result["status"] = "error";
            }
        }
        echo json_encode($result);
    }

    
    public function semester($parameter){
        if($parameter == "data"){
            $result = $this->Semester_model->tampilkanSemuaSemester()->result();
        }else if($parameter == "hapus"){
            if($this->input->method() == "post"){
                $id_semester = $this->input->post("id_semester");
                $this->Semester_model->hapusSemester($id_semester);
                if($this->db->affected_rows()) $result["status"] = "success";
                else $result["status"] = "error";
            }
        }
        echo json_encode($result);
    }

    public function penempatan_kelas($parameter){
        if($parameter == "data"){
            $result = $this->PenempatanKelas_model->tampilkanSemuaPenempatanKelas()->result();
        }else if($parameter == "hapus"){
            if($this->input->method() == "post"){
                $id_penempatan_kelas = $this->input->post("id_penempatan_kelas");
                $this->PenempatanKelas_model->hapusPenempatanKelas($id_penempatan_kelas);
                if($this->db->affected_rows()) $result["status"] = "success";
                else $result["status"] = "error";
            }
        }
        echo json_encode($result);
    }

    public function pencatatanPelanggaran($parameter){
        if($parameter == "data"){
            $result = $this->PencatatanPelanggaran_model->tampilkanPencatatanPelanggaran()->result();
        }else if($parameter == "hapus"){
            if($this->input->method() == "post"){
                $id_pencatatan = $this->input->post("id_pencatatan");
                $this->PencatatanPelanggaran_model->hapusPencatatanPelanggaran($id_pencatatan);
                if($this->db->affected_rows()) $result["status"] = "success";
                else $result["status"] = "error";
            }
        }else if($parameter == "jenis_pelanggaran"){
            if($this->input->method() == "post"){
                $id_jenis_pelanggaran = $this->input->post("id_jenis_pelanggaran");
                $result = $this->PencatatanPelanggaran_model->jenis_pelanggaran($id_jenis_pelanggaran);
            }
        }else if($parameter == "penempatan_kelas_tahun"){
            if($this->input->method() == "post"){
                $id_semester = $this->input->post("id_semester");
                // $id_kelas = $this->input->post("id_kelas");
                $result = $this->PencatatanPelanggaran_model->penempatan_kelas_tahun($id_semester);
            }
        }
        echo json_encode($result);
    }

    public function pencatatanPrestasi($parameter){ //Perhatikan fungsi yang diambil
        if($parameter == "data"){
            $result = $this->PencatatanPrestasi_model->tampilkanPencatatanPrestasi()->result();
        }else if($parameter == "hapus"){
            if($this->input->method() == "post"){
                $id_pencatatan = $this->input->post("id_pencatatan");
                $this->PencatatanPrestasi_model->hapusPencatatanPrestasi($id_pencatatan);
                if($this->db->affected_rows()) $result["status"] = "success";
                else $result["status"] = "error";
            }
        }else if($parameter == "jenis_prestasi"){
            if($this->input->method() == "post"){
                $id_jenis_prestasi = $this->input->post("id_jenis_prestasi");
                $result = $this->PencatatanPrestasi_model->jenis_prestasi($id_jenis_prestasi);
            }
        }else if($parameter == "penempatan_kelas_tahun"){
            if($this->input->method() == "post"){
                $id_semester = $this->input->post("id_semester");
                // $id_kelas = $this->input->post("id_kelas");
                $result = $this->PencatatanPrestasi_model->penempatan_kelas_tahun($id_semester);
            }
        }
        // else if($parameter == "prestasi_jenis_prestasi"){
        //     if($this->input->method() == "post"){
        //         $prestasi = $this->input->post("prestasi");
        //         // $id_kelas = $this->input->post("id_kelas");
        //         $result = $this->PencatatanPrestasi_model->prestasi_jenis_prestasi($prestasi);
        //     }
        // }
        echo json_encode($result);
    }

    public function sanksi($parameter){ //Perhatikan fungsi yang diambil
        if($parameter == "data"){
            $result = $this->Sanksi_model->tampilkanSemuaSanksi()->result();
        }else if($parameter == "hapus"){
            if($this->input->method() == "post"){
                $id_sanksi = $this->input->post("id_sanksi");
                $this->Sanksi_model->hapusSanksi($id_sanksi);
                if($this->db->affected_rows()) $result["status"] = "success";
                else $result["status"] = "error";
            }
        }
        echo json_encode($result);
    }

    public function cetakLaporanPelanggaran($parameter){
        if($parameter == "data"){
            $result = $this->Cetak_model->tampilkanInfoPelanggaran()->result();
        }
        echo json_encode($result);
    }

    public function cetakLaporanPrestasi($parameter){
        if($parameter == "data"){
            $result = $this->Cetak_model->tampilkanInfoPrestasi()->result();
        }
        echo json_encode($result);
    }
}