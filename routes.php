<?php
$controllers = array('page'=>['home','error'],
                     'goods'=>['index','add_goods','delete_goods','update_goods','search_goods'],
                     'classify'=>['index','add_classify','update_classify' , 'delete_classify','search_class']);

function call($controller,$action)
{

    require_once("controllers/".$controller."_controller.php");
    switch($controller)
    {
        case "page" :   $controller = new PageController();
                        break;
        case "goods":   require_once("model/goodsModel.php");

                        $controller = new GoodsController();
                        break;
        case "classify":require_once("model/classModel.php");

                        $controller = new ClassifyController();
                        break;
    }
    $controller->{$action}();
}

if(array_key_exists($controller,$controllers))
{
    if(in_array($action,$controllers[$controller]))
    {
        call($controller,$action);
    }
    else
    {
        call('page','home');
    }
}
else
call('page','home');

?>
