<?php
if(isset($_GET['controller'])&&isset($_GET['action']))
{
    $controller = $_GET['controller'];
    $action = $_GET['action'];
    $_GET['controller'] = null;
    $_GET['action'] = null;
}
else
{
    $controller = 'page';
    $action = 'home';
}

//echo ($controller.$action);

?>

<html>

<h1>Welcome to Storage of Supermarket<br>
<h2>[<a href="?controller=goods&action=index">List of Goods</a>]</h2>
<h2>[<a href="?controller=classify&action=index">Classify</a>]</h2><br>


<?php require_once("routes.php");?>


</html>
