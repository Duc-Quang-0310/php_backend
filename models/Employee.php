<?php
class Employee
{
    //DB
    private $connection;
    private $table = 'employee';

    //Employee
    public $employee_id;
    public $employee_image;
    public $username;
    public $password;
    public $name;
    public $email;
    public $phonenumber;
    public $create_at;
    public $update_at;

    //Constructor with DB : Method is a function in a class. Its run automaticly in class
    public function __construct($db)
    {
        $this->connection = $db;
    }

    //test
    public function employee_details()
    {
        //Create query
        $query = 'SELECT e.employee_id, e.employee_image, e.name, e.email, e.phonenumber FROM 
             ' . $this->table . ' e WHERE e.employee_id = ?  ';
        //prepare statement
        $statement = $this->connection->prepare($query);

        //bind ID
        $statement->bindParam(1, $this->employee_id);

        //execute
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        //set properties
        $this->employee_id = $row['employee_id'];
        $this->employee_image = $row['employee_image'];
        $this->name = $row['name'];
        $this->email = $row['email'];
        $this->phonenumber = $row['phonenumber'];

        return $statement;
    }

    //best seller

    public function best_seller()
    {
        $done = "done";

        $query = 'SELECT e.employee_id ,e.name, e.email, e.employee_image FROM ' . $this->table . ' e, ( SELECT o.employee_ID, COUNT(o.employee_ID) AS total  FROM orders o WHERE o.status = :done GROUP BY o.employee_ID ORDER BY total DESC LIMIT 3 )AS a WHERE e.employee_id = a.employee_ID ';

        $statement = $this->connection->prepare($query);

        $statement->bindParam(':done', $done);

        $statement->execute();

        return $statement;
    }


    //login
    public function login()
    {
        $query = 'SELECT e.username, e.password FROM ' . $this->table . ' e WHERE e.username = :username ';

        //prepare
        $statement = $this->connection->prepare($query);

        //Cleanup data
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));

        //bind data
        $statement->bindParam(':username', $this->username);

        //execute
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        $row['username'] ??= null; // set default value to null
        $row['password'] ??= null;

        if (is_null($row['username'])  || is_null($row['password'])) {

            return false;
        }

        $this->username = $row['username'];
        $this->password = $row['password'];
        if ($statement->execute()) {
            return true;
        }
    }
}
