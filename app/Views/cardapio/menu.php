<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Menu Semanal</title>
</head>

<body>
    <h1>Cadastro de Menu Semanal do RU</h1>
    <?= form_open('processaMenu'); ?>

    <label for="data">Data da Semana:</label>
    <input type="date" name="data" id="data" required><br>

    <label for="nomePrato">Nome do Prato:</label>
    <input type="text" name="nomePrato" id="nomePrato" required><br>

    <label for="diaSemana">Dia da Semana:</label>
    <select name="diaSemana" id="diaSemana">
        <option value="Segunda-Feira">Segunda-Feira</option>
        <option value="Terça-Feira">Terça-Feira</option>
        <option value="Quarta-Feira">Quarta-Feira</option>
        <option value="Quinta-Feira">Quinta-Feira</option>
        <option value="Sexta-Feira">Sexta-Feira</option>
        <option value="Sábado">Sábado</option>
        <option value="Domingo">Domingo</option>
    </select>

    <input type="submit" value="Enviar">
    <?= form_close(); ?>

</body>

</html>