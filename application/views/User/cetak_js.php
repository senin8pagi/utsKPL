<script>
    $("table").DataTable();
    
    function cetak(idTabel){
        var newWin = window.open("");
        newWin.document.write('<link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.css") ?>">');
        newWin.document.write("<div class='container'>");
        newWin.document.write('<div class="col text-center mt-2"><h3><b>Informasi Skor Siswa</b></h3></div>');
        newWin.document.write(document.getElementById(idTabel).outerHTML);
        newWin.document.write("</div>");
        newWin.document.write("<script>window.print()");
        newWin.document.close();
        newWin.print();
    }
</script>