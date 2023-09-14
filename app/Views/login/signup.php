<?php if (session()->has('error')): ?>
    <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif; ?>

<?= form_open('signup'); ?>

    <div class="auth">
        <div class="form-floating mb-3">
            <input required type="text" class="form-control" id="name" name="name" placeholder="name@example.com">
            <label for="name">Nome</label>
        </div>

        <div class="form-floating mb-3">
            <input required type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            <label for="email">Email</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
            <label for="pass">Senha</label>
        </div>
        
        <button class="btn btn-primary" type="submit">Cadastrar</button>

    </div>
<?= form_close(); ?>