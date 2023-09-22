<table class="table">

        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Código</th>
                <th scope="col">Valor</th>
                <th scope="col">Vencimento</th>
                <th scope="col">Situação</th>
            </tr>
        </thead>
        <tbody>

<?php foreach($tickets as $ticket){  ?>
            <tr>
                <th scope="row">

                </th>
                <td>
                    <?= $ticket->cod ?> 
                </td>
                <td>
                    <?= $ticket->valor ?> 

                </td>
                <td>
                    <?= date('d/m/Y',strtotime($ticket->vencimento)) ?> 

                </td>
                <td>    
                    <?php

                    if($ticket->situacaoTicket == 1) {
                        $ticket->descricao = 'A VALIDAR';
                    }
                    echo $ticket->descricao;
                    
                    ?>
                </td>
            </tr>
<?php } 


?>
</tbody>
</table>

