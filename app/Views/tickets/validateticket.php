<?php if (session()->has('success')): ?>
    <div class="alert alert-success"><?= session('success') ?></div>
<?php endif; ?>

<?php if (session()->has('error')): ?>
    <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif; ?>

<div class="container-form">

<?= form_open('validate'); ?>

    <div>
        <label for="codTicket">Código:</label>
        <input required type="text" name="codTicket" id="codTicket">
    </div>
    <div>
    <button type="submit">Validar Ticket</button>
    </div>
<?= form_close();?>

</div>