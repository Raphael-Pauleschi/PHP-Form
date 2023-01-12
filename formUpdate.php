<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>Formulário de inserção</title>
    <meta name="author" content="Raphael Ferraiolo">
    <meta name="viewpoint" content="" width=device-width. initial-scale="1">
</head>

<body>
    <h3>Entre com os dados do produto</h3>
    <form action="ProdutoController.php" method="post">
        <p>Nome: <input type="text" name="productName"></p>
        <p>Descrição: <input type="text" name="productDescription">
            <p>Categoria: <input type="text" name="category"></p>
            <p>Quantidade: <input type="number" name="quantity"></p>
            <p>Valor: <input type="number" name="price"></p>
            <p><input type="submit" name="operation" value="update"> </p>
        </p>
    </form>
</body>

</html>