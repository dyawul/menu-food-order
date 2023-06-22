<?php
require_once __DIR__ .  "/../Config/Database.php";
class Menu
{
    private $connect;
    public function __construct() {
        $this->connect = Database::getConnection();
    }
    function showData()
    {
        $data = $this->connect->query("SELECT * FROM menu ORDER BY id DESC");
        $rows = $data->fetch_all(MYSQLI_ASSOC);
        return $rows; 
    }

    function addData($category, $name, $price, $body, $tag)
    {
        $this->connect->query("INSERT INTO menu VALUES(NULL, '$category', '$name', '$price', '$body', '$tag')");
    }

    function editData($id)
    {
        $data = $this->connect->query("SELECT * FROM menu WHERE id='$id'");
        $rows = $data->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }

    function updateData($id, $category, $name, $price, $body, $tag)
    {
        $this->connect->query("UPDATE `menu` SET `category` = '$category', `name` = '$name', `price` = '$price', `body` = '$body', `tag` = '$tag' WHERE `menu` . `id` = '$id'");
    }
    function deleteData($id)
    {
        $this->connect->query("DELETE FROM menu WHERE `menu`.`id` = '$id'");
    }
}