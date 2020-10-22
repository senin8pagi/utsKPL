<!DOCTYPE html>
<html>
<head>
    <title><?= $title?></title>
    <!-- Custom fonts for this template-->
    <!-- <link href="<?= base_url() ?>assets/font-awesome/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <!-- Page level plugin CSS-->
    <!-- <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet"> -->
    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin.css" rel="stylesheet">
    <style>
        .line-title{
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
        #tabel_cetak_prestasi th {
            background-color: #03adfc;
            color: black;
        }
        #tabel_cetak_prestasi tr:nth-child(even) {background-color: #f2f2f2;}
    </style>

</head>
<body style="margin: 3em 3em 3em 4em;">
    <img src="assets/images/marwa.jpeg" class="rounded ml-3" style="position: absolute; width: 100px; height: auto;">
    <table style="width: 100%">
        <tr>
            <td class="text-center ml-3">
                <span style="line-hight: 0.1; font-weight: bold;">
                    YAYASAN CATUR PRAYA TUNGGAL
                    <br>SMA MARDISISWA SEMARANG<br>
                    Terakreditasi "A"
                    <p style="font-size: 10px;">Jln. Sukun Raya No 45 Srondol Wetan Banyumanik Kota Semarang 50263<br>Telephone: (024) 7471629 Email: sma_mardisiswa@yahoo.co.id</p>
                    <hr class="line-title">
                </span>
            </td>
        <tr>
    </table>

<!-- DataTables Example -->
    <div class="text-center">
        <p><h5><b>Laporan Skor Kelas <?php if(isset($info_kelas)) echo $info_kelas->kelas." ".$info_kelas->ruang; else echo "'Semua Kelas'"; ?></b><h5></p>
    </div>
    
        <!-- <div class="card-header"><i class="fas fa-table"></i> Tabel Skor Prestasi</div> -->
    <div class="table-responsive ml-3">
        <table class="table table-bordered" id="tabel_cetak_prestasi" name="tabel_cetak_prestasi" width="100%" cellspacing="0" style="font-size: 13px;">
        <!-- edited table-->
            
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Total Skor</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($info_total->result() as $row){?>
            <tr style="font-size: 11px;">
                <td><?php echo $i++ ?></td>	
                <td><?php echo $row->nis ?></td>
                <td><?php echo $row->nama_siswa ?></td>	
                <td><?php echo $row->total_skor ?></td>	
            </tr>
            <?php } ?>	
            
        </table>
    </div>
</body>
</html>