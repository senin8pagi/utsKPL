<script>
    <?php if (isset($jenis_prestasi)) { ?>
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
            url: "<?= base_url("ajax/jenis_prestasi/data")?>",
            dataType: "json",
            success: function (response) {
                $i = 1;
                $.each(response, function(index, value){
                    $tr = $("<tr>").append(
                        $("<td>").text($i),
                        $("<td>").text(value.jenis_prestasi),
                        $("<td class='text-center'><a href='<?= base_url("kelola/jenis_prestasi/") ?>" + value.id_jenis_prestasi + "' class='btn btn-warning text-light mr-2'><i class='fas fa-pen'></i></a><button class='btn btn-danger' onclick='hapusJenisPrestasi(\"" + value.id_jenis_prestasi + "\")'><i class='fas fa-trash'></i></button>"));
                        $i++;
                        $("#data").append($tr);
                });
                $("#table").DataTable();
            }
        });
    }

    function hapusJenisPrestasi(id_jenis_prestasi){
        $.ajax({
            type: "post",
            url: "<?= base_url("ajax/jenis_prestasi/hapus");?>",
            data: {id_jenis_prestasi: id_jenis_prestasi},
            dataType: "json",
            success: function (response) {
                if (response.status == "success") successMessage();
                else errorMessage();
                tampilkanData();
            }
        });
    }

    function successMessage() {
            $("#message").append(
                $("<div class='login100-form m-t-16 alert alert-success'>").html("<strong>Note! </strong>Jenis Prestasi berhasil dihapus").delay(3000).slideUp(300, function() {
                    $(this).alert('close');
                })
            )
        }

    function errorMessage() {
        $("#message").append(
            $("<div class='login100-form m-t-16 alert alert-danger'>").html("<strong>Note! </strong>Jenis Jenis Prestasi gagal dihapus").delay(3000).slideUp(300, function() {
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
