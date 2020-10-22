<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/custom.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/font-awesome/css/all.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/sticky-footer.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/floating-labels.css") ?>">
    <title><?= $title?></title>
</head>

<body class="bg-white" style="margin-top:100px;margin-buttom:1000px; background-image: url('<?= base_url("assets/images/classroom.jpg") ?>'); zoom: 80%;">
    <div class="container bg-light pb-5 pt-5" id="content" sytle="margin-top:200px;">
        
        <div class="row justify-content-center">
            <div class="col-md-10 col-sm-6 mb-3 mt-3" style="text-align: center;">
            <marquee behavior=" " direction="left"><h1>SELAMAT DATANG DI APLIKASI PENCATATAN SKOR PELANGGARAN DAN PRESTASI SISWA SMA MARDISISWA SEMARANG</h1></marquee>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10">
                </br><hr>
            </div>
        </div>                    
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 col-sm-6">
                <div class="card bg-white" style="height:390px;padding:25px 50px 50px 50px;">
                    <img src="<?= base_url("assets/images/marwa.jpeg") ?>" class="card-img-center" max-width="100%" height="auto">
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-6">
                <form class="form-signin" method="post">
                    <div class="text-center mb-4">
                        <h1 class="h3 mb-3 font-weight-normal">
                            Halaman Login <br> SMA MARDISISWA</h1>                     
                        <hr>
                        </br>
                        <h6><span>---- Silahkan Masuk ----</span></h6>
                    </div>
                    <div class="form-group">
                        <label for="nip">NIP :</label>
                        <input type="text" name="nip" class="form-control" placeholder="NIP" data-validate="Username is required" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Password :</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" data-validate="Username is required" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                    </div>
                    <?php if(isset($message)){?>
                        <div class="alert alert-danger" role="alert">
                            <?=$message;?>
                        </div>
                    <?php }?>
                </form>
            </div>
        </div>
    </div>
    <footer class="fixed-bottom bd-footer text-light bg-dark footer mt-auto">
        <div class="footer-copyright text-center py-3">Copyright © 2020<a href="<?= base_url("tentang-kami") ?>"> AntThoq </a></div>
    </footer>
</body>

</html>