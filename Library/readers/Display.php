<?php
include_once "../ConnectDatabase/DBConnect.php";

class Display
{
    protected $conn;
    protected $database;

    public function __construct()
    {
        $this->database = new DBConnect();
        $this->conn = $this->database->connect();

    }

    public function getAll($table)
    {
        $sql = "SELECT * FROM $table";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function insert($table, $data)
    {
        $field = [];
        $placeholder = [];
        foreach ($data as $key => $value) {
            array_push($field, $key);
            array_push($placeholder, "?");
        }
        $fieldToString = implode(",", $field);
        $placeholderToString = implode(",", $placeholder);
        $sql = "INSERT INTO $table ($fieldToString) VALUES ($placeholderToString)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array_values($data));

    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function update($table, $data, $id)
    {
        $implode = implode(",",$data);
        $sql = "UPDATE $table SET $implode WHERE id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function connectTableAuthor($table1, $table2, $id)
    {

        $sql = "SELECT $table1.name FROM $table2 INNER JOIN $table1 ON $table1.id = $table2.author_id WHERE $table1.id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }
    public function connectTableCategory($table1, $table2, $id)
    {

        $sql = "SELECT $table1.name FROM $table2 INNER JOIN $table1 ON $table1.id = $table2.category_id WHERE $table1.id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }



}