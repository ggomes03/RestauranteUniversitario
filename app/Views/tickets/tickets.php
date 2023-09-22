<?php 

use \App\Models\TicketsModel;

$TicketsModel = new TicketsModel;

?> 
<div class="container-form">

    <?php if (session()->has('success')): ?>
        <div class="alert alert-success"><?= session('success') ?></div>
    <?php endif; ?>

    <?= form_open('insertTickets'); ?>
    <div class="container">
        <label for="number">Valor</label>
        <input required class="form-control" min="0" type="number" name="valueTicket" id="valueTicket" step="0.01">
    </div>


    <div class="container">
        <label for="validity">Validade</label>
        <input required class="form-control" type="date" name="validity" id="validity">
        
    </div>

    <div  class="container">
        <label for="quantity">Quantidade</label>
        <input required class="form-control" min="0" type="number" name="quantity" id="quantity">        
    </div>

    <div class="container-promo">
        <label for="">Promoção:</label>

        <div class="form-check">
            <input class="form-check-input sale" value="1" type="radio" name="sale" id="yes">
            <label class="form-check-label" for="yes">
                Sim
            </label>
        </div>
 
        <div class="form-check">
            <input class="form-check-input sale" value="0" type="radio" name="sale" id="no" checked>
            <label class="form-check-label" for="no">
                Não
            </label>
        </div>

    </div>

    <div class="sale-container" style="display: none;">
        <label for="idSale">Promoção:</label>
        <select required class="form-select" name="idSale" id="idSale">
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

    <button class="btn btn-primary" type="submit">Gerar Tickets</button>

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