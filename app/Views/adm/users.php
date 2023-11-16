

<h1>Permissão de Usuários</h1>

<?php if (session()->has('success')): ?>
    <div class="alert alert-success"><?= session('success') ?></div>
<?php endif; ?>

<label for="searchInput">Filtrar Por nome:</label>
<input type="text" id="searchInput" class="form-control" oninput="searchUser()" placeholder="Pesquisar por nome">

<table class="table" id="userTable">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Tipo Usuário</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    
    <?php 
        foreach ($users as $user) { ?>
    
        <tr>
            <th scope="row"><?= $user->idUsuario ?></th>
            <?php if($user->tipoUsuario == 1 ){  ?>
                <td>Estudante</td>
            <?php } else { ?>
                    <td>Administrador</td>
            <?php } ?>
            <td><?= $user->nome ?></td>
            <td><?= $user->email ?></td>
            <td>
                <a href="<?= base_url('setStudent') . '/' . $user->idUsuario ?>">
                    <button type="button" class="btn btn-success">Estudante</button>
                </a>
                <a href="<?= base_url('setAdm') . '/' . $user->idUsuario ?>">
                    <button type="button" class="btn btn-danger">Administrador</button>
                </a>
            </td>
            

        </tr>
    <?php }; ?>
    
  </tbody>
</table>

<script>
    function searchUser() {
      // Obtém o valor de entrada de pesquisa
      var input = document.getElementById('searchInput');
      var filter = input.value.toUpperCase();

      // Obtém a tabela e as linhas
      var table = document.getElementById('userTable');
      var rows = table.getElementsByTagName('tr');

      // Itera sobre as linhas e oculta aquelas que não correspondem à pesquisa
      for (var i = 0; i < rows.length; i++) {
        var tdNome = rows[i].getElementsByTagName('td')[1]; // Índice 2 para a coluna do nome
        if (tdNome) {
          var txtValue = tdNome.textContent || tdNome.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            rows[i].style.display = '';
          } else {
            rows[i].style.display = 'none';
          }
        }
      }
    }
  </script>