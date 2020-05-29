<?php
require("./model/classModel.php");
require("./model/goodsModel.php");
class GoodsController
{

    public function index()
    {
        $goods_list = Goods::getAll();
        $class_list = Classify::getAll();
        //print_r($goods_list);
        require_once('view/goods/index_goods.php');
    }

    public function add_goods()
    {
        $goodsname = $_GET['goodsname'];
        $price = $_GET['price'];
        $class = $_GET['class'];

       /* echo "$goodsname";
        echo "$price";
        echo "$class";*/

        Goods::add($goodsname,$price,$class);
        GoodsController::index();
        //require_once('view/goods/index_goods.php');
    }

    public function delete_goods()
    {
        $goods_id = $_GET['del-goodsid'];
        Goods::delete($goods_id);
        GoodsController::index();
    }

    public function update_goods()
    {
        $goods_id_update = array();

        $update_goods_id = $_GET['update_goodsid'];
        $update_goodsname = $_GET['update_goodsname'];
        $update_price = $_GET['update_price'];
        $update_class = $_GET['update_class'];

        Goods::update($update_goods_id,$update_goodsname,$update_price,$update_class);
        $goods_id_update = Goods::get($update_goods_id);
        GoodsController::index();
    }

    public function search_goods()
    {
        $key = $_GET['key-goodsid'];
        $goods_list = Goods::searchList($key);
        require_once('view/goods/index_goods.php');
    }
}
