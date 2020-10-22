<script>
    <?php if (isset($pelanggaran)) { ?>
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
            url: "<?= base_url("ajax/pelanggaran/data")?>",
            dataType: "json",
            success: function (response) {
                $i = 1;
                $.each(response, function(index, value){
                    $tr = $("<tr>").append(
                        $("<td>").text($i),
                        $("<td>").text(value.kode_pelanggaran),
                        $("<td>").text(value.jenis_pelanggaran),
                        $("<td>").text(value.pelanggaran),
                        $("<td>").text(value.skor),
                        $("<td class='text-center'><a href='<?= base_url("kelola/pelanggaran/") ?>" + value.kode_pelanggaran + "' class='btn btn-warning text-light mr-2'><i class='fas fa-pen'></i></a><button class='btn btn-danger' onclick='hapusPelanggaran(\"" + value.kode_pelanggaran + "\")'><i class='fas fa-trash'></i></button>"));
                        $i++;
                        $("#data").append($tr);
                });
                $("#table").DataTable();
            }
        });
    }

    function hapusPelanggaran(id_pelanggaran){
        $.ajax({
            type: "post",
            url: "<?= base_url("ajax/pelanggaran/hapus");?>",
            data: {id_pelanggaran: id_pelanggaran},
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
                $("<div class='login100-form m-t-16 alert alert-success'>").html("<strong>Note! </strong>Pelanggaran berhasil dihapus").delay(3000).slideUp(300, function() {
                    $(this).alert('close');
                })
            )
        }

    function errorMessage() {
        $("#message").append(
            $("<div class='login100-form m-t-16 alert alert-danger'>").html("<strong>Note! </strong>Pelanggaran gagal dihapus").delay(3000).slideUp(300, function() {
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
        $('#id_jenis_pelanggaran').change(function(){
            var id_jenis_pelanggaran = $('#id_jenis_pelanggaran').val();
            if(id_jenis_pelanggaran != '')
            {
                $.ajax({
                    type: "post",
                    url: "<?= base_url("ajax/pelanggaran/jenis_pelanggaran");?>",
                    data: {id_jenis_pelanggaran:id_jenis_pelanggaran},
                    dataType: "json",
                    success: function (data) {
                        $("#kode_pelanggaran").html(data);
                    }
                });
            }
        });
    });
    
</script>
