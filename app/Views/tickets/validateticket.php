<?php if (session()->has('success')): ?>
    <div class="alert alert-success"><?= session('success') ?></div>
<?php endif; ?>

<?php if (session()->has('error')): ?>
    <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif; ?>

<div class="container-form">

<?= form_open('validate'); ?>

    <div class="container">
        <label for="codTicket">Código:</label>
        <input required class="form-control" type="text" name="codTicket" id="codTicket">
    </div>
    
    <button class="btn btn-primary" type="submit">Validar Ticket</button>
    
<?= form_close();?>

</div>