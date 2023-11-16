<div class="modal" id="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Erro!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Insira uma data válida</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<h1 class="report-h1">Dias Mais Usados</h1>

<div class="filter-container">
    <label class="form-label" for="monthFilter">Filtrar por Mês:</label>
    <div>
        <input type="text" class="form-control" maxlength="10" id="dataInput" placeholder="MM/AAAA" autocomplete="off">
        <button class="btn btn-primary" id="filter" onclick="filterTable()">Filtrar</button>
    </div>
</div>
<div class="tables-extracts-report">
    <table class="table table-sm report-table" border="1">
        <thead>
            <tr>
                <th scope="col" onclick="sortTable(0)">Data</th>
                <th scope="col" onclick="sortTable(1)">Valor</th>
                <th scope="col" onclick="sortTable(2)">Quantidade Vendida</th>
            </tr>
        </thead>
        <tbody class="table-group-divider datas-table">
            <?php foreach ($reports as $report) {  ?>
                <tr class="tr-data-table">
                    <td class="dateUsed"><?= date('d/m/Y', strtotime($report->dtVenda)) ?></td>
                    <td><?= $report->valor ?></td>
                    <td><?= $report->qtdVendida ?></td>
                </tr>
            <?php } ?>

            <tr class="">
                    <td >Total</td>
                    <td><?php 
                        $sum = 0;
                        foreach ($reports as $report) {
                            $sum += $report->valor;
                        }
                        echo $sum;
                        ?>
                    </td>
                    <td> 
                        
                    <?php 
                        $sum = 0;
                        foreach ($reports as $report) {
                            $sum += $report->qtdVendida;
                        }
                        echo $sum;
                        ?>
                    </td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    function filterTable(){
        var dateInputValue = document.getElementById('dataInput').value;
        var dateInputMonth = dateInputValue.substring(0,2);
        var dateInputYear = dateInputValue.substring(3,7);

        var currentDate = new Date()
        var currentMonth = currentDate.getMonth() + 1;
        var currentYear = currentDate.getFullYear();

        if(dateInputMonth > currentMonth || dateInputYear > currentYear){
            callModal()
        } else {
            var tbody = document.querySelector('.datas-table');
            var trDataTable = document.querySelectorAll('.tr-data-table');

            var elementsForInsertInContainer = []
            
            if(dateInputValue != ""){                 
                datesToFilter = document.querySelectorAll(".dateUsed");
                
                datesToFilter.forEach(function(dt, index) {

                    var day = dt.innerText.substring(0,2);
                    var month = dt.innerText.substring(3,5);
                    var year = dt.innerText.substring(6,10);
                    var data = new Date(year, month, day);

                    var monthSale = data.getMonth();
                    var yearSale = data.getFullYear();
                    
                    if(monthSale == dateInputMonth && yearSale == dateInputYear){
                        elementsForInsertInContainer.push(trDataTable[index])
                    }
                })

                tbody.innerHTML = '';

                elementsForInsertInContainer.forEach(function(el){
                    tbody.appendChild(el)

                })

                document.getElementById('dataInput').value = '';
            } else {
                location.reload();
            }
        }
    }

    var currentColumn = -1;
    var ascending = true;

    function sortTable(columnIndex) {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.querySelector('.report-table');
        switching = true;

        while (switching) {
            switching = false;
            rows = table.rows;

            for (i = 1; i < rows.length - 1; i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName('td')[columnIndex];
                y = rows[i + 1].getElementsByTagName('td')[columnIndex];

                var xValue = x.innerHTML.toLowerCase();
                var yValue = y.innerHTML.toLowerCase();

                if (ascending ? xValue > yValue : xValue < yValue) {
                    shouldSwitch = true;
                    break;
                }
                
            }

            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }

        // Inverte a direção para a próxima iteração apenas se mudarmos de coluna
        if (currentColumn !== columnIndex) {
            ascending = true;
        } else {
            ascending = !ascending;
        }

        // Atualiza a coluna atual
        currentColumn = columnIndex;
    }

    function callModal() {
        const myModal = new bootstrap.Modal(document.getElementById('modal'));
        myModal.show();
    }

    // Adiciona um listener para o evento de digitação no input
    document.getElementById('dataInput').addEventListener('input', function (event) {
        // Obtém o valor atual do input
        var inputValue = event.target.value;

        // Remove qualquer caractere não numérico
        inputValue = inputValue.replace(/\D/g, '');

        // Aplica a máscara de data
        inputValue = mascaraData(inputValue);

        // Atualiza o valor do input com a data mascarada
        event.target.value = inputValue;
    });

    // Função de máscara de data
    function mascaraData(data) {
        if (data.length > 2) {
            return data.substring(0, 2) + '/' + data.substring(2, 6)
        } else {
            return data;
        }
    }

    
</script>



