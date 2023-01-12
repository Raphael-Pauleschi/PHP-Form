<?php
declare(strict_types=1);

class ProdutoRepository
{
    private pdo $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO('mysql:host=localhost:3306;dbname=store', 'root', 'P!m1m8m8');
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

    public function insert(string $productName,string $productDescription, string $category, int $quantity, float $price): int
    {
        $prepare = ($this->connection)->prepare
        ('insert into produtos(productName,  productDescription, category, quantity, price) 
        values(?,?,?,?,?)');
        $prepare->bindParam(1, $productName);
        $prepare->bindParam(2, $productDescription);
        $prepare->bindParam(3, $category);
        $prepare->bindParam(4, $quantity);
        $prepare->bindParam(5, $price);
        $prepare->execute();

        return $prepare->rowCount();
    }
    public function update(int $id,string $productName,string $productDescription, string $category, int $quantity, float $price): int
    {
        $prepare = ($this->connection)->prepare
        ('update produtos set productName,  productDescription, category, quantity, price = (?,?,?,?,?,?) where id= ?');

        $prepare->bindParam(1, $id);
        $prepare->bindParam(2, $productName);
        $prepare->bindParam(3, $productDescription);
        $prepare->bindParam(4, $category);
        $prepare->bindParam(5, $quantity);
        $prepare->bindParam(6, $price);

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