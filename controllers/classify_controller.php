<?php
require("./model/classModel.php");
require("./model/goodsModel.php");
class ClassifyController
{

    public function index()
    {
        $goods_list = Goods::getAll();
        $class_list = Classify::getAll();
        //print_r($class_list);
        require_once('view/classify/index_classify.php');
    }

    public function add_classify()
    {
        $class = $_GET['classify'];

        Classify::add($class);
        ClassifyController::index();
        //require_once('view/goods/index_goods.php');
    }

    public function delete_classify()
    {
        $class_id = $_GET['del-classid'];
       // echo "delete";
        //echo $class_id;
        Classify::delete($class_id);
        ClassifyController::index();
    }

    public function update_classify()
    {
        $update_class_id = $_GET['update_classid'];
        $update_class = $_GET['update_classname'];

        Classify::update($update_class_id,$update_class);
        ClassifyController::index();
    }
    public function search_class()
    {
        $key = $_GET['key-classid'];
        $class_list = Classify::search_class($key);
        //print_r($class_list);
        require_once('view/classify/index_classify.php');
    }
}
