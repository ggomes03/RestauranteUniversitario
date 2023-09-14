<?php if (session()->has('success')): ?>
    <div class="alert alert-success"><?= session('success') ?></div>
<?php endif; ?>

<div class="container-form">

<?= form_open('createSale');?>

    <div>
        <label for="valueSale">Valor Promoção:</label>
        <input required type="number" name="valueSale" id="valueSale">

    </div>

    <div>
        <label for="dateStart">Data Início:</label>
        <input required type="date" name="dateStart" id="dateStart">
    </div>

    <div>
        <label for="dateEnd">Data Fim:</label>
        <input required type="date" name="dateEnd" id="dateEnd">

    </div>

    
    
    <button type="submit">Criar Promoção</button>

<?= form_close('');?>

</div>