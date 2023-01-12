<?php
session_start();
require 'ProdutoRepository.php';

$produto = new ProdutoRepository();

switch ($_POST['operation']) {
    case 'list':
        echo '<h3>Produtos: </h3>';
        foreach ($produto->list() as $value) {
            echo "Id: " . $value['id'] .
            "<br> Nome: " . $value['productName'] . "</br>
             <br> Descricao: " . $value['productDescription'] . "</br>
             <br> Categoria: " . $value['category'] . "</br>
             <br> Quantidade: " . $value['quantity'] . "</br>
             <br> Preço: " . $value['price'] . "</br>";
        }
        break;
    case 'insert':
        if (
            ($produto->insert(
                $_POST["productName"],
                $_POST["productDescription"],
                $_POST["category"],
                $_POST["quantity"], $_POST["price"]
            )
            ) == 1
        ) {
            echo 'Adicionado com sucesso';
        } else {
            echo 'Falha na insercao do dado';
        }
        header("Location: formUpdate.html");
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
                $_POST["quantity"], $_POST["price"]
            )
            ) == 1
        ) {
            echo 'Update com sucesso';
        } else {
            echo 'Falha no update do dado';
        }
        break;
    default:
        echo 'default';
        break;
}

?>