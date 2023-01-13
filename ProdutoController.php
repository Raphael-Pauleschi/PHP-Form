<?php
session_start();
require 'ProdutoRepository.php';

$produto = new ProdutoRepository();

switch ($_POST['operation']) {
    case 'list':
        echo '<h3>Produtos: </h3>';
        foreach ($produto->list() as $value){
            echo "<form id=".$value['id']." action='produtoController.php' method='post'>".
            "Id: " . $value['id'] .
            "<input type = 'hidden' name = 'id' value =".$value['id']." />".
            "<br> Nome: " . $value['productName'] . "</br>".
            "<input type = 'hidden' name = 'productName' value =".$value['productName']." />".
             "<br> Descricao: " . $value['productDescription'] . "</br>".
             "<input type = 'hidden' name = 'productDescription' value =".$value['productDescription']." />".
             "<br> Categoria: " . $value['category'] . "</br>".
             "<input type = 'hidden' name = 'category' value =".$value['category']." />".
             "<br> Quantidade: " . $value['quantity'] . "</br>".
             "<input type = 'hidden' name = 'quantity' value =".$value['quantity']." />".
             "<br> Preço: " . $value['price'] . "</br>".
             "<input type = 'hidden' name = 'price' value =".$value['price']." />".
             "<p><input type='submit' name='operation' value='delete'>".
             "<input type='submit' name='operation' value='get'> </p>"."</form>";
        }
        break;
    case 'insert':
        if (
            ($produto->insert(
                $_POST["productName"],
                $_POST["productDescription"],
                $_POST["category"],
                $_POST["quantity"], $_POST["price"]
            )) == 1
        ) {
            echo 'Adicionado com sucesso';
        } else {
            echo 'Falha na insercao do dado';
        }
        header("Location: form.php");
        break;
    case 'delete':
        if (($produto->delete($_POST["id"])) == 1) {
            echo 'Deletado com sucesso';
        } else {
            echo 'Falha no delete do dado';
        }
        break;
    case 'update':
        if (
            ($produto->update(
                $_POST["id"],
                $_POST["productName"],
                $_POST["productDescription"],
                $_POST["category"],
                $_POST["quantity"], 
                $_POST["price"]
            )) == 1
        ) {
            echo 'Update com sucesso';
        } else {
            echo 'Falha no update do dado';
        }
        break;
        case 'get':
            header("Location: form.php?id=".$_POST["id"].
            "&productName=". $_POST["productName"].
            "&productDescription=".$_POST["productDescription"].
            "&category=".$_POST["category"].
            "&quantity=".$_POST["quantity"]. 
            "&price=".$_POST["price"]);
    default:

        echo 'default';
        break;
}

?>