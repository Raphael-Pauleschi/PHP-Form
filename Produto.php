<?php
declare(strict_types=1);

class Produto
{
    private pdo $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO('mysql:host=localhost:3306;dbname=exemplo', 'root', 'P!m1m8m8');
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function list(): array
    {
        $sql = 'select * from produtos';

        $produtos = [];
        
        foreach (($this->connection)->query($sql) as $kel => $value) {
            array_push($produtos, $value);
        }
        return $produtos;

    }

    public function insert(string $descricao): int
    {
        $prepare = ($this->connection)->prepare('insert into produtos(descricao) values(?)');

        $prepare->bindParam(1, $descricao);
        $prepare->execute();

        return $prepare->rowCount();
    }
    public function update(string $descricao, int $id): int
    {
        $prepare = ($this->connection)->prepare('update produtos set descricao = ? where id= ?');

        $prepare->bindParam(1, $descricao);
        $prepare->bindParam(2, $id);

        $prepare->execute();
        return $prepare->rowCount();
    }
    public function delete(int $id): int
    {
        $prepare = ($this->connection)->prepare('delete from produtos where id= ?');

        $prepare->bindParam(1, $id);

        $prepare->execute();
        return $prepare->rowCount();
    }
}
?>