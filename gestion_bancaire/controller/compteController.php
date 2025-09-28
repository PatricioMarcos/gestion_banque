<?php
if(isset($_SERVER["REQUEST_METHOD"])){
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_GET["view"])){
            if($_GET["view"]=="compte"){
                require(ROUTE_DIR."view/compte/compte.html.php");
            }elseif($_GET["view"]=="listeCompte"){
                $client = new Client();
                $clients = $client->getAllClients();
                $compte = new Compte();
                $comptes = $compte->getAllComptes();
                require(ROUTE_DIR."view/compte/listeCompte.html.php");
            }
        }
    }elseif($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["action"])){
          if($_POST["action"]=="AjouCompte"){
            addCompte($_POST);
          }
        }
       
    }
}

function addCompte($data){
        
        $compte= new Compte();
        $compte->setNumCompte($data["numCompte"]);
        $compte->setSolde($data["solde"]);
        $compte->setDateO($data["dateO"]);
        $compte->setDateC($data["dateC"]);
        $compte->addNewCompte();
        header("Location:".WEB_ROUTE."?controller=compteController&view=listeCompte");
}
?>