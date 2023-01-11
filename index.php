<?php
require 'Produto.php';

$produto = new Produto();

switch ($_GET['operation']) {
    case 'list':
        echo '<h3>Produtos: </h3>';
        foreach ($produto->list() as $value) {
            echo "Id: " . $value['id'] . "<br> Descricao: " . $value['descricao'] . "</br>";
        }
        break;
    case 'insert':
        if (($produto->insert('exemplo')) == 1) {
            echo 'Adicionado com sucesso';
        } else {
            echo 'Falha na insercao do dado';
        }

        break;
    case 'delete':
        if (($produto->delete(1)) == 1) {
            echo 'Deletado com sucesso';
        } else {
            echo 'Falha no delete do dado';
        }
        break;
    case 'update':
        if (($produto->update('exemplo',1)) == 1) {
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