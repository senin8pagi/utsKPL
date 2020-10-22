<script>
    <?php if (isset($siswa)) { ?>
        $("#editModal").modal();
    <?php
    } ?>
    
    <?php if ($modal =='tambah') { ?>
        $("#tambahModal").modal();
    <?php }?>

    tampilkanDataSiswa();
    function tampilkanDataSiswa(){
        $("#data").empty();
        $.ajax({
            type: "get",
            url: "<?= base_url("ajax/siswa/data")?>",
            dataType: "json",
            success: function (response) {
                $i = 1;
                $.each(response, function(index, value){
                    $tr = $("<tr>").append(
                        $("<td>").text($i),
                        $("<td>").text(value.nis),
                        $("<td>").text(value.nama),
                        $("<td>").text(value.jenis_kelamin),
                        $("<td class='text-center'><a href='<?= base_url("kelola/siswa/") ?>" + value.nis + "' class='btn btn-warning text-light mr-2'><i class='fas fa-pen'></i></a><button class='btn btn-danger' onclick='confirmHapus(\"" + value.nis + "\")'><i class='fas fa-trash'></i></button>"));
                        $i++;
                        $("#data").append($tr);
                });
                $("#table").DataTable();
            }
        });
    }

    function hapus(nis){
        $.ajax({
            type: "post",
            url: "<?= base_url("ajax/siswa/hapus");?>",
            data: {nis: nis},
            dataType: "json",
            success: function (response) {
                if (response.status == "success") successMessage();
                else errorMessage();
                tampilkanDataSiswa();
            }
        });
    }

    function confirmHapus(nis) {
        var r = confirm("Yakin???");
        if (r == true) {
            hapus(nis);
        } else {
            ;
        }
    }

    function successMessage() {
            $("#message").append(
                $("<div class='login100-form m-t-16 alert alert-success'>").html("<strong>Note! </strong>Siswa berhasil dihapus").delay(3000).slideUp(300, function() {
                    $(this).alert('close');
                })
            )
        }

    function errorMessage() {
        $("#message").append(
            $("<div class='login100-form m-t-16 alert alert-danger'>").html("<strong>Note! </strong>Siswa gagal dihapus").delay(3000).slideUp(300, function() {
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
</script>
