<?php

class createDb
{

    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $conn;

    public function __construct(
        $dbname = "urayherd_admin",
        $tablename = "product",
        $servername = "localhost",
        $username = "urayherd_manhek",
        $password = "manhek123*"
    ) {
        $this->dbname = $dbname;
        $this->tablename = $tablename;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        //create conn

        $this->conn = mysqli_connect($servername, $username, $password);

        //check conn
        if (!$this->conn) {
            die("Connection Failed: " . mysqli_connect_error());
        }
        //query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        //execute query

        if (mysqli_query($this->conn, $sql)) {
            $this->conn = mysqli_connect($servername, $username, $password, $dbname);
        } else {
            return false;
        }
    }
    public function getData()
    {
        // get product from the database
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
    public function getDatawithId($id)
    {
        // get product from the database
        $sql = "SELECT * FROM $this->tablename WHERE item_id = $id";

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
    public function getDatacart($id)
    {
        // get product from the database
        $sql = "SELECT * FROM cart";

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
}
