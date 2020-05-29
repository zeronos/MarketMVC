<?php
class PageController
{
    public function home()
    {
        require_once("view/page/home.php");
    }
    public function error()
    {
        require_once("view/page/error.php");
    }
}



?>