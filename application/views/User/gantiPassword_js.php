<script>
 function successMessage() {
            $("#message").append(
                $("<div class='login100-form m-t-16 alert alert-success'>").html("<strong>Note! </strong>Kelas berhasil dihapus").delay(3000).slideUp(300, function() {
                    $(this).alert('close');
                })
            )
        }

    function errorMessage() {
        $("#message").append(
            $("<div class='login100-form m-t-16 alert alert-danger'>").html("<strong>Note! </strong>Kelas gagal dihapus").delay(3000).slideUp(300, function() {
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
            var input = $("#password_sekarang");
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

    $(document).ready(function(){
        $("#icon-click-edit2").click(function(){
            $("#icon-edit2").toggleClass('fa-eye-slash');
            var input = $("#konfirmasi_password");
            if(input.attr("type")==="password"){
                input.attr("type","text");
            }else{
                input.attr("type","password");
            }
        });
    });
</script>