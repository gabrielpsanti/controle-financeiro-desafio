<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Definir Tipo de Transação</title>
</head>
<body>
    <h1>Escolher Tipo de Transação</h1>
    <form action="/criar-transacao" method="POST">
        <label>
            <input type="radio" name="tipo" value="Receita" required> Receita
        </label>
        <label>
            <input type="radio" name="tipo" value="Despesa" required> Despesa
        </label>
        <br><br>
        <input type="submit" value="Próximo">
    </form>
    <a href="/">Voltar</a>
</body>
</html>
