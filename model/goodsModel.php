<?php

class Goods
{
    public $goods_id;
    public $goods_name;
    public $price;
    public $classname;
    public $classFK;


    public function __construct($goods_id,$goods_name,$price,$classname)
    {
        $this->goods_id = $goods_id;
        $this->goods_name = $goods_name;
        $this->price = $price;
        $this->classname = $classname;
        $this->classFK = $classname;
    }

    public static function get($id)
    {
        require("./connectDB.php");
        $sql = "SELECT * from goods,classify WHERE goods.Goods_id = $id AND goods.class_FK = classify.class_id";
        $result = $conn->query($sql);

        $row = $result->fetch_assoc();
        $goods_id = $row['Goods_id'];
        $goods_name = $row['name'];
        $price = $row['Price'];
        $classname = $row['class_name'];
        $classFK = $row['goods.class_FK'];
        require("./closeDB.php");
        return new Goods($goods_id,$goods_name,$price,$classname,$classFK);
       
    }

    public static function getAll()
    {
        $Goods_list = array();
        require("./connectDB.php");
        $sql = "SELECT * FROM goods JOIN classify WHERE class_FK = class_id ";
        $result = $conn->query($sql);
        
        while($row = $result->fetch_assoc())
        {
            $goods_id = $row['Goods_id'];
            $goods_name = $row['name'];
            $price = $row['Price'];
            $classname = $row['class_name'];
            $classFK = $row['class_id'];
            $Goods_list[] = new Goods($goods_id,$goods_name,$price,$classname,$classFK);
        }
        require("./closeDB.php");

        return $Goods_list;
       
    }

    public static function add($goods_name,$price,$classname)
    {
        require("./connectDB.php");
        $sql = "INSERT INTO `goods` (`Goods_id`, `name`, `Price`, `class_FK`) VALUES (NULL, '$goods_name', '$price', '$classname')";
        $result = $conn->query($sql);
        require("./closeDB.php");
        return "add sucsess $result row";
       
    }

    public static function update($goods_id,$goods_name,$price,$classname)
    {
        require("./connectDB.php");
        $sql = "UPDATE `goods` SET `name` = '$goods_name', `Price` = '$price', `class_FK` = '$classname' WHERE `goods`.`Goods_id` = $goods_id";
        $result = $conn->query($sql);
        require("./closeDB.php");
        return "update sucsess $result row";
        
    }

    public static function delete($goods_id)
    {
        require("./connectDB.php");
        $sql = "DELETE FROM `goods` WHERE `goods`.`Goods_id` = $goods_id";
        $result = $conn->query($sql);
        require("./closeDB.php");
        return "delete sucsess $result row";
       
    }

    public static function searchList($key)
    {
        $Goods_list = array();
        require("./connectDB.php");
        $sql = "SELECT * FROM goods JOIN classify WHERE class_FK = class_id AND  (Goods_id like '%$key%' OR goods.name like '%$key%' OR goods.price like '%$key%')";
        $result = $conn->query($sql);
        
        while($row = $result->fetch_assoc())
        {
            $goods_id = $row['Goods_id'];
            $goods_name = $row['name'];
            $price = $row['Price'];
            $classname = $row['class_name'];
            $Goods_list[] = new Goods($goods_id,$goods_name,$price,$classname);
        }
        require("./closeDB.php");

        return $Goods_list;
       
    }






}
