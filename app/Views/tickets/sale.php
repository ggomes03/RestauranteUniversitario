<?php if (session()->has('success')): ?>
    <div class="alert alert-success"><?= session('success') ?></div>
<?php endif; ?>

<div class="container-form">

<?= form_open('createSale');?>

    <div class="container">
        <label for="valueSale">Valor Promoção:</label>
        <input required class="form-control" type="number" name="valueSale" id="valueSale" min="0" step="0.01">

    </div>

    <div class="container">
        <label for="dateStart">Data Início:</label>
        <input class="form-control" required type="date" name="dateStart" id="dateStart">
    </div>

    <div class="container">
        <label for="dateEnd">Data Fim:</label>
        <input class="form-control" required type="date" name="dateEnd" id="dateEnd">

    </div>

    
    
    <button class="btn btn-primary" type="submit">Criar Promoção</button>

<?= form_close('');?>

</div>