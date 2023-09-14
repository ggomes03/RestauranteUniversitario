<?php 

$tickets = 'https://localhost/RestauranteUniversitario/public/index.php/tickets';
$createTickets = 'https://localhost/RestauranteUniversitario/public/index.php/createTickets';

use \App\Models\TicketsModel;

$TicketsModel = new TicketsModel;
?> 
<div class="container-form">

<?php
if(current_url() == $tickets) {?>
<?= form_open('defineQuantities'); ?>
    <div>
        <label for="">Quantidade permitida de tickets que cada usuário pode comprar:</label>
        <input required type="text" name="allowedAmountSale" id="allowedAmountSale">
    </div>

    <div>
        <label for="">Quantidade permitida de tickets que cada usuário pode validar por dia:</label>
        <input required type="text" name="allowedAmountValidate" id="allowedAmountValidate">
    </div>

    <button type="submit">Definir Regra</button>


<?= form_close(); ?> 

<?php } else if (current_url() == $createTickets){?>

    <?php if (session()->has('success')): ?>
        <div class="alert alert-success"><?= session('success') ?></div>
    <?php endif; ?>

    <?= form_open('insertTickets'); ?>
    <div>
        <label for="number">Valor</label>
        <input type="number" name="valueTicket" id="valueTicket">
    </div>

    <div>
        <label for="validity">Validade</label>
        <input type="date" name="validity" id="validity">
        
    </div>

    <div>
        <label for="quantity">Quantidade</label>
        <input type="number" name="quantity" id="quantity">        
    </div>

    <div>
        <label for="">Promoção:</label>
        <input value="1" type="radio" name="sale" id="yes" class="sale">
        <label for="yes">Sim</label>
        <input checked value="0" type="radio" name="sale" id="no" class="sale">
        <label for="no">Não</label>
    </div>


    <div class="sale-container" style="display: none;">
        <label for="idSale">Promoção:</label>
        <select name="idSale" id="idSale">
            <option value="0">selecione uma promoção</option>
            <?php
            $sales = $TicketsModel->getSales();
            foreach ($sales as $sale) { ?>
                <option value='<?= $sale->idpromocoes ?>'>  
                    <?= 'inicio:' . date('d/m/Y',strtotime($sale->inicioPromocao)) . '  fim:' . date('d/m/Y', strtotime($sale->fimPromocao)) ?>
                </option>;
            <?php } ?>
        </select>

    </div>

    <button type="submit">Gerar Tickets</button>

    <script>
        var inputRadio = document.querySelectorAll('.sale');
        var containerSale = document.querySelector('.sale-container');
        inputRadio.forEach(radio => {
            radio.addEventListener('click', function(){
                if(radio.checked && radio.value == 1){
                    containerSale.style.display = 'block';
                } else if(radio.checked && radio.value == 0){
                    containerSale.style.display = 'none';   
                }
            });
        });
    </script>

    
    <?= form_close(); ?>

    </div>
<?php } ?>