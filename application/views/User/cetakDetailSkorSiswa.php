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
            font-size: 11px;
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
        <p><h5><b>Riwayat Skor Siswa</b><h5></p>
    </div>
    <div style="background-color:#f5f5f5;font-size: 12px;" class="ml-3">
    <p class="ml-2">NAMA : <?= strtoupper($siswa->nama)?></p>
    <p class="ml-2">NIS &emsp;: <?= $siswa->nis?></p>
    </div>
        <!-- <div class="card-header"><i class="fas fa-table"></i> Tabel Skor Prestasi</div> -->
    <div class="table-responsive ml-3">
        <table class="table table-bordered" id="tabel_cetak_prestasi" name="tabel_cetak_prestasi" width="100%" cellspacing="0" style="font-size: 13px;">
            <!-- edited table-->
            <tr>
                <th style="font-weight:bold;font-size: 11px;background: lightgrey; text-align:center;" colspan="5">Riwayat Prestasi Siswa </th>
            </tr>
            <tr>
                <th>No</th>
                <!-- <th>Kelas</th>
                <th>Nama Siswa</th> -->
                <!-- <th>Pelanggaran</th> -->
                <th>Prestasi</th>
                <th>Skor</th>
                <th>Pencatat</th>
                <!-- <th>Semester</th> -->
                <th>Tanggal Catat</th>
            </tr>
            <?php if($prestasi_siswa->result() == NULL){?>
            <tr style="font-size: 11px;">
                <td colspan="5" style="text-align:center">--Tidak Ada Prestasi--</td>	
            </tr>
            <?php }?>
            <?php $i = 1; ?>
            <?php foreach($prestasi_siswa->result() as $row){?>
            <tr style="font-size: 11px;">
                <td><?php echo $i++ ?></td>	
                <!-- <td><?php echo $row->kelas." ".$row->ruang ?></td>
                <td><?php echo $row->nama_siswa ?></td>	 -->
                <td><?php echo $row->prestasi ?></td>
                <td><?php echo $row->skor ?></td>	
                <td><?php echo $row->pencatat ?></td>	
                <td><?php echo $row->tanggal ?></td>		
            </tr>
            <?php }?>
            <tr>
                <th style="font-weight:bold;font-size: 11px;background: lightgrey; text-align:center;" colspan="5">Riwayat Pelanggaran Siswa</th>
            </tr>
			<tr>
                <th>No</th>
                    <!-- <th>Kelas</th>
                    <th>Nama Siswa</th> -->
					<!-- <th>Pelanggaran</th> -->
                    <th>Pelanggaran</th>
					<th>Skor</th>
                    <th>Pencatat</th>
					<!-- <th>Semester</th> -->
					<th>Tanggal Catat</th>
            </tr>
            <?php if($pelanggaran_siswa->result() == NULL){?>
                <tr style="font-size: 11px;">
                    <td colspan="5" style="text-align:center">--Tidak Ada Prestasi--</td>	
                </tr>
            <?php }?>
            <?php $i = 1; ?>
            <?php foreach($pelanggaran_siswa->result() as $row){?>
            <tr style="font-size: 11px;">
                <td><?php echo $i++ ?></td>	
                <!-- <td><?php echo $row->kelas." ".$row->ruang ?></td>
                <td><?php echo $row->nama_siswa ?></td>	 -->
                <td><?php echo $row->pelanggaran ?></td>
                <td><?php echo $row->skor ?></td>	
                <td><?php echo $row->pencatat ?></td>	
                <td><?php echo $row->tanggal ?></td>		
            </tr>
            <?php }?>	
        </table>
    </div>
</body>
</html>