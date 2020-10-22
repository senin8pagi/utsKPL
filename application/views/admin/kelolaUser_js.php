<script>
    <?php if (isset($result)) { ?>
        $("#editModal").modal();
    <?php }?>

    <?php if ($modal =='tambah') { ?>
        $("#tambahModal").modal();
    <?php }?>
    
    <?php if ($modal =='password') { ?>
        $("#changePassword").modal();
    <?php }?>
    
    tampilkanData();

    function tampilkanData() {
        $("#data").empty();
        $.ajax({
            type: "get",
            url: "<?= base_url("ajax/guru/data") ?>",
            dataType: "json",
            success: function(response) {
                $i = 1;
                $.each(response, function(index, value) {
                    $tr = $("<tr>").append(
                        $("<td>").text($i),
                        $("<td>").text(value.nip),
                        $("<td>").text(value.nama),
                        $("<td>").text(value.jenis_kelamin),
                        $("<td>").text(value.alamat),
                        $("<td>").text(value.jabatan),
                        $("<td class='text-center'><a href='<?= base_url("kelola/user/") ?>" + value.nip + "' class='btn btn-warning text-light mr-2 text-center'><i class='fas fa-pen'></i></a><a href='<?= base_url("kelola/user/password/") ?>" + value.nip + "' class='btn btn-primary text-light mr-2 text-center'><i class='fas fa-key'></i></a><button class='btn btn-danger' onclick='confirmHapus(\"" + value.nip + "\")'><i class='fas fa-trash'></i></button>"));
                    $i++;
                    $("#data").append($tr);
                });
                $("#table").DataTable();
            }
        });
    }
   
    function hapus(nip) {
        $.ajax({
            type: "post",
            url: "<?= base_url("ajax/guru/hapus"); ?>",
            data: {
                nip: nip
            },
            dataType: "json",
            success: function(response) {
                if (response.status == "success") successMessage();
                else errorMessage();
                tampilkanData();
            }
        });
    }
    <?php if ($this->session->userdata("nip") == "admin") { ?>
        function confirmHapus(nip) {
            if(nip != 'admin'){
                var r = confirm("Yakin???");
                if (r == true) {
                    hapus(nip);
                } else {
                    ;
                }
            }
        }
    <?php } ?>
    function successMessage() {
            $("#message").append(
                $("<div class='login100-form m-t-16 alert alert-success'>").html("<strong>Note! </strong>Guru berhasil dihapus").delay(3000).slideUp(300, function() {
                    $(this).alert('close');
                })
            )
        }

    function errorMessage() {
        $("#message").append(
            $("<div class='login100-form m-t-16 alert alert-danger'><strong>").html("<strong>Note! </strong>Guru gagal dihapus").delay(3000).slideUp(300, function() {
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

    $(document).ready(function(){
        $("#icon-click").click(function(){
            $("#icon").toggleClass('fa-eye-slash');
            var input = $("#password");
            if(input.attr("type")==="password"){
                input.attr("type","text");
            }else{
                input.attr("type","password");
            }
        });
    });

    $(document).ready(function(){
        $("#icon-click-edit").click(function(){
            $("#icon-edit").toggleClass('fa-eye-slash');
            var input = $("#password_edit");
            if(input.attr("type")==="password"){
                input.attr("type","text");
            }else{
                input.attr("type","password");
            }
        });
    });
   
    <?php if (validation_errors() && $modal=='tambah') { ?>
        $('#tambahModal').modal();
    <?php }else if (validation_errors()){ ?>
        $('#editModal').modal();
    <?php } ?>
    
</script>