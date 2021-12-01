<?php
class Products
{
    //DB
    private $connection;
    private $table = 'products';
    private $op_table = 'orders_products';

    public $order_id;
    public $client_image;
    public $client_name;
    public $employee_ID;

    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function get_all()
    {
        $query = 'SELECT p.product_id, p.product_name FROM ' . $this->table . ' p ';

        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }

    public function top_seller()
    {
        $query = 'SELECT p.product_image ,p.product_name, a.total FROM ' . $this->table .  ' p , ( SELECT o.product_id, SUM(o.quantity) AS total FROM ' . $this->op_table .  '  o GROUP BY o.product_id ORDER BY total DESC LIMIT 2) AS a WHERE  p.product_id IN (a.product_id) ORDER BY a.total DESC ';

        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }
}
