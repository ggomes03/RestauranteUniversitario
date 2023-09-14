
<?php if (session()->has('error')): ?>
    <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif; ?>

<?= form_open('authentication'); ?>
<div class="auth">

    <div class="container-auth">
        <div class="form-floating mb-3">
            <input required type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            <label for="email">Email</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
            <label for="pass">Senha</label>
        </div>


    </div>
<button class="btn btn-primary" type="submit">Login</button>

<a href="<?= base_url('register')?>">Cadastre-se</a>

</div>
<?= form_close(); ?> 
