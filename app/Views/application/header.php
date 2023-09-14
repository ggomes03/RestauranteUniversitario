<!DOCTYPE html>
<html>
<head>
    <title>RU</title>
    <link rel="shortcut icon" href="<?= base_url('images/prato.png')?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url('css/header.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <nav class="navbar bg-primary" data-bs-theme="dark">
        <div class="container-header logo">
            <a class="navbar-brand" href="<?= base_url('/') ?>">
            <img src="<?= base_url('images/prato.png')?>" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            Restaurante Universitário
            </a>
        </div>


        <div class="container-header">
            <?php 
                $user = session()->get('user');
                if($user){
                    if($user->tipoUsuario == 2) {
                        if(current_url() != 'https://localhost/RestauranteUniversitario/public/index.php/prad' ){ ?>
                            <ul class="">
                                <li>
                                    <a href="<?= base_url('prad')?>">Painel Administrador</a>
                                </li>
                            </ul>
            <?php }}}?>
        </div>

        <div class="container-header">
            <?php 
            
            if($user){ ?>
                <ul class="user">
                    <li>
                        <?= $user->nome; ?>
                    </li>
                    <li>
                        <a href="<?= base_url('logout') ?>">Logout</a>
                    </li>
                </ul>
            <?php } else { ?>
                <ul class="btn-login">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('login')?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('register')?>">Cadastre-se</a>
                    </li>
                </ul>
            <?php }?>
        </div>
    </nav>


