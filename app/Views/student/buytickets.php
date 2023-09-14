<?php if (session()->has('error')): ?>
    <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif; ?>



<h1>Comprar Tickets</h1>

<div class="buy-tickets">


<?php 

foreach($tickets as $ticket){
    if($ticket->situacaoTicket == 3){ ?>
        <a href="<?= base_url('buy'. '/' . $ticket->idTicket) ?>">
            <button type="button" class="btn btn-success"><?= $ticket->cod?></button>
        </a>

<?php
    } else if($ticket->situacaoTicket == 1) { ?>
        
        <button type="button" class="btn btn-light"> <?= $ticket->cod?> </button>
        
<?php }


?>

<?php } ?>

</div>