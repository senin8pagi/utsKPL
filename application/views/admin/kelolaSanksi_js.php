<script>
    <?php if (isset($sanksi)) { ?>
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
            url: "<?= base_url("ajax/sanksi/data")?>",
            dataType: "json",
            success: function (response) {
                $i = 1;
                $.each(response, function(index, value){
                    $tr = $("<tr>").append(
                        $("<td>").text($i),
                        $("<td>").text(value.batas_bawah_poin +" - "+value.batas_atas_poin),
                        $("<td>").text(value.tindak_lanjut),
                        $("<td>").text(value.sanksi),
                        $("<td class='text-center'><a href='<?= base_url("kelola/sanksi/") ?>" + value.id_sanksi + "' class='btn btn-warning text-light mr-2'><i class='fas fa-pen'></i></a><button class='btn btn-danger' onclick='confirmHapus(" + value.id_sanksi + ")'><i class='fas fa-trash'></i></button>")
                        );
                        $i++;
                        $("#data").append($tr);
                });
                $("#table").DataTable();
            }
        });
    }

    function hapusSanksi(id_sanksi){
        $.ajax({
            type: "post",
            url: "<?= base_url("ajax/sanksi/hapus");?>",
            data: {id_sanksi: id_sanksi},
            dataType: "json",
            success: function (response) {
                if (response.status == "success") successMessage();
                else errorMessage();
                tampilkanData();
            }
        });
    }

    function confirmHapus(id_sanksi) {
        var r = confirm("Yakin???");
        if (r == true) {
            hapusSanksi(id_sanksi);
        } else {
            ;
        }
    }

    function successMessage() {
            $("#message").append(
                $("<div class='login100-form m-t-16 alert alert-success'>").html("<strong>Note! </strong>Sanksi berhasil dihapus").delay(3000).slideUp(300, function() {
                    $(this).alert('close');
                })
            )
        }

    function errorMessage() {
        $("#message").append(
            $("<div class='login100-form m-t-16 alert alert-danger'>").html("<strong>Note! </strong>Sanksi gagal dihapus").delay(3000).slideUp(300, function() {
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
