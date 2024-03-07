<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?= base_url() ?>/assets/login/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/login/libs/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/login/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/login/images/logo1.jpeg" />
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body style="background-color:#E5E5E5;">
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card " style="background-color: black;">
            <div class="card-header text-center" style="background-color: black;"><a href="#"><img src="<?= base_url('assets/img/logo.png') ?>" style="width:100px; height:100px" class=""></div>
            <div class="card-body">

                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('auth'); ?>" method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" type="text" name="username" placeholder="Nama Pengguna" autocomplete="off">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>

                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" type="password" name="password" placeholder="Kata Sandi">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">

                    </div>
                    <button type="submit" class="btn btn-danger btn-lg btn-block " style="background-color: #A51919;">Masuk</button>
                </form>
            </div>
            <div class="card-footer text-center" style="background-color: black;">
                <p>

                    <a href=""><img src="<?= base_url('assets/img/instagram.png') ?>" alt="" width="50px"></a>
                    <a href=""><img src="<?= base_url('assets/img/fb.png') ?>" alt="" width="50px"></a>
                    <a href=""><img src="<?= base_url('assets/img/tt.png') ?>" alt="" width="50px"></a>
                </p>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="<?= base_url() ?>/assets/login/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>/assets/login/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>