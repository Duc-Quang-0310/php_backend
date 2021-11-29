<?php
class Orders
{
    //DB
    private $connection;
    private $table = 'orders';
    private $product_table = 'products';
    private $op_table = 'orders_products';

    //table row names
    private $row_order_id = 'order_id';
    private $row_client_image = 'client_image';
    private $row_client_name = 'client_name';
    private $row_employee_ID = 'employee_ID';
    private $row_status = 'status';
    private $row_finish_date = 'finish_date';
    private $row_address = 'address';

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

    public function create($order_product_id, $product_id, $quantity)
    {
        $user_image = "https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png";

        $query = 'INSERT INTO ' . $this->table . ' VALUES (DEFAULT, :client_image, :client_name, :employee_ID , :status, DEFAULT, :address ); INSERT INTO ' . $this->op_table . ' VALUES (DEFAULT, :order_product_id, :product_id, :quantity) ';

        $statement = $this->connection->prepare($query);

        //Cleanup data
        $this->order_id = htmlspecialchars(strip_tags($this->order_id));
        $this->client_image = htmlspecialchars(strip_tags($this->client_image));
        $this->client_name = htmlspecialchars(strip_tags($this->client_name));
        $this->employee_ID = htmlspecialchars(strip_tags($this->employee_ID));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->finish_date = htmlspecialchars(strip_tags($this->finish_date));
        $this->address = htmlspecialchars(strip_tags($this->address));

        //binding
        $statement->bindParam(':client_image', $user_image);
        $statement->bindParam(':client_name', $this->client_name);
        $statement->bindParam(':employee_ID', $this->employee_ID);
        $statement->bindParam(':status', $this->status);
        $statement->bindParam(':address', $this->address);
        //binding for orders_products
        $statement->bindParam(':order_product_id', $order_product_id);
        $statement->bindParam(':product_id', $product_id);
        $statement->bindParam(':quantity', $quantity);

        $statement->execute();

        return $statement;
    }

    public function delete()
    {
        $query = 'DELETE FROM  ' . $this->table . ' WHERE order_id = :order_id ';

        $statement = $this->connection->prepare($query);

        //bind ID
        $statement->bindParam(':order_id', $this->order_id);

        $statement->execute();

        return $statement;
    }

    public function update($p_id, $qtt)
    {
        $query = 'UPDATE ' . $this->table . ' SET ' . $this->row_client_image . ' = :client_image, ' . $this->row_client_name . ' = :client_name, ' . $this->row_employee_ID . ' = :employee_ID, ' . $this->row_status . ' = :status , ' . $this->row_finish_date . ' = DEFAULT, ' . $this->row_address . ' = :address WHERE ' . $this->row_order_id . ' = :order_id ; UPDATE ' . $this->op_table . ' SET product_id = :product_id, quantity = :quantity WHERE orders_product_id = :order_id ';

        $statement = $this->connection->prepare($query);

        //Cleanup data
        $this->order_id = htmlspecialchars(strip_tags($this->order_id));
        $this->client_image = htmlspecialchars(strip_tags($this->client_image));
        $this->client_name = htmlspecialchars(strip_tags($this->client_name));
        $this->employee_ID = htmlspecialchars(strip_tags($this->employee_ID));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->finish_date = htmlspecialchars(strip_tags($this->finish_date));
        $this->address = htmlspecialchars(strip_tags($this->address));

        //binding for orders
        $statement->bindParam(':order_id', $this->order_id);
        $statement->bindParam(':client_image', $this->client_image);
        $statement->bindParam(':client_name', $this->client_name);
        $statement->bindParam(':employee_ID', $this->employee_ID);
        $statement->bindParam(':status', $this->status);
        $statement->bindParam(':address', $this->address);
        //binding for 
        $statement->bindParam(':product_id', $p_id);
        $statement->bindParam(':quantity', $qtt);

        $statement->execute();

        return $statement;
    }
}
