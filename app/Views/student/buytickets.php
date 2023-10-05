<?php if (session()->has('error')): ?>
    <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif; ?>



    <?= form_open(''); ?>
        <div class="buy-tickets">
            <h1>Comprar Tickets</h1>

            <div class="tickets-quantities">
                <button id="decrement" class="greg-button buttons" circle="" primary="" type="button" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <rect class="svg" width="14" height="2" x="5" y="11" fill="#ffffff" fill-rule="evenodd" rx="1"></rect>
                    </svg>
                </button>
                <h2 id="quantitie">1</h2>
                <button id="increment" class="greg-button buttons" circle="" primary="" type="button" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path class="svg" fill="#ffffff" fill-rule="evenodd" d="M13 11h5a1 1 0 0 1 0 2h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5V6a1 1 0 0 1 2 0v5z"></path>
                    </svg>
                </button>
            </div>
            <button class="btn btn-primary" type="submit">Pagar</button>
        </div>
    <?= form_close(); ?>


<script> 
        
        var buttonsSetValues = document.querySelectorAll(".buttons");

        function setValueSale(button) {
            var quantitieTicketsField = document.querySelector("#quantitie");
            
            if(button.id == 'decrement' ){
                if(!(quantitieTicketsField.innerText == 0)) {
                    var quantitieTicketsSale            =  parseInt(quantitieTicketsField.innerText);
                        quantitieTicketsField.innerText     = quantitieTicketsSale - 1;
                }
            } else if (button.id == 'increment'){
                var quantitieTicketsSale                =  parseInt(quantitieTicketsField.innerText);
                    quantitieTicketsField.innerText     = quantitieTicketsSale + 1;
            }
        }

        buttonsSetValues.forEach(button => {
            button.addEventListener('click', function() {
                setValueSale(button);
            })
        })

        

</script>