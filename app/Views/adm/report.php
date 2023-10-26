<!-- <div class="tables-extracts-report">
    <h1>Dias Mais Usados</h1>
    <table class="table table-sm report-table" border="1"  >
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Data</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Quantidade Vendida</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

    php foreach ($reports as $report) {  ?>
                <tr>
                    <th scope="row">

                    </th>
                    <td>
                        
                        <= date('d/m/y l', strtotime($report->dtVenda)) ?>

                    </td>
                    <td>
                        
                            < $report->valor ?> 
                    </td>
                    <td>
                        <= $report->qtdVendida ?> 

                    </td>
                </tr>
    php } ?>
            </tbody>
    </table>
</div> -->

<div class="filter-container">
    <label for="monthFilter">Filtrar por Mês:</label>
    <input type="text" id="monthFilter" placeholder="MM/AAAA">
    <button onclick="filterTable()">Filtrar</button>
</div>


<div class="tables-extracts-report">
    <h1>Dias Mais Usados</h1>
    <table class="table table-sm report-table" border="1">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col" onclick="sortTable(1)">Data</th>
                <th scope="col" onclick="sortTable(2)">Valor</th>
                <th scope="col" onclick="sortTable(3)">Quantidade Vendida</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($reports as $report) {  ?>
                <tr>
                    <th scope="row"></th>
                    <td><?= date('d/m/Y l', strtotime($report->dtVenda)) ?></td>
                    <td><?= $report->valor ?></td>
                    <td><?= $report->qtdVendida ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    var ascending = true;

    function sortTable(columnIndex) {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.querySelector(".report-table");
        switching = true;

        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;

                x = rows[i].getElementsByTagName("td")[columnIndex];
                y = rows[i + 1].getElementsByTagName("td")[columnIndex];

                var xValue = x.innerHTML.toLowerCase();
                var yValue = y.innerHTML.toLowerCase();

                if (ascending) {
                    if (xValue > yValue) {
                        shouldSwitch = true;
                        break;
                    }
                } else {
                    if (xValue < yValue) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }

            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }

        ascending = !ascending;
    }

    function filterTable() {
        var input, filter, table, tbody, tr, td, i, txtValue;
        input = document.getElementById("monthFilter");
        filter = input.value.trim().toUpperCase();
        table = document.querySelector(".report-table");
        tbody = table.getElementsByTagName("tbody")[0];
        tr = tbody.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Segundo coluna contém a data
            if (td) {
                txtValue = td.textContent || td.innerText;
                var dateParts = txtValue.split(' '); // Divide a data em partes
                var monthYear = dateParts[0].toUpperCase(); // Obtém "MM/AAAA" da data

                if (monthYear.indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

