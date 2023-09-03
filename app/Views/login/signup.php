<?php if (session()->has('error')): ?>
    <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif; ?>

<?= form_open('signup'); ?>
    <label for="name">Nome:</label>
    <input name="name" type="text">
    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email">

    <label for="pass">Senha:</label>
    <input type="password" name="pass" id="pass">

    <button type="submit">Cadastrar</button>
<?= form_close(); ?>