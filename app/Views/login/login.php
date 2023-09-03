
<?php if (session()->has('error')): ?>
    <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif; ?>

<?= form_open('auth'); ?>

<input type="email" name ="email" id="email">
<input type="password" name="pass" id="pass">

<button type="submit">Login</button>

<a href="<?= base_url('register')?>">Cadastre-se</a>

<?= form_close(); ?> 

