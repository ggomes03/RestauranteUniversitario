<?php 

?>

<div class="container-form">

<?= form_open('defineQuantities'); ?>
    <h1>Quantidades Permitidas</h1>
    <div class="container">
        <label for="">Quantidade permitida para compra</label>
        <input class="form-control" type="number" name="allowedAmountSale" id="allowedAmountSale" min="0">
    </div>

    <div class="container">
        <label for="">Quantidade permitida para validação</label>
        <input class="form-control" required type="number" name="allowedAmountValidate" id="allowedAmountValidate" min="0">
    </div>

    <button class="btn btn-primary" type="submit">Definir Regra</button>



<?= form_close(); ?> 

</div>