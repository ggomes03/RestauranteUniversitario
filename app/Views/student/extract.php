<div class="container-tables"> 
    
    <div class="tables-extracts-student">
        <h1>Tickes Comprados</h1>
        <table class="table table-sm extract-table" border="1"  >
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Código</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Vencimento</th>
                        <th scope="col">Situação</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
    
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
        <?php } ?>
                </tbody>
        </table>
    </div>
</div>

<div>
    
    <?php 
    $qtdValidados = 0;
    $qtdComprados = 0;
    
    foreach($tickets as $ticket) {
        if($ticket->situacaoTicket == 4){
            $qtdValidados++;
        }
        $qtdComprados++;
    }
    ?>
    <p> Tickets Validados: <?= $qtdValidados ?></p>
    <p> Tickets Comprados: <?= $qtdComprados ?></p>
    
</div>