<script>
    <?php if (isset($penempatan_kelas)) { ?>
        $("#editModal").modal();
    <?php
    } ?>

    <?php if ($modal =='tambah') { ?>
        $("#tambahModal").modal();
    <?php }?>
    
    tampilkanData();
    function tampilkanData(){
        $("#data").empty();
        $.ajax({
            type: "get",
            url: "<?= base_url("ajax/penempatan_kelas/data")?>",
            dataType: "json",
            success: function (response) {
                $i = 1;
                $.each(response, function(index, value){
                    $tr = $("<tr>").append(
                        $("<td>").text($i),
                        $("<td>").text(value.tanggal_mulai + " s/d " +value.tanggal_selesai),
                        $("<td>").text(value.nis),
                        $("<td>").text(value.nama_siswa),
                        $("<td>").text(value.kelas +' '+value.ruang),
                        $("<td class='text-center'><a href='<?= base_url("kelola/penempatan_kelas/") ?>" + value.id_penempatan_kelas + "' class='btn btn-warning text-light mr-2'><i class='fas fa-pen'></i></a><button class='btn btn-danger' onclick='confirmHapus(" + value.id_penempatan_kelas + ")'><i class='fas fa-trash'></i></button>")
                        );
                        $i++;
                        $("#data").append($tr);
                });
                $("#table").DataTable();
            }
        });
    }

    function hapusPenempatanKelas(id_penempatan_kelas){
        $.ajax({
            type: "post",
            url: "<?= base_url("ajax/penempatan_kelas/hapus");?>",
            data: {id_penempatan_kelas: id_penempatan_kelas},
            dataType: "json",
            success: function (response) {
                if (response.status == "success") successMessage();
                else errorMessage();
                tampilkanData();
            }
        });
    }

    function confirmHapus(id_penempatan_kelas) {
        var r = confirm("Yakin???");
        if (r == true) {
            hapusPenempatanKelas(id_penempatan_kelas);
        } else {
            ;
        }
    }

    function successMessage() {
            $("#message").append(
                $("<div class='login100-form m-t-16 alert alert-success'>").html("<strong>Note! </strong>Penempatan Kelas berhasil dihapus").delay(3000).slideUp(300, function() {
                    $(this).alert('close');
                })
            )
        }

    function errorMessage() {
        $("#message").append(
            $("<div class='login100-form m-t-16 alert alert-danger'>").html("<strong>Note! </strong>Penempatan Kelas gagal dihapus").delay(3000).slideUp(300, function() {
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

    // $("#nis_siswa").change(function() {
    //     var city_id = $('#nis option[value="' + $('#nis_siswa').val() + '"]').data('id');
    //     alert(city_id);
    // }).change();

    $(document).ready(function(){
        if($("#formTambah")){
            $("#formTambah").submit(function(){   
                $("#nis_siswa").val($('#nis option[value="' + $('#nis_siswa').val() + '"]').data('id'));
                $("#id_kelas").val($('#kelas option[value="' + $('#id_kelas').val() + '"]').data('id'));
                $("#id_semester").val($('#semester option[value="' + $('#id_semester').val() + '"]').data('id'));
            });
        }
        if($("#formEdit")){
            $("#formEdit").submit(function(){   
                $("#nis_siswa2").val($('#nis option[value="' + $('#nis_siswa2').val() + '"]').data('id'));
                $("#id_kelas2").val($('#kelas option[value="' + $('#id_kelas2').val() + '"]').data('id'));
                $("#id_semester2").val($('#semester option[value="' + $('#id_semester2').val() + '"]').data('id'));
            });
        }
    });

   

       
</script>
