<script>
    <?php if (isset($pencatatan)) { ?>
        $("#editModal").modal();
    <?php }?>

    <?php if ($modal =='tambah') { ?>
        $("#tambahModal").modal();
    <?php }?>
    
    tampilkanData();

    function tampilkanData() {
        $("#data").empty();
        $.ajax({
            type: "get",
            url: "<?= base_url("ajax/pencatatanPelanggaran/data") ?>",  //ajax/.... /data
            dataType: "json",
            success: function(response) {
                $i = 1;
                $.each(response, function(index, value) {
                    $tr = $("<tr>").append(
                            $("<td>").text($i),
                            $("<td>").text(value.kelas +" "+ value.ruang),
                            $("<td>").text(value.nama_siswa),
                            $("<td>").text(value.pelanggaran),
                            $("<td>").text(value.skor),
                            $("<td>").text(value.pencatat),
                            $("<td>").text(value.tanggal),
                            $("<td class='text-center'><a href='<?= base_url("catat/pencatatanPelanggaran/") ?>" + value.id_pencatatan + "' class='btn btn-warning text-light mr-2'><i class='fas fa-pen'></i></a><button class='btn btn-danger' onclick='confirmHapus(" + value.id_pencatatan + ")'><i class='fas fa-trash'></i></button>"));
                            $i++;
                            $("#data").append($tr);
                });
                $("#table").DataTable(); //Menyesuaikan id pada viewnya
            }
        });
    }
    function hapus(id_pencatatan) {
        $.ajax({
            type: "post",
            url: "<?= base_url("ajax/pencatatanPelanggaran/hapus"); ?>",
            data: {
                id_pencatatan : id_pencatatan
            },
            dataType: "json",
            success: function(response) {
                if (response.status == "success") successMessage();
                else errorMessage();
                tampilkanData();
            }
        });
    }

    function confirmHapus(id_pencatatan) {
        var r = confirm("Yakin???");
        if (r == true) {
            hapus(id_pencatatan);
        } else {
            ;
        }
    }

    function successMessage() {
            $("#message").append(
                $("<div class='login100-form m-t-16 alert alert-success'>").html("<strong>Note! </strong>Pencatatan berhasil dihapus").delay(3000).slideUp(300, function() {
                    $(this).alert('close');
                })
            )
        }

    function errorMessage() {
        $("#message").append(
            $("<div class='login100-form m-t-16 alert alert-danger'><strong>").html("<strong>Note! </strong>Pencatatan gagal dihapus").delay(3000).slideUp(300, function() {
                $(this).alert('close');
            })
        )
    }

    $(".alert-success").delay(3000).slideUp(300, function() {
        $(this).alert('close');
    });
    $(".alert-danger").delay(3000).slideUp(300, function() {
        $(this).alert('close');
    });

    <?php if (validation_errors() && $modal=='tambah') { ?>
        $('#tambahModal').modal();
    <?php }else if (validation_errors()){ ?>
        $('#editModal').modal();
    <?php } ?>

    $(document).ready(function(){
        $('#id_jenis_pelanggaran2').change(function(){
            var id_jenis_pelanggaran = $('#id_jenis_pelanggaran option[value="' + $('#id_jenis_pelanggaran2').val() + '"]').data('id');
            $("#kode_pelanggaran2").val('');
            if(id_jenis_pelanggaran != '')
            {
                $.ajax({
                    type: "post",
                    url: "<?= base_url("ajax/pencatatanpelanggaran/jenis_pelanggaran");?>",
                    data: {id_jenis_pelanggaran:id_jenis_pelanggaran},
                    dataType: "json",
                    success: function (data) {
                        $("#kode_pelanggaran").html(data);
                    }
                });
            }
        });

        $('#id_semester').change(function(){
            var id_semester = $('#semester_pelanggaran option[value="' + $('#id_semester').val() + '"]').data('id');
            $("#nis").val('');
            if(id_semester != '')
            {
                $.ajax({
                    type: "post",
                    url: "<?= base_url("ajax/pencatatanPelanggaran/penempatan_kelas_tahun");?>",
                    data: {id_semester:id_semester},
                    dataType: "json",
                    success: function (data) {
                        $("#nis_pelanggaran").html(data);
                    }
                });
            }
        });
    });

    $(document).ready(function(){
        $('#id_jenis_pelanggaran3').change(function(){
            var id_jenis_pelanggaran = $('#id_jenis_pelanggaran option[value="' + $('#id_jenis_pelanggaran3').val() + '"]').data('id');
            $("#kode_pelanggaran3").val('');
            if(id_jenis_pelanggaran != '')
            {
                $.ajax({
                    type: "post",
                    url: "<?= base_url("ajax/pencatatanPelanggaran/jenis_pelanggaran");?>",
                    data: {id_jenis_pelanggaran:id_jenis_pelanggaran},
                    dataType: "json",
                    success: function (data) {
                        $("#kode_pelanggaran").html(data);
                    }
                });
            }
        });

        $('#id_semester2').change(function(){
            var id_semester = $('#semester_pelanggaran option[value="' + $('#id_semester2').val() + '"]').data('id');
            $("#nis2").val('');
            if(id_semester != '')
            {
                $.ajax({
                    type: "post",
                    url: "<?= base_url("ajax/pencatatanPelanggaran/penempatan_kelas_tahun");?>",
                    data: {id_semester:id_semester},
                    dataType: "json",
                    success: function (data) {
                        $("#nis_pelanggaran").html(data);
                    }
                });
            }
        });
    });

    $(document).ready(function(){
        
            var id_jenis_pelanggaran = $('#id_jenis_pelanggaran option[value="' + $('#id_jenis_pelanggaran3').val() + '"]').data('id');
            if(id_jenis_pelanggaran != '')
            {
                $.ajax({
                    type: "post",
                    url: "<?= base_url("ajax/pencatatanPelanggaran/jenis_pelanggaran");?>",
                    data: {id_jenis_pelanggaran:id_jenis_pelanggaran},
                    dataType: "json",
                    success: function (data) {
                        $("#kode_pelanggaran").html(data);
                    }
                });
            }
            
            // var pelanggaran = $('#kode_pelanggaran3').val();
            // if(pelanggaran != '')
            // {
            //     $.ajax({
            //         type: "post",
            //         url: "<?= base_url("ajax/pencatatanpelanggaran/pelanggaran_jenis_pelanggaran");?>",
            //         data: {pelanggaran:pelanggaran},
            //         dataType: "json",
            //         success: function (data) {
            //             $("#pelanggaran_jenis_pelanggaran").html(data);
            //         }
            //     });
            // }
        
            var id_semester = $('#semester_pelanggaran option[value="' + $('#id_semester2').val() + '"]').data('id');
            if(id_semester != '')
            {
                $.ajax({
                    type: "post",
                    url: "<?= base_url("ajax/pencatatanPelanggaran/penempatan_kelas_tahun");?>",
                    data: {id_semester:id_semester},
                    dataType: "json",
                    success: function (data) {
                        $("#nis_pelanggaran").html(data);
                    }
                });
            }
       
    });
        
    $(document).ready(function(){
        if($("#formTambah")){
            $("#formTambah").submit(function(){   
                $("#id_semester").val($('#semester_pelanggaran option[value="' + $('#id_semester').val() + '"]').data('id'));
                $("#nis").val($('#nis_pelanggaran option[value="' + $('#nis').val() + '"]').data('id'));
                $("#id_jenis_pelanggaran2").val($('#id_jenis_pelanggaran option[value="' + $('#id_jenis_pelanggaran2').val() + '"]').data('id'));
                $("#kode_pelanggaran2").val($('#kode_pelanggaran option[value="' + $('#kode_pelanggaran2').val() + '"]').data('id'));
            });
        }
        if($("#formEdit")){
            $("#formEdit").submit(function(){   
                $("#id_semester2").val($('#semester_pelanggaran option[value="' + $('#id_semester2').val() + '"]').data('id'));
                $("#nis2").val($('#nis_pelanggaran option[value="' + $('#nis2').val() + '"]').data('id'));
                $("#id_jenis_pelanggaran3").val($('#id_jenis_pelanggaran option[value="' + $('#id_jenis_pelanggaran3').val() + '"]').data('id'));
                $("#kode_pelanggaran3").val($('#kode_pelanggaran option[value="' + $('#kode_pelanggaran3').val() + '"]').data('id'));
            });
        }
    });
    
        
</script>

