<?php if (session()->has('error')): ?>
    <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif; ?>


<div class="buy-tickets">
    <h1>Comprar Tickets</h1>

    <div class="tickets-quantities">
        <button id="decrement" class="buttons">-</button>
        <h2 id="quantitie">0</h2>
        <button id="increment" class="buttons">+</button>
    </div>

    <div class="valor"> 
        <h2>R$</h2>
        <h2 class="preco">0</h2>
    </div>
</div>

</div>

<script> 
        var buttonsSetValues = document.querySelectorAll(".buttons");
        var quantitieTickets = document.querySelector("#quantitie");

        function setValueSale(button) {
            if(button.id == 'decrement' ){
                if(!(quantitieTickets.innerText == 0)) {
                    
                }
            }
        }

        buttonsSetValues.forEach(button => {
            setValueSale(button);
        })

        console.log(buttonsSetValues)

</script>