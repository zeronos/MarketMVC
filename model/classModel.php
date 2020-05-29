<?php
class Classify
{
    public $class_id,$class_name;

    public function __construct($class_id,$class_name)
    {
        $this->class_id = $class_id;
        $this->class_name = $class_name;
    }

    public static function get($id)
    {
        require("./connectDB.php");
        $sql = "SELECT * from classify WHERE class_id = $id";
        $result = $conn->query($sql);

        $row = $result->fetch_assoc();
        $class_id = $row['class_id'];
        $class_name = $row['class_name'];
        require("./closeDB.php");
        return new Classify($class_id,$class_name);

    }

    public static function getAll()
    {
        $class_list = array();
        require("./connectDB.php");
        $sql = "SELECT * from classify";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            $class_id = $row['class_id'];
            $class_name = $row['class_name'];
            $class_list[] = new Classify($class_id,$class_name);
        }
        require("./closeDB.php");
        return $class_list;
    }

    public static function add($class_name)
    {
        require("./connectDB.php");
        $sql = "INSERT INTO `classify` (`class_id`, `class_name`) VALUES (NULL, '$class_name');";
        $result = $conn->query($sql);
        require("./closeDB.php");
        return "add sucsess $result row";

    }

    public static function update($class_id,$class_name)
    {
        require("./connectDB.php");
        $sql = "UPDATE `classify` SET `class_name` = '$class_name' WHERE `classify`.`class_id` = $class_id";
        $result = $conn->query($sql);
        require("./closeDB.php");
        return "update sucsess $result row";

    }

    public static function delete($class_id)
    {
        require("./connectDB.php");
        $sql = "DELETE FROM `classify` WHERE `classify`.`class_id` = $class_id";
        $result = $conn->query($sql);
        require("./closeDB.php");
        return "delete sucsess $result row";

    }
    public static function search_class($key)
    {
        $class_list = array();
        require("./connectDB.php");
        $sql = "SELECT * FROM classify WHERE (class_id like '%$key%' OR class_name like '%$key%')";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            $class_id = $row['class_id'];
            $class_name = $row['class_name'];
            $class_list[] = new Classify($class_id,$class_name);
        }
        require("./closeDB.php");
        return $class_list;
    }



}
?>
