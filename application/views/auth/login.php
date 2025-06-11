<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="pixelstrap">
    <title>Mafen Jaya Tour Travel - Login</title>

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('assets/') ?>img/mafenlogo.png" type="image/x-icon" />
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>img/mafenlogo.png" type="image/x-icon" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Dependencies -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>admin/css/vendors/flag-icon.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>admin/css/iconly-icon.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>admin/css/themify.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>admin/css/fontawesome-min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>admin/css/vendors/weather-icons/weather-icons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>admin/css/bulk-style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>admin/css/style.css">
    <link id="color" rel="stylesheet" href="<?= base_url('assets/') ?>admin/css/color-1.css" media="screen">
</head>

<style>
    .square-logo {
        width: 50px;
        height: 50px;
        object-fit: cover;
    }

    .login-card,
    .login-dark {
        background: none !important;
    }
</style>

<body>
    <div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div>
    <div class="loader-wrapper">
        <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div class="login-main">

                            <!-- Logo -->
                            <div class="text-center mb-3">
                                <a class="logo" href="#">
                                    <img class="img-fluid for-light m-auto" src="<?= base_url('assets/') ?>img/logotopbar.png" alt="logo" style="width: 91px; height: 27px;">
                                    <img class="img-fluid for-dark" src="<?= base_url('assets/') ?>img/logotopbar.png" alt="logo" style="width: 91px; height: 27px;">
                                </a>
                            </div>

                            <!-- Flash Message -->
                            <?= $this->session->flashdata('message'); ?>

                            <!-- Login Form -->
                            <form method="post" action="<?= base_url('Auth') ?>">
                                <!-- CSRF Token (Wajib di CodeIgniter 3) -->
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" 
                                       value="<?= $this->security->get_csrf_hash(); ?>" />

                                <h2 class="text-center">Login</h2>

                                <div class="form-group">
                                    <label class="col-form-label">Nama</label>
                                    <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" placeholder="*********" id="password" name="password" required>
                                    </div>
                                </div>

                                <button class="btn btn-primary btn-block w-100 mt-3" type="submit">Login</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JS Scripts -->
        <script src="<?= base_url('assets/') ?>admin/js/vendors/jquery/jquery.min.js"></script>
        <script src="<?= base_url('assets/') ?>admin/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js" defer></script>
        <script src="<?= base_url('assets/') ?>admin/js/vendors/bootstrap/dist/js/popper.min.js" defer></script>
        <script src="<?= base_url('assets/') ?>admin/js/vendors/font-awesome/fontawesome-min.js"></script>
        <script src="<?= base_url('assets/') ?>admin/js/password.js"></script>
        <script src="<?= base_url('assets/') ?>admin/js/script.js"></script>
    </div>
</body>

</html>
