<!-- app/Views/feedback/index.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Feedback dos alunos acerca do restaurante universitário</title>
  <style>
    table {
      border-collapse: collapse;
      width: 50%;
      margin: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    .highlight {
      font-weight: bold;
      color: green;
    }
  </style>
</head>
<body>
  <h1>Feedback dos alunos acerca do restaurante universitário</h1>

  <table>
    <tr>
      <th>Alternativa</th>
      <th>Quantidade de Votos</th>
    </tr>
    <?php foreach ($statistics as $statistic): ?>
      <tr>
        <td><?php echo $statistic->resposta; ?></td>
        <td <?php echo ($statistic->resposta == max(array_column($statistics, 'resposta'))) ? ' class="highlight"' : ''; ?> >
          <?php echo $statistic->resposta; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
