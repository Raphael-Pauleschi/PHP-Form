<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>Lista de produtos</title>
    <meta name="author" content="Raphael Ferraiolo">
    <meta name="viewpoint" content="" width=device-width. initial-scale="1">
</head>
<h3>Lista de produtos cadastrados</h3>
<form action="ProdutoController.php" method="post">
    <?php foreach ($_POST['produtos[]'] as $value) { ?>
        <form id=".$value['id']." action='produtoController.php' method='post'>
            Id: <?php echo $value['id'] ?>
            <input type='hidden' name='id' value=<?php$value['id']?> />
            <br> Nome: <?php echo $value['productName'] ?></br>
            <input type='hidden' name='productName' value=<?php$value['productName']?>/>
            <br> Descricao: <?php echo $value['productDescription'] ?></br>
            <input type='hidden' name='productDescription' value=<?php$value['productDescription']?>/>
            <br> Categoria: <?php echo $value['category'] ?></br>
            <input type='hidden' name='category' value=<?php$value['category']?>/>
            <br> Quantidade: <?php echo $value['quantity'] ?></br>
            <input type='hidden' name='quantity' value=<?php $value['quantity'] ?> />
            <br> Preço: <?php echo $value['price'] ?></br>
            <input type='hidden' name='price' value=<?php$value['price']?>/>
            <p>
                <input type='submit' name='operation' value='delete'>
                <input type='submit' name='operation' value='update'>
            </p>
        </form>
    <?php } ?>
    </p>
    </p>
</form>

</html>