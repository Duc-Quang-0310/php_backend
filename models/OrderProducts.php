<?php
class Orders_products
{
    //DB
    private $connection;
    private $table = 'orders_products';
    private $products_table = 'products';

    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function get_total()
    {
        $query = 'SELECT op.product_id, p.product_name , count(op.quantity) AS quantity FROM ' . $this->table . ' op, ' . $this->products_table . ' p WHERE op.product_id = p.product_id GROUP BY product_id';

        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }
}
