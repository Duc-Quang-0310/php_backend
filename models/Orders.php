<?php
class Orders
{
    //DB
    private $connection;
    private $table = 'orders';
    private $product_table = 'products';
    private $op_table = 'orders_products';

    //Orders
    public $order_id;
    public $client_image;
    public $client_name;
    public $employee_ID;
    public $status;
    public $finish_date;
    public $address;


    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function get_all()
    {
        $query = 'SELECT o.order_id, o.employee_ID, op.quantity, o.finish_date, o.status  FROM ' . $this->table . ' o, orders_products op WHERE o.order_id = op.orders_product_id';

        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }

    public function get_one()
    {
        $query = 'SELECT a.client_image, a.client_name, a.employee_ID, a.status, a.finish_date, a.address, a.product_id, a.quantity, p.product_name, p.product_image, p.product_price FROM ( SELECT o.client_image, o.client_name, o.employee_ID, o.status, o.finish_date, o.address, op.product_id, op.quantity  FROM ' . $this->table . ' o JOIN ' . $this->op_table . ' op ON op.orders_product_id = o.order_id WHERE o.order_id = :order_id ) AS a, ' . $this->product_table . ' p WHERE a.product_id = p.product_id';

        $statement = $this->connection->prepare($query);

        //bind ID
        $statement->bindParam(':order_id', $this->order_id);

        $statement->execute();

        return $statement;
    }
}
