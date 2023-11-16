<!DOCTYPE html>
<html>
<head>
    <title>Questionário de Qualidade</title>
</head>
<body>
    <h1>Questionário de Qualidade</h1>
    <form action=" " method="post"> <!-- Corrigido o action -->
        <?php foreach ($perguntas as $pergunta): ?>
            <fieldset>
                <label><?php echo $pergunta->questao; ?></label><br>
                <ul>
                    <li>
                        <?php foreach ($alternativas as $alternativa): ?> 
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="resposta_<?php echo $pergunta->idPergunta; ?>" value="<?php echo $alternativa->idAlternativas; ?>">
                                <label class="form-check-label" for="<?php echo $alternativa->idAlternativas; ?>">
                                    <?php echo $alternativa->resposta; ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </li>
                </ul>
            </fieldset>
        <?php endforeach; ?>

        <label for="pergunta2">2. O que podemos melhorar?</label><br>
        <textarea name="pergunta2" rows="4" cols="50"></textarea>

        <p>
            <input type="submit" value="Enviar">
        </p>
    </form>
</body>
</html>
