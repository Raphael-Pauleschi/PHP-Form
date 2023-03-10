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
        <p>Nome: <input type="text" name="productName"  
        <?php if (isset($_GET['productName']))?> value="<?php echo $_GET['productName']?>"></p>
        <p>Descrição: <input type="text" name="productDescription" 
        <?php if (isset($_GET['productDescription']))?> value="<?php echo $_GET['productDescription']?>"></p>
        <p>Categoria: <input type="text" name="category" 
        <?php if (isset($_GET['category']))?> value="<?php echo $_GET['category']?>"></p>
        <p>Quantidade: <input type="number" name="quantity"
         <?php if (isset($_GET['quantity']))?> value="<?php echo $_GET['quantity']?>"></p>
        <p>Valor: <input type="number" name="price" 
        <?php if (isset($_GET['price']))?> value="<?php echo $_GET['price']?>"></p>

        <?php if (isset($_GET['id'])) { ?>
            <p><input type="hidden" name="id" value="<?php echo $_GET['id']?>"></p>
            <p><input type="submit" name="operation" value="update"> </p>
        <?php } else { ?>
            <p><input type="submit" name="operation" value="insert"> </p>
        <?php } ?>
        </p>
    </form>
</body>

</html>