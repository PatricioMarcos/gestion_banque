<?php
   if(isset($_REQUEST["controller"])){
    if($_REQUEST["controller"]=="compteController"){
        require(ROUTE_DIR."controller/compteController.php");
    }elseif ($_REQUEST["controller"] == "clientController") {
        require(ROUTE_DIR."controller/clientController.php");
    }elseif($_REQUEST["controller"] == "gestionController"){
        require(ROUTE_DIR."controller/gestionController.php");
    }elseif($_REQUEST["controller"] == "transactionController"){
        require(ROUTE_DIR."controller/transactionController.php");
    }else{
        require(ROUTE_DIR."view/compte/compte.html.php");
    }
   }else{
        require(ROUTE_DIR."view/compte/compte.html.php");
   }
?>